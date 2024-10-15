 <?use Carbon\Carbon;?>

 

 <!-- Modal -->
 <div class="modal fade" id="edit{{ $c->id }}" role="dialog">
     <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>


             <div class="modal-body">



                 <form action="{{ route('mywork_edit', ['id' => $c->id]) }}" >

                     <input name = "id" class="form-control" type=hidden value="{{ $c->id }}"></input>
                     <input name = "time" class="form-control " type=hidden
                         value=" {{ Carbon::now()->format('Y-m-d') }}"></input>
                     <input name = "staff" class="form-control " type=hidden value="{{ Auth::user()->name }} "></input>
                     <input name = "verify" class="form-control " type=hidden value="{{ $c->verify }} "></input>
                     <input name = "upc" class="form-control " type=hidden value="{{ $c->upc }} "></input>
                     @csrf

                     <div class="form-group row">
                         <label class="text-gray-700 control-label col-md-3 col-sm-3 col-xs-3" for="short_desc"> Status
                         </label>
                         <div class="col-md-9 col-sm-9 col-xs-9 ">
                           
            



                              <select class="block w-full mt-1 rounded-md shadow-sm form-control disabled "
                                 id="status" name=status required>

     
                        
                                   <option value="1"   @if ($c->verify == '1') selected @endif >Approved</option>
                        <option value="2"  @if ($c->verify == '2') selected @endif>Pending</option>
                          
  

                             </select>
                           
                           
                   
                       
                       
                       
                       
                       
                       
                       
                       
                       
                                </div>
                     </div>


                     <div class="form-group row">
                         <label class="text-gray-700 control-label col-md-3 col-sm-3 col-xs-3" for="short_desc"> UPC
                         </label>
                         <div class="col-md-9 col-sm-9 col-xs-9">
                             <input name = "upc"
                                 class="block w-full mt-1 rounded-md shadow-sm form-control form-input " type=text
                                 value="{{ $c->upc }} " required></input>
                         </div>
                     </div>

					 @if ($category)
    
					 @livewire('category-option',['cate_request'=>$category,'sub_request'=>$subcategory,'fromModal'=>'yes'  ] )
					 
					 @else
						@livewire('category-option' ) 
					 @endif
					 



                     {{-- <div class="form-group row">
                         <label class="text-gray-700 control-label col-md-3 col-sm-3 col-xs-3" for="short_desc">
                             Category </label>

                         <div class="col-md-9 col-sm-9 col-xs-9">
                             <input name = "category"
                                 class="block w-full mt-1 rounded-md shadow-sm form-control form-input " type=text
                                 value=" {{ $c->category }} " required></input>
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="text-gray-700 control-label col-md-3 col-sm-3 col-xs-3" for="short_desc">
                             Subcategory </label>
                         <div class="col-md-9 col-sm-9 col-xs-9">
                             <input name = "subcategory"
                                 class="block w-full mt-1 rounded-md shadow-sm form-control form-input " type=text
                                 value=" {{ $c->subcategory }} "required></input>
                         </div>
                     </div> --}}




                     <div class="form-group row">
                         <label class="text-gray-700 control-label col-md-3 col-sm-3 col-xs-3" for="short_desc">Brand
                         </label>
                         <div class="col-md-9 col-sm-9 col-xs-9">
                             <input name = "brand"
                                 class="block w-full mt-1 rounded-md shadow-sm form-control form-input " type=text
                                 value=" {{ $c->brand }} " required></input>
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="text-gray-700 control-label col-md-3 col-sm-3 col-xs-3" for="short_desc">
                             Description </label>
                         <div class="col-md-9 col-sm-9 col-xs-9">
                             <input name = "description"
                                 class="block w-full mt-1 rounded-md shadow-sm form-control form-input " type=text
                                 value="{{ $c->description }}  " required></input>
                         </div>
                     </div>





                     <div class="form-group row">
                         <label class="text-gray-700 control-label col-md-3 col-sm-3 col-xs-3" for="short_desc">Size
                         </label>
                         <div class="col-md-9 col-sm-9 col-xs-9">
                             <input name = "size"
                                 class="block w-full mt-1 rounded-md shadow-sm form-control form-input " type=text
                                 value=" {{ $c->size }}" required></input>
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="text-gray-700 control-label col-md-3 col-sm-3 col-xs-3" for="short_desc"> UOM
                         </label>
                         <div class="col-md-9 col-sm-9 col-xs-9">

                             <select class="block w-full mt-1 rounded-md shadow-sm form-control disabled"
                                 id="uom" name=uom required>




                                 <option value="">Select one</option>
 

                                 <option value="CTR" @if ($c->uom == 'CTR') selected @endif>CT</option>
                                 <option value="DOZ" @if ($c->uom == 'DOZ') selected @endif>DOZ</option>
                                 <option value="DOZ" @if ($c->uom == 'EA') selected @endif>EA</option>
                                 <option value="GAL" @if ($c->uom == 'GAL') selected @endif>GAL</option>
                                 <option value="HGL" @if ($c->uom == 'HGL') selected @endif>HGL</option>
                                 <option value="OZ" @if ($c->uom == 'OZ') selected @endif>OZ</option>
                                 <option value="QT" @if ($c->uom == 'QT') selected @endif>QT</option>
                             

 
						 
 







                             </select>







                         </div>
                     </div>











                     <div class="form-group row">
                         <label class="text-gray-700 control-label col-md-3 col-sm-3 col-xs-3" for="short_desc"> Comment
                         </label>
                         <div class="col-md-9 col-sm-9 col-xs-9">
                             <input name = "comment"
                                 class="block w-full mt-1 rounded-md shadow-sm form-control form-input " type=text
                                 value="{{ $c->comment }}  "></input>
                         </div>
                     </div>






                     <div align=center style="margin-top:10px;">
                         <button class="btn btn-success btn-sm" type=submit>Submit</button>
                     </div>


                 </form>




             </div>

             <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>


         </div>


     </div>
 </div>
