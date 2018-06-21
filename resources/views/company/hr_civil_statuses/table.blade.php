<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th width="200px">Name</th>
            <th class="pull-right" width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hrCivilStatuses as $hrCivilStatus)
        <tr>
            <td width="200px">{!! ucfirst($hrCivilStatus->name) !!}</td>
            <td class="pull-right" >
                {!! Form::open(['route' => ['company.hrCivilStatuses.destroy', $hrCivilStatus->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.hrCivilStatuses.edit', [$hrCivilStatus->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit fa-lg text-info"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>