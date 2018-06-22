<table class="table table-responsive" id="companyHrNotes-table">
    <thead>
        <tr>
            <th>Company Hr Id</th>
        <th>User Id</th>
        <th>Code</th>
        <th>Note</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyHrNotes as $companyHrNotes)
        <tr>
            <td>{!! $companyHrNotes->company_hr_id !!}</td>
            <td>{!! $companyHrNotes->user_id !!}</td>
            <td>{!! $companyHrNotes->code !!}</td>
            <td>{!! $companyHrNotes->note !!}</td>
            <td>
                {!! Form::open(['route' => ['company.companyHrNotes.destroy', $companyHrNotes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.companyHrNotes.show', [$companyHrNotes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.companyHrNotes.edit', [$companyHrNotes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>