<?php
 

// $upcs = App\Models\Upc::where('verify', 2)
// ->paginate(10)    ;

//$cate = $_GET['cate'];
if(Request::input('upc')){$upc = Request::input('upc');}
if(Request::input('query')){$upc = Request::input('query');}
if(Request::input('type')){$type = Request::input('type');}else{$type='0';}

 
$category = old('category');
$subcategory = old('subcategory');
$description = old('description');
$brand = old('brand');
$size = old('size');
$uom = old('uom');
 
//dd($source);
//dd($upc);

if(isset($source)){

  $upcs = App\Models\Upc::where('upc', $upc)->get();

  //dd($upcs[0]->upc);
$upcs=$upcs[0];
$upc = $upcs->upc;
$category = $upcs->category;
$subcategory = $upcs->subcategory;
$description =$upcs->description ;
$brand =$upcs->brand ;
$size =$upcs->size ;
$uom = $upcs->uom;
$type = 1;

//dd($uom);
}

?>
 <?use Carbon\Carbon;?>

@extends('layouts.admin')

@section('content')

<?//dd($b);?>

{{-- <div class="px-3 py-2">
<div class="inline px-10 py-4 text-3xl"  > <i class="text-3xl nav-icon fas fa-upload" ></i> Collecting </div>
</div> --}}

{{-- <div class="px-3 py-2">
<div class=" alert alert-danger"  >  You MUST "Status Check" first and then fill out the rest of the fields. </div>
<div  >Please note that the fields preceded by <font color=red>*</font> are the required fields </div>
<div  style="margin-bottom:5px;" ><i class="fa fa-solid fa-camera"></i> is an experimental feature.  If the camera scan is not working properly, 
    please use the 'the image scan' or type the upc directly in the input field. </div>

</div> --}}

<div class="px-3 py-2">

 	 {{-- <div id="qr-reader"  ></div> --}}
<!--	  	 <div id="qr-reader" style="width: 100%"></div>-->
{{-- <div id="qr-reader-results" hidden ></div> --}}
 
</div>
 
<div class="px-3 py-2">
 


    <div class="flex w-full mb-4 ">

    
      <label class="block mb-2 font-bold text-gray-700" for="upc1">
      UPC:<font color=red>*</font>
      </label>   
      
   

   <input type=text    class="w-full px-3 py-2 ml-2 leading-tight text-gray-700 border-t border-l border-r-0 rounded shadow appearance-none shadow-r-0 border-bottom focus:outline-none focus:shadow-outline "  style="font-size:20px;" id='upc1' name=query  
       
         @if ($upc) value="{{$upc}}" @else
       value="" @endif
       
       > 


            </input> 
             
       <button
    class="!absolute right-1 top-1 z-10 select-none rounded   py-2 px-4 text-center align-middle    appearance-none   rounded
          bg-white border-l-0   border-t border-bottom border-r mr-2    shadow
     
      "
    type="button"  id="startButton" data-target="#scancamera" data-toggle="modal" 
    data-ripple-light="true"
  >
     <i class="text-black fa fa-solid fa-camera"></i>
  </button>      
     

    @if (isset($upc))
        
   <a href="{{route("add_upc")}}"<button class=" btn btn-primary"  >Refresh</button></a>
   @else


   <button type=submit class=" btn btn-danger" id='status_btn' >Status Check</button>

 @endif


    </div>
      
  

    <div class="mb-4">
 
 
      <div id="status"  ></div>
    </div>
             
 



 
           <form action="{{route('scan_upc_post')}}" id="sw1"   method="POST" enctype= "multipart/form-data">
           {{-- <form action=" " id="sw1"   method="POST" enctype= "multipart/form-data"> --}}
                
                @csrf
                {{-- <input type=hidden name=upc value=""  id='hidden_upc' ></input> --}}
                    <input name=upc type=hidden  value="{{$upc}}" id='hidden_upc'></input>
                <input name = "time"    type=hidden value=" {{Carbon::now()->format('Y-m-d')}}"   ></input>
                <input name = "staff"   type=hidden value="{{Auth::user()->name}} "   ></input>
                <input name = "corp"   type=hidden value="{{Auth::user()->name}} "   ></input>
                <input name = "user_id"   type=hidden value="{{Auth::user()->id}} "   ></input>    
                <input name = "type"   type=hidden value="{{$type }} "   ></input>    
                <input name = "add_source"   type=hidden value="{{App\Models\VendorLog::where('userid',Auth::user()->id)->latest()->first()->vendorid}} "   ></input>    

