<?php


// $upcs = App\Models\Upc::where('verify', 2)
// ->paginate(10)    ;

//$cate = $_GET['cate'];
 $today = Carbon::today();

    $upc = Request::input('query');

// $vendors = App\Models\VendorLog::where('userid', Auth::user()->id)->where('timestamp','>', $today)->first();
   $vendor = App\Models\VendorLog::where('userid', Auth::user()->id)
    ->where('timestamp', '>', Carbon::now()->subHours(8))
    ->orderBy('timestamp', 'desc')
    ->first();

if($vendor !== null){

        $vendor = $vendor->sname;
    }


//  dd($vendors->sname);
 


?>
 <?use Carbon\Carbon;?>

@extends('layouts.admin')

@section('content')

 
 
 

{{-- <div class="px-3 py-2">
<div class="inline px-10 py-4 text-3xl"  > <i class="text-3xl nav-icon fas fa-upload" ></i> Collecting </div>
</div> --}}

{{-- <div class="px-3 py-2">
<div class=" alert alert-danger"  >  You MUST "Status Check" first and then fill out the rest of the fields. </div>
<div  >Please note that the fields preceded by <font color=red>*</font> are the required fields </div>
<div  style="margin-bottom:5px;" ><i class="fa fa-solid fa-camera"></i> is an experimental feature.  If the camera scan is not working properly, 
    please use the 'the image scan' or type the upc directly in the input field. </div>

</div> --}}

{{-- <div class="px-3 py-2">

 	 <div id="qr-reader"  ></div> --}}
<!--	  	 <div id="qr-reader" style="width: 100%"></div>-->
{{-- <div id="qr-reader-results" hidden ></div>
 
</div> --}}
 

@if (!isset($vendor))

<script>

    location.href="/vselect";
    // location.href="/category";
</script>
    
@endif
 
    


<div class="px-3 py-2">
 
  <form action="{{route('scan')}}"     >
    @csrf
    <div class="flex w-full mb-4 ">
      <label class="block mb-2 font-bold text-gray-700" for="upc1">
      UPC:<font color=red>*</font>
      </label>   
      

   
    
   <input type=text    class="w-full px-3 py-2 ml-2 leading-tight text-gray-700 border-t border-l border-r-0 rounded shadow appearance-none shadow-r-0 border-bottom focus:outline-none focus:shadow-outline "  
   style="font-size:20px;" id='upc1' name=query  autofocus
       
       @if ($upc) value="{{$upc}}" @else
       value="" @endif
       
       > 


            </input> 
             
       <button
    class="!absolute right-1 top-1 z-10 select-none rounded   py-2 px-4 text-center align-middle    appearance-none   rounded
          bg-white border-l-0   border-t border-bottom border-r mr-2    shadow
     
      "
    type="button"  id="startButton" data-target="#scancamera" data-toggle="modal" 
   
  >
     <i class="text-black fa fa-solid fa-camera"></i>
  </button>      
     
       {{-- <button
    class="!absolute right-1 top-1 z-10 select-none rounded   py-2 px-4 text-center align-middle    appearance-none   rounded
          bg-white border-l-0   border-t border-bottom border-r mr-2    shadow
     
      "
    type="button" onClick="start()"
    data-ripple-light="true"
  >
     <i class="text-black fa fa-solid fa-camera"></i>
  </button>    --}}
    @if (isset($upc))
        
   <a href="{{route("add_upc")}}"<button class=" btn btn-primary"  >Refresh</button></a>
   @else


   <button type=submit class=" btn btn-danger" id='status_btn' >Status Check</button>

 @endif
    </div>
      
 </form> 

    <div class="mb-4">

        @if(isset($warning))
      <div id="status"  >{!!$warning!!}</div>
    @endif


    </div>
             

      <div class="mb-4">

        @if(isset($source))
 {{-- We already have it ! If you want to edit, please click "Edit" button for the general info OR click "chain" icon for editing the attachments --}}
      {!!$table_data!!}
      
 

            <?

 

   $c =  $upc_data ;
 
 
 ?> 

@if (isset($source) && $source == "upc_indi")

<div class="mb-3 ml-2">
   
	  If you want to edit it, please click the "Edit" or the chain button below. 
