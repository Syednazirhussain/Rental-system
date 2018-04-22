<table class="table table-striped table-bordered" id="userstable">
    <thead>
        <tr>
            <th>No</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>User Role</th>
            <th>User Status</th>
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
            <td>{{ $user_status[$user->user_status_id] }}</td>
            <td>{{ $user->created_at }}</td>
            <td  width="200px" class="text-center">
                <a href="{!! route('company.users.show', [$user->id]) !!}"><i class="fa fa-eye fa-lg text-info"></i></a>
                <a href="{!! route('company.users.edit', [$user->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>