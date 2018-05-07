<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($user))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">
    <div class="col-sm-12 form-group">
        <label for="user_full_name">Full Name</label>
        <input type="text" name="name" id="user_full_name" class="form-control" value="@if(isset($user)){{ $user->name }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_email">Email</label>
        <input type="email" name="email" id="user_email" class="form-control" value="@if(isset($user)){{ $user->email }}@endif">
    </div>
    <input type="hidden" id="compareEmail" value="@if(isset($user)){{ $user->email }}@endif">

    <div class="col-sm-12 form-group">
        <label for="user_password">Password</label>
        @if(isset($user))
            <input type="password" name="updatePassword" id="user_password" class="form-control">
            <label class="text-danger">if you don't want to update password than leave it blank.</label>
        @else
            <input type="password" name="password" id="user_password" class="form-control">
        @endif
    </div>

    <div class="col-sm-12 form-group">
        <label for="user_role_codes">User Role</label>
        <select type="text" name="role" class="form-control">
            @foreach($user_role as $role)
            <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-sm-12 form-group">
        <label for="user_role_codes">User Status</label>
        <select type="text" name="user_status_id" id="user_status_id" class="form-control" value="@if(isset($user)){{ $user->user_status_id }}@endif">
            @foreach($userStatus as $status)
                @if(isset($user) && $user->userStatus->id == $status->id)
                    <option  value="{{ $status->id }}" <?php echo "selected"; ?> >{{ $status->name }}</option>
                @else
                    <option  value="{{ $status->id }}">{{ $status->name }}</option>
                @endif
            @endforeach
        </select>
    </div>



    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($user)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i>  Add User @endif</button>
        <a href="{!! route('admin.users.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
    </div>
</div>


@section('js')

    <script type="text/javascript">



        // Initialize validator
        $('#userForm').pxValidate({
            focusInvalid: false,
            rules: {
                'name': {
                    required: true,
                    maxlength: 50,
                },
                'email': {
                    required: true,
                    email: true,
                    remote : {
                    param : {
                        url  : "{{ route('admin.users.verifyEmail') }}",
                        type : "POST",
                        dataType : "json",
                        data : {
                            email : function(){
                                return $('#user_email').val();
                            }
                        },
                        dataFilter : function(response){
                            return checkField(response);
                        }
                    },
                    depends : function(element){
                        return ( $(element).val() != $('#compareEmail').val() );
                    }
                    }
                },
                'user_role_code': {
                    required: true,
                },
                'user_permission' : {
                    required : true
                },
                'password' : {
                    required : true,
                    minlength: 6
                }
            },
            messages : {
                'email' : {
                    remote : "email already exists"
                }
            }
        });


        // Initialize Select2
        $(function() {
          $('.select2-example').select2({
            placeholder: 'Select value',
          });
        });

        checkField = function(response) {
          switch ($.parseJSON(response).code) {
              case 200:
                  return "true"; // <-- the quotes are important!
              case 401:
                  //alert("Sorry, our system has detected that an account with this email address already exists.");
                  break;
              case 404:
                  console.log('missing code');
                  break;
              default:
                  alert("An undefined error occurred");
                  break;
          }
          return false;
        };

    </script>


@endsection
