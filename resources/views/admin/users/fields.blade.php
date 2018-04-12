<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($user))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">
    <div class="col-sm-12 form-group">
        <label for="user_full_name">Full Name:</label>
        <input type="text" name="name" id="user_full_name" class="form-control">
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_email">Email:</label>
        <input type="email" name="email" id="user_email" class="form-control">
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_password">Password:</label>
        <input type="password" name="password" id="user_password" class="form-control">
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_role_codes">User Role:</label>
        <select type="text" name="user_role_code" id="user_role_code" class="form-control">
            @foreach($user_role as $role)
            <option value="{{ $role->code }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_country_id">Country ID:</label>
        <input type="number" name="country_id" id="user_country_id" class="form-control">
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_state_id">State ID:</label>
        <input type="number" name="state_id" id="user_state_id" class="form-control">
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_city_id">City ID:</label>
        <input type="number" name="city_id" id="user_city_id" class="form-control">
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_uuid">UUID:</label>
        <input type="number" name="uuid" id="user_uuid" class="form-control">
    </div>

    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($user)) <i class="fa fa-refresh"></i>  Update User @else <i class="fa fa-plus"></i>  Add User @endif</button>
        <a href="{!! route('admin.userStatuses.index') !!}" class="btn btn-default">Cancel</a>
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
            },

            messages: {
                'name': {
                    required: "Please enter the name",
                }
            }

        });


    </script>


@endsection
