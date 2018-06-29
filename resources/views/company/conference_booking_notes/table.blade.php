<table class="table table-responsive" id="conferenceBookingNotes-table">
    <thead>
        <tr>
            <th>Conference Booking Id</th>
        <th>User Id</th>
        <th>Code</th>
        <th>Note</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($conferenceBookingNotes as $conferenceBookingNotes)
        <tr>
            <td>{!! $conferenceBookingNotes->conference_booking_id !!}</td>
            <td>{!! $conferenceBookingNotes->user_id !!}</td>
            <td>{!! $conferenceBookingNotes->code !!}</td>
            <td>{!! $conferenceBookingNotes->note !!}</td>
            <td>
                {!! Form::open(['route' => ['company.conferenceBookingNotes.destroy', $conferenceBookingNotes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.conferenceBookingNotes.show', [$conferenceBookingNotes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.conferenceBookingNotes.edit', [$conferenceBookingNotes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>