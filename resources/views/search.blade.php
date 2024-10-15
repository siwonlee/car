 <?use Carbon\Carbon;?>
<?

$upc = Request::input('upc');
?>
@extends('layouts.admin')

@section('content')
<?
//dd($upcs);
?>
 

<div class="px-3  py-2">
<div class="px-10 py-4  text-3xl inline"  > <i class="nav-icon fas fa-search text-3xl" ></i> Search (UPC within APL) </div>
</div>
 

<div class="px-10 py-4   inline    ">

    <div class="float-right mx-10 text-red-700 text-xl " >
   @if ($upcs !=='' and $upcs->count() > 0)
      {{$upcs->total()}} 
   @endif 
    </div>

</div>



 
<div class="px-3  py-2">
 
             
            <form action="{{route('search.general')}}"        >
                
                @csrf
 
   

    <div class="  items-baseline flex pt-2">
             
        <input type="text"     class=" text-lg     border rounded py-2 px-4 mb-3 focus:outline-none focus:bg-white w-1/3" 
        placeholder="Type any keyword(s)"  autofocus name='upc' required
   @if ($upc)
    value="{{$upc}}"
   @else
value="" 
   @endif
          
        > 
      
          <input type=submit class="btn btn-warning ml-2 btn-lg" id="check"  value=" SEARCH ">   

          <div id="check_result" class="pl-64 "></div>

  </div>
</form>
</div>   
    
@if($upcs !=='' and $upcs->count() > 0)

<div class="px-3  py-2">
<table class="w-full text-md bg-white shadow-md rounded mb-4">

 

 

@foreach ($upcs as $c )

<?
$nu =  App\Models\Upc::find($c->id) ;

$nu = optional($nu->getIngre);

 

?>

<tr class="border-b

@if($c->verify==1) bg-green-300 @endif
@if($c->verify==2) bg-yellow-300 @endif
@if($c->verify==3) bg-red-300 @endif

">

    <td class="p-1 px-1" width='10%'> {{$c->verify_date}}  </td>



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

    <td style="border-top:none;" width=10% >
@if ($c->image and !$c->pic )
<img src="{{asset($c->image)}}" class="shadow rounded    align-middle border-none object-contain">
@endif

@if ($c->pic and !$c->image)
<img src="{{asset('storage/upload_img/'.$c->pic)}}" class="shadow rounded    align-middle border-none object-contain">
@endif

@if ($c->image and $c->pic)
<img src="{{asset($c->image)}}" class="shadow rounded     align-middle border-none object-contain">
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

    <td class="p-1 px-1" colspan=4>Nutrition : {{$nu->nutrition}}

    <div style="padding-top:20px;">Benefit quantity : {{$c->benefit_qt}}</div>
    <div style="padding-top:0px;">Benefit UOM : {{$c->benefit_uom_wow}}</div>
     <div style="padding-top:0px;">Comment: {{$c->comment}}</div>
     <div style="padding-top:0px;">Last Edited : {{$c->edit_date}}_{{$c->edit_staff}}</div>


    </td>



    </tr>
    <tr class="border-b hover:bg-orange-100 bg-gray-100 align-top">
    <td colspan=10>

<div class="p-4 m-2 alert alert-info">

 
     WOW/SOAR DATA : upc|category|sub|NA|brand|short_desc|benefit_qt|wow_uom|na|benefit_qt|effective_date|NA|NA|1|short_desc|NA
       |plu_indicator|end_date|broadband|high_cost|apl_type<BR><SPAN STYLE="PADDING-right:130PX;"></SPAN>
       
       
       {{$c->upc_out}}|{{$c->category_full}}|{{$c->subcat_full}}|NA|{{$c->brand}}|{{$c->long_desc}}
       
       |{{$c->benefit_qt}}|{{$c->benefit_uom_wow}}|NA|{{$c->benefit_qt}}|{{$c->verify_date}}|NA|NA|{{$c->verify}}|{{$c->short_desc}}
       |NA|{{$c->plu_indicator}}|{{$c->end_date}}|{{$c->broadband_flag}}|{{$c->high_cost}}|{{$c->apl_type}} 
       <span><button class="btn btn-danger fa fa-edit " data-toggle="modal" data-target="#edit_incomplete{{$c->id}} "> </button></span></div>
      




</div>

    </td>
    
    </tr>




    @include('layouts.modal', $c)

    @include('layouts.modal_confirm', $c)

    @include('layouts.modal_attach', $c)

    @include('layouts.modal_incomplete', $c)

    @endforeach



</table>




</div>
<div class="px-3 py-4   justify-between">

{{ $upcs->links() }}
</div>


</div>

 
@elseif($upc =='' )

 

@else

 

 
@include('detail_bare',['upc'=>$upc])

 
@endif


           
       
   
 
 


@endsection



