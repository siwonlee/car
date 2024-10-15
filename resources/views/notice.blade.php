@extends('layouts.admin')

@section('content')
 

<div class="px-3  py-2">
<div class="px-10 py-4  text-3xl inline"  > <i class="nav-icon fas fa-bullhorn text-3xl" ></i> Notice </div>
</div>
 
 
<div class="p-5">
    <p> 
       
           </p>
           <ul class="">
            
             <li class="p-2"><i class="fa fa-square pr-2"></i>UPC types used in the site are the same as ones printed on the packages.  </li> 
             <li class="p-2"><i class="fa fa-square pr-2""></i>The upc to be submitted should have a proper check digit at the end. </li>
             <li class="p-2"><i class="fa fa-square pr-2""></i>UPC-E, which is a short form of upc with 8 digits should be used AS IS. </li> 
             <li class="p-2"><i class="fa fa-square pr-2""></i>UPC-E should not be converted to UPC-A(12 digit upc). </li>
             <li class="p-2"><i class="fa fa-square pr-2""></i>The lengths of the upcs in the site are 8, 12 and 13 ONLY. </li> 
             <li class="p-2"><i class="fa fa-square pr-2""></i>The allowed types of the upcs in the site 
              <ul class="mt-3" >
                <li class="ml-3"><i class="fa fa-circle pr-2""></i>UPC-E : 8 digit upc, condensed form of UPC-A </li> 
                <li class="ml-3"><i class="fa fa-circle pr-2""></i>UPC-A : 12 digit upc </li>
                <li class="ml-3"><i class="fa fa-circle pr-2""></i>EAN-13 : 13 digit upc, "0" + UPC-A  </li>
               </ul>
             </li>

             </ul>


   <p></p>


</div>

 
 


@endsection



