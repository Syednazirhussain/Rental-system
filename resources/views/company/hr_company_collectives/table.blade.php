<table class="table table-responsive" id="hrCompanyCollectives-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hrCompanyCollectives as $hrCompanyCollective)
        <tr>
            <td>{!! $hrCompanyCollective->name !!}</td>
            <td class="pull-right">
                {!! Form::open(['route' => ['company.hrCompanyCollectives.destroy', $hrCompanyCollective->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.hrCompanyCollectives.show', [$hrCompanyCollective->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye fa-lg text-info"></i></a>
                    <a href="{!! route('company.hrCompanyCollectives.edit', [$hrCompanyCollective->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit fa-lg text-info"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>