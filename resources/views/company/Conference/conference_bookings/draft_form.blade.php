
            <div class="form-group col-sm-6 m-t-2">
                <label for="booking_status">Booking Type</label>
                <select class="form-control select2-type" id="booking_type" name="booking_type">
                    <option value=""></option>
                    <option value="event">Event</option>
                    <option value="meeting">Meeting</option>
                    <option value="wedding">Wedding</option>
                    
                </select>
                <div class="errorTxt"></div>
            </div>

            <div class="form-group col-sm-6 m-t-2">
                <label for="booking_status">Cancellation Policy</label>
                <select class="form-control select2-policy" id="cancellation_policy" name="cancellation_policy">
                    <option value=""></option>
                    <option value="policy1">Policy 1</option>
                    <option value="policy2">Policy 2</option>
                    <option value="policy3">Policy 3</option>
                    
                </select>
                <div class="errorTxt"></div>
            </div>

            <div class="form-group col-sm-6 m-t-2">
                <label for="booking_status">Booking Category</label>
                <select class="form-control select2-category" id="booking_category" name="booking_category">
                    <option value=""></option>
                    <option value="internal">Internal</option>
                    <option value="external">External</option>
                    
                </select>
                <div class="errorTxt"></div>
            </div>


            <div class="form-group col-sm-6 m-t-2">
                <label for="booking_status">Booking Color</label>
                <select class="form-control select2-color" id="booking_color" name="booking_color">
                    <option value=""></option>
                    <option value="color1">Color 1</option>
                    <option value="color2">Color 2</option>
                    <option value="color3">Color 3</option>
                    
                </select>
                <div class="errorTxt"></div>
            </div>

            <div class="form-group col-sm-6 m-t-2">
                <label for="booking_status">Signage</label>
                <select class="form-control select2-signage" id="signage" name="signage">
                    <option value=""></option>
                    <option value="signage1">Signage 1</option>
                    <option value="signage2">Signage 2</option>
                    <option value="signage3">Signage 3</option>
                    
                </select>
                <div class="errorTxt"></div>
            </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Customer in Place</label>
                        <input class="form-control" id="customer_in_place" name="customer_in_place" value="">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Event Name</label>
                        <input class="form-control" id="contact_person_in_place" name="contact_person_in_place" value="">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Contact Person in Place</label>
                        <input type="text" class="form-control" id="event_name" name="event_name" value="">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Telephone Number</label>
                        <input type="text" class="form-control" id="telephone_number" name="telephone_number" value="">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Email Address</label>
                        <input type="email" class="form-control" id="email_address" name="email_address" value="" placeholder="someone@mail.com">
                        <div class="errorTxt"></div>
                    </div>
            </div>

            <div class="col-sm-12"><p class="bg-primary p-x-1"><strong>Separator</strong></p></div>

            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Project Leader</label>
                        <input type="text" class="form-control" id="project_leader" name="project_leader" value="">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Other Personal</label>
                        <input type="text" class="form-control" id="other_personal" name="other_personal" value="">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Sales Person</label>
                        <input type="text" class="form-control" id="sales_person" name="sales_person" value="" placeholder="free text">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2  col-md-6">
                    <label for="start_datetime">Project Time</label>
                    <input type="text" id="project_time" placeholder="" value="" name="project_time" class="form-control">
                </div>

                <div class="col-md-6">
                        <div class="form-group m-t-2">
                            <label for="customer">Project Cost</label>
                            <input type="text" class="form-control" id="project_cost" name="project_cost" value="" placeholder="Time of Project Cost">
                            <div class="errorTxt"></div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2  col-md-6">
                    <label for="start_datetime">Writer Time</label>
                    <input type="text" id="writer_time" placeholder="" value="" name="writer_time" class="form-control">
                </div>

                <div class="col-md-6">
                        <div class="form-group m-t-2">
                            <label for="customer">Writer Cost</label>
                            <input type="text" class="form-control" id="writer_cost" name="writer_cost" value="" placeholder="Time of Writer Cost">
                            <div class="errorTxt"></div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2  col-md-6">
                    <label for="start_datetime">Clearing Time</label>
                    <input type="text" id="clearing_time" placeholder="" value="" name="clearing_time" class="form-control">
                </div>

                <div class="col-md-6">
                        <div class="form-group m-t-2">
                            <label for="customer">Clearing Cost</label>
                            <input type="text" class="form-control" id="clearing_cost" name="clearing_cost" value="" placeholder="Time of Clearing Cost">
                            <div class="errorTxt"></div>
                        </div>
                </div>
            </div> 
            <div class="row">
                <div class="form-group m-t-2  col-md-6">
                    <label for="start_datetime">Furnishing Time</label>
                    <input type="text" id="furnishing_time" placeholder="" value="" name="furnishing_time" class="form-control">
                </div>

                <div class="col-md-6">
                        <div class="form-group m-t-2">
                            <label for="customer">Furnishing Cost</label>
                            <input type="text" class="form-control" id="furnishing_cost" name="furnishing_cost" value="" placeholder="Time of Furnishing Cost">
                            <div class="errorTxt"></div>
                        </div>
                </div>
            </div>                          
            <div class="row">
                <div class="form-group m-t-2  col-md-6">
                    <label for="start_datetime">First Person</label>
                    <input type="text" id="first_person_time" placeholder="" value="" name="first_person_time" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="first_person_text" value="" placeholder="free text">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2  col-md-6">
                    <label for="start_datetime">Guest Arrival</label>
                    <input type="text" id="guest_arrival" placeholder="" value="" name="guest_arrival_time" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="guest_arrival_text" value="" placeholder="free text">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>            
            <div class="row">
                <div class="form-group m-t-2  col-md-6">
                    <label for="start_datetime">Morning Coffee</label>
                    <input type="text" id="morning_coffee" placeholder="" value="" name="morning_coffee_time" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="morning_coffee_text" value="" placeholder="free text">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2  col-md-6">
                    <label for="start_datetime">Meeting Start</label>
                    <input type="text" id="meeting_start" placeholder="" value="" name="meeting_start_time" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="meeting_start_text" value="" placeholder="free text">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2  col-md-6">
                    <label for="start_datetime">Lunch</label>
                    <input type="text" id="lunch" placeholder="" value="" name="lunch_time" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="lunch_text" value="" placeholder="free text">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2  col-md-6">
                    <label for="start_datetime">After Noon Coffee</label>
                    <input type="text" id="after_noon_coffee" placeholder="" value="" name="afternoon_coffee_time" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="afternoon_coffee_text" value="" placeholder="free text">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2  col-md-6">
                    <label for="start_datetime">Meeting Ends</label>
                    <input type="text" id="meeting_end" placeholder="" value="" name="meeting_end_time" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="meeting_end_text" value="" placeholder="free text">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2  col-md-6">
                    <label for="start_datetime">Dinner</label>
                    <input type="text" id="dinner" placeholder="" value="" name="dinner_time" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="dinner_text" value="" placeholder="free text">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2  col-md-6">
                    <label for="start_datetime">Party</label>
                    <input type="text" id="party" placeholder="" value="" name="party_time" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="dinner_text" name="party_text" value="" placeholder="free text">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    
                  @if(isset($conferenceBooking))


                    <div class="panel">
                        <div class="panel-heading">
                          <div class="panel-title">Internal Communication Notes</div>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-12 col-md-12 form-group">
                                <span><button type="button" class="btn btn-primary pull-right" data-toggle="modal" id="popup-InternalCommunication" data-companyhr="@if(isset($conferenceBooking)){{ $conferenceBooking->id }}@endif" data-target="#popup-modal-InternalCommunication"><i class="fa fa-plus"></i>&nbsp;Internal Communication Notes</button></span>
                                <div class="modal fade" id="popup-modal-InternalCommunication" tabindex="-1">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h4 class="modal-title">Internal Communication Notes</h4>
                                      </div>
                                      <div class="modal-body">
                                         <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                               <textarea name="internal_communication" placeholder="write your note here.." id="Editor-InternalCommunication" style="width: 100%;height: 100px"></textarea>
                                               <span class="error"></span>                                          
                                            </div>
                                         </div>                         
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="popup-modalBtnInternalCommunication"></button>
                                         <button type="button" class="btn" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancel</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                             </div>

                             <div class="col-sm-12 col-md-12 "> 
                                <div class="table-primary">
                                   <table class="table table-striped table-bordered" id="compnay-InternalCommunicationNotes">
                                      <thead>
                                         <th>Username</th>
                                         <th>Note</th>
                                         <th>Created at</th>
                                         <th>Last updated</th>
                                         <th>Actions</th>
                                      </thead>
                                      <tbody id="log-InternalCommunicationNotes">
                                      </tbody>
                                   </table>
                                </div>
                             </div>
                        </div>
                    </div>


                    <div class="panel">
                        <div class="panel-heading">
                          <div class="panel-title">Customer Notes</div>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-12 col-md-12 form-group">
                                <span><button type="button" class="btn btn-primary pull-right" data-toggle="modal" id="popup-Customer" data-companyhr="@if(isset($conferenceBooking)){{ $conferenceBooking->id }}@endif" data-target="#popup-modal-Customer"><i class="fa fa-plus"></i>&nbsp;Customer Notes</button></span>
                                <div class="modal fade" id="popup-modal-Customer" tabindex="-1">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h4 class="modal-title">Customer Notes</h4>
                                      </div>
                                      <div class="modal-body">
                                         <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                               <textarea name="customer" placeholder="write your note here.." id="Editor-Customer" style="width: 100%;height: 100px"></textarea>
                                               <span class="error"></span>                                          
                                            </div>
                                         </div>                         
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="popup-modalBtnCustomer"></button>
                                         <button type="button" class="btn" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancel</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                             </div>

                             <div class="col-sm-12 col-md-12 "> 
                                <div class="table-primary">
                                   <table class="table table-striped table-bordered" id="compnay-Customer">
                                      <thead>
                                         <th>Username</th>
                                         <th>Note</th>
                                         <th>Created at</th>
                                         <th>Last updated</th>
                                         <th>Actions</th>
                                      </thead>
                                      <tbody id="log-Customer">
                                      </tbody>
                                   </table>
                                </div>
                             </div>
                        </div>
                    </div>


                    <div class="panel">
                        <div class="panel-heading">
                          <div class="panel-title">IT Department Notes</div>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-12 col-md-12 form-group">
                                <span><button type="button" class="btn btn-primary pull-right" data-toggle="modal" id="popup-ITDepartment" data-companyhr="@if(isset($conferenceBooking)){{ $conferenceBooking->id }}@endif" data-target="#popup-modal-ITDepartment"><i class="fa fa-plus"></i>&nbsp;IT Department Notes</button></span>
                                <div class="modal fade" id="popup-modal-ITDepartment" tabindex="-1">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h4 class="modal-title">IT Department Notes</h4>
                                      </div>
                                      <div class="modal-body">
                                         <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                               <textarea name="it_department" placeholder="write your note here.." id="Editor-ITDepartment" style="width: 100%;height: 100px"></textarea>
                                               <span class="error"></span>                                          
                                            </div>
                                         </div>                         
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="popup-modalBtnITDepartment"></button>
                                         <button type="button" class="btn" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancel</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                             </div>

                             <div class="col-sm-12 col-md-12 "> 
                                <div class="table-primary">
                                   <table class="table table-striped table-bordered" id="compnay-ITDepartment">
                                      <thead>
                                         <th>Username</th>
                                         <th>Note</th>
                                         <th>Created at</th>
                                         <th>Last updated</th>
                                         <th>Actions</th>
                                      </thead>
                                      <tbody id="log-ITDepartment">
                                      </tbody>
                                   </table>
                                </div>
                             </div>
                        </div>
                    </div>

                  @endif

                </div>
            </div>



<!-- 
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Notes</label>
                        <input type="text" class="form-control" id="note" name="note" value="" placeholder="free text">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Notes From Customers</label>
                        <input type="text" class="form-control" id="note" name="note" value="" placeholder="free text">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Notes IT department</label>
                        <input type="text" class="form-control" id="note" name="note" value="" placeholder="free text">
                        <div class="errorTxt"></div>
                    </div>
            </div> -->















