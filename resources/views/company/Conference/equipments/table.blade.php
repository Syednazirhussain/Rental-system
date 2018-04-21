<table class="table table-responsive" id="equipments-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Price</th>
        <th>Criteria Id</th>
        <th>Is Multi Units</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($equipments as $equipments)
        <tr>
            <td>{!! $equipments->title !!}</td>
            <td>{!! $equipments->price !!}</td>
            <td>{!! $equipments->criteria_id !!}</td>
            <td>{!! $equipments->is_multi_units !!}</td>
            <td>
                {!! Form::open(['route' => ['company.conference.equipments.destroy', $equipments->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.conference.equipments.show', [$equipments->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.conference.equipments.edit', [$equipments->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>