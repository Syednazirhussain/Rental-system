<table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row" width="200px">Name</th>
        <td>{{ $user->name }}</td>
    </tr>
    <tr>
        <th scope="row" width="200px">Email</th>
        <td>{{ $user->email }}</td>
    </tr>
    <tr>
        <th scope="row" width="200px">User Role</th>
        <td>{{ $user_roles[$user->user_role_code] }}</td>
    </tr>
    <tr>
        <th scope="row" width="200px">Country</th>
        <td>@if(isset($user_country[$user->country_id ])){{ $user_country[$user->country_id ]}}@endif</td>
    </tr>
    <tr>
        <th scope="row" width="200px">State</th>
        <td>@if(isset($user_state[$user->state_id ])){{ $user_state[$user->state_id ] }}@endif</td>
    </tr>
    <tr>
        <th scope="row" width="200px">City</th>
        <td>@if(isset($user_city[$user->city_id])){{ $user_city[$user->city_id] }}@endif</td>
    </tr>
    <tr>
        <th scope="row" width="200px">Status</th>
        <td>{{ $user_status[$user->user_status_id] }}</td>
    </tr>
    <tr>
        <th scope="row" width="200px">Created On</th>
        <td>{{ date('F d, Y', strtotime($user->created_at)) }}</td>
    </tbody>
</table>