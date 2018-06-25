<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($conferenceBooking))
    <input name="_method" type="hidden" value="PATCH">
@endif





<div class="row" id="firstRow">


    <div class="col-sm-12"><p class="bg-primary p-x-1"><strong>DATE &amp; ROOM</strong></p></div>
    <div class="col-sm-5">
        
        <!-- Booking Date Field -->

        <div class="form-group m-t-2">
            <label for="booking_date">Booking Date</label>
            <input type="text" id="booking_date" placeholder="" value="" name="booking_date" class="form-control">
        </div>


        <!-- Attendees Field -->

        <div class="form-group m-t-2">
            <label for="attendees">Attendees</label>
            @if(isset($conferenceBooking))
            <input type="number" id="attendees" placeholder="100" value="{{$conferenceBooking->attendees}}" name="attendees" class="form-control">
            @else
            <input type="number" id="attendees" placeholder="100" value="1" name="attendees" class="form-control">
            @endif
            <div class="errorTxt"></div>
        </div>


        <!-- Room Id Field -->
        <div class="form-group m-t-2">
            <label for="room_id">Room</label>
            <select class="form-control select2-rooms" id="room_id" name="room_id">
                <option value=""></option>
                @foreach ($rooms as $room)
                    <option <?php if(isset($conferenceBooking) && $conferenceBooking->room_id == $room->id ) { echo "selected='selected'"; } else if($roomCalenderId != '' && $roomCalenderId == $room->id ) { echo "selected='selected'"; } ?> value="{{ $room->id }}" data-hour-price="{{ $room->price }}" data-day-price="{{ $room->conf_day_price }}" data-room-tax="{{ $room->conf_vat }}">
                        {{ $room->name }}
                    </option>
                @endforeach
            </select>
            <div class="errorTxt"></div>
        </div>

        <!-- Room Layout Id Field -->
        <div class="form-group m-t-2">
            <label for="room_layout_id">Room Layout</label>
            <select class="form-control select2-layouts" id="room_layout_id" name="room_layout_id">
                <option value=""></option>   
                @foreach ($roomLayouts as $layout)
                <option <?php if(isset($conferenceBooking) && $conferenceBooking->room_layout_id == $layout->id ) { echo "selected='selected'"; } ?> value="{{ $layout->id }}">{{ $layout->title }}</option>
                @endforeach
            </select>
            <div class="errorTxt"></div>
        </div>

        <!-- Duration Code Field -->
        <div class="form-group m-t-2" id="duration-section">
            <label for="duration_code">Duration</label>
            <select class="form-control select2-duration" id="duration_code" name="duration_code">
                <option value=""></option>
                @foreach ($conferenceDurations as $duration)
                <option <?php if(isset($conferenceBooking) && $conferenceBooking->duration_code == $duration->code ) { echo "selected='selected'"; } ?> value="{{ $duration->code }}" data-duration-code="{{ $duration->code }}">{{ $duration->name }}</option>
                @endforeach
            </select>
            <div class="errorTxt"></div>
        </div>

        <!-- <div class="form-group m-t-2 start-time">
            <label for="start_datetime">Start </label>
            <input type="text" class="form-control m-b-2" id="s">
        </div> -->

        <!-- Start Dateime Field -->

        <div class="form-group m-t-2 start-time">
            <label for="start_datetime">Start Datetime</label>
            <input type="text" id="start_datetime" placeholder="" value="" name="start_datetime" class="form-control">
        </div>


        <!-- End Datetime Field -->

        <div class="form-group m-t-2 end-time">
            <label for="end_datetime">End Datetime</label>
            <input type="text" id="end_datetime" placeholder="" value="" name="end_datetime" class="form-control">
        </div>



    </div> <!-- col-sm-5 -->


    <div class="col-sm-2"></div>


    <div class="col-sm-5">
        


            <!-- Booking Status Field -->
            <div class="form-group m-t-2">
                <label for="booking_status">Booking Status</label>
                <select class="form-control select2-status" id="booking_status" name="booking_status">
                    <option value=""></option>
                    <option <?php if(isset($conferenceBooking) && $conferenceBooking->booking_status == 'cancelled' ) { echo "selected='selected'"; } ?> value="cancelled">Cancelled</option>
                    <option <?php if(isset($conferenceBooking) && $conferenceBooking->booking_status == 'confirmed' ) { echo "selected='selected'"; } ?> value="confirmed">Confirmed</option>
                    <option <?php if(isset($conferenceBooking) && $conferenceBooking->booking_status == 'pending' ) { echo "selected='selected'"; } ?> value="pending">Pending</option>
                </select>
                <div class="errorTxt"></div>
            </div>

            <!-- Payment Method Code Field -->
            <div class="form-group m-t-2">
                <label for="payment_method_code">Payment Method</label>
                <select class="form-control select2-payment-methods" id="payment_method_code" name="payment_method_code">
                    <option value=""></option>
                    @foreach ($paymentMethods as $payMethod)
                    <option <?php if(isset($conferenceBooking) && $conferenceBooking->payment_method_code == $payMethod->code ) { echo "selected='selected'"; } ?> value="{{ $payMethod->code }}">{{ $payMethod->name }}</option>
                    @endforeach
                </select>
                <div class="errorTxt"></div>
            </div>

            <!-- Room Price Field -->
            <div class="form-group m-t-2">
                <label for="room_price">Room Price</label>
                <div class="input-group">
                    <span class="input-group-addon">SEK</span>
                    <input type="number" id="room_price" placeholder="" value="@if(isset($conferenceBooking)){{$conferenceBooking->room_price}}@endif" name="room_price" class="form-control" readonly>
                </div>
            </div>


            <!-- Equipment Price Field -->
            <div class="form-group m-t-2">
                <label for="equipment_price">Equipment Price</label>
                <div class="input-group">
                    <span class="input-group-addon">SEK</span>
                    <input type="number" id="equipment_price" placeholder="" value="@if(isset($conferenceBooking)){{$conferenceBooking->equipment_price}}@endif" name="equipment_price" class="form-control" readonly>
                </div>
            </div>


            <!-- Food Price Field -->
            <div class="form-group m-t-2">
                <label for="food_price">Food Price</label>
                <div class="input-group">
                    <span class="input-group-addon">SEK</span>
                    <input type="number" id="food_price" placeholder="" value="@if(isset($conferenceBooking)){{$conferenceBooking->food_price}}@endif" name="food_price" class="form-control" readonly>
                </div>
            </div>


            <!-- Package Price Field -->
            <div class="form-group m-t-2">
                <label for="package_price">Package Price</label>
                <div class="input-group">
                    <span class="input-group-addon">SEK</span>
                    <input type="number" id="package_price" placeholder="" value="@if(isset($conferenceBooking)){{$conferenceBooking->package_price}}@endif" name="package_price" class="form-control" readonly>
                </div>
            </div>

            <!-- Tax Field -->
            <div class="form-group m-t-2">
                <label for="tax">Tax</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-percent text-muted"></i></span>
                    <input type="number" id="tax" placeholder="" value="@if(isset($conferenceBooking)){{$conferenceBooking->tax}}@endif" name="tax" class="form-control" readonly>
                </div>
            </div>


            <!-- Total Price Field -->
            <div class="form-group m-t-2">
                <label for="total_price">Total Price</label>
                <div class="input-group">
                    <span class="input-group-addon">SEK</span>
                    <input type="number" id="total_price" placeholder="" value="@if(isset($conferenceBooking)){{$conferenceBooking->total_price}}@endif" name="total_price" class="form-control" readonly>
                </div>
            </div>

            <!-- Deposit Field -->
            <div class="form-group m-t-2">
                <label for="deposit">Deposit</label>
                <div class="input-group">
                    <span class="input-group-addon">SEK</span>
                    <input type="number" id="deposit" placeholder="0.00" value="@if(isset($conferenceBooking)){{$conferenceBooking->deposit}}@endif"  name="deposit" class="form-control" >
                    <div class="errorTxt"></div>
                </div>
            </div>


    </div> <!-- col-sm-5 -->


