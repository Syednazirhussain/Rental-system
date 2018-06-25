<table class="table table-responsive" id="companyHrOtherInfos-table">
    <thead>
        <tr>
            <th>Company Hr Id</th>
        <th>Languages</th>
        <th>Driving License</th>
        <th>Skills</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyHrOtherInfos as $companyHrOtherInfo)
        <tr>
            <td>{!! $companyHrOtherInfo->company_hr_id !!}</td>
            <td>{!! $companyHrOtherInfo->languages !!}</td>
            <td>{!! $companyHrOtherInfo->driving_license !!}</td>
            <td>{!! $companyHrOtherInfo->skills !!}</td>
            <td>
                {!! Form::open(['route' => ['company.companyHrOtherInfos.destroy', $companyHrOtherInfo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.companyHrOtherInfos.show', [$companyHrOtherInfo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.companyHrOtherInfos.edit', [$companyHrOtherInfo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>