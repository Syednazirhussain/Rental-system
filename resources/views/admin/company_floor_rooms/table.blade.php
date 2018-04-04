<table class="table table-responsive" id="companyFloorRooms-table">
    <thead>
        <tr>
            <th>Building Id</th>
        <th>Floor</th>
        <th>Num Rooms</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyFloorRooms as $companyFloorRoom)
        <tr>
            <td>{!! $companyFloorRoom->building_id !!}</td>
            <td>{!! $companyFloorRoom->floor !!}</td>
            <td>{!! $companyFloorRoom->num_rooms !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.companyFloorRooms.destroy', $companyFloorRoom->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.companyFloorRooms.show', [$companyFloorRoom->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.companyFloorRooms.edit', [$companyFloorRoom->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>