 <?use Carbon\Carbon;?>

     <!-- Modal -->
  <div class="modal fade" id="edit_incomplete{{$c->id}}" role="dialog">
    <div class="modal-dialog">

			  <!-- Modal content-->
		  <div class="modal-content">
		  	<div class="modal-header" >
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>


			<div class="modal-body">

				

				<div class="modal-body">
					<p   > 
					
 
				 
			 
	 
	
	
	<form action="{{route('search.edit', ['id'=>$c->id])}}"  method=post>
						<input name = "id" class="form-control" type=hidden value="{{$c->id}}"  ></input>
						            <input name = "time" class="form-control  "  type=hidden value=" {{Carbon::now()->format('Y-m-d')}}"   ></input>
				                <input name = "staff" class="form-control  "  type=hidden value="{{Auth::user()->name}} "   ></input>

@csrf



			   <div class="form-group row">
						   <label class="control-label col-md-3 col-sm-3 col-xs-3" for="upc" >upc</label>
						   <div class="col-md-9 col-sm-9 col-xs-9">
			   <input name = "upc" class="form-control" type=text value="{{$c->upc_out}}" readonly></input>
			   8,12 or 13 digits only, The current length : <?echo "<font color=red>".strlen($c->upc_out)."</font>";?>
			   </div></div>
			   <div class="form-group row">
			   <label class="control-label col-md-3 col-sm-3 col-xs-3" for="brand">Brand</label>
				<div class="col-md-9 col-sm-9 col-xs-9">
			   <input name = "brand" class="form-control" type=text value="{{$c->brand}}"></input>

			   </div></div>
			   <div class="form-group row">
			   <label class="control-label col-md-3 col-sm-3 col-xs-3" for="description">Description</label>
			   <div class="col-md-9 col-sm-9 col-xs-9">	
			   <input name = "description" class="form-control" type=text value="{{$c->description}}"></input>

			   </div></div>
			   
			   <div class="form-group row">
			   <label class="control-label col-md-3 col-sm-3 col-xs-3" for="short_desc1">Short_desc</label>
				<div class="col-md-9 col-sm-9 col-xs-9">
			   <input name = "short_desc"  maxlength=24 class="form-control" type=text value="{{$c->short_desc}}"></input>
			   limits up to 24 characters
			   
			   </div></div>
			   
			   <div class="form-group row">
			   <label class="control-label col-md-3 col-sm-3 col-xs-3" for="category">Category</label>
				<div class="col-md-9 col-sm-9 col-xs-9">
			   <input name = "category_full"  maxlength=2 class="form-control" type=text value="{{$c->category_full}}"></input>
			   2 characters, example : "02", verified : <font color=red> {{$c->category}}</font>
			   </div></div>
			   <div class="form-group row">
			   <label class="control-label col-md-3 col-sm-3 col-xs-3" for="subcate">Sub_category</label>
				<div class="col-md-9 col-sm-9 col-xs-9">
				<input name = "subcat_full" maxlength=3 class="form-control form-control-danger" type=text value="{{$c->subcat_full}}"></input>
			   3 characters, example : "002" , verified : <font color=red> {{$c->subcategory}}</font>
			   </div></div>
			   
				   <input name = "size" maxlength=3 class="form-control" type=hidden value="{{$c->size}}"></input>					




			   <div class="form-group row">
			   <label class="control-label col-md-3 col-sm-3 col-xs-3" for="benefit_qt">Benefit_QT</label>
				<div class="col-md-9 col-sm-9 col-xs-9">
			   <input name = "benefit_qt" class="form-control" type=text value="{{$c->benefit_qt}}"></input>
				The issued QTY deducting unit
			   </div></div>


    
			   
			   
			   <div class="form-group row">
			   <label class="control-label col-md-3 col-sm-3 col-xs-3" for="benefit_uom_wow">Benefit UOM</label>
			<div class="col-md-9 col-sm-9 col-xs-9">
			   <input name = "benefit_uom_wow" maxlength=3 class="form-control" type=text value="{{$c->benefit_uom_wow}}"></input>

			   JBG,BAG,CBL,OZ,DOZ,GAL,QT,HGL,LB,$$$,CAN,PKG,BAG,CTR only 
			   </div></div>
			   <div class="form-group row">
			   <label class="control-label col-md-3 col-sm-3 col-xs-3" for="verify_date">Effective Date</label>
				<div class="col-md-9 col-sm-9 col-xs-9">
			   <input name = "verify_date" class="form-control" type=text value="{{$c->verify_date}}"></input>
			   YYYY-MM-DD, example : "2017-01-31"
			   </div></div>
			   <div class="form-group row">
			   <label class="control-label col-md-3 col-sm-3 col-xs-3" for="end_date">End Date</label>
				<div class="col-md-9 col-sm-9 col-xs-9">
			   <input name = "end_date" class="form-control" type=text value="@if($c->end_date){{$c->end_date}}@else"2024-12-31" @endif">
			   </input>
			   "2024-12-31" if it is an approved item.
			   </div></div>
			   
			   

			   
			   
			   <div class="form-group row">
			   <label class="control-label col-md-3 col-sm-3 col-xs-3" for="plu_indicator">PLU Indicator</label>
			<div class="col-md-9 col-sm-9 col-xs-9">


				<label  class="checkbox-inline"><input type="checkbox" name = "plu_indicator"value="P"  <?if ($c->plu_indicator=='P'){echo "checked";}?>>P : PLU</label>
				<label  class="checkbox-inline"><input type="checkbox" name = "plu_indicator" value="U" <?if ($c->plu_indicator=='U'){echo "checked";}?>>U : UPC</label>


				





		   <div>	P : PLU, U : UPC </div>
			   </div></div>
			   <div class="form-group row">
			   <label class="control-label col-md-3 col-sm-3 col-xs-3" for="broadband_flag"> Broad Band</label>
			<div class="col-md-9 col-sm-9 col-xs-9">

				   <label class="checkbox-inline"><input type="checkbox" name = "broadband_flag" value="0"  <?if ($c->broadband_flag==0){echo "checked";}?>>No : 0</label>
				   <label class="checkbox-inline"><input type="checkbox" name = "broadband_flag"value="1" <?if ($c->broadband_flag==1){echo "checked";}?>>Yes : 1</label>
