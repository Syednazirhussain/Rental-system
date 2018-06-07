<table class="table table-responsive" id="roomImages-table">
    <thead>
        <tr>
        <th></th>
        <th>Building</th>
        <th>Room </th>
        <th>Sitting Arrangment</th>
        <th>Entity Type</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roomImages as $roomImages)
        <tr>
            <td>
                <div class="fileinput-new thumbnail" style="width: 75px;">
                    @if( isset($roomImages) && $roomImages->image_file != "default.png")
                        <img src="{{ asset('storage/company_rooms_images/'.$roomImages->image_file) }}" >
                    @else
                        <img src="{{ asset('/skin-1/assets/images/default.png') }}" >
                    @endif
                </div>
            </td>
            <td>{{ $roomImages->companyBuilding->name }}</td>
            <td>{!! $roomImages->room->name !!}</td>
            <td>{!! $roomImages->roomSittingArrangement->name !!}</td>
            <td>{!! $roomImages->entity_type !!}</td>
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