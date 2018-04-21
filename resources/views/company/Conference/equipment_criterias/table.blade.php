<table class="table table-responsive" id="equipmentCriterias-table">
    <thead>
        <tr>
            <th>Code</th>
        <th>Title</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($equipmentCriterias as $equipmentCriteria)
        <tr>
            <td>{!! $equipmentCriteria->code !!}</td>
            <td>{!! $equipmentCriteria->title !!}</td>
            <td>
                {!! Form::open(['route' => ['company.conference.equipmentCriterias.destroy', $equipmentCriteria->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.conference.equipmentCriterias.show', [$equipmentCriteria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.conference.equipmentCriterias.edit', [$equipmentCriteria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>