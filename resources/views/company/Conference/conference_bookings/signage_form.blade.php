




<div class="row">

	<div class="col-md-4">
              <label class="custom-control custom-radio">
                <input type="radio" name="is_signage" class="custom-control-input" checked="">
                <span class="custom-control-indicator"></span>
                Yes
              </label>

              <label class="custom-control custom-radio">
                <input type="radio" name="is_signage" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                No
              </label>
    </div>

</div>
	



<div class="row">
	

	<div class="col-md-4">
	        <div class="form-group m-t-2">
	            <label for="signage_first_name">First Name</label>
	            <input class="form-control" id="signage_first_name" name="signage_first_name" value="" placeholder="First Name">
	            <div class="errorTxt"></div>
	        </div>
	</div>

	<div class="col-md-4">
	        <div class="form-group m-t-2">
	            <label for="signage_first_screen_name">First Screen Name</label>
	            <input class="form-control" id="signage_first_screen_name" name="signage_first_screen_name" value="" placeholder="Screen Name">
	            <div class="errorTxt"></div>
	        </div>
	</div>

	<div class="col-md-4">
	        <div class="form-group m-t-2">

                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        @if (isset($company))
                            <input type="hidden" name="logo-hidden" id="logo-hidden" value="{{ $company->logo }}">

                            <img src="{{ asset('storage/company_logos/'.$company->logo) }}" data-src="{{ asset('storage/company_logos/'.$company->logo) }}" alt="" />
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
	            <input class="form-control" id="signage_second_name" name="signage_second_name" value="" placeholder="First Name">
	            <div class="errorTxt"></div>
	        </div>
	</div>

	<div class="col-md-4">
	        <div class="form-group m-t-2">
	            <label for="signage_second_screen_name">Second Screen Name</label>
	            <input class="form-control" id="signage_second_screen_name" name="signage_second_screen_name" value="" placeholder="Screen Name">
	            <div class="errorTxt"></div>
	        </div>
	</div>

	<div class="col-md-4">
	        <div class="form-group m-t-2">

                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        @if (isset($company))
                            <input type="hidden" name="logo-hidden" id="logo-hidden" value="{{ $company->logo }}">

                            <img src="{{ asset('storage/company_logos/'.$company->logo) }}" data-src="{{ asset('storage/company_logos/'.$company->logo) }}" alt="" />
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






