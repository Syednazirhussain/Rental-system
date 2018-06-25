<table class="table table-responsive" id="companyHrPreEmployments-table">
    <thead>
        <tr>
            <th>Company Hr Id</th>
        <th>Organization Name</th>
        <th>Job Title</th>
        <th>Courses</th>
        <th>Employed From</th>
        <th>Employed Until</th>
        <th>Create At</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyHrPreEmployments as $companyHrPreEmployment)
        <tr>
            <td>{!! $companyHrPreEmployment->company_hr_id !!}</td>
            <td>{!! $companyHrPreEmployment->organization_name !!}</td>
            <td>{!! $companyHrPreEmployment->job_title !!}</td>
            <td>{!! $companyHrPreEmployment->courses !!}</td>
            <td>{!! $companyHrPreEmployment->employed_from !!}</td>
            <td>{!! $companyHrPreEmployment->employed_until !!}</td>
            <td>{!! $companyHrPreEmployment->create_at !!}</td>
            <td>
                {!! Form::open(['route' => ['company.companyHrPreEmployments.destroy', $companyHrPreEmployment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.companyHrPreEmployments.show', [$companyHrPreEmployment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.companyHrPreEmployments.edit', [$companyHrPreEmployment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>