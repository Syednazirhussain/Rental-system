<table class="table table-responsive" id="hrCompanyEmployments-table">
    <thead>
        <tr>
            <th>Employment Date</th>
        <th>Termination Time</th>
        <th>Employeed Untill</th>
        <th>Personal Category</th>
        <th>Collective Type</th>
        <th>Employment Form</th>
        <th>Insurance Date</th>
        <th>Insurance Fees</th>
        <th>Department</th>
        <th>Designation</th>
        <th>Vacancies</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hrCompanyEmployments as $hrCompanyEmployment)
        <tr>
            <td>{!! $hrCompanyEmployment->employment_date !!}</td>
            <td>{!! $hrCompanyEmployment->termination_time !!}</td>
            <td>{!! $hrCompanyEmployment->employeed_untill !!}</td>
            <td>{!! $hrCompanyEmployment->personal_category !!}</td>
            <td>{!! $hrCompanyEmployment->collective_type !!}</td>
            <td>{!! $hrCompanyEmployment->employment_form !!}</td>
            <td>{!! $hrCompanyEmployment->insurance_date !!}</td>
            <td>{!! $hrCompanyEmployment->insurance_fees !!}</td>
            <td>{!! $hrCompanyEmployment->department !!}</td>
            <td>{!! $hrCompanyEmployment->designation !!}</td>
            <td>{!! $hrCompanyEmployment->vacancies !!}</td>
            <td>
                {!! Form::open(['route' => ['company.hrCompanyEmployments.destroy', $hrCompanyEmployment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.hrCompanyEmployments.show', [$hrCompanyEmployment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.hrCompanyEmployments.edit', [$hrCompanyEmployment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>