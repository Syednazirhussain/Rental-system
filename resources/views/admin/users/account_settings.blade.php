@extends('admin.default')

@section('content')



     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Dashboard / </span>Settings</h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Account Settings</div>
                    </div>
                    <div class="panel-body">

                    	@if (session()->has('msg.success'))
					        @include('layouts.success_msg')
					    @endif

      
                        <form id="account_settings" method="POST" action="{{ route('admin.accountSettings.store') }}" enctype="multipart/form-data">
                        	
                        	<input type="hidden" name="_token" value="{{ csrf_token() }}">

                        	<div class="col-sm-8">
								<div class="col-sm-12 form-group">
								    <label for="grid-input-16">Name</label>
								    <input type="text" id="name" placeholder="Name" value="{{ucfirst(Auth::guard('admin')->user()->name)}}" name="name" class="form-control">
									<div class="errorTxt"></div>
								</div>

								<div class="col-sm-12 form-group">
								    <label for="grid-input-16">Email</label>
								    <input type="email" id="email" placeholder="Email" value="{{Auth::guard('admin')->user()->email}}" name="email" class="form-control" >
									<div class="errorTxt"></div>
								</div>

								<div class="col-sm-12 form-group">
								    <label for="grid-input-16">New Password</label>
								    <input type="password" id="password" placeholder="new password" value="" name="password" class="form-control">
									<div class="errorTxt"></div>
								</div>

								<div class="col-sm-12 form-group">
									<p class="text-danger font-size-12">* Leave passwords fields blank, if you don't want to update.</p>
								</div>
                        	</div>

							<div class="col-sm-4 form-group">
								<div class="fileinput fileinput-new" data-provides="fileinput">
	                                  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
	                                        @if(Auth::guard('admin')->user()->profile_pic != "") <img id="existingProfilePic" src="{{ asset('storage/company_logos/'.Auth::guard('admin')->user()->profile_pic) }}"> @endif
	                                  </div>
	                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
	                                  <div>
		                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
		                                    <input type="file" name="profile_pic" id="profile_pic"></span>
		                                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
		                                    <a href="#" class="btn btn-default" id="imgRemoveBtn">Remove</a>
	                                  </div>
                                </div>
                                <div class="errorTxt"></div>
							</div>


							<div class="col-sm-12 ">
								<button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i>  Update</button>
							    <a href="{!! route('admin.dashboard') !!}" class="btn btn-default m-l-1"><i class="fa fa-times"></i>  Cancel</a>
							</div>

							<input type="hidden" id="adminEmailHidden" value="{{Auth::guard('admin')->user()->email}}" />

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



	@section('js')

	    <script type="text/javascript">
	    	    
	    	$('#profile_pic').on('change', function() {

	    		imgVal = $(this).val();
	    		// alert(imgVal);
	    		if (imgVal == '') {$('#imgRemoveBtn').show();} else { $('#imgRemoveBtn').hide(); }
	    		// $('#imgRemoveBtn').hide();

	    	});

	    	$('#imgRemoveBtn').on('click', function() {
	    		profilePicVal = $('#existingProfilePic').attr('src');
	    		profilePicName = profilePicVal.substring(profilePicVal.lastIndexOf("/") + 1, profilePicVal.length);

	    		$.ajax({
                    url: "{{ route('admin.accountSettings.removeProfilePic') }}",
                    type: "POST",
                    data: { profilePicName: profilePicName, _token: "{{ csrf_token() }}" },
                    dataType: 'json',
                    cache: "false",
                    beforeSend: function() {
                    }

                }).done(function(r) {

                    // alert(r.success);
                    $('#existingProfilePic').removeAttr('src');

                });
	    		
	    	});



				      
		      checkField = function(response) {

		      	// alert(response);
		          switch ($.parseJSON(response).code) {
		              case 200:
		                  return "true"; // <-- the quotes are important!
		              case 401:
		                  // alert("Sorry, our system has detected that an account with this email address already exists.");
		                  break;
		              case undefined:
		                  alert("An undefined error occurred.");
		                  break;
		              default:
		                  alert("An undefined error occurred");
		                  break;
		          }
		          return false;
		      };



		      // Initialize validator
		      $('#account_settings').validate({
			        
			        rules: {

				          'name': {
				            required: true,
				            maxlength: 100,
				          },
				          'email': {  
						        required: true,
						        email: true,  
						        remote: {
						            param: {
						                url: "{{ route('validate.siteAdmin.email') }}",
						                type: 'POST',
						                cache: false,
					                    dataType: "json",
					                    data: {
					                        email: function() { return $("#email").val(); }
					                    },
					                    dataFilter: function(response) {

					                          // console.log(response);
					                          return checkField(response);
					                    }
						            },
						            
						            depends: function(element) {						                
						                return ($(element).val() !== $('#adminEmailHidden').val());
						            },
						            
						        },

						    }, 
				          'password': {
				            minlength: 6
				          },

			        },

			        messages: {
				          'name': {
				            required: "Please enter the name",
				          },
				          'email': {
				            required: "Please enter the email",
				            remote: "Email already exist."
				          },
				          'confirm_password': {
				            equalTo: "Password not matched.",
				          },
			        },

		            errorPlacement: function(error, element) {
			            var placement = $(element).parent().find('.errorTxt');
			            if (placement) {
			              $(placement).append(error)
			            } else {
			              error.insertAfter(element);
			            }
			        }

		      });



	    </script>


	@endsection


@endsection