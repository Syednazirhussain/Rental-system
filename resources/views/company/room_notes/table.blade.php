<table class="table table-responsive" id="roomNotes-table">
    <thead>
        <tr>
            <th>Room Id</th>
        <th>User Id</th>
        <th>Note</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roomNotes as $roomNotes)
        <tr>
            <td>{!! $roomNotes->room_id !!}</td>
            <td>{!! $roomNotes->user_id !!}</td>
            <td>{!! $roomNotes->note !!}</td>
            <td>
                {!! Form::open(['route' => ['company.roomNotes.destroy', $roomNotes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.roomNotes.show', [$roomNotes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.roomNotes.edit', [$roomNotes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>