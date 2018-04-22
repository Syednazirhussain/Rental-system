@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Customers / </span>Add Customer</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Customer</div>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" id="userForm">

                            		<div class="col-sm-6 form-group">
									    <label for="">Name</label>
									    <input type="text" id="" placeholder="" value="" name="" class="form-control">
									</div>
									<div class="col-sm-6 form-group">
									    <label for="">Email</label>
									    <input type="email" id="" placeholder="" value="" name="" class="form-control">
									</div>
									<div class="col-sm-6 form-group">
									    <label for="">Phone</label>
									    <input type="text" id="" placeholder="" value="" name="" class="form-control">
									</div>
									<div class="col-sm-6 form-group">
									    <label for="">Company</label>
									    <input type="text" id="" placeholder="" value="" name="" class="form-control">
									</div>
									<div class="col-sm-12 form-group">
									    <label for="">Notes</label>
									    <textarea class="form-control" rows="4"></textarea>
									</div>
									<div class="col-sm-12 form-group">
									    <label for="">Address</label>
									    <input type="text" id="" placeholder="" value="" name="" class="form-control">
									</div>
									<div class="col-sm-6 form-group">
									    <label for="country_id">Country</label>
                                        <select name="country_id" id="country_id" class="form-control select2-country" style="width: 100%" data-allow-clear="true">
                                            <option></option>
                                            @foreach ($countries as $country)
                                                  <option value="{{ $country->id }}">{{ $country->name }}</option> 
                                            @endforeach
                                        </select>
									</div>
									<div class="col-sm-6 form-group">
									    <label for="state_id">State</label>
                                        <select name="state_id" id="state_id" class="form-control select2-state" style="width: 100%" data-allow-clear="true">
                                            <option></option>
                                            @foreach ($states as $state)
                                                  <option value="{{ $state->id  }}">{{ $state->name }}</option> 
                                            @endforeach
                                        </select>
									</div>
									<div class="col-sm-6 form-group">
									    <label for="city_id">City</label>
                                        <select name="city_id" id="city_id" class="form-control select2-city" style="width: 100%" data-allow-clear="true">
                                            <option></option>
                                            @foreach ($cities as $city)
                                               <option value="{{ $city->id  }}">{{ $city->name }}</option> 
                                            @endforeach
                                        </select>
									</div>
									<div class="col-sm-6 form-group">
									    <label for="">Zipcode</label>
									    <input type="text" id="" placeholder="" value="" name="" class="form-control">
									</div>
									
									
							<div class="col-sm-12 m-t-1">
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>  Add Customer </button>
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
                $('.select2-country').select2({
                  placeholder: 'Select country',
                });
            });


	    	$(function() {
                $('.select2-state').select2({
                  placeholder: 'Select state',
                });
            });



	    	$(function() {
                $('.select2-city').select2({
                  placeholder: 'Select city',
                });
            });



	</script>


	@endsection


@endsection
