




<div class="row">

	<div class="col-md-4">
              <label class="custom-control custom-radio">
                <input type="radio" name="is_signage" class="custom-control-input" <?php if(isset($getBookingSignage) && $getBookingSignage->is_signage == '1') { echo 'checked=""'; } ?> >
                <span class="custom-control-indicator"></span>
                Yes
              </label>

              <label class="custom-control custom-radio">
                <input type="radio" name="is_signage" class="custom-control-input" <?php if(isset($getBookingSignage) && $getBookingSignage->is_signage == '0') { echo 'checked=""'; } ?> >
                <span class="custom-control-indicator"></span>
                No
              </label>
    </div>

</div>
	



<div class="row">
	

	<div class="col-md-4">
	        <div class="form-group m-t-2">
	            <label for="signage_first_name">First Name</label>
	            <input class="form-control" id="signage_first_name" name="signage_first_name" value="@if(isset($getBookingSignage)){{$getBookingSignage->first_name}}@endif" placeholder="First Name">
	            <div class="errorTxt"></div>
	        </div>
	</div>

	<div class="col-md-4">
	        <div class="form-group m-t-2">
	            <label for="signage_first_screen_name">First Screen Name</label>
	            <input class="form-control" id="signage_first_screen_name" name="signage_first_screen_name" value="@if(isset($getBookingSignage)){{$getBookingSignage->first_screen_name}}@endif" placeholder="Screen Name">
	            <div class="errorTxt"></div>
	        </div>
	</div>

	<div class="col-md-4">
	        <div class="form-group m-t-2">

                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        @if (isset($getBookingSignage))
                            <input type="hidden" name="logo-hidden" id="logo-hidden" value="{{ $getBookingSignage->first_logo }}">

                            <img src="{{ asset('storage/booking_signage/'.$getBookingSignage->first_logo) }}" data-src="{{ asset('storage/booking_signage/'.$getBookingSignage->first_logo) }}" alt="" />
                        @endif
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                  <div>
                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                    <input type="file" name="signage_first_logo" id="first_logo"></span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                  </div>
                </div>
	        </div>
	</div>


</div>





<div class="row">
	

	<div class="col-md-4">
	        <div class="form-group m-t-2">
	            <label for="signage_second_name">Second Name</label>
	            <input class="form-control" id="signage_second_name" name="signage_second_name" value="@if(isset($getBookingSignage)){{$getBookingSignage->second_name}}@endif" placeholder="First Name">
	            <div class="errorTxt"></div>
	        </div>
	</div>

	<div class="col-md-4">
	        <div class="form-group m-t-2">
	            <label for="signage_second_screen_name">Second Screen Name</label>
	            <input class="form-control" id="signage_second_screen_name" name="signage_second_screen_name" value="@if(isset($getBookingSignage)){{$getBookingSignage->second_screen_name}}@endif" placeholder="Screen Name">
	            <div class="errorTxt"></div>
	        </div>
	</div>

	<div class="col-md-4">
	        <div class="form-group m-t-2">

                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        @if (isset($getBookingSignage))
                            <input type="hidden" name="logo-hidden" id="logo-hidden" value="{{$getBookingSignage->second_logo}}">

                            <img src="{{ asset('storage/booking_signage/'.$getBookingSignage->second_logo) }}" data-src="{{ asset('storage/booking_signage/'.$getBookingSignage->second_logo) }}" alt="" />
                        @endif
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                  <div>
                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                    <input type="file" name="signage_second_logo" id="second_logo"></span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                  </div>
                </div>
	        </div>
	</div>


</div>





@if(isset($getBookingSignage))
<input type="hidden" name="booking_signage_id" value="{{$getBookingSignage->id}}">
@endif

