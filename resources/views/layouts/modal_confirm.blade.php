<?use Carbon\Carbon;?>

<!-- Modal -->
{{-- <div class="modal fade" id="edit{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}




     <!-- Modal -->
  <div class="modal fade" id="denied{{$c->id}}" role="dialog">






    <div class="modal-dialog">

			  <!-- Modal content-->
			  <div class="modal-content">
						<div class="modal-header" >
                              <h4 class="modal-title  inset-y-0 font-bold">Deny</h4>

						  <button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
				<div class="modal-body">
		 <p>







<form action="{{route('make_denied', ['id'=>$c->id])}}" method=Post>
			<div class="form-group row">
                @csrf
			<label class="control-label col-md-3 col-sm-3 col-xs-3" for="short_desc"> Comment</label>
			<div class="col-md-9 col-sm-9 col-xs-9">
            <input name = "time" class="form-control  "  type=hidden value=" {{Carbon::now()->format('Y-m-d')}}"   ></input>
                <input name = "staff" class="form-control  "  type=hidden value="{{Auth::user()->name}} "   ></input>
				<input name = "upc" class="form-control  "  type=hidden value="{{$c->upc}} "   ></input>
				
			<input name = "comment" class="form-control  "  type=text value=" "   ></input>
			</div></div>


						<div align=center style="margin-top:10px;">
						 <button class="btn btn-success btn-sm"  type=submit >Deny</button>
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









</div>
