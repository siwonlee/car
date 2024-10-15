<?php


// $upcs = App\Models\Upc::where('verify', 2)
// ->paginate(10)    ;

//$cate = $_GET['cate'];
 

    $upc = Request::input('query');

 


?>
 <?use Carbon\Carbon;?>

@extends('layouts.admin')

@section('content')


 

<div class="px-3  py-2">
 
 
 
    <div class="px-10 py-4  text-3xl inline"  > <i class="nav-icon fas fa-upload text-3xl" ></i> Reviewing Collection </div>      
 
 
   
</div> 
   
 
{{--  add list--}}

<div class="px-3 py-4 ">

    <table class="w-full text-md bg-white shadow-md rounded mb-4 table">
	<thead>
	            <tr>
             <td>Date</td>
                <td>Image</td>
                <td>UPC</td>
                <td>Category</td>
                <td>Brand</td>
                <td>Description</td>
                <td>Size/UOM</td>
             <td>Reviewing</td>

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
	<a href="storage/upload_img/{{$c->pic}}" target="_blank"><img class="h-12 w-12 ui tiny image rounded shadow-sm" src="storage/upload_img/{{$c->pic}}"></a>
<?}?>

 		
				
				
				</td>
                    <td>{{$c->upc}}</td>
                <td>{{$c->category}}-{{$c->subcategory}}</td>
                <td>{{$c->brand}}</td>
                <td>{{$c->description}}</td>
                <td>{{$c->size}}/{{$c->uom}}</td>
                <td>
                    <button class="btn btn-default btn-sm  ">

                        <a class='fa fa-edit'   href='{{route('mywork_edit', ['id'=>$c->id])}}'  id='edit{{$c->id}}' data-target="#edit{{$c->id}}" data-toggle="modal"  title="Edit!">
                        </a> </button>    
                </td>

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
