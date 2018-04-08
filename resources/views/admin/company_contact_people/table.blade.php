<table class="table table-responsive" id="companyContactPeople-table">
    <thead>
        <tr>
            <th>Company Id</th>
        <th>Department</th>
        <th>Designation</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Fax</th>
        <th>Address</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyContactPeople as $companyContactPerson)
        <tr>
            <td>{!! $companyContactPerson->company_id !!}</td>
            <td>{!! $companyContactPerson->department !!}</td>
            <td>{!! $companyContactPerson->designation !!}</td>
            <td>{!! $companyContactPerson->name !!}</td>
            <td>{!! $companyContactPerson->email !!}</td>
            <td>{!! $companyContactPerson->phone !!}</td>
            <td>{!! $companyContactPerson->fax !!}</td>
            <td>{!! $companyContactPerson->address !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.companyContactPeople.destroy', $companyContactPerson->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.companyContactPeople.show', [$companyContactPerson->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.companyContactPeople.edit', [$companyContactPerson->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>