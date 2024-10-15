 

     <!-- Modal -->
  <div class="modal fade" id="edit{{$c->id}}" role="dialog">
    <div class="modal-dialog">

			  <!-- Modal content-->
		  <div class="modal-content">
		  	<div class="modal-header" >
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>


			<div class="modal-body">
					<p>
			
					<form action="sw_upc_edit.php"  id="modal-form-sw">
						<input name = "no" class="form-control" type=hidden value="{{$c->id}}"  ></input>
				

 

<label class="block">
  <span class="text-gray-700">Image</span> <input class="form-input mt-1 block w-full" type=text value="{{$c->image}}"  >
</label>
<label class="block">
  <span class="text-gray-700">Status</span> <input class="form-input mt-1 block w-full"  value="{{$c->approved}}" type=text readonly  >
</label>
<label class="block">
  <span class="text-gray-700">Staff</span> <input class="form-input mt-1 block w-full" value="{{$c->verify_staff}}"type=text readonly  >
</label>
<label class="block">
  <span class="text-gray-700">Upc</span> <input class="form-input mt-1 block w-full"  type=text value="{{$c->upc}}" readonly  >
</label>
<label class="block">
  <span class="text-gray-700">Category</span> <input class="form-input mt-1 block w-full"   type=text value="{{$c->category}}"  >
</label>
<label class="block">
  <span class="text-gray-700">Subcategory</span> <input class="form-input mt-1 block w-full"   type=text value="{{$c->subcategory}}"  >
</label>
<label class="block">
  <span class="text-gray-700">Brand</span> <input class="form-input mt-1 block w-full"  type=text value="{{$c->brand}}"  >
</label>
<label class="block">
  <span class="text-gray-700">description </span> <input class="form-input mt-1 block w-full" type=text value="{{$c->description}}"   >
</label>
<label class="block">
  <span class="text-gray-700">Short Description </span> <input class="form-input mt-1 block w-full"   type=text value="{{$c->short_desc}}" id="input-1"  >
</label>
<label class="block">
  <span class="text-gray-700">size </span> <input class="form-input mt-1 block w-full"  type=text value="{{$c->size}}" size=2  >
</label>
<label class="block">
  <span class="text-gray-700">UOM </span> <input class="form-input mt-1 block w-full"  type=text value="{{$c->uom}}" size=2  >
</label>
<label class="block">
  <span class="text-gray-700">High Cost Item </span>  
								<select   class="form-control col-md-9 col-sm-9 col-xs-9"   name=high_cost style="font-size:13px; font-family:FontAwesome; "    >

										<option value="0" <?if($c->high_cost==0){echo 'selected';}?> >NO HC</option>
										<option value="1" <?if($c->high_cost==1){echo 'selected';}?> >HC</option>


											</select>

</label>
<label class="block">
  <span class="text-gray-700"> ingredients</span>	<textarea  name = "ingredients" style="height:100px;" class="form-control col-md-9 col-sm-9 col-xs-9"   >{{$c->ingredients}}</textarea> 
</label>
<label class="block">
  <span class="text-gray-700">Nutrition </span>  	<textarea name = "nutrition" style="height:100px;"class="form-control col-md-9 col-sm-9 col-xs-9"    >{{$c->nutrition}}</textarea>
</label>
<label class="block">
  <span class="text-gray-700"> Benefit QT </span> <input class="form-input mt-1 block w-full"  type=text value="{{$c->benefit_qt}}"    >
</label> 
<label class="block">
  <span class="text-gray-700">UOM for WOW </span> <input class="form-input mt-1 block w-full"  type=text value="{{$c->benefit_uom_wow}}" placeholder="Benefit UOM"    ><small>JBG,BAG,CBL,OZ,DOZ,GAL,QT,HGL,LB,$$$,CAN,PKG,BAG,CTR only </small>
</label>  
<label class="block">
  <span class="text-gray-700">Comment </span> <input class="form-input mt-1 block w-full"  type=text value="{{$c->comment}}"  >
</label>  

 
 

									<div align=center style="margin-top:10px;">
									<button class="btn btn-success btn-sm"  type=submit >Submit</button>
									</div>


					</form>








					</p>
				</div>

				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>


			  </div>


    </div>
  </div>







 