<table class="table table-responsive" id="companyHrs-table">
    <thead>
        <tr>
            <th>First Name</th>
        <th>Last Name</th>
        <th>Country</th>
        <th>Telephone Job</th>
        <th>Email Job</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyHrs as $companyHr)
        <tr>
            <td>{!! $companyHr->first_name !!}</td>
            <td>{!! $companyHr->last_name !!}</td>
            <td>{!! $companyHr->country->name !!}</td>
            <td>{!! $companyHr->telephone_job !!}</td>
            <td>{!! $companyHr->email_job !!}</td>
            <td>
                {!! Form::open(['route' => ['company.companyHrs.destroy', $companyHr->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.companyHrs.edit', [$companyHr->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit fa-lg text-info"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>