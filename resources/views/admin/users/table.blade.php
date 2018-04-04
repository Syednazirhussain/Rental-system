<table class="table table-responsive" id="users-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>User Role Code</th>
        <th>Country Id</th>
        <th>State Id</th>
        <th>City Id</th>
        <th>User Status Id</th>
        <th>Uuid</th>
        <th>Remember Token</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->password !!}</td>
            <td>{!! $user->user_role_code !!}</td>
            <td>{!! $user->country_id !!}</td>
            <td>{!! $user->state_id !!}</td>
            <td>{!! $user->city_id !!}</td>
            <td>{!! $user->user_status_id !!}</td>
            <td>{!! $user->uuid !!}</td>
            <td>{!! $user->remember_token !!}</td>
            <td>{!! $user->created_at !!}</td>
            <td>{!! $user->updated_at !!}</td>
            <td>{!! $user->deleted_at !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>