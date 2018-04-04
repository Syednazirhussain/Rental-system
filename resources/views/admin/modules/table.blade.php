<table class="table table-responsive" id="modules-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Price</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($modules as $module)
        <tr>
            <td>{!! $module->name !!}</td>
            <td>{!! $module->price !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.modules.destroy', $module->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.modules.show', [$module->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.modules.edit', [$module->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>