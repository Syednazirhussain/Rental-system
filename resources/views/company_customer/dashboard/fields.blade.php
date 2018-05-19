<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($user))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">
    <div class="col-sm-12 form-group">
        <label for="user_full_name">Full Name:</label>
        <input type="text" name="name" id="user_full_name" class="form-control" value="@if(isset($user)){{ $user->name }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_email">Email:</label>
        <input type="email" name="email" id="user_email" class="form-control" value="@if(isset($user)){{ $user->email }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_password">Password:</label>
        <input type="password" name="password" id="user_password" class="form-control" value="@if(isset($user)){{ $user->password }}@endif">
    </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($user)) <i class="fa fa-refresh"></i>  Update User @else <i class="fa fa-plus"></i>  Add User @endif</button>
        <a href="{!! route('companyCustomer.dashboard') !!}" class="btn btn-default">Cancel</a>
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
                },
                'password': {
                    required: true,
                }
            },

            messages: {
                'name': {
                    required: "Please enter the name",
                }
            }

        });


    </script>


@endsection
