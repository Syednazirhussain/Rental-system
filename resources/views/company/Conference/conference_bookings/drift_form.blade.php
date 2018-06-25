
            <div class="form-group col-sm-6 m-t-2">
                <label for="booking_status">Booking Status</label>
                <select class="form-control select2-status" id="booking_status" name="booking_status">
                    <option value=""></option>
                    <option <?php if(isset($conferenceBooking) && $conferenceBooking->booking_status == 'cancelled' ) { echo "selected='selected'"; } ?> value="cancelled">Cancelled</option>
                    <option <?php if(isset($conferenceBooking) && $conferenceBooking->booking_status == 'confirmed' ) { echo "selected='selected'"; } ?> value="confirmed">Confirmed</option>
                    <option <?php if(isset($conferenceBooking) && $conferenceBooking->booking_status == 'pending' ) { echo "selected='selected'"; } ?> value="pending">Pending</option>
                </select>
                <div class="errorTxt"></div>
            </div>

            <div class="form-group col-sm-6 m-t-2">
                <label for="booking_status">Booking Type</label>
                <select class="form-control select2-type" id="booking_type" name="booking_type">
                    <option value=""></option>
                    <option value="cancelled">Type 1</option>
                    <option value="confirmed">Type 2</option>
                    <option value="pending">Type 3</option>
                    
                </select>
                <div class="errorTxt"></div>
            </div>

            <div class="form-group col-sm-6 m-t-2">
                <label for="booking_status">Cancellation Policy</label>
                <select class="form-control select2-policy" id="cancellation_policy" name="booking_type">
                    <option value=""></option>
                    <option value="cancelled">Policy 1</option>
                    <option value="confirmed">Policy 2</option>
                    <option value="pending">Policy 3</option>
                    
                </select>
                <div class="errorTxt"></div>
            </div>

            <div class="form-group col-sm-6 m-t-2">
                <label for="booking_status">Booking Category</label>
                <select class="form-control select2-category" id="booking_type" name="booking_type">
                    <option value=""></option>
                    <option value="cancelled">Internal</option>
                    <option value="confirmed">External</option>
                    
                </select>
                <div class="errorTxt"></div>
            </div>

            <div class="form-group col-sm-6 m-t-2">
                <label for="booking_status">Booking Agency</label>
                <select class="form-control select2-agency" id="booking_type" name="booking_type">
                    <option value=""></option>
                    <option value="cancelled">Agency 1</option>
                    <option value="confirmed">Agency 2</option>
                    <option value="pending">Agency 3</option>
                    
                </select>
                <div class="errorTxt"></div>
            </div>

            <div class="form-group col-sm-6 m-t-2">
                <label for="booking_status">Booking Color</label>
                <select class="form-control select2-color" id="booking_type" name="booking_type">
                    <option value=""></option>
                    <option value="cancelled">Color 1</option>
                    <option value="confirmed">Color 2</option>
                    <option value="pending">Color 3</option>
                    
                </select>
                <div class="errorTxt"></div>
            </div>

            <div class="form-group col-sm-6 m-t-2">
                <label for="booking_status">Signage</label>
                <select class="form-control select2-signage" id="booking_type" name="booking_type">
                    <option value=""></option>
                    <option value="cancelled">Signage 1</option>
                    <option value="confirmed">Signage 2</option>
                    <option value="pending">Signage 3</option>
                    
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
                        <input class="form-control" id="event_name" name="event_name" value="">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Contact Person in Place</label>
                        <input type="text" class="form-control" id="contact_person" name="contact_person" value="">
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
                        <input type="email" class="form-control" id="email" name="email" value="" placeholder="someone@mail.com">
                        <div class="errorTxt"></div>
                    </div>
            </div>
        <div class="col-sm-12"><p class="bg-primary p-x-1"><strong>Separator</strong></p></div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Project Leader</label>
                        <input type="text" class="form-control" id="project_lead" name="project_lead" value="">
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
                        <input type="text" class="form-control" id="sales_person" name="sales_person" value="" placeholder="user that created booking">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2 start-time col-md-6">
                    <label for="start_datetime">Time of Project Hours</label>
                    <input type="text" id="time_of_project" placeholder="" value="" name="time_of_project" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="free_text" value="" placeholder="user that created booking">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2 start-time col-md-6">
                    <label for="start_datetime">Guest Arrival</label>
                    <input type="text" id="guest_arrival" placeholder="" value="" name="guest_arrival" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="free_text" value="" placeholder="user that created booking">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2 start-time col-md-6">
                    <label for="start_datetime">Morning Coffee</label>
                    <input type="text" id="morning_coffee" placeholder="" value="" name="morning_coffee" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="free_text" value="" placeholder="user that created booking">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2 start-time col-md-6">
                    <label for="start_datetime">Meeting Start</label>
                    <input type="text" id="meeting_start" placeholder="" value="" name="meeting_start" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="free_text" value="" placeholder="user that created booking">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2 start-time col-md-6">
                    <label for="start_datetime">Lunch</label>
                    <input type="text" id="lunch" placeholder="" value="" name="lunch" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="free_text" value="" placeholder="user that created booking">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2 start-time col-md-6">
                    <label for="start_datetime">After Noon Coffee</label>
                    <input type="text" id="after_noon_coffee" placeholder="" value="" name="after_noon_coffee" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="free_text" value="" placeholder="user that created booking">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2 start-time col-md-6">
                    <label for="start_datetime">Meeting Ends</label>
                    <input type="text" id="meeting_end" placeholder="" value="" name="meeting_end" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="free_text" value="" placeholder="user that created booking">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2 start-time col-md-6">
                    <label for="start_datetime">Dinner</label>
                    <input type="text" id="dinner" placeholder="" value="" name="dinner" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="free_text" value="" placeholder="user that created booking">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group m-t-2 start-time col-md-6">
                    <label for="start_datetime">Party</label>
                    <input type="text" id="party" placeholder="" value="" name="party" class="form-control">
                </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Free Text</label>
                        <input type="text" class="form-control" id="free_text" name="free_text" value="" placeholder="user that created booking">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            </div>


            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Notes</label>
                        <input type="text" class="form-control" id="note" name="note" value="" placeholder="user that created booking">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Notes From Customers</label>
                        <input type="text" class="form-control" id="note" name="note" value="" placeholder="user that created booking">
                        <div class="errorTxt"></div>
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group m-t-2">
                        <label for="customer">Notes IT department</label>
                        <input type="text" class="form-control" id="note" name="note" value="" placeholder="user that created booking">
                        <div class="errorTxt"></div>
                    </div>
            </div>
