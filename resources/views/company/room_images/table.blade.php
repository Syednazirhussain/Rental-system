<table class="table table-responsive" id="roomImages-table">
    <thead>
        <tr>
            <th>Room Id</th>
        <th>Sitting Id</th>
        <th>Entity Type</th>
        <th>Image File</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roomImages as $roomImages)
        <tr>
            <td>{!! $roomImages->room_id !!}</td>
            <td>{!! $roomImages->sitting_id !!}</td>
            <td>{!! $roomImages->entity_type !!}</td>
            <td>{!! $roomImages->image_file !!}</td>
            <td>
                {!! Form::open(['route' => ['company.roomImages.destroy', $roomImages->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.roomImages.show', [$roomImages->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.roomImages.edit', [$roomImages->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>