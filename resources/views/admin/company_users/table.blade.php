<table class="table table-responsive" id="companyUsers-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Company Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyUsers as $companyUser)
        <tr>
            <td>{!! $companyUser->user_id !!}</td>
            <td>{!! $companyUser->company_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.companyUsers.destroy', $companyUser->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.companyUsers.show', [$companyUser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.companyUsers.edit', [$companyUser->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>