</div> <!-- row -->




<hr>



<div class="row">

    <div class="col-sm-12"><p class="bg-primary p-x-1"><strong>EQUIPMENTS</strong></p></div>

    <div class="col-sm-12">
        <table class=" table table-bordered">
            <tr>
                <td width="300px"><p><strong>Title</strong></p></td>
                <td width="150px"><p><strong>Unit(s)</strong></p></td>
                <td><p><strong>Price</strong></p></td>
            </tr>


            @foreach ($equipments as $eqp)


            <tr>
                <td>
                     <p>{{ $eqp->title }}</p>
                </td>
                <td>
                    @if ($eqp->is_multi_units == 0)
                        <p>1</p>
                    @else
                        @if(isset($conferenceBooking))
                            <p><input type="number" name="equipmentsUnits[{{$eqp->id}}][qty]"  class="form-control eqpUnits" id="{{$eqp->id}}"  value="<?php   foreach ($getBookingEquipmentsItems as $key => $value) {  if ($value->entity_id == $eqp->id) {  echo $value->entity_qty; }   }   ?>" placeholder="1" min="1" class="form-control"></p>
                        @else
                            <p><input type="number" name="equipmentsUnits[{{$eqp->id}}][qty]"  class="form-control eqpUnits" id="{{$eqp->id}}"  value="1" min="1" class="form-control"></p>
                        @endif
                    @endif
                </td>
                <td>
                    @if(isset($conferenceBooking))

                        <label class="custom-control custom-checkbox">



                                    <?php  

                                        foreach ($getBookingEquipmentsItems as $key => $value) {
                                            if ($value->entity_id == $eqp->id) {
                                    ?>
                                            <input type="hidden" name="equipmentsBookingItemId[]" value="{{$value->id}}">
                                    <?php
                                             } 
                                        }

                                    ?>

                                

                            
                                <input type="checkbox" name="equipments[]" value="{{$eqp->id}}" class="custom-control-input equipment-check-box" data-eqpid="{{$eqp->id}}" data-eqpprice="{{$eqp->price}}" data-isMultiUnits="{{$eqp->is_multi_units}}" 

                                    <?php  

                                        foreach ($getBookingEquipmentsItems as $key => $value) {
                                            if ($value->entity_id == $eqp->id) {
                                                 echo "checked='checked'";
                                             } 
                                        }

                                    ?>

                                >
                                <span class="custom-control-indicator"></span>
                                @if ($eqp->criteria_id == 1)
                                    SEK {{ $eqp->price }} per booking
                                @else
                                    SEK {{ $eqp->price }} per hour
                                @endif
                        </label>

                    @else

                        <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="equipments[]" value="{{$eqp->id}}" class="custom-control-input equipment-check-box" data-eqpid="{{$eqp->id}}" data-eqpprice="{{$eqp->price}}" data-isMultiUnits="{{$eqp->is_multi_units}}" >
                                <span class="custom-control-indicator"></span>
                                @if ($eqp->criteria_id == 1)
                                    SEK {{ $eqp->price }} per booking
                                @else
                                    SEK {{ $eqp->price }} per hour
                                @endif
                        </label>

                    @endif
                </td>
            </tr>
            @endforeach

        </table>

    </div>


