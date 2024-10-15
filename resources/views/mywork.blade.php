<?php


// $upcs = App\Models\Upc::where('verify', 2)
// ->paginate(10)    ;

//$cate = $_GET['cate'];
 

?>


@extends('layouts.admin')

@section('content')

 

<div class="px-3 py-2">

 
<div class="inline px-10 py-4 text-3xl"  > <i class="text-3xl nav-icon fas fa-briefcase" ></i> My Collection </div>
 
 
 

<div class="inline px-10 py-4">

        <div class="float-right mx-10 text-xl text-red-700 " >
        {{$upcs->total()}}
        </div>

</div>


 
 
 

 

 


</div>


{{-- new --}}



 
{{--  add list--}}
 
<div class="px-3 py-4 ">

        <?

$user_id = Auth::user()->id;  
 

 
$s =0 ;
 ?>

 

 

{{-- 
    <table class="table w-full mb-4 bg-white rounded shadow-md text-md"> --}}

   <table class="block min-w-full border-collapse md:table">
 
	<thead class="hidden md:table-header-group">
	           <tr class="absolute block border border-grey-500 md:border-none md:table-row -top-full md:top-auto -left-full md:left-auto md:relative ">

                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Date</td>
                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Image</td>
                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">UPC</td>
                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Category</td>
                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Brand</td>
                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Description</td>
                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Size/UOM</td>
                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Reviewing/Processed</td>

            </tr>
	</thead>


	<tbody class="block mt-4 md:table-row-group md:mt-0">
	

 @foreach($upcs as $c)

 <?$s = $s+1 ;?>



     		<tr class="  @if ($s%2 == 0)  br-white  @else  bg-gray-300 @endif border border-grey-500 md:border-none block md:table-row">
               <td class="block px-2 py-0 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Date</span> {{$c->add_date}}</td> 
				 <td class="block px-2 py-0 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Image</span>
	 		 				
                    <?
                    if($c->pic ==''){echo "";}else{?>
                        <a href="storage/upload_img/{{$c->pic}}" target="_blank"><img class="inline w-12 h-12 rounded shadow ui tiny image" src="storage/upload_img/{{$c->pic}}"></a>
                    <?}?>
 				
				</td>
                 <td class="block px-2 py-0 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">UPC</span>{{$c->upc}}</td>
                 <td class="block px-2 py-0 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Category</span>{{$c->category}}-{{$c->subcategory}}</td>
                 <td class="block px-2 py-0 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Brand</span>{{$c->brand}}</td>
                 <td class="block px-2 py-0 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Description</span>{{$c->description}}</td>
                 <td class="block px-2 py-0 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Size</span>{{$c->size}}/{{$c->uom}}</td>
                 <td class="block px-2 py-0 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Reviewing/Processed</span>

@if($c->processed == 1)

Processed<br>
{{$c->updated_at}}

@else

       <button class="px-2 py-1 text-white bg-blue-500 border border-blue-500 rounded hover:bg-blue-700 ">

	<a class='text-white '      id='edit{{$c->id}}' data-target="#edit{{$c->id}}" data-toggle="modal"  title="Edit!">Edit</a> </button>
    <button class="px-2 py-1 text-white bg-red-500 border border-red-500 rounded hover:bg-red-700">
        <a class='text-white ' href='{{route('mywork_delete', ['id'=>$c->id])}}' onclick='return confirmDelete()' title="Delete!" >Delete</a>	</button>

 

@endif



 
 
                </td>

            </tr>

       <tr class="align-top bg-gray-100 border-b hover:bg-orange-100">

        <td style="border-top:none;" ></td>
        <td class="p-1 px-1"colspan=4>
            
 
 
        <div style="padding-top:0px;"> Ingredients :<a href="{{asset('/storage/upload_img/'.$c->pic1)}}">{!! Str::limit($c->pic1, 25, ' ...') !!}</a> </div>
         <div style="padding-top:0px;"> Nutrition :  <a href="{{asset('/storage/upload_img/'.$c->pic2)}}">{!! Str::limit($c->pic2, 25, ' ...') !!}</a> </div>

@if($c->processed == 1)

@else

        <div style="padding-top:0px;"> Files Edit     <button class="btn btn-default btn-sm ">  <i class="fas fa-link" data-toggle="modal" data-target="#edit_attach{{$c->id}}"></i></button> </div>

        @endif

        </td>

         <td class="p-1 px-1"colspan=4>
            
            {{-- Reviewed Date : {{$c->verify_date}}<br> --}}
            
            Comment : {{$c->comment}}
            
   
    


      
 
        </td>



        </tr>
 
      @include('layouts.modal', $c)  

        {{-- @include('layouts.modal_confirm', $c) --}}

        @include('layouts.modal_attach', $c)  

        
 @endforeach
 
 

 
		
	</tbody>
</table>

{{-- {{ $upcs->links() }} --}}

</div>




 
                         



{{-- old --}}

 


</div>
<div class="justify-between px-3 py-4">

{{ $upcs->links() }}
</div>




@endsection

