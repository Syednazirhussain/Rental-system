<table class="table table-responsive" id="companyBuildings-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Address</th>
        <th>Zipcode</th>
        <th>Num Floors</th>
        <th>Company Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyBuildings as $companyBuilding)
        <tr>
            <td>{!! $companyBuilding->name !!}</td>
            <td>{!! $companyBuilding->address !!}</td>
            <td>{!! $companyBuilding->zipcode !!}</td>
            <td>{!! $companyBuilding->num_floors !!}</td>
            <td>{!! $companyBuilding->company_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.companyBuildings.destroy', $companyBuilding->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.companyBuildings.show', [$companyBuilding->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.companyBuildings.edit', [$companyBuilding->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>