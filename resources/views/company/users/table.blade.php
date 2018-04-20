<table class="table table-striped table-bordered" id="userstable">
    <thead>
        <tr>
            <th>No</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>User Role</th>
            <th>Country</th>
            <th>State</th>
            <th>City</th>
            <th>User Status</th>
            <th>Uuid</th>
            <th>Created At</th>
            <th width="200px">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user_roles[$user->user_role_code] }}</td>
            <td>{{ $countries[$user->country_id] }}</td>
            <td>{{ $states[$user->state_id] }}</td>
            <td>{{ $cities[$user->city_id] }}</td>
            <td>{{ $user_status[$user->user_status_id] }}</td>
            <td>{{ $user->uuid }}</td>
            <td>{{ $user->created_at }}</td>
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['company.users.destroy', $user->id], 'method' => 'delete']) !!}
                <a href="{!! route('company.users.show', [$user->id]) !!}"><i class="fa fa-eye fa-lg text-info"></i></a>
                <a href="{!! route('company.users.edit', [$user->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>