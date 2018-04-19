<table class="table table-striped">
    <tbody>
    <tr>
        <th scope="row" width="200px">Id</th>
        <th>{{ $user->id }}</th>
    </tr>
    <tr>
        <th scope="row" width="200px">Code</th>
        <td>{{ $user->name }}</td>
    </tr>
    <tr>
        <th scope="row" width="200px">Code</th>
        <td>{{ $user->email }}</td>
    </tr>
    <tr>
        <th scope="row" width="200px">Code</th>
        <td>{{ $user_roles[$user->user_role_code] }}</td>
    </tr>
    <tr>
        <th scope="row" width="200px">Code</th>
        <td>{{ $user->country_id }}</td>
    </tr>
    <tr>
        <th scope="row" width="200px">Code</th>
        <td>{{ $user->state_id }}</td>
    </tr>
    <tr>
        <th scope="row" width="200px">Code</th>
        <td>{{ $user->city_id }}</td>
    </tr>
    <tr>
        <th scope="row" width="200px">Name</th>
        <td>{{ $user_status[$user->user_status_id] }}</td>
    </tr>
    <tr>
        <th scope="row" width="200px">Code</th>
        <td>{{ $user->uuid }}</td>
    </tr>
    <tr>
        <th scope="row" width="200px">Created At</th>
        <td>{{ date('F d, Y', strtotime($user->created_at)) }}</td>
    </tr>
    </tbody>
</table>