<table class="table table-responsive" id="hrCompanyProjects-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hrCompanyProjects as $hrCompanyProject)
        <tr>
            <td>{!! $hrCompanyProject->name !!}</td>
            <td class="pull-right">
                {!! Form::open(['route' => ['company.hrCompanyProjects.destroy', $hrCompanyProject->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.hrCompanyProjects.show', [$hrCompanyProject->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye fa-lg text-info"></i></a>
                    <a href="{!! route('company.hrCompanyProjects.edit', [$hrCompanyProject->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit fa-lg text-info"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>