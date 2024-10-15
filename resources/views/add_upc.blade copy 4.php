<?php


// $upcs = App\Models\Upc::where('verify', 2)
// ->paginate(10)    ;

//$cate = $_GET['cate'];
 
?>
 <?use Carbon\Carbon;?>

@extends('layouts.admin')

@section('content')

 

{{-- <div class="px-3  py-2">
<div class="px-10 py-4  text-3xl inline"  > <i class="nav-icon fas fa-upload text-3xl" ></i> Collecting </div>
</div> --}}

{{-- <div class="px-3  py-2">
<div class="      alert alert-danger "  >  You MUST "Status Check" first and then fill out the rest of the fields. </div>
<div  >Please note that the fields preceded by <font color=red>*</font> are the required fields </div>
<div  style="margin-bottom:5px;" ><i class="fa fa-solid fa-camera"></i> is an experimental feature.  If the camera scan is not working properly, 
    please use the 'the image scan' or type the upc directly in the input field. </div>

</div> --}}

<div class="px-3  py-2">

 	 <div id="qr-reader"  ></div>
<!--	  	 <div id="qr-reader" style="width: 100%"></div>-->
<div id="qr-reader-results" hidden ></div>
 
</div>
 
<div class="px-3  py-2">
 


    <div class="mb-4 w-full flex ">
      <label class="block text-gray-700   font-bold mb-2" for="upc1">
      UPC:<font color=red>*</font>
      </label>   
      
   

   <input type=text    class="shadow-r-0 appearance-none   rounded w-full py-2 px-3 border-t border-bottom border-l 
       text-gray-700 leading-tight focus:outline-none border-r-0 shadow
       focus:shadow-outline ml-2 "  style="font-size:20px;" id='upc1' name=query  
       
                         @if ($errors ->count() == 0)
                        value="{{ old('upc1') }}"
                    @else
                            value="{{ old('upc') }}"
                    @endif
       
       > 


            </input> 
             
       <button
    class="!absolute right-1 top-1 z-10 select-none rounded   py-2 px-4 text-center align-middle    appearance-none   rounded
          bg-white border-l-0   border-t border-bottom border-r mr-2    shadow
     
      "
    type="button" onClick="start()"
    data-ripple-light="true"
  >
     <i class="fa fa-solid fa-camera text-black"></i>
  </button>      
     

    


   <button type=submit class=" btn btn-danger   " id='status_btn' >Status Check</button>
    </div>
      
  

    <div class="mb-4">
 
 
      <div id="status"  ></div>
    </div>
             
 



 
           <form action="{{route('add_upc_post')}}" id="sw1"   method="POST" enctype= "multipart/form-data">
                
                @csrf
                {{-- <input type=hidden name=upc value=""  id='hidden_upc' ></input> --}}
                    <input name=upc type=hidden  value="{{ old('upc') }}"id='hidden_upc'></input>
                <input name = "time"    type=hidden value=" {{Carbon::now()->format('Y-m-d')}}"   ></input>
                <input name = "staff"   type=hidden value="{{Auth::user()->name}} "   ></input>
                <input name = "corp"   type=hidden value="{{Auth::user()->name}} "   ></input>
                <input name = "user_id"   type=hidden value="{{Auth::user()->id}} "   ></input>    

    <div class="mb-4">
      <label class="block text-gray-700   font-bold mb-2" for="category1">
 CATEGORY:<font color=red>*</font>
      </label>

 <select class="form-control form-input rounded-md shadow-sm mt-1 block w-full disabled"
                        id="category1" name=category  @if ($errors ->count() == 0) disabled @endif >
                        <option selected {{ ((old('category') == '') or (isset($category) and $category == '')) ? 'selected' : '' }}>Select one </option>
                        <option value="2" {{ ((old('category') == '2') or (isset($category) and $category == '2')) ? 'selected' : '' }}>02-Cheese or Tofu</option>
                        <option value="3" {{ ((old('category') == '3') or (isset($category) and $category == '3')) ? 'selected' : '' }}>03-Eggs</option>
                        <option value="5" {{ ((old('category') == '5') or (isset($category) and $category == '5')) ? 'selected' : '' }}>05-Breakfast Cereal </option>
                        <option value="6" {{ ((old('category') == '6') or (isset($category) and $category == '6')) ? 'selected' : '' }}>06-Legumes (Beans, Peas & Lentils)</option>
                        <option value="8" {{ ((old('category') == '8') or (isset($category) and $category == '8')) ? 'selected' : '' }}>08-Fish</option>
                        <option value="9" {{ ((old('category') == '9') or (isset($category) and $category == '9')) ? 'selected' : '' }}>09-Infant Cereal</option>
                        <option value="12" {{ ((old('category') == '12') or (isset($category) and $category == '12')) ? 'selected' : '' }}>12-Infant Fruits & Vegetables</option>
                        <option value="13" {{ ((old('category') == '13') or (isset($category) and $category == '13')) ? 'selected' : '' }}>13-Infant Meats</option>
                        <option value="16" {{ ((old('category') == '16') or (isset($category) and $category == '16')) ? 'selected' : '' }}>16-Whole Wheat/Whole Grains    </option>
                        <option value="19" {{ ((old('category') == '19') or (isset($category) and $category == '19')) ? 'selected' : '' }}>19-Fruit & Vegetable CVB        </option>
                        <option value="21" {{ ((old('category') == '21') or (isset($category) and $category == '21')) ? 'selected' : '' }}>21-Infant Formula (IF)</option>
                        <option value="31" {{ ((old('category') == '31') or (isset($category) and $category == '31')) ? 'selected' : '' }}>31-Exempt Infant Formula (EXF)</option>
                        <option value="41" {{ ((old('category') == '41') or (isset($category) and $category == '41')) ? 'selected' : '' }}>41-WIC Eligible Nutritionals</option>
                        <option value="50" {{ ((old('category') == '50') or (isset($category) and $category == '50')) ? 'selected' : '' }}>50-Yogurt</option>
                        <option value="51" {{ ((old('category') == '51') or (isset($category) and $category == '51')) ? 'selected' : '' }}>51-Whole Milk                     </option>
                        <option value="52" {{ ((old('category') == '52') or (isset($category) and $category == '52')) ? 'selected' : '' }}>52-Skim/Non Fat/Fat Free & 1% Low Fat & 2% Reduced Fat Milk       </option>
                        <option value="53" {{ ((old('category') == '53') or (isset($category) and $category == '53')) ? 'selected' : '' }}>53-Juice (Women): Frozen & 48 oz                   </option>
                        <option value="54" {{ ((old('category') == '54') or (isset($category) and $category == '54')) ? 'selected' : '' }}>54-Juice (Children): 64 oz        </option>

                    </select>

    @error('category')<p class="text-red-500">{{ $message }}</p>@enderror
       {{-- <select   class="form-control form-input rounded-md shadow-sm mt-1 block w-full disabled"   id="category1" name=category  disabled required >
            <option selected    >Select one </option>  
            <option value="2"   >02-Cheese or Tofu</option>
            <option value="3"   >03-Eggs</option>
            <option value="5"  >05-Breakfast Cereal </option>
            <option value="6"    >06-Legumes (Beans, Peas & Lentils)
            </option>
            <option value="8"    >08-Fish</option>
            <option value="9"    >09-Infant Cereal</option>
            <option value="12"   >12-Infant Fruits & Vegetables</option>
            <option value="13"    >13-Infant Meats</option>
            <option value="16"    >16-Whole Wheat/Whole Grains
            </option>
            <option value="19"    >19-Fruit & Vegetable CVB
            </option>
            
            <option value="21"    >21-Infant Formula (IF)</option>
            <option value="31"    >31-Exempt Infant Formula (EXF)</option>
            <option value="41"   >41-WIC Eligible Nutritionals</option>
            <option value="50"    >50-Yogurt</option>
            
            
            
            <option value="51"    >51-Whole Milk
            </option>
            <option value="52"   >52-Skim/Non Fat/Fat Free & 1% Low Fat & 2% Reduced Fat Milk
            </option>
            <option value="53"   >53-Juice (Women): Frozen & 48 oz
            </option>
            
            <option value="54"   >54-Juice (Children): 64 oz
            </option>
                
                </select> --}}
    </div>
 
            
    <div class="mb-4">
      <label class="block text-gray-700   font-bold mb-2" for="sub_category">
  SUBCATEGORY:<font color=red>*</font>
      </label>
      
      {{-- <select   class="form-control form-input rounded-md shadow-sm mt-1 block w-full disabled"  id="sub_category"   name=subcategory disabled required>	</select> --}}
       
                    <select class="form-control form-input rounded-md shadow-sm mt-1 block w-full disabled"
                        id="sub_category" name=subcategory    @if ($errors ->count() == 0) disabled @endif
                            
                          > </select>
     @error('subcategory')       <p class="text-red-500">{{ $message }}</p>
       @enderror
 


    </div>



     <div class="mb-4">
      <label class="block text-gray-700   font-bold mb-2" for="brand">
         BRAND NAME:<font color=red>*</font>
      </label>
{{-- <input type=text class="form-control form-input rounded-md shadow-sm mt-1 block w-full disabled" value=" " name=brand   disabled required></input> --}}
<input type=text class="form-control form-input rounded-md shadow-sm mt-1 block w-full disabled"
                       value="{{ old('brand') }}"name=brand  @if ($errors ->count() == 0) disabled @endif ></input>     @error('brand')       <p class="text-red-500">{{ $message }}</p>
       @enderror

  
    
    </div>

      <div class="mb-4">
      <label class="block text-gray-700   font-bold mb-2" for="description">
      FOOD DESCRIPTION:<font color=red>*</font>
      </label>
 
  
    {{-- <input type=text class="form-control form-input rounded-md shadow-sm mt-1 block w-full disabled" value=" " name=description disabled  required ></input> --}}
    <input type=text
                        class="form-control form-input rounded-md shadow-sm mt-1 block w-full disabled" value="{{ old('description') }}"
                        name=description  @if ($errors ->count() == 0) disabled @endif ></input>     @error('description')       <p class="text-red-500">{{ $message }}</p>
       @enderror

    </div>

       <div class="mb-4">
      <label class="block text-gray-700   font-bold mb-2" for="size">
   SIZE:<font color=red>*</font>
      </label>
 
  
 {{-- <input type=text class="form-control form-input rounded-md shadow-sm mt-1 block w-full disabled" value=" " name=size disabled required ></input> --}}
 <input type=text class="form-control form-input rounded-md shadow-sm mt-1 block w-full disabled"
                        value="{{ old('size') }}" name=size  @if ($errors ->count() == 0) disabled @endif ></input>     @error('size')       <p class="text-red-500">{{ $message }}</p>
       @enderror
    </div>           
    
        <div class="mb-4">
      <label class="block text-gray-700  font-bold mb-2" for="uom">
   UOM:<font color=red>*</font>
      </label>
 
