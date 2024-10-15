<?php


// $upcs = App\Models\Upc::where('verify', 2)
// ->paginate(10)    ;

//$cate = $_GET['cate'];
 

?>


@extends('layouts.admin')

@section('content')

<? $segment = Request::segment(1);?>

<div class="px-3  py-2">


@if($segment == 'approved')
<div class="px-10 py-4  text-3xl inline"  > <i class="nav-icon fas fa-thumbs-up text-3xl" ></i> Approved </div>
@endif
@if($segment == 'pending' or $segment == 'pending_cate')
<div class="px-10 py-4  text-3xl inline"  > <i class="nav-icon fas fa-flag text-3xl" ></i> Pending </div>
@endif
@if($segment == 'denied')
<div class="px-10 py-4  text-3xl inline"  > <i class="nav-icon fas fa-thumbs-down text-3xl" ></i> Denied </div>
@endif

@if($segment == 'recent_edit')
<div class="px-10 py-4  text-3xl inline"  > <i class="nav-icon fas fa-edit text-3xl" ></i> Recent Edits </div>
@endif


<? $segment2 = Request::segment(2);?>


@if($segment2 == 2)<div class="px-10 py-4  text-2xl inline "  >02-Cheese or Tofu</div>@endif
@if($segment2 == 3)<div class="px-10 py-4  text-2xl inline"  > 03-Eggs  </div>@endif
@if($segment2 == 5)<div class="px-10 py-4  text-2xl inline"  >05-Breakfast Cereal </div>@endif
@if($segment2 == 6)<div class="px-10 py-4  text-2xl inline"  >06-Legumes  </div>@endif
@if($segment2 == 8)<div class="px-10 py-4  text-2xl inline"  >08-Fish </div>@endif
@if($segment2 == 9)<div class="px-10 py-4  text-2xl inline"  > 09-Infant Cereal </div>@endif
@if($segment2 == 12)<div class="px-10 py-4  text-2xl inline"  >  12-Infant Fruits & Vegetables </div>@endif
@if($segment2 == 13)<div class="px-10 py-4  text-2xl inline"  > 13-Infant Meats  </div>@endif
@if($segment2 == 16)<div class="px-10 py-4  text-2xl inline"  > 16-Bread/Whole Grains  </div>@endif
@if($segment2 == 19)<div class="px-10 py-4  text-2xl inline"  > 19-Fruit & Vegetables Cash Value  </div>@endif
@if($segment2 == 21)<div class="px-10 py-4  text-2xl inline"  > 21-Infant Formula(IF)  </div>@endif
@if($segment2 == 31)<div class="px-10 py-4  text-2xl inline"  > 31-Exempt Infant Formula(EXF) </div>@endif
@if($segment2 == 41)<div class="px-10 py-4  text-2xl inline"  > 41-WIC Eligible Nutritionals  </div>@endif
@if($segment2 == 50)<div class="px-10 py-4  text-2xl inline"  > 50-Yogurt   </div>@endif
@if($segment2 == 51)<div class="px-10 py-4  text-2xl inline"  > 51-Milk-whole   </div>@endif
@if($segment2 == 52)<div class="px-10 py-4  text-2xl inline"  > 52-Milk Low Fat/fat free  </div>@endif
@if($segment2 == 53)<div class="px-10 py-4  text-2xl inline"  > 53-Frozen Juice  </div>@endif
@if($segment2 == 54)<div class="px-10 py-4  text-2xl inline"  > 54-Juice-64oz  </div>@endif



<div class="px-10 py-4   inline    ">

        <div class="float-right mx-10 text-red-700 text-xl " >
        {{$upcs->total()}}
        </div>

</div>


@if($segment == 'approved')
    <div class="px-10 py-4   inline">

    @include('layouts.sub_btn')

    </div>

@endif
 
@if($segment == 'denied' or $segment == 'denied_cate')


    <div class="px-10 py-4   inline">

    @include('layouts.sub_select_denied')

    </div>

@endif

 

@if($segment == 'pending' or $segment == 'pending_cate')

 
    <div class="px-10 py-4   inline">

    @include('layouts.sub_select_pending')

    </div>

@endif 


</div>






<div class="px-3 py-4 ">




    <table class="w-full text-md bg-white shadow-md rounded mb-4">




        <thead>

            <tr class="border-b">

            <th class="text-left p-1 px-1" width=10%>Verified Date</th>
            <th class="text-left p-1 px-1">Status</th>
            <th class="text-left p-1 px-1">Staff</th>

            <th class="text-left p-1 px-1">UPC</th>
            <th class="text-left p-1 px-1" >Category </th>
            <th class="text-left p-1 px-1" >Brand</th>
            <th class="text-left p-1 px-1" width=35%>Description</th>
            <th class="text-left p-1 px-1">Size</th>
            <th class="text-left p-1 px-1">UOM</th>

            <th class="text-left p-1 px-1" width=15%>Actions</th>

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
        <td class="p-1 px-1"> {{$c->verify_staff}}  </td>

        <td class="p-1 px-1">{{$c->upc}}</td>
        <td class="p-1 px-1">{{$c->category}} - {{$c->subcategory}}  </td>
        <td class="p-1 px-1">{{$c->brand}}</td>
        <td class="p-1 px-1">{{$c->description}}</td>
        <td class="p-1 px-1">{{$c->size}}</td>
        <td class="p-1 px-1">{{$c->uom}}</td>