</div>



            

<div class="row">

    <div class="col-sm-12"><p class="bg-primary p-x-1"><strong>FOOD &amp; DRINKS</strong></p></div>

    <div class="col-sm-12">
        <table class=" table table-bordered">
            <tr>
                <td width="300px"><p><strong>Title</strong></p></td>
                <td width="150px"><p><strong>People</strong></p></td>
                <td><p><strong>Price</strong></p></td>
            </tr>


            @foreach ($foodItems as $food)

            <tr>
                <td>
                     <p>{{ $food->title }}</p>
                </td>
                <td>
                    @if(isset($conferenceBooking))
                        <p><input type="number" name="foodUnits[{{$food->id}}][qty]" class="form-control foodUnits" id="{{$food->id}}"  value="<?php   foreach ($getBookingFoodsItems as $key => $value) {  if ($value->entity_id == $food->id) {  echo $value->entity_qty; }   }   ?>" placeholder="1" min="1" class="form-control"></p>
                    @else
                        <p><input type="number" name="foodUnits[{{$food->id}}][qty]" class="form-control foodUnits" id="{{$food->id}}"  value="1" min="1" class="form-control"></p>
                    @endif
                </td>
                <td>

                    @if(isset($conferenceBooking))
                    
                        <label class="custom-control custom-checkbox">



                                    <?php  

                                        foreach ($getBookingFoodsItems as $key => $value) {
                                            if ($value->entity_id == $food->id) {
                                    ?>
                                            <input type="hidden" name="foodBookingItemId[]" value="{{$value->id}}">
                                    <?php
                                             } 
                                        }

                                    ?>

                                



                                <input type="checkbox" name="foods[]" value="{{$food->id}}" class="custom-control-input food-check-box" data-foodid="{{$food->id}}" data-foodprice="{{$food->price_per_attendee}}" 

                                    <?php  

                                        foreach ($getBookingFoodsItems as $key => $value) {
                                            if ($value->entity_id == $food->id) {
                                                 echo "checked='checked'";
                                             } 
                                        }

                                    ?>

                                >
                                <span class="custom-control-indicator "></span>
                                SEK {{ $food->price_per_attendee }} per attendee
                        </label>

                    @else

                        <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="foods[]" value="{{$food->id}}" class="custom-control-input food-check-box" data-foodid="{{$food->id}}" data-foodprice="{{$food->price_per_attendee}}"   >
                                <span class="custom-control-indicator "></span>
                                SEK {{ $food->price_per_attendee }} per attendee
                        </label>

                    @endif

                </td>
            </tr>

            @endforeach

        </table>
    </div>