<?//dd(App\Models\VendorLog::where('userid',Auth::user()->id)->latest()->first()->vendorid);?>
{{-- category option start --}}

<?
//$category = Request::input('category'); // category
//$category = $request->input('category');
 
?>

 

@if ($category)
    
@livewire('category-option',['cate_request'=>$category,'sub_request'=>$subcategory ] )

@else
   @livewire('category-option' ) 
@endif



{{-- category option end --}}

     <div class="mb-4">
      <label class="block mb-2 font-bold text-gray-700" for="brand">
         BRAND NAME:<font color=red>*</font>
      </label>
{{-- <input type=text class="block w-full mt-1 rounded-md shadow-sm form-control form-input disabled" value=" " name=brand   disabled required></input> --}}
<input type=text class="block w-full mt-1 rounded-md shadow-sm form-control form-input disabled"
                       value=" {{ ((old('brand')) or (isset($brand))) ? $brand : '' }} "name=brand  ></input>     
                       
                               
                       
                       @error('brand')       <p class="text-red-500">{{ $message }}</p>   @enderror

  
    
    </div>

      <div class="mb-4">
      <label class="block mb-2 font-bold text-gray-700" for="description">
      FOOD DESCRIPTION:<font color=red>*</font>
      </label>
 
  
    {{-- <input type=text class="block w-full mt-1 rounded-md shadow-sm form-control form-input disabled" value=" " name=description disabled  required ></input> --}}
    <input type=text
                        class="block w-full mt-1 rounded-md shadow-sm form-control form-input disabled" value="{{ ((old('description')) or (isset($description))) ? $description : '' }} "
                        name=description    ></input>     @error('description')       <p class="text-red-500">{{ $message }}</p>
       @enderror

    </div>

       <div class="mb-4">
      <label class="block mb-2 font-bold text-gray-700" for="size">
   SIZE:<font color=red>*</font>
      </label>
 
  
 {{-- <input type=text class="block w-full mt-1 rounded-md shadow-sm form-control form-input disabled" value=" " name=size disabled required ></input> --}}
 <input type=text class="block w-full mt-1 rounded-md shadow-sm form-control form-input disabled"
                        value="@if((old('size')) or (isset($size))) {{$size}}  @endif " name=size    ></input>     @error('size')       <p class="text-red-500">{{ $message }}</p>
       @enderror
    </div>           
    
        <div class="mb-4">
      <label class="block mb-2 font-bold text-gray-700" for="uom">
   UOM:<font color=red>*</font>
      </label>
 
