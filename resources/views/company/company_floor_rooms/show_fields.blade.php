<table class="table table-striped">
    <tbody>
        <tr>
            <th scope="row" width="200px">Id</th>
            <th>{{ $companyFloorRoom->id }}</th>
        </tr>
        <tr>
            <th scope="row" width="200px">Company Name</th>
            <th>{{ $company->name }}</th>
        </tr>
        <tr>
            <th scope="row" width="200px">Building Name</th>
            <th>{{ $companyBuildings[$companyFloorRoom->building_id] }}</th>
        </tr>
        <tr>
            <th scope="row" width="200px">Num Floors</th>
            <th>{{ $companyFloorRoom->floor }}</th>
        </tr>
        <tr>
            <th scope="row" width="200px">Num Rooms</th>
            <th>{{ $companyFloorRoom->num_rooms }}</th>
        </tr>
    </tbody>
</table>

