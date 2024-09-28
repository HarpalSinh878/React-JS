   <!--begin model-->
   <div class="modal fade" tabindex="-1" id="kt_modal_1">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">
               <div class="modal-header">
                   <h3 class="modal-title">Tickets</h3>

                   <!--begin::Close-->
                   <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                       aria-label="Close">
                       <span class="svg-icon svg-icon-1"></span>
                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                           xmlns="http://www.w3.org/2000/svg">
                           <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                               rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                           <rect x="7.41422" y="6" width="16" height="2" rx="1"
                               transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                       </svg>
                   </div>
                   <!--end::Close-->
               </div>

               <form action="{{ route('tickets.store') }}" method="post">
                   @csrf

                   <div class="modal-body">
                       <div class="form-group row mb-6">
                           <div class="form-floating">
                               <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2"
                                   style="height: 100px"></textarea>
                               <label for="floatingTextarea2">Describe Your issue And What Needs To Be Resolved Through
                                   This Ticket.</label>
                               <span class="text-dark">Description of Issue</span>
                           </div>
                       </div>


                       <div class="form-group row">
                           <div class="col-lg-3">

                               <select class="form-select" name="priority">
                                   <option></option>
                                   <option value="Moderate" style="background-color: yellow;" data-color="yellow">
                                       Moderate</option>
                                   <option value="Low" style="background-color: rgb(168, 214, 149);" selected>Low
                                   </option>
                                   <option value="Normal" style="background-color: rgb(240, 173, 78);">Normal</option>
                                   <option value="High" style="background-color: rgb(255, 0, 0);">High</option>
                                   <option value="Emergency" style="background-color: rgb(204, 0, 51);">Emergency
                                   </option>
                               </select>
                               <span class="text-dark">Priority</span>
                           </div>
                           <div class="col-lg-3">

                               <select class="form-select" name="type">
                                   <option></option>
                                   <option value="feedback" selected>feedback</option>
                                   <option value="improvement">improvement</option>
                                   <optgroup label="complaint">
                                       <option value="complaint,no mask">no mask</option>
                                       <option value="complaint,driver late">driver late</option>
                                       <option value="complaint,unfriendy driver">unfriendy driver</option>
                                       <option value="complaint,delivered to wrong place">delivered to wrong place
                                       </option>
                                       <option value="complaint,other">other</option>
                                   </optgroup>
                                   <optgroup label="attention">
                                       <option value="attention,address cahnged">address cahnged</option>
                                       <option value="attention,patient requested new time">patient requested new time
                                       </option>
                                       <option value="attention,other">other</option>
                                   </optgroup>
                               </select>
                               <span class="text-dark">Type</span>
                           </div>



                           <div class="col-lg-3">

                               <input type="text" name="order_id"  class="form-control form-control-lg form-control-solid"
                                   placeholder="Order Id">
                               <span class="text-dark">Order Id (optional)</span>
                           </div>

                       </div>
                   </div>

                   <div class="modal-footer">
                       <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>

                       <button type="submit" class="btn btn-theme-color">Save</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
   <!--end begin model-->
