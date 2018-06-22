<table class="table table-responsive" id="companyHrDocuments-table">
    <thead>
        <tr>
            <th>Company Hr Id</th>
        <th>File Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyHrDocuments as $companyHrDocuments)
        <tr>
            <td>{!! $companyHrDocuments->company_hr_id !!}</td>
            <td>{!! $companyHrDocuments->file_name !!}</td>
            <td>
                {!! Form::open(['route' => ['company.companyHrDocuments.destroy', $companyHrDocuments->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.companyHrDocuments.show', [$companyHrDocuments->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.companyHrDocuments.edit', [$companyHrDocuments->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>