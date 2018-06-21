<table class="table table-striped table-bordered" id="floorRoomTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Company Name</th>
            <th>Building Name</th>
            <th>Floor</th>
            <th>Num Rooms</th>
            <th width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyFloorRooms as $companyFloorRoom)
        <tr>
            <td>{!! $loop->index + 1 !!}</td>
            <td>{!! ucfirst($company->name) !!}</td>
            <td>{!! ucfirst($companyBuildings[$companyFloorRoom->building_id]) !!}</td>
            <td>{!! $companyFloorRoom->floor !!}</td>
            <td>{!! $companyFloorRoom->num_rooms !!}</td>
            <td  width="200px" class="text-center">
                <a href="{!! route('company.companyFloorRooms.edit', [$companyFloorRoom->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>