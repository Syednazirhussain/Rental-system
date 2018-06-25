<table class="table table-striped table-bordered" id="companyBuildings">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Zipcode</th>
            <th>Num Floors</th>
            <th>Company Name</th>
            <th width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyBuildings as $companyBuilding)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ ucfirst($companyBuilding->name) }}</td>
            <td>{{ ucfirst($companyBuilding->address) }}</td>
            <td>{{ $companyBuilding->zipcode }}</td>
            <td>{{ $companyBuilding->num_floors }}</td>
            <td>{{ ucfirst($company->name) }}</td>
            <td  width="200px" class="text-center">
                <a href="{!! route('company.companyBuildings.edit', [$companyBuilding->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit fa-lg text-info"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>