<select class="form-control form-input rounded-md shadow-sm mt-1 block w-full disabled" id="uom"
                        name=uom  @if ($errors ->count() == 0) disabled @endif >




                        <option value="">Select one</option>
           

                        <option value="CT" {{ ((old('uom') == 'CT') or (isset($uom) and $uom == 'CT')) ? 'selected' : '' }}>CT_COUNT</option>
                        <option value="DOZ" {{ ((old('uom') == 'DOZ') or (isset($uom) and $uom == 'DOZ')) ? 'selected' : '' }}>DOZ_DOZEN</option>
                        <option value="EA" {{ ((old('uom') == 'EA') or (isset($uom) and $uom == 'EA')) ? 'selected' : '' }}>EA_EACH</option>

                        <option value="GAL" {{ ((old('uom') == 'GAL') or (isset($uom) and $uom == 'GAL')) ? 'selected' : '' }}>GAL_GALLON</option>
                        <option value="HGL" {{ ((old('uom') == 'HGL') or (isset($uom) and $uom == 'HGL')) ? 'selected' : '' }}>HGL_HALF GALLON</option>

                        {{-- <option value="LB" {{ ((old('uom') == 'LB') or (isset($uom) and $uom == 'LB')) ? 'selected' : '' }}>LB_POUND</option> --}}

                        <option value="OZ" {{ ((old('uom') == 'OZ') or (isset($uom) and $uom == 'OZ')) ? 'selected' : '' }}>OZ_OUNCE</option>
             

                        <option value="QT" {{ ((old('uom') == 'QT') or (isset($uom) and $uom == 'QT')) ? 'selected' : '' }}>QT_QUART</option>
    




                    </select>

     @error('uom')
            <p class="text-red-500">{{ $message }}</p>
       @enderror

 

              {{-- <select   class="form-control form-input rounded-md shadow-sm mt-1 block w-full disabled"  id="uom"  name=uom disabled required >
                    <option value=""   >Select one</option>
                        <option value="DOZ"   >DOZ_DOZEN</option>
                        <option value="GAL"   >GAL_GALLON</option>
                        <option value="HGL"   >HGL_HALF GALLON</option>
                        <option value="OZ"   >OZ_OZ</option>
                        <option value="QT"   >QT_QUART</option>
                        </select> --}}
 
    </div>     
    

    
           <div class="mb-4">
      <label class="block text-gray-700  font-bold mb-2" for="pic1" style="display:flex;">
   INGREDIENTS & NUTRITION LABEL:    <font color=red>*</font>
    <div   class='  bg-red-500 text-white rounded  px-2  font-normal'    >
    
      Image types + pdf,doc containing the images
      
    </div>  
      </label>
 
          <div class="input-group">
                 <input type="text" class="form-control" readonly   placeholder=" Ingredients"   >
                        {{-- <span class="btn btn-primary btn-file dis_button cursor-not-allowed opacity-50 " style="margin-left:5px;">
                            Browse<input type="file" name="pic1" accept=".gif, .jpg, .png, .doc, .pdf, .jpeg, .docx"     disabled class="disabled"   required /> 
                        </span> --}}

                                       <span class="btn btn-primary btn-file dis_button  @if ($errors ->count() == 0) cursor-not-allowed opacity-50  @endif "
                            style="margin-left:5px;">
                            Browse<input type="file" name="pic1" accept=".gif, .jpg, .png, .doc, .pdf, .jpeg, .docx"
                                 @if ($errors ->count() == 0) disabled class="disabled" @endif  />
                        </span>
                  
    



                </div>	
                
                        
                     @error('pic1')<br>
            <p class="text-red-500">{{ $message }}</p>
       @enderror             

                
                
     <div class="input-group" style="margin-top:10px;">
                   <input type="text" class="form-control" readonly  placeholder=" Nutrition Label" /> 
                        {{-- <span class="btn btn-primary btn-file dis_button cursor-not-allowed opacity-50" style="margin-left:5px;" >
                            Browse<input type="file" name="pic2" accept=".gif, .jpg, .png, .doc, .pdf, .jpeg, .docx"  disabled  class="disabled"   /> 
                        </span> --}}
                
      <span class="btn btn-primary btn-file dis_button  @if ($errors ->count() == 0) cursor-not-allowed opacity-50  @endif "
                            style="margin-left:5px;">
                            Browse<input type="file" name="pic2" accept=".gif, .jpg, .png, .doc, .pdf, .jpeg, .docx"
                                 @if ($errors ->count() == 0) disabled class="disabled" @endif  />
                        </span>

               


                   
                </div>			
                                            @error('pic2')<br>
            <p class="text-red-500">{{ $message }}</p>
       @enderror     
                 <div    class='  bg-red-500 text-white rounded p-2 mt-2'   >
                 
                        
          
                        The file name containing special characters like % or ' will not be uploaded. Please remove the special characters before uploading it.<br>
                        For i-phone users, please do not choose "Take a Photo or Video" but "Photo Library" or "Browse" when uploading the photo.
                    
                   </div> 
 
    </div>   
    
                
     


    <div class="mb-4">
      <label class="block text-gray-700   font-bold mb-2" for="pic" style="display:flex;">
     PRODUCT IMAGE:     
      <div   class='  bg-red-500 text-white rounded px-2 font-normal'    >
    
      Image types ONLY
      
    </div> 
      </label>
 
        <div class="input-group">
                    
            <input type="text" class="form-control" readonly placeholder="Product Image"  >



                        {{-- <span class="btn btn-primary btn-file dis_button cursor-not-allowed opacity-50" style="margin-left:5px;">
                            Browse<input type="file" name="pic" accept="image/*"  disabled  class="disabled"    /> 
                        </span> --}}
            
                        <span class="btn btn-primary btn-file dis_button  @if ($errors ->count() == 0) cursor-not-allowed opacity-50  @endif "
                            style="margin-left:5px;">
                            Browse<input type="file" name="pic" accept="image/*"  @if ($errors ->count() == 0) disabled class="disabled" @endif  />
                        </span>
                   
                </div>
                
    </div>

    

  
 
            
     <div style="text-align:center">

         {{-- <button type=submit id="add_button" class=" shadow bg-green-700  hover:bg-green-500 text-white py-2 px-4 rounded dis_button cursor-not-allowed opacity-50 disabled"  disabled >Add</button>  --}}
            <button type=submit id="add_button"
                        class=" bg-green-700 hover:bg-green-500 text-white py-2 px-4 rounded dis_button cursor-not-allowed opacity-50 disabled"
                         @if ($errors ->count() == 0) disabled @endif>Add</button>
     </div>
         
                
       
     
 
  </form>
   
