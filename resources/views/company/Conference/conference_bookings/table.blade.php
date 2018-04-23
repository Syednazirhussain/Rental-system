<table class="table table-responsive" id="conferenceBookings-table">
    <thead>
        <tr>
            <th>Booking Date</th>
        <th>Start Dateime</th>
        <th>End Datetime</th>
        <th>Attendees</th>
        <th>Room Id</th>
        <th>Room Layout Id</th>
        <th>Duration Code</th>
        <th>Booking Status</th>
        <th>Payment Method Code</th>
        <th>Room Price</th>
        <th>Equipment Price</th>
        <th>Food Price</th>
        <th>Tax</th>
        <th>Total Price</th>
        <th>Deposit</th>
        <th>Remarks</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($conferenceBookings as $conferenceBooking)
        <tr>
            <td>{!! $conferenceBooking->booking_date !!}</td>
            <td>{!! $conferenceBooking->start_dateime !!}</td>
            <td>{!! $conferenceBooking->end_datetime !!}</td>
            <td>{!! $conferenceBooking->attendees !!}</td>
            <td>{!! $conferenceBooking->room_id !!}</td>
            <td>{!! $conferenceBooking->room_layout_id !!}</td>
            <td>{!! $conferenceBooking->duration_code !!}</td>
            <td>{!! $conferenceBooking->booking_status !!}</td>
            <td>{!! $conferenceBooking->payment_method_code !!}</td>
            <td>{!! $conferenceBooking->room_price !!}</td>
            <td>{!! $conferenceBooking->equipment_price !!}</td>
            <td>{!! $conferenceBooking->food_price !!}</td>
            <td>{!! $conferenceBooking->tax !!}</td>
            <td>{!! $conferenceBooking->total_price !!}</td>
            <td>{!! $conferenceBooking->deposit !!}</td>
            <td>{!! $conferenceBooking->remarks !!}</td>
            <td>
                {!! Form::open(['route' => ['company/Conference.conferenceBookings.destroy', $conferenceBooking->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company/Conference.conferenceBookings.show', [$conferenceBooking->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company/Conference.conferenceBookings.edit', [$conferenceBooking->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>