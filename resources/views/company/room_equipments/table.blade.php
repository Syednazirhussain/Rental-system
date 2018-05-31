<table class="table table-responsive" id="roomEquipments-table">
    <thead>
        <tr>
            <th>Room Id</th>
        <th>Room Type</th>
        <th>Equipment Id</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Info</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roomEquipments as $roomEquipments)
        <tr>
            <td>{!! $roomEquipments->room_id !!}</td>
            <td>{!! $roomEquipments->room_type !!}</td>
            <td>{!! $roomEquipments->equipment_id !!}</td>
            <td>{!! $roomEquipments->qty !!}</td>
            <td>{!! $roomEquipments->price !!}</td>
            <td>{!! $roomEquipments->info !!}</td>
            <td>
                {!! Form::open(['route' => ['company.roomEquipments.destroy', $roomEquipments->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.roomEquipments.show', [$roomEquipments->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.roomEquipments.edit', [$roomEquipments->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>