</div> 
   
 
{{--  add list--}}

<div class="px-3 py-4 ">

    <table class="w-full text-md bg-white shadow-md rounded mb-4 table">
	<thead>
	            <tr>
             <td>Add-Date</td>
                <td>Image</td>
                <td>UPC</td>
                <td>Category</td>
                <td>Brand</td>
                <td>Description</td>
                <td>Size/UOM</td>
             

            </tr>
	</thead>
	<tbody>
	
        <?

$user_id = Auth::user()->id;  

 

 

$upcs = App\Models\Upindi::where('user_id',$user_id )-> orderby('timestamp','desc')->paginate(10)    ;


//dd($upcs);

 ?>

 @foreach($upcs as $c)



            <tr>
                <td> {{$c->add_date}}</td> 
				<td>
				
		 				
<?
if($c->pic ==''){echo "";}else{?>
	<a href="storage/upload_img/{{$c->pic}}" target="_blank"><img class="h-32 w-32 ui tiny image rounded" src="storage/upload_img/{{$c->pic}}"></a>
<?}?>

 		
				
				
				</td>
                    <td>{{$c->upc}}</td>
                <td>{{$c->category}}-{{$c->subcategory}}</td>
                <td>{{$c->brand}}</td>
                <td>{{$c->description}}</td>
                <td>{{$c->size}}/{{$c->uom}}</td>

            </tr>



 @endforeach
 

 






 
		
	</tbody>
</table>

{{ $upcs->links() }}
</div>





  
 



@endsection






<!-- include the library -->

 
 
<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>



 

<script>


    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
            || document.readyState === "interactive"
          
			
			) {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
			
			
        }
    }


 var start = function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var resultContainer2 = document.getElementById('upc1');
        var lastResult, countResults = 0;
		var isScanned = true;
        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
 
                console.log(`Scan result ${decodedText}`, decodedResult);
              	resultContainer.innerHTML = decodedText;
				resultContainer2.value = decodedText;
				console.log(resultContainer2.value);
				console.log(isScanned);
				html5QrcodeScanner.clear();
 	
				
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
       //     "qr-reader", { fps: 20, qrbox: 500 });
"qr-reader", { fps: 30,showZoomSliderIfSupported: true, willReadFrequently: true,
            showZoomSliderIfSupported: true,
            defaultZoomValueIfSupported: 5 });
              
	   html5QrcodeScanner.render(onScanSuccess);
    }


 
 
 	
</script>
