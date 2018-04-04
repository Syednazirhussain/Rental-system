<table class="table table-responsive" id="companies-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Second Name</th>
        <th>Logo</th>
        <th>Description</th>
        <th>Address</th>
        <th>Zipcode</th>
        <th>Phone</th>
        <th>Country Id</th>
        <th>State Id</th>
        <th>City Id</th>
        <th>Uuid</th>
        <th>User Role Code</th>
        <th>Max Users</th>
        <th>User Status Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <td>{!! $company->name !!}</td>
            <td>{!! $company->second_name !!}</td>
            <td>{!! $company->logo !!}</td>
            <td>{!! $company->description !!}</td>
            <td>{!! $company->address !!}</td>
            <td>{!! $company->zipcode !!}</td>
            <td>{!! $company->phone !!}</td>
            <td>{!! $company->country_id !!}</td>
            <td>{!! $company->state_id !!}</td>
            <td>{!! $company->city_id !!}</td>
            <td>{!! $company->uuid !!}</td>
            <td>{!! $company->user_role_code !!}</td>
            <td>{!! $company->max_users !!}</td>
            <td>{!! $company->user_status_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.companies.destroy', $company->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.companies.show', [$company->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.companies.edit', [$company->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>