<table class="table table-responsive" id="roomImages-table">
    <thead>
        <tr>
        <th>Building</th>
        <th>Room </th>
        <th>Sitting Arrangment</th>
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
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['company.roomImages.destroy',$roomImages->id], 'method' => 'delete']) !!}
                <a href="{!! route('company.roomImages.show', [$roomImages->id]) !!}"><i class="fa fa-eye fa-lg text-info"></i></a>
                <a href="{!! route('company.roomImages.edit', [$roomImages->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>