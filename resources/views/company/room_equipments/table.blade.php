<table class="table table-responsive" id="roomEquipments-table">
    <thead>
        <tr>
            <th>Room</th>
            <th>Room Type</th>
            <th>Equipment</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Info</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roomEquipments as $roomEquipments)
        <tr>
            <td>{!! $roomEquipments->room->name !!}</td>
            <td>{!! $roomEquipments->room_type !!}</td>
            <td>{!! $roomEquipments->conferenceEquipment->title !!}</td>
            <td>{!! $roomEquipments->qty !!}</td>
            <td>{!! $roomEquipments->price !!}</td>
            <td>{!! $roomEquipments->info !!}</td>
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['company.roomEquipments.destroy',$roomEquipments->id], 'method' => 'delete']) !!}
                <a href="{!! route('company.roomEquipments.show', [$roomEquipments->id]) !!}"><i class="fa fa-eye fa-lg text-info"></i></a>
                <a href="{!! route('company.roomEquipments.edit', [$roomEquipments->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>