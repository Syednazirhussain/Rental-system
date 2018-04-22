<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($companyFloorRoom))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">
    <div class="col-sm-12 form-group">
        <label for="company_id">Company Name</label>
        <input type="text" id="company_id" class="form-control"
               value="@if(isset($companyFloorRoom)){{ $company->name }}@endif" disabled>
    </div>
    <div class="col-sm-12 form-group">
        <label for="building_id">Building Name</label>
        <input type="text" id="building_id" class="form-control"
               value="@if(isset($companyFloorRoom)){{ $companyBuildings[$companyFloorRoom->building_id] }}@endif" disabled>
    </div>
    <div class="col-sm-12 form-group">
        <label for="floor">Floor</label>
        <input type="text" name="floor" id="floor" class="form-control" value="@if(isset($companyFloorRoom)){{ $companyFloorRoom->floor }}@endif">
    </div>
    <div class="col-sm-12 form-group">
        <label for="num_rooms">Num Rooms</label>
        <input type="number" name="num_rooms" id="num_rooms" class="form-control" value="@if(isset($companyFloorRoom)){{ $companyFloorRoom->num_rooms }}@endif" disabled>
    </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($companyFloorRoom)) <i class="fa fa-refresh"></i>  Update FloorRoom @else <i class="fa fa-plus"></i>  Add FloorRoom @endif</button>
        <a href="{!! route('company.companyFloorRooms.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>


@section('js')
    <script type="text/javascript">
        // Initialize validator
        $('#floorRoomForm').pxValidate({
            focusInvalid: false,
            rules: {
                'floor': {
                    required: true,
                },
                'num_rooms': {
                    required: true,
                },
            },

            messages: {
                'floor': {
                    required: "Please enter the floor !",
                }
            }
        });

    </script>
@endsection