<select class="block w-full mt-1 rounded-md shadow-sm form-control form-input disabled" id="uom"
                        name=uom    >




                        <option value="">Select one</option>
           

                        <option value="CT" {{ ((old('uom') == 'CT') or (isset($uom) and $uom == 'CT')) ? 'selected' : '' }}>CT</option>
                        <option value="DOZ" {{ ((old('uom') == 'DOZ') or (isset($uom) and $uom == 'DOZ')) ? 'selected' : '' }}>DOZ</option>
                        <option value="EA" {{ ((old('uom') == 'EA') or (isset($uom) and $uom == 'EA')) ? 'selected' : '' }}>EA</option>

                        <option value="GAL" {{ ((old('uom') == 'GAL') or (isset($uom) and $uom == 'GAL')) ? 'selected' : '' }}>GAL</option>
                        <option value="HGL" {{ ((old('uom') == 'HGL') or (isset($uom) and $uom == 'HGL')) ? 'selected' : '' }}>HGL</option>

                        {{-- <option value="LB" {{ ((old('uom') == 'LB') or (isset($uom) and $uom == 'LB')) ? 'selected' : '' }}>LB_POUND</option> --}}

                        <option value="OZ" {{ ((old('uom') == 'OZ') or (isset($uom) and $uom == 'OZ')) ? 'selected' : '' }}>OZ</option>
             

                        <option value="QT" {{ ((old('uom') == 'QT') or (isset($uom) and $uom == 'QT')) ? 'selected' : '' }}>QT</option>
    




                    </select>

     @error('uom')
            <p class="text-red-500">{{ $message }}</p>
       @enderror

 
 
 
    </div>     
    

    
           <div class="mb-4">
      <label class="block mb-2 font-bold text-gray-700" for="pic1" style="display:flex;">
   INGREDIENTS & NUTRITION LABEL:   
    {{-- <font color=red>*</font> --}}
    <div   class='px-2 font-normal text-white bg-red-500 rounded '    >
    
      Image types + pdf,doc containing the images
      
    </div>  
      </label>
 
          <div class="input-group">
                 <input type="text" class="form-control" readonly   placeholder=" Ingredients"   >
                        {{-- <span class="opacity-50 cursor-not-allowed btn btn-primary btn-file dis_button " style="margin-left:5px;">
                            Browse<input type="file" name="pic1" accept=".gif, .jpg, .png, .doc, .pdf, .jpeg, .docx"     disabled class="disabled"   required /> 
                        </span> --}}

                                       <span class="btn btn-primary btn-file dis_button "
                            style="margin-left:5px;">
                            Browse<input type="file" name="pic1" accept=".gif, .jpg, .png, .doc, .pdf, .jpeg, .docx"
                                   />
                        </span>
                  
    



                </div>	
                
                        
                     @error('pic1')<br>
            <p class="text-red-500">{{ $message }}</p>
       @enderror             

                
                
     <div class="input-group" style="margin-top:10px;">
                   <input type="text" class="form-control" readonly  placeholder=" Nutrition Label" /> 
                        {{-- <span class="opacity-50 cursor-not-allowed btn btn-primary btn-file dis_button" style="margin-left:5px;" >
                            Browse<input type="file" name="pic2" accept=".gif, .jpg, .png, .doc, .pdf, .jpeg, .docx"  disabled  class="disabled"   /> 
                        </span> --}}
                
      <span class="btn btn-primary btn-file dis_button "
                            style="margin-left:5px;">
                            Browse<input type="file" name="pic2" accept=".gif, .jpg, .png, .doc, .pdf, .jpeg, .docx"
                                   />
                        </span>

               


                   
                </div>			
                                            @error('pic2')<br>
            <p class="text-red-500">{{ $message }}</p>
       @enderror     
                 <div    class='p-2 mt-2 text-white bg-red-500 rounded '   >
                 
                        
          
                        The file name containing special characters like % or ' will not be uploaded. Please remove the special characters before uploading it.<br>
                        For i-phone users, please do not choose "Take a Photo or Video" but "Photo Library" or "Browse" when uploading the photo.
                    
                   </div> 
 
    </div>   
    
                
     


    <div class="mb-4">
      <label class="block mb-2 font-bold text-gray-700" for="pic" style="display:flex;">
     PRODUCT IMAGE:     
      <div   class='px-2 font-normal text-white bg-red-500 rounded '    >
    
      Image types ONLY
      
    </div> 
      </label>
 
        <div class="input-group">
                    
            <input type="text" class="form-control" readonly placeholder="Product Image"  >



                        {{-- <span class="opacity-50 cursor-not-allowed btn btn-primary btn-file dis_button" style="margin-left:5px;">
                            Browse<input type="file" name="pic" accept="image/*"  disabled  class="disabled"    /> 
                        </span> --}}
            
                        <span class="btn btn-primary btn-file dis_button "
                            style="margin-left:5px;">
                            Browse<input type="file" name="pic" accept="image/*"     />
                        </span>
                   
                </div>
                
    </div>

    
       <div class="mb-4">
      <label class="block mb-2 font-bold text-gray-700" for="uom">
   Status:<font color=red>*</font>
      </label>
 