{{-- 
        <form action="upc_new_digiteye.php" target="_blank">

        <td class="p-1 px-1"> <input type=hidden name=upcCode value="{{$c->upc}}"></input> <button class="btn btn-default btn-sm  "  type=submit data-toggle="tooltip"
        title="See more details of the item.">
        <span class="fa fa-search" ></span></button>
        </form> --}}
 

        <td class="p-1 px-1"> 
        
        
 
    

        <a href="{{route('detail', ['id'=>$c->id])}}" target=_blank>  <button class="btn btn-default btn-sm  " >    <span class="fa fa-search" data-toggle="tooltip" title="Further details of the upc "  ></span>  </button> </a>




        <a href="{{route('make_approved', ['id'=>$c->id])}}">  <button class="btn btn-default btn-sm  " >    <span class="fa fa-thumbs-up" data-toggle="tooltip" title="WIC approved item"  ></span>  </button> </a>
  <!--     <a href="{{route('make_denied', ['id'=>$c->id])}}">  <button class="btn btn-default btn-sm  " >    <span class="fa fa-thumbs-down" data-toggle="tooltip" title="It is NOT WIC approved."  ></span>  </button>   </a>
  -->
        <a href="#">  <button class="btn btn-default btn-sm  " ><span class="fa fa-thumbs-down" data-toggle="modal" data-target="#denied{{$c->id}}" title="Edit!"   ></span></button></a>




        <a href="{{route('make_pending', ['id'=>$c->id])}}">  <button class="btn btn-default btn-sm  " >    <span class="fa fa-flag" data-toggle="tooltip" title="Pending!"  ></span>  </button>   </a>


        <a href="#">  <button class="btn btn-default btn-sm  " ><span class="fa fa-edit" data-toggle="modal" data-target="#edit{{$c->id}}" title="Edit!"   ></span></button></a>






        </td>

        </tr>


        <tr class="border-b hover:bg-orange-100 bg-gray-100 align-top">

        <td style="border-top:none;" >
@if ($c->image and !$c->pic )
    <img src="{{asset($c->image)}}" class="shadow rounded max-w-full h-auto align-middle border-none object-cover">
@endif

@if ($c->pic and !$c->image)
    <img src="{{asset('storage/upload_img/'.$c->pic)}}" class="shadow rounded max-w-full h-auto align-middle border-none object-cover">
@endif
    
@if ($c->image and $c->pic)
    <img src="{{asset($c->image)}}" class="shadow rounded max-w-full h-auto align-middle border-none object-cover">
@endif
        
        
        </td>
        <td class="p-1 px-1"colspan=5>Ingredients : {{$nu->ingredients}}
        <div style="padding-top:20px;">Source : {{$c->add_source}}_{{$c->add_source_desc}}</div>
        <div style="padding-top:0px;">Long Description : {{$c->long_desc}}</div>


      

        <div style="padding-top:20px;">Attachments : <i class="fas fa-edit" data-toggle="modal" data-target="#edit_attach{{$c->id}}"></i></div> 
        <a href="{{asset('/storage/upload_img/'.$c->pic)}}">{{$c->pic}}</a></div>
        <div style="padding-top:0px;">  <a href="{{asset('/storage/upload_img/'.$c->pic1)}}">{{$c->pic1}}</a> </div>
        <div style="padding-top:0px;">  <a href="{{asset('/storage/upload_img/'.$c->pic2)}}">{{$c->pic2}}</a> </div>
        </td>

        <td class="p-1 px-1" colspan=5>Nutrition : {{$nu->nutrition}}

        <div style="padding-top:20px;">Benefit quantity : {{$c->benefit_qt}}</div>
        <div style="padding-top:0px;">Benefit UOM : {{$c->benefit_uom_wow}}</div>
         <div style="padding-top:0px;">Comment: {{$c->comment}}</div>
         <div style="padding-top:0px;">Last Edited : {{$c->timestamp}}_{{$c->edit_staff}}</div>


        </td>



        </tr>

        @include('layouts.modal', $c)

        @include('layouts.modal_confirm', $c)

        @include('layouts.modal_attach', $c)

        @endforeach



</table>




</div>
<div class="px-3 py-4   justify-between">

{{ $upcs->links() }}
</div>




@endsection

