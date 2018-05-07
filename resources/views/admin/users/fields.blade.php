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

    <input type="hidden" id="@if(isset($user)){{ $user->id }}@endif" class="userId">

    <div class="col-sm-12 form-group">
        <label for="user_password">Password</label>
        @if(isset($user))
            <input type="password" name="updatePassword" id="user_password" class="form-control">
        @else
            <input type="password" name="password" id="user_password" class="form-control">
        @endif
    </div>

    <div class="col-sm-12 form-group">
        <label for="user_role_codes">User Role</label>
        <select type="text" name="user_role_code" id="user_role_code" class="form-control" value="@if(isset($user)){{ $user->user_role_code }}@endif">
            @if(isset($user)) <option value="{{ $user->user_role_code }}" selected>{{ $all_roles[$user->user_role_code] }}</option> @endif
            @foreach($user_role as $role)
            <option value="{{ $role->code }}">{{ $role->name }}</option>
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

    <input type="hidden" name="permissions" id="per">

    <div class="col-sm-12 form-group" id="permission">
        <label for="user_role_codes">Permission</label>
        <select class="form-control select2-example" name="user_permission" id="modules" multiple>
            @foreach($technicalSettings as $key => $value)
                @if(isset($permissions))
                    <option  <?php foreach ($permissions as $per) { if ($per == $key) { echo "selected"; } } ?>   value="{{ $key }}" >{{$value}}</option>
                @else
                    <option value="{{$key}}">{{$value}}</option>
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


        $('document').ready(function(){

            var edit = "{{ (isset($user) && $user->user_role_code == 'admin_technical_support')? 1 : 0 }}";
 

            if(edit == true)
            {
                $('#permission').show();
            }
            else
            {
                $('#permission').hide();
            }

        });

        var userId = $('.userId').attr('id');

        $('#modules').on('select2:select', function (e) {
            var data = e.params.data;

            var jsObj = {
              'userId' : userId,
              'permissions' : data.id,
              'Action'     : 'Add'
            }


            if (userId == "" || userId === null) {

            }
            else
            {
              $.post("{{ route('admin.users.updateUser') }}",jsObj,function(response){
                console.log(response);
              });
            }
        });

        $('#modules').on('select2:unselect', function (e) {
            var data = e.params.data;
            
            var jsObj = {
              'userId' : userId,
              'permissions' : data.id,
              'Action'     : 'Remove'
            }

            if (userId == "" || userId === null) {

            }
            else
            {
                $.post("{{ route('admin.users.updateUser') }}",jsObj,function(response){
                  console.log(response);
                });
            }
        });




        $('#user_role_code').on('change',function(){

            var role_code = $(this).val();

            if(role_code == 'admin-technical-support')
            {
                $('#permission').show();                
            }
            else
            {
                $('#permission').hide();
            } 
        });

        $('#userForm').on('submit', function(e) {

            var Permission =  $('#modules').val();

            console.log(Permission);

            $('#per').val(Permission);

            return true;
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