<select class="block w-full mt-1 rounded-md shadow-sm form-control form-input disabled" id="status"
                        name=status    >


  

                        <option value="1" {{ ((old('status') == '2') or (isset($status) and $status == '2')) ? '' : 'selected' }} >Approved</option>
                        <option value="2" {{ ((old('status') == '2') or (isset($status) and $status == '2')) ? 'selected' : '' }}>Pending</option>
                       
    




                    </select>

     @error('status')
            <p class="text-red-500">{{ $message }}</p>
       @enderror

 
 
 
    </div>     





  
 
            
     <div style="text-align:center">

         {{-- <button type=submit id="add_button" class="px-4 py-2 text-white bg-green-700 rounded shadow opacity-50 cursor-not-allowed hover:bg-green-500 dis_button disabled"  disabled >Add</button>  --}}
            <button type=submit id="add_button"
                        class="px-4 py-2 text-white bg-green-700 rounded opacity-50 cursor-not-allowed hover:bg-green-500 dis_button disabled"
                         >Collect</button>
     </div>
         
   
     <div class="flex flex-col items-center pt-6 mt-4 bg-gray-100 sm:justify-center sm:pt-0">
        <div class="p-4 mb-4">If the keyboard does not show up with the buletooth scanner connected on the iphone, scan the barcord to show it up.</div>

        {{-- <img src="storage/showpad.svg" class = "p-4" /> --}}
        <img src="{{asset('storage/showpad.svg')}}" class = "p-4" />
    </div>        
     
 
  </form>
   
</div> 
   
 
{{--  add list--}}





        @include('layouts.modal_camera')  


   



 



@endsection






        <script>

            a=new AudioContext() // browsers limit the number of concurrent audio contexts, so you better re-use'em
function beep(vol, freq, duration){
  v=a.createOscillator()
  u=a.createGain()
  v.connect(u)
  v.frequency.value=freq
  v.type="square"
  u.connect(a.destination)
  u.gain.value=vol*0.01
  v.start(a.currentTime)
  v.stop(a.currentTime+duration*0.001)
}
        </script>

<script
            type="text/javascript"
            src="https://unpkg.com/@zxing/library@latest/umd/index.min.js"
        ></script>
        <script type="text/javascript">
            window.addEventListener("load", function () {
                let selectedDeviceId;
                const codeReader = new ZXing.BrowserMultiFormatReader();
                console.log("ZXing code reader initialized");
                codeReader
                    .listVideoInputDevices()
                    .then((videoInputDevices) => {
                        const sourceSelect =
                            document.getElementById("sourceSelect");
                        selectedDeviceId = videoInputDevices[0].deviceId;
                        if (videoInputDevices.length >= 1) {
                            videoInputDevices.forEach((element) => {
                                const sourceOption =
                                    document.createElement("option");
                                sourceOption.text = element.label;
                                sourceOption.value = element.deviceId;
                                sourceSelect.appendChild(sourceOption);
                            });

                            sourceSelect.onchange = () => {
                                selectedDeviceId = sourceSelect.value;
                            };

                            const sourceSelectPanel =
                                document.getElementById("sourceSelectPanel");
                            sourceSelectPanel.style.display = "block";
                        }

                        document
                            .getElementById("startButton")
                            .addEventListener("click", () => {
                                codeReader.decodeFromVideoDevice(
                                    selectedDeviceId,
                                    "video",
                                    (result, err) => {
                                        if (result) {
                                            console.log(result);
                                               beep(5, 720, 200);
                                            codeReader.reset();
                                           $('#scancamera').modal('hide');
                                         
                                              $('#upc1').attr("value", result.text );
                                                        console.log("scan completed");
                                          document.getElementById('status_btn').click();
                                        
                                        }
                                        if (
                                            err &&
                                            !(
                                                err instanceof
                                                ZXing.NotFoundException
                                            )
                                        ) {
                                            console.error(err);
                                            document.getElementById(
                                                "result"
                                            ).textContent = err;
                                        }
                                    }
                                );
                                console.log(
                                    `Started continous decode from camera with id ${selectedDeviceId}`
                                );
                            });

                        document
                            .getElementById("closecamera")
                            .addEventListener("click", () => {
                                codeReader.reset();
                              $('#scancamera').modal('hide');
                                console.log("Reset.");

                                
                            });  
                       



                    })
                   .catch((err) => {
                        console.error(err);
                    });
            });

              


         
        </script>




















<!-- include the library -->

 
{{--  
<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>

 --}}

 
{{-- 
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


 
 
 	
</script> --}}
