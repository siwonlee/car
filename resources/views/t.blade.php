<?php


$upcs = App\Models\Upc::where('verify',2)->paginate(3) ;
//$upcs = App\Models\User::all() ;
// $upcs = App\Models\Upc::find(1439)  ;
// dd($upcs->getIngre)

?>



@extends('layouts.admin')

@section('content')




<div class="px-3 py-4 flex justify-center">

    <table class="w-full text-md bg-white shadow-md rounded mb-4">




        <thead>

            <tr class="border-b">

            <th class="text-left p-1 px-1">Verified Date</th>
            <th class="text-left p-1 px-1">Status</th>
            <th class="text-left p-1 px-1">Staff</th>

            <th class="text-left p-1 px-1">UPC</th>
            <th class="text-left p-1 px-1" >Category </th>
            <th class="text-left p-1 px-1" >Brand</th>
            <th class="text-left p-1 px-1">Description</th>
            <th class="text-left p-1 px-1">Size</th>
            <th class="text-left p-1 px-1">UOM</th>
            <th class="text-left p-1 px-1">Comment</th>
            <th class="text-left p-1 px-1" >Actions</th>

            </tr>
        </thead>

    @foreach ($upcs as $c )

    <?
$nu =  App\Models\Upc::find($c->id) ;

$nu = optional($nu->getIngre);

//$nu = App\Models\Upc::find(1439) ;

//dd($nu->getIngre->ingredients);
// $nu = $nu->getIngre;
// $nu->getIngre;


    ?>

    <tr class="border-b

 @if($c->verify==1) bg-green-300 @endif
 @if($c->verify==2) bg-yellow-300 @endif
 @if($c->verify==3) bg-red-300 @endif

 ">

        <td class="p1 px1"> {{$c->verify_date}}  </td>



        <td class="p-1 px-1">{{$c->approved}}</td>
        <td class="p-1 px-1"> {{$c->bystaff}}  </td>

        <td class="p-1 px-1">{{$c->upc}}</td>
        <td class="p-1 px-1">{{$c->category}} - {{$c->subcategory}}  </td>
        <td class="p-1 px-1">{{$c->brand}}</td>
        <td class="p-1 px-1">{{$c->description}}</td>
        <td class="p-1 px-1">{{$c->size}}</td>
        <td class="p-1 px-1">{{$c->uom}}</td>
        <td class="p-1 px-1">{{$c->comment}}</td>



        <form action="upc_new_digiteye.php" target="_blank">

        <td class="p-1 px-1"> <input type=hidden name=upcCode value="{{$c->upc}}"></input> <button class="btn btn-default btn-sm"  type=submit data-toggle="tooltip"
        title="See more details of the item.">
        <span class="fa fa-search" ></span></button>
        </form>

        <a href=sw_iamdone.php?no={{$c->id}}>      <span class="fa fa-thumbs-o-up" data-toggle="tooltip" title="WIC approved item" style="font-size:20px;"></span>   </a>
        <a href=sw_iamdoneback.php?no={{$c->id}}>    <span class="fa fa-thumbs-o-down" data-toggle="tooltip" title="It is NOT WIC approved." style="font-size:20px;"></span>   </a>
        <a href=sw_iamdone_pending.php?no={{$c->id}}>    <span class="fa fa-flag" data-toggle="tooltip" title="Pending!" style="font-size:20px;"></span>   </a>


        <span class="fa fa-pencil-square-o"  data-toggle="modal" data-target="#edit" title="Edit" style="font-size:20px;"></span>

        </td>

        </tr>


        <tr class="border-b hover:bg-orange-100 bg-gray-100">
        <td style="border-top:none;" ><img src="{{$c->image}}" width=150px></td>


        <td class="p-1 px-1"colspan=5>Ingredients : {{$nu->ingredients}}
        <div style="padding-top:20px;">Source : {{$c->add_source}}_{{$c->add_source_desc}}</div>
        <div style="padding-top:20px;">Long Description : {{$c->long_desc}}</div>
        <div style="padding-top:0px;">Short Description : {{$c->short_desc}}</div>
        </td>
        <td class="p-1 px-1" colspan=5>Nutrition : {{$nu->nutrition}}
        <div style="padding-top:20px;">Benefit quantity : {{$c->benefit_qt}}</div>
        <div style="padding-top:0px;">Benefit UOM : {{$c->benefit_uom_wow}}</div>




        </td>



        </tr>




    @endforeach


    </table>




    </div>
    <div class="px-3 py-4   justify-between">

    {{ $upcs->links() }}
    </div>
@endsection
