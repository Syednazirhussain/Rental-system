@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Bookings / </span>Add Booking</h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Booking</div>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" id="bookingForm">

                        	<div class="row">

                        		<div class="col-sm-6">
                        			
                        			<div class="form-group">
									    <label for="">Date</label>
									    <input type="text" id="" placeholder="" value="" name="date" class="form-control">
									</div>

									<div class="form-group">
									    <label for="">Attendees</label>
									    <input type="number" id="" placeholder="" value="" name="attendees" class="form-control">
									</div>

									<div class="form-group">
									    <label for="">Room</label>
									    <select class="form-control" id="">
							                <option>Class Room</option>
							                <option>Conference Hall</option>
							                <option>Meeting Room</option>
							            </select>
									</div>

									<div class="form-group">
									    <label for="">Layout</label>
									    <select class="form-control" id="">
							                <option>Round</option>
							                <option>Squares</option>
							                <option>Theater</option>
							            </select>
									</div>

                        		</div>



                        		<div class="col-sm-6"></div>




                        		<div class="col-sm-12 m-t-1">
									<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>  Add Booking </button>
								    <a href="{{ route('temp.company.dashboard') }}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
								</div>


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
