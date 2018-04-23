<table class="table table-responsive" id="conferenceBookingItems-table">
    <thead>
        <tr>
            <th>Booking Id</th>
        <th>Entity Type</th>
        <th>Entity Name</th>
        <th>Entity Price</th>
        <th>Entity Qty</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($conferenceBookingItems as $conferenceBookingItem)
        <tr>
            <td>{!! $conferenceBookingItem->booking_id !!}</td>
            <td>{!! $conferenceBookingItem->entity_type !!}</td>
            <td>{!! $conferenceBookingItem->entity_name !!}</td>
            <td>{!! $conferenceBookingItem->entity_price !!}</td>
            <td>{!! $conferenceBookingItem->entity_qty !!}</td>
            <td>
                {!! Form::open(['route' => ['company/Conference.conferenceBookingItems.destroy', $conferenceBookingItem->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company/Conference.conferenceBookingItems.show', [$conferenceBookingItem->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company/Conference.conferenceBookingItems.edit', [$conferenceBookingItem->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>