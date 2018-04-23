<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($conferenceBooking))
    <input name="_method" type="hidden" value="PATCH">
@endif





<div class="row">


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
            <input type="number" id="attendees" placeholder="" value="1" name="attendees" class="form-control">
        </div>


        <!-- Room Id Field -->
        <div class="form-group m-t-2">
            <label for="room_id">Room</label>
            <select class="form-control select2-rooms" id="room_id" name="room_id">
                <option value=""></option>
                @foreach ($rooms as $room)
                <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Room Layout Id Field -->
        <div class="form-group m-t-2">
            <label for="room_layout_id">Room Layout</label>
            <select class="form-control select2-layouts" id="room_layout_id" name="room_layout_id">
                <option value=""></option>                
                <option>Class Room</option>
                <option>Conference Hall</option>
                <option>Meeting Room</option>
            </select>
        </div>

        <!-- Duration Code Field -->
        <div class="form-group m-t-2">
            <label for="duration_code">Duration</label>
            <select class="form-control select2-duration" id="duration_code" name="duration_code">
                <option value=""></option>
                @foreach ($conferenceDurations as $duration)
                <option value="{{ $duration->code }}">{{ $duration->name }}</option>
                @endforeach
            </select>
        </div>


        <!-- Start Dateime Field -->

        <div class="form-group m-t-2">
            <label for="start_dateime">Start Datetime</label>
            <input type="text" id="start_dateime" placeholder="" value="" name="start_dateime" class="form-control">
        </div>


        <!-- End Datetime Field -->

        <div class="form-group m-t-2">
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
                    <option value="cancelled">Cancelled</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="pending">Pending</option>
                </select>
            </div>

            <!-- Payment Method Code Field -->
            <div class="form-group m-t-2">
                <label for="payment_method_code">Payment Method</label>
                <select class="form-control select2-payment-methods" id="payment_method_code" name="payment_method_code">
                    <option value=""></option>
                    @foreach ($paymentMethods as $payMethod)
                    <option value="{{ $payMethod->code }}">{{ $payMethod->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Room Price Field -->
            <div class="form-group m-t-2">
                <label for="room_price">Room Price</label>
                <div class="input-group">
                    <span class="input-group-addon">SEK</span>
                    <input type="number" id="room_price" placeholder="" value="" name="room_price" class="form-control">
                </div>
            </div>


            <!-- Equipment Price Field -->
            <div class="form-group m-t-2">
                <label for="equipment_price">Equipment Price</label>
                <div class="input-group">
                    <span class="input-group-addon">SEK</span>
                    <input type="number" id="equipment_price" placeholder="" value="" name="equipment_price" class="form-control">
                </div>
            </div>


            <!-- Food Price Field -->
            <div class="form-group m-t-2">
                <label for="food_price">Food Price</label>
                <div class="input-group">
                    <span class="input-group-addon">SEK</span>
                    <input type="number" id="food_price" placeholder="" value="" name="food_price" class="form-control">
                </div>
            </div>

            <!-- Tax Field -->
            <div class="form-group m-t-2">
                <label for="tax">Tax</label>
                <div class="input-group">
                    <span class="input-group-addon">SEK</span>
                    <input type="number" id="tax" placeholder="" value="" name="tax" class="form-control">
                </div>
            </div>


            <!-- Total Price Field -->
            <div class="form-group m-t-2">
                <label for="total_price">Total Price</label>
                <div class="input-group">
                    <span class="input-group-addon">SEK</span>
                    <input type="number" id="total_price" placeholder="" value="" name="total_price" class="form-control">
                </div>
            </div>

            <!-- Deposit Field -->
            <div class="form-group m-t-2">
                <label for="deposit">Deposit</label>
                <div class="input-group">
                    <span class="input-group-addon">SEK</span>
                    <input type="number" id="deposit" placeholder="" value="" name="deposit" class="form-control">
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
                        <p><input type="number" name="units" value="1" min="1" class="form-control"></p>
                    @endif
                </td>
                <td>
                    <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            @if ($eqp->criteria_id == 1)
                                SEK {{ $eqp->price }} per booking
                            @else
                                SEK {{ $eqp->price }} per hour
                            @endif
                    </label>
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
                    <p><input type="number" name="units" value="1" min="1" class="form-control"></p>
                </td>
                <td>
                    <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            SEK {{ $food->price }} per attendee
                    </label>
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
                <textarea name="remarks" id="remarks" rows="5" class="form-control"></textarea>
            </div>

    </div>


</div>



<div class="row">

    <div class="col-sm-12 m-t-3">
        


            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>  Add Booking </button>
            <a href="{!! route('company.conference.conferenceBookings.index') !!}" class="btn btn-default"> <i class="fa fa-times"></i> Cancel</a>
        


    </div>

</div>