</div>










<div class="row">

    <div class="col-sm-12"><p class="bg-primary p-x-1"><strong>FOOD PACKAGES</strong></p></div>

    <div class="col-sm-12">
        <table class=" table table-bordered">

            <tr>
                <td width="300px"><p><strong>Title</strong></p></td>
                <td width="150px"><p><strong>People</strong></p></td>
                <td><p><strong>Price</strong></p></td>
            </tr>

            @foreach ($packages as $package)




                                    






            <tr>
                <td>
                     <p>{{ $package->title }} </p>
                </td>
                <td>
                    @if(isset($conferenceBooking))
                        <p><input type="number" name="packageUnits[{{$package->id}}][qty]" class="form-control packageUnits" id="{{$package->id}}"  value="<?php   foreach ($getBookingPackagesItems as $key => $value) {  if ($value->entity_id == $package->id) {  echo $value->entity_qty; }   }   ?>" min="1" placeholder="1" class="form-control"></p>
                    @else
                        <p><input type="number" name="packageUnits[{{$package->id}}][qty]" class="form-control packageUnits" id="{{$package->id}}"  value="1" min="1" class="form-control"></p>
                    @endif
                </td>
                <td>
                    @if(isset($conferenceBooking))
                    
                        <label class="custom-control custom-checkbox">


                                    <?php  

                                        foreach ($getBookingPackagesItems as $key => $value) {
                                            if ($value->entity_id == $package->id) {
                                    ?>
                                            <input type="hidden" name="packageBookingItemId[]" value="{{$value->id}}">
                                    <?php
                                             } 
                                        }

                                    ?>

                                

                                <input type="checkbox" name="packages[]" value="{{$package->id}}" class="custom-control-input package-check-box" data-packageid="{{$package->id}}" data-packageprice="{{$package->price}}"


                                    <?php  

                                        foreach ($getBookingPackagesItems as $key => $value) {
                                            if ($value->entity_id == $package->id) {
                                                 echo "checked='checked'";
                                             } 
                                        }

                                    ?>

                                >
                                <span class="custom-control-indicator "></span>
                                SEK {{ $package->price }} per attendee
                        </label>

                    @else

                        <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="packages[]" value="{{$package->id}}" class="custom-control-input package-check-box" data-packageid="{{$package->id}}" data-packageprice="{{$package->price}}">
                                <span class="custom-control-indicator "></span>
                                SEK {{ $package->price }} per attendee
                        </label>

                    @endif
                </td>
            </tr>
            @endforeach


        </table>
    </div>

</div>












<div class="row">


    <div class="col-sm-12"><p class="bg-primary p-x-1"><strong>REMARKS</strong></p></div>

    <div class="col-sm-12">
        
            <!-- Remarks Field -->
            <div class="form-group m-t-2">
                <label for="remarks">Remarks</label>
                <textarea name="remarks" id="remarks" rows="5" class="form-control">@if(isset($conferenceBooking)){{$conferenceBooking->remarks}}@endif</textarea>
            </div>

    </div>


</div>






<input type="hidden" id="multiDayHiddenStart" value="">
<input type="hidden" id="multiDayHiddenEnd" value="">