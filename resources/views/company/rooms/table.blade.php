<table class="table table-striped table-bordered" id="roomsTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Company Name</th>
            <th>Floor</th>
            <th>Service Name</th>
            <th>Price</th>
            <th>Area</th>
            <th>Security Code</th>
            <th width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($rooms as $room)
        <tr>
            <td>{!! $loop->index + 1 !!}</td>
            <td>{!! $company->name !!}</td>
            <td>{!! $floors[$room->floor_id] !!}</td>
            <td>{!! $services[$room->service_id] !!}</td>
            <td>USD {!! $room->price !!}</td>
            <td>{!! $room->area !!} sqm</td>
            <td>{!! $room->security_code !!}</td>
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['company.services.destroy', $room->id], 'method' => 'delete']) !!}
                <a href="{!! route('company.services.show', [$room->id]) !!}"><i class="fa fa-eye fa-lg text-info"></i></a>
                <a href="{!! route('company.services.edit', [$room->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>