</div>



   <table class="block min-w-full border-collapse md:table ">
 
	<thead class="hidden md:table-header-group">
	           <tr class="absolute block border border-grey-500 md:border-none md:table-row -top-full md:top-auto -left-full md:left-auto md:relative ">

                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Date</td>
                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Image</td>
                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">UPC</td>
                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Category</td>
                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Brand</td>
                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Description</td>
                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Size/UOM</td>
                <th class="block p-2 font-bold text-left text-white bg-gray-600 md:border md:border-grey-500 md:table-cell">Reviewing</td>

            </tr>
	</thead>


	<tbody class="block mt-4 md:table-row-group md:mt-0">
	
 

     		<tr class="block bg-red-300 border border-red-500 md:border-none md:table-row">
               <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Date</span> {{$c->add_date}}</td> 
				 <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Image</span>
	 		 				
                    <?
                    if($c->pic ==''){echo "";}else{?>
                        <a href="storage/upload_img/{{$c->pic}}" target="_blank"><img class="inline w-12 h-12 rounded shadow ui tiny image" src="storage/upload_img/{{$c->pic}}"></a>
                    <?}?>
 				
				</td>
                 <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">UPC</span>{{$c->upc}}</td>
                 <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Category</span>{{$c->category}}-{{$c->subcategory}}</td>
                 <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Brand</span>{{$c->brand}}</td>
                 <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Description</span>{{$c->description}}</td>
                 <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Size</span>{{$c->size}}/{{$c->uom}}</td>
                 <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Reviewing</span>
 

@if (isset($source) && $source == "upc_indi")
            <button class="px-2 py-1 text-white bg-blue-500 border border-blue-500 rounded hover:bg-blue-700 ">

	<a class='text-white '      id='edit{{$c->id}}' data-target="#edit{{$c->id}}" data-toggle="modal"  title="Edit!">Edit</a> </button>
@else
            <button class="px-2 py-1 text-white bg-blue-500 border border-blue-500 rounded hover:bg-blue-700 ">

	<a class='text-white '       href='{{route('scan_datainput', ['upc'=>$c->upc])}}'  title="Edit!">Edit</a> </button>

    @endif



 



   {{-- <button class="px-2 py-1 text-white bg-red-500 border border-red-500 rounded hover:bg-red-700">
        <a class='text-white ' href='{{route('mywork_delete', ['id'=>$c->id])}}' onclick='return confirmDelete()' title="Delete!" >Delete</a>	</button> --}}

                 
     
                </td>

            </tr>

       <tr class="block align-top bg-red-300 md:table-row">

        <td style="border-top:none;" ></td>
        <td class="p-1 px-1"colspan=4>
            
   
    

          
      
 
 
        {{-- <div style="padding-top:0px;"> Ingredients :<a href="{{asset('/storage/upload_img/'.$c->pic1)}}">{{$c->pic1}}</a> </div> --}}
        <div style="padding-top:0px;"> Ingredients :<a href="{{asset('/storage/upload_img/'.$c->pic1)}}">{!! Str::limit($c->pic1, 25, ' ...') !!}</a> </div>
        {{-- <div style="padding-top:0px;"> Nutrition :  <a href="{{asset('/storage/upload_img/'.$c->pic2)}}">{{$c->pic2}}</a> </div> --}}
        <div style="padding-top:0px;"> Nutrition :  <a href="{{asset('/storage/upload_img/'.$c->pic2)}}">{!! Str::limit($c->pic2, 25, ' ...') !!}</a> </div>
        <div style="padding-top:0px;"> Attachments :     <button class="btn btn-default btn-sm ">  <i class="fas fa-link" data-toggle="modal" data-target="#edit_attach{{$c->id}}"></i></button> </div>
        
        </td>

         <td class="p-1 px-1"colspan=3>
            
            {{-- Reviewed Date : {{$c->verify_date}}<br> --}}
            
            Comment : {{$c->comment}}
            
   
    


      
 
        </td>



        </tr>
 
      @include('layouts.modal', $c)  

        {{-- @include('layouts.modal_confirm', $c) --}}

        @include('layouts.modal_attach', $c)  
 

        
 @else
 

 
 <?
 //dd($upc_data);
 
 if (isset($upc_data )){
 
    $c =  $upc_data ;

 }
 
 ?>
   
<div>
     <button class="px-2 py-1 text-white bg-blue-500 border border-blue-500 rounded hover:bg-blue-700 ">
	<a class='text-white '       href='{{route('scan_datainput', ['upc'=>$c->upc, 'type'=>'1'])}}'  title="Edit!">Collect</a> </button> You can collect it again by clicking the button. 
</div>

 
 
 
 


 @endif
 
 @endif
 
 

 
		
	</tbody>
</table>


















     

    </div>     
 
 
   
</div> 
   
 
{{--  add list--}}
 
<div class="px-3 py-4 ">

        <?

$user_id = Auth::user()->id;  
 

