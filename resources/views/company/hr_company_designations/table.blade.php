<table class="table table-responsive" id="hrCompanyDesignations-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hrCompanyDesignations as $hrCompanyDesignation)
        <tr>
            <td>{!! $hrCompanyDesignation->name !!}</td>
            <td>
                {!! Form::open(['route' => ['company.hrCompanyDesignations.destroy', $hrCompanyDesignation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.hrCompanyDesignations.show', [$hrCompanyDesignation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye fa-lg text-info"></i></a>
                    <a href="{!! route('company.hrCompanyDesignations.edit', [$hrCompanyDesignation->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit fa-lg text-info"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>