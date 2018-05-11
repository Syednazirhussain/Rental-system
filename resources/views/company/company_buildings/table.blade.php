<table class="table table-striped table-bordered" id="companyBuildings">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Zipcode</th>
            <th>Num Floors</th>
            <th>Company Id</th>
            <th width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyBuildings as $companyBuilding)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $companyBuilding->name }}</td>
            <td>{{ $companyBuilding->address }}</td>
            <td>{{ $companyBuilding->zipcode }}</td>
            <td>{{ $companyBuilding->num_floors }}</td>
            <td>{{ $companyBuilding->company_id }}</td>
            <td  width="200px" class="text-center">
                <a href="{!! route('company.companyBuildings.show', [$companyBuilding->id]) !!}"><i class="fa fa-eye fa-lg text-info"></i></a>
                <a href="{!! route('company.companyBuildings.edit', [$companyBuilding->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>