<div>
			   1: 2-0,1,2,3 | 3-0,1 | 5-0,1,2 | 8-0,1,2,3 | 9-0,1 | 12-0,1,2,3 |13-0,1 | 16-0,1,2,3,7,8 | | 19-0,1,2,3 | 51-0,1 | 52-0,1 | 53-0,1 | 54-0,2<br>0: 2-4 | 6-1,2,3 | 51-3,6,9,11,201,202 | 52-4,6,9,11,12,14,19,22,25,27,201,202,203,204,205 | 53-5
</div>				
			   
			   </div></div>

			   <div class="form-group row">
				
			   <label class="control-label col-md-3 col-sm-3 col-xs-3" for="high_cost"> High Cost</label>
			<div class="col-md-9 col-sm-9 col-xs-9">
					<label class="checkbox-inline"><input type="checkbox" name = "high_cost"value="0"  <?if ($c->high_cost==0 or $c->high_cost=='' ){echo "checked";}?>>0:Non-High Cost</label>
					<label class="checkbox-inline"><input type="checkbox"  name = "high_cost"value="1" <?if ($c->high_cost==1){echo "checked";}?>>1:High Cost</label>


				



			   <div>0:Non-High Cost, 1:High Cost</div>
			   </div> </div>
			   
			   <div align=center style="margin-top:10px;"> 
									<button class="btn btn-success btn-sm"  type=submit >Submit</button>
									</div>
				
				
				
			   </form>

						  
							 
							 
							 
				   </p>
	   </div>
	   









  








			</div>			{{-- modal body end    --}}

				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>


			  </div>


    </div>
  </div>







 