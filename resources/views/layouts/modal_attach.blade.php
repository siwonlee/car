 <?use Carbon\Carbon;?>

     <!-- Modal -->
  <div class="modal fade" id="edit_attach{{$c->id}}" role="dialog">
    <div class="modal-dialog">

			  <!-- Modal content-->
		  <div class="modal-content">
		  	<div class="modal-header" >
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>


			<div class="modal-body">
	 
 		
			
					<form action="{{route('edit_attach', ['id'=>$c->id])}}"  method=post enctype="multipart/form-data">

						<input name = "id" class="form-control" type=hidden value="{{$c->id}}"  ></input>
						            <input name = "time" class="form-control  "  type=hidden value=" {{Carbon::now()->format('Y-m-d')}}"   ></input>
				                <input name = "staff" class="form-control  "  type=hidden value="{{Auth::user()->name}} "   ></input>
 
				<input name = "upc" class="form-control  "  type=hidden value="{{$c->upc}} "   ></input>
	   @csrf
	
			<div class="form-group row">

 				<div class="input-group">
@if ($c->pic1)
 <img src="{{asset('storage/upload_img/'.$c->pic1)}}" class="shadow rounded h-32 w-32 mx-4  align-middle border-none"/>	
@else
 
<img src="{{asset('storage/no-image.png')}}" class="shadow rounded h-32 w-32 mx-4  align-middle border-none"/>	
@endif
				

						 <input type="text" class="form-control" readonly   placeholder=" Ingredients"   / >
							   <span class="btn btn-primary btn-file  h-10 " style="margin-left:5px;">
							   Browse<input type="file" name="pic1"   accept=".gif, .jpg, .png, .doc, .pdf, .jpeg, .docx"        /> 
							   </span>
						
						  
					   </div>	


		<div class="input-group" style="margin-top:10px;">

			@if ($c->pic2)
			<img src="{{asset('storage/upload_img/'.$c->pic2)}}" class="shadow rounded h-32 w-32 mx-4  align-middle border-none"/>	
		   @else
			
		   <img src="{{asset('storage/no-image.png')}}" class="shadow rounded h-32 w-32 mx-4  align-middle border-none"/>	
		   @endif

 
		  <input type="text" class="form-control" readonly  placeholder=" Nutrition Label"  >

				
							   <span class="btn btn-primary btn-file h-10 " style="margin-left:5px;" >
							   Browse<input type="file" name="pic2"  accept=".gif, .jpg, .png, .doc, .pdf, .jpeg, .docx"     /> 
							   </span>
					   
						  
					   </div>	



					   <div class="input-group" style="margin-top:10px;">

						@if ($c->pic)
						<img src="{{asset('storage/upload_img/'.$c->pic)}}" class="shadow rounded h-32 w-32 mx-4  align-middle border-none"/>	
					   @else
						
					   <img src="{{asset('storage/no-image.png')}}" class="shadow rounded h-32 w-32 mx-4  align-middle border-none"/>	
					   @endif


 				   
					   <input type="text" class="form-control"   readonly placeholder="Product Image"  />
	   

	   
							   <span class="btn btn-primary btn-file h-10" style="margin-left:5px;">
								   Browse<input type="file" name="pic" accept="image/*"     /> 
							   </span>
				   
						  
					   </div>


 

		</div> 

 

 
 

									<div align=center style="margin-top:10px;">
									<button class="btn btn-success btn-sm"  type=submit >Submit</button>
									</div>


					</form>


 
 
			</div>  	{{-- modal body --}}

				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>


			  </div>


    </div>
  </div>







 