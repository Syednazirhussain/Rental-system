@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Room Layouts / </span>Add Room Layout</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Room Layout</div>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" id="roomlayoutForm">
                        
                            <div class="row">
                            	<div class="col-sm-12 form-group">
								    <label for="">Title</label>
								    <input type="text" id="" placeholder="Round Shape" value="" name="title" class="form-control">
								</div>
                            	
                            	<div class="col-sm-4">
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
                            


								<div class="col-sm-12 m-t-2">
									<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>  Add Room Layout </button>
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
