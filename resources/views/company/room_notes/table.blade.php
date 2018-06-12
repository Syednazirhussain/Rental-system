<table class="table table-responsive" id="roomNotes-table">
    <thead>
        <tr>
            <th>Building</th>
            <th>Room</th>
            <th>User</th>
            <th>Note</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roomNotes as $roomNotes)
        <tr>
            <td>{!! $roomNotes->companyBuilding->name !!}</td>
            <td>{!! $roomNotes->room->name !!}</td>
            <td>{!! $roomNotes->user->name !!}</td>
            <td>{!! $roomNotes->note !!}</td>
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['company.roomNotes.destroy',$roomNotes->id], 'method' => 'delete']) !!}
                <a href="{!! route('company.roomNotes.show', [$roomNotes->id]) !!}"><i class="fa fa-eye fa-lg text-info"></i></a>
                <a href="{!! route('company.roomNotes.edit', [$roomNotes->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>