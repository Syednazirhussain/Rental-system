{{ csrf_field() }}
@if(isset($room))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">
    <div class="col-sm-12 form-group">
        <label for="company_id">Company Name</label>
        <input type="text" id="company_id" class="form-control"
               value="@if(isset($company)){{ $company->name }}@endif" disabled>
    </div>
    <div class="col-sm-12 form-group">
        <label for="select_floor">Floor Name</label>
        <select class="form-control" id="select_floor" name="floor_id">
            @if(isset($room))<option value="{{ $room->floor_id }}">{{ $floor_name }}</option>@endif
            @foreach ($companyFloors as $floor)
                <option value="{{ $floor->id }}"><span>{{ $companyBuildings[$floor->building_id] }}</span> - Floor {{$floor->floor }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-12 form-group">
        <label for="service_id">Select Service</label>
        <select class="form-control" id="service_id" name="service_id">
            @if(isset($room))<option value="{{ $room->service_id }}">{{ $service_name }}</option>@endif
            @foreach ($services as $service)
                <option value="{{ $service->id }}">{{$service->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-12 form-group">
        <label for="room_name">Room Name</label>
        <input type="text" id="room_name" name="name" class="form-control" value="@if(isset($room)){{ $room->name }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label for="room_area">Area</label>
        <input type="number" id="room_area" name="area" class="form-control" value="@if(isset($room)){{ $room->area }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label for="room_price">Price</label>
        <input type="number" id="room_price" name="price" class="form-control" value="@if(isset($room)){{ $room->price }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label for="security_code">Security Code</label>
        <input type="text" id="security_code" name="security_code" class="form-control" value="@if(isset($room)){{ $room->security_code }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label for="image1">Image 1</label>
        <input type="file" id="image1" name="image1">
    </div>
    <div class="col-sm-12 form-group">
        <label for="image2">Image 2</label>
        <input type="file" id="image2" name="image2">
    </div>
    <div class="col-sm-12 form-group">
        <label for="image3">Image 3</label>
        <input type="file" id="image3" name="image3">
    </div>
    <div class="col-sm-12 form-group">
        <label for="image4">Image 4</label>
        <input type="file" id="image4" name="image4">
    </div>
    <div class="col-sm-12 form-group">
        <label for="image5">Image 5</label>
        <input type="file" id="image5" name="image5">
    </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($room)) <i class="fa fa-refresh"></i>  Update Room @else <i class="fa fa-plus"></i>  Add Room @endif</button>
        <a href="{!! route('company.rooms.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>


@section('js')
    <script type="text/javascript">
        // Initialize validator
        $('#roomForm').pxValidate({
            focusInvalid: false,
            rules: {
                'name': {
                    required: true,
                },
            },

            messages: {
                'name': {
                    required: "Please enter the room name !",
                }
            }
        });

    </script>
@endsection
