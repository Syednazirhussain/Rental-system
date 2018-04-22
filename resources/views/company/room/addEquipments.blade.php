@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Equipments / </span>Add Equipment</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Equipment</div>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" id="equipmentForm">
                        
                            		<div class="col-sm-12 form-group">
									    <label for="">Title</label>
									    <input type="text" id="" placeholder="Projector" value="" name="title" class="form-control">
									</div>
									

									<div class="col-sm-12 form-group">
									    <label for=""></label>
									    <label class="custom-control custom-checkbox">
							                <input type="checkbox" class="custom-control-input">
							                <span class="custom-control-indicator"></span>
							                Book multi units
							            </label>
									</div>


									<div class="col-sm-6 form-group">
									    <label for="">Price</label>
									    <input type="number" id="" placeholder="30.00" value="" name="priceperhour" class="form-control">
									</div>

									<div class="col-sm-4 form-group">
										<label>Criteria Per</label>
									    <select class="form-control select2-example"  style="width: 100%">
							                <option>Booking</option>
							                <option>Hour</option>
							            </select>
									</div>
                            	


							<div class="col-sm-12 m-t-1">
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>  Add Equipment </button>
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
