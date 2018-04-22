@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Rooms / </span>Add Room</h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Room</div>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" id="roomForm">
                        
                            <div class="row">
                            	<div class="col-sm-9">
                            		<div class="col-sm-12 form-group">
									    <label for="">Title</label>
									    <input type="text" id="" placeholder="Meeting Room" value="" name="title" class="form-control">
									</div>
									<div class="col-sm-12 form-group">
									    <label for="">Capacity</label>
									    <input type="number" id="" placeholder="300" value="" name="capacity" class="form-control">
									</div>
									
									<div class="col-sm-12 form-group">
									    <label for="">Description</label>
									    <textarea class="form-control" rows="4"></textarea>
									</div>

									<div class="col-sm-6 form-group">
									    <label for="">Book For</label>
									    <label class="custom-control custom-checkbox">
							                <input type="checkbox" class="custom-control-input">
							                <span class="custom-control-indicator"></span>
							                Multiple Days
							            </label>
									</div>
									<div class="col-sm-6 form-group">
									    <label for="">Price per day</label>
									    <input type="number" id="" placeholder="400.00" value="" name="priceperday" class="form-control">
									</div>


									<div class="col-sm-6 form-group">
									    <label for="">Book For</label>
									    <label class="custom-control custom-checkbox">
							                <input type="checkbox" class="custom-control-input">
							                <span class="custom-control-indicator"></span>
							                Half-day
							            </label>
									</div>
									<div class="col-sm-6 form-group">
									    <label for="">Price half-day</label>
									    <input type="number" id="" placeholder="200.00" value="" name="pricehalfday" class="form-control">
									</div>



									<div class="col-sm-6 form-group">
									    <label for="">Book For</label>
									    <label class="custom-control custom-checkbox">
							                <input type="checkbox" class="custom-control-input">
							                <span class="custom-control-indicator"></span>
							                Hour
							            </label>
									</div>
									<div class="col-sm-6 form-group">
									    <label for="">Price per hour</label>
									    <input type="number" id="" placeholder="30.00" value="" name="priceperhour" class="form-control">
									</div>


									


									


									<div class="col-sm-12 form-group">
									    <label for="">Layouts</label>
									    <select class="form-control select2-example" multiple style="width: 100%">
							                
							                <optgroup label="Eastern Time Zone">
							                  <option value="CT">Connecticut</option>
							                  <option value="DE">Delaware</option>
							                  <option value="FL">Florida</option>
							                  <option value="GA">Georgia</option>
							                  <option value="IN">Indiana</option>
							                  <option value="ME">Maine</option>
							                  <option value="MD">Maryland</option>
							                  <option value="MA">Massachusetts</option>
							                  <option value="MI">Michigan</option>
							                  <option value="NH" selected>New Hampshire</option>
							                  <option value="NJ">New Jersey</option>
							                  <option value="NY">New York</option>
							                  <option value="NC">North Carolina</option>
							                  <option value="OH">Ohio</option>
							                  <option value="PA">Pennsylvania</option>
							                  <option value="RI">Rhode Island</option>
							                  <option value="SC">South Carolina</option>
							                  <option value="VT">Vermont</option>
							                  <option value="VA">Virginia</option>
							                  <option value="WV">West Virginia</option>
							                </optgroup>
							              </select>
									</div>
									<div class="col-sm-4 form-group">
									    <label for="">Status</label>
									    <select class="form-control" id="grid-input-2">
							                <option>Active</option>
							                <option>Inactive</option>
							            </select>
									</div>
                            	</div>
                            	
                            	<div class="col-sm-3">
                            		<div class="fileinput fileinput-new" data-provides="fileinput">
		                                  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
		                                        
		                                  </div>
		                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
		                                  <div>
			                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
			                                    <input type="file" name="profile_pic" id="profile_pic"></span>
			                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
		                                  </div>
	                                </div>
                            	</div>
                            </div>


							<div class="col-sm-12 m-t-1">
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>  Add Room </button>
							    <a href="{{ route('temp.company.dashboard') }}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
							</div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



	@section('js')


	<script>

	    // -------------------------------------------------------------------------
	    // Initialize Select2

	    $(function() {
	      $('.select2-example').select2({
	        placeholder: 'Select value',
	      });
	    });

	</script>


	@endsection


@endsection
