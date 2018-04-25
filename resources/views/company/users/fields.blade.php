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
    <div class="col-sm-12 form-group">
        <label for="user_role_codes">User Role:</label>
        <select type="text" name="user_role_code" id="user_role_code" class="form-control" value="@if(isset($user)){{ $user->user_role_code }}@endif" disabled>
            @if(isset($user)) <option value="{{ $user->user_role_code }}" selected>{{ $all_roles[$user->user_role_code] }}</option> @endif
            <option value="company">Company</option>
            <option value="company_customer">Company Customer</option>
        </select>
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_country_id">Country ID:</label>
        @if(isset($user))
            {{ Form::select('country_id', $countries, $user->country_id, ['class' => 'form-control']) }}
        @else
            {{ Form::select('country_id', $countries, null, ['class' => 'form-control']) }}
        @endif
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_state_id">State ID:</label>
        @if(isset($user))
            {{ Form::select('state_id', $states, $user->state_id, ['class' => 'form-control']) }}
        @else
            {{ Form::select('state_id', $states, null, ['class' => 'form-control']) }}
        @endif
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_city_id">City ID:</label>
        @if(isset($user))
            {{ Form::select('city_id', $cities, $user->city_id, ['class' => 'form-control']) }}
        @else
            {{ Form::select('city_id', $cities, null, ['class' => 'form-control']) }}
        @endif
    </div>
    <div class="col-sm-12 form-group">
        <label for="user_uuid">UUID:</label>
        <input type="number" name="uuid" id="user_uuid" class="form-control" value="@if(isset($user)){{ $user->uuid }}@endif">
    </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($user)) <i class="fa fa-refresh"></i>  Update User @else <i class="fa fa-plus"></i>  Add User @endif</button>
        <a href="{!! route('company.users.index') !!}" class="btn btn-default">Cancel</a>
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
                },
                'user_role_code': {
                    required: true,
                },
                'country_id': {
                    required: true,
                },
                'state_id': {
                    required: true,
                },
                'city_id': {
                    required: true,
                },
                'uuid': {
                    required: true,
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
