<table class="table table-responsive" id="conferenceBookings-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Booking Date</th>
            <th>Attendees</th>
            <th>Room</th>
            <th>Room Layout</th>
            <th>Total Price</th>
            <th>Deposit</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($conferenceBookings as $conferenceBooking)
            <tr>
                <td>{!! $conferenceBooking->id !!}</td>
                <td>{!! $conferenceBooking->booking_date !!}</td>
                <td>{!! $conferenceBooking->attendees !!}</td>
                <td>{!! $conferenceBooking->room_id !!}</td>
                <td>{!! $conferenceBooking->room_layout_id !!}</td>
                <td>{!! $conferenceBooking->total_price !!}</td>
                <td>{!! $conferenceBooking->deposit !!}</td>
                <td>{!! $conferenceBooking->booking_status !!}</td>
                <td>
                    {!! Form::open(['route' => ['company.conference.conferenceBookings.destroy', $conferenceBooking->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('company.conference.conferenceBookings.edit', [$conferenceBooking->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>