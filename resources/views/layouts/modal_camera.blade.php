 

<!-- Modal -->
{{-- <div class="modal fade" id="edit{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}




     <!-- Modal -->
  <div class="modal fade"  id="scancamera" role="dialog" >






    <div class=" modal-dialog" class="h-full">
    {{-- <div  class="h-full"> --}}

			  <!-- Modal content-->
			  <div class="modal-content">
						<div class="modal-header" >
                              <h4 class="inset-y-0 font-bold modal-title"></h4>

						  <button   class="close" id="closecamera"  class="p-2 bg-white border-2 rounded-full shadow-lg" >  <i class="text-2xl text-black fa fa-solid fa-times"></i></button>
						           {{-- <button class="button" id="resetButton">Reset</button> --}}
						  {{-- <button type="button" class="close" id="close_camera" data-dismiss="modal" >&times;</button> --}}
							</div>
			 
 





             <video
                        id="video"
                        width="300"
                        height="200"
                        style="border: 1px solid gray"

						class="w-full h-auto"
                    ></video>

         <div id="sourceSelectPanel" style="display: none">
                    <label for="sourceSelect">Change video source:</label>
                    <select id="sourceSelect" style="max-width: 400px"></select>
                </div>



 




 
			 

		 


			  </div>

    </div>
  </div>









</div>
