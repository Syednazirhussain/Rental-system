@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Food &amp; Drinks / </span>Add Food &amp; Drink</h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Food &amp; Drink</div>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" id="foodndrinkForm">
                        
                            		<div class="col-sm-12 form-group">
									    <label for="">Title</label>
									    <input type="text" id="" placeholder="Mineral water" value="" name="title" class="form-control">
									</div>
									<div class="col-sm-12 form-group">
									    <label for="">Price Per Attendee</label>
									    <input type="number" id="" placeholder="300" value="" name="capacity" class="form-control">
									</div>
									


							<div class="col-sm-12 m-t-1">
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>  Add Food &amp; Drink </button>
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
