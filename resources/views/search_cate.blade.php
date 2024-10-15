 <?use Carbon\Carbon;?>
<?

$category = Request::input('category');

?>
@extends('layouts.admin')

@section('content')
<?
//dd($upcs);
?>
 

<div class="px-3  py-2">
<div class="px-10 py-4  text-3xl inline"  > <i class="nav-icon fas fa-search text-3xl" ></i> Search (Category) </div>
</div>
 
 


 
<div class="px-3  py-2 grid grid-cols-3">
 
 
    <div class="items-baseline flex pt-2 col-span-2 pl-2">
             
        <input type="text"     class=" text-lg     border rounded py-2 px-4 mb-3 focus:outline-none focus:bg-white w-1/3" 
        placeholder="Type any keyword(s)"  autofocus name="category" id="category" > 
      
          <input type=submit class="btn btn-warning ml-2 btn-lg" id="check"  value=" SEARCH ">   

          <div id="check_result" class="pl-64 "></div>

  </div>
<div  align=right class="pr-3" ><a href="{{asset('storage/md_category.pdf')}}">WIC Food Category <i class="fa fa-file-pdf text-lg ml-2"></i></a></div>

 
</div>   
    
 
<div class="table min-w-full divide-y divide-gray-200 p-6 ">
   
  <table class="table table-bordered table-hover">
    <thead>
    <tr class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left    text-gray-600    ">
    <th>Category</th>
    <th>Category Description</th>
    <th>Subcategory</th>
    <th>Subcategory Description</th>
    <th>Unit</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
    </table>    
  
</div>






 
<div class="table min-w-full divide-y divide-gray-200 p-6 ">
   
    <div id="status" class="text-md shadow-md rounded mb-4" >
    </div>        
  
</div>
 
 


@endsection