$upcs = App\Models\Upindi::where('user_id',$user_id ) -> orderby('timestamp','desc') ->take(5)->get() ;
 $upcs_all = App\Models\Upindi::where('user_id',$user_id ) -> orderby('timestamp','desc')  ->get() ;
//dd($upcs->count());
//dd($upcs_all->count());
$s =0 ;
 ?>

<div class="hidden md:block">
 
<div class="inline "  > Recent 5 collections</div>


<div class="inline px-10 py-4 ">

        <div class="float-right mx-10 " >
         <span class="m-auto p-auto">Total : </span> <span class="text-xl text-red-700 ">{{$upcs_all->count()}}</span>
        </div>

</div>

 

{{-- 
    <table class="table w-full mb-4 bg-white rounded shadow-md text-md"> --}}

   <table class="block min-w-full border-collapse border-red-500 md:table">
 
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
               <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Date</span> {{$c->add_date}}</td> 
				 <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Image</span>
	 		 				
                    <?
                    if($c->pic ==''){echo "";}else{?>
                        <a href="storage/upload_img/{{$c->pic}}" target="_blank"><img class="inline w-12 h-12 rounded shadow ui tiny image" src="storage/upload_img/{{$c->pic}}"></a>
                    <?}?>
 				
				</td>
                 <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">UPC</span>{{$c->upc}}</td>
                 <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Category</span>{{$c->category}}-{{$c->subcategory}}</td>
                 <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Brand</span>{{$c->brand}}</td>
                 <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Description</span>{{$c->description}}</td>
                 <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Size</span>{{$c->size}}/{{$c->uom}}</td>
                 <td class="block px-2 text-left md:p-2 md:border md:border-grey-500 md:table-cell"><span class="inline-block w-1/3 font-bold md:hidden">Reviewing/Processed</span>


@if($c->processed == 1)

Processed<br>
{{$c->updated_at}}

@else
                    
                     <button class="px-2 py-1 text-white bg-blue-500 border border-blue-500 rounded hover:bg-blue-700 ">

                         <a  class="text-white " href='{{route('mywork_edit', ['id'=>$c->id])}}'  id='edit{{$c->id}}' data-target="#edit{{$c->id}}" data-toggle="modal"  title="Edit!">Edit</a> </button>
  
                        <button class="px-2 py-1 text-white bg-red-500 border border-red-500 rounded hover:bg-red-700">
             
                            <a   class="text-white " href='{{route('mywork_delete', ['id'=>$c->id])}}' onclick='return confirmDelete()' title="Delete!" >Delete</a>	</button>

@endif
  
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



{{-- sm에서만 보이는 --}}



<div class=" md:hidden">
 
<div class="inline "  > Recent 5 collections</div>


<div class="inline px-10 py-4 ">

        <div class="float-right mx-10 " >
         <span class="m-auto p-auto">Total : </span> <span class="text-xl text-red-700 ">{{$upcs_all->count()}}</span>
        </div>

</div>

 

{{-- 
    <table class="table w-full mb-4 bg-white rounded shadow-md text-md"> --}}

   <table class="min-w-full ">
 
	<thead  >
	           <tr class="border border-grey-500 ">

                    <th class="w-1/4 p-2 font-bold text-left text-white bg-gray-600 ">Date</td>
                    <th class="p-2 font-bold text-left text-white bg-gray-600 ">Content</td>
      
            </tr>
	</thead>


	<tbody class="mt-4 ">
	

 @foreach($upcs as $c)

 <?$s = $s+1 ;?>



     		<tr class="  @if ($s%2 == 0)  br-white  @else  bg-gray-300 @endif border border-grey-500      ">
               <td class="px-2 text-left ">  {{$c->add_date}}</td> 
		 
                 <td class="px-2 text-left "> 
                    {{$c->upc}}/
                    {{$c->category}}-{{$c->subcategory}}/
                    {{$c->brand}}{{$c->description}}/
                    {{$c->size}}/{{$c->uom}}
                </td>
          
                
   

            </tr>

 



 
 @endforeach
 
  
		
	</tbody>
</table>

{{-- {{ $upcs->links() }} --}}

</div>









</div>
  
        @include('layouts.modal_camera')  



@endsection
 




<!-- include the library -->

  {{-- barcode reader --}}

<script
            type="text/javascript"
            src="https://unpkg.com/@zxing/library@latest/umd/index.min.js"
        ></script>

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

  

<script type="text/javascript">
            window.addEventListener("load", function () {
                let selectedDeviceId;
                const codeReader = new ZXing.BrowserMultiFormatReader();
                console.log("ZXing code reader initialized");
                 const upc1 = document.getElementById('upc1').value;
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



 