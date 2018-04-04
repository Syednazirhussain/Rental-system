<table class="table table-responsive" id="companyModules-table">
    <thead>
        <tr>
            <th>Company Id</th>
        <th>Module Id</th>
        <th>Price</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyModules as $companyModule)
        <tr>
            <td>{!! $companyModule->company_id !!}</td>
            <td>{!! $companyModule->module_id !!}</td>
            <td>{!! $companyModule->price !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.companyModules.destroy', $companyModule->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.companyModules.show', [$companyModule->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.companyModules.edit', [$companyModule->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>