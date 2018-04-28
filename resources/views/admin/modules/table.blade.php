<table class="table table-striped table-bordered" id="datatables">
<thead>
  <tr>
    <th>Name</th>
    <th>Module Code</th>
    <th>Price</th>
    <th width="200px">Actions</th>
  </tr>
</thead>
<tbody>

@foreach($modules as $module)
  <tr class="odd gradeX">
    <td>{{ ucfirst($module->name) }}</td>
    <td>{{ $module->code }}</td>
    <td>{{ $module->price }}</td>
    <td  width="200px" class="center">
        {!! Form::open(['route' => ['admin.modules.destroy', $module->id], 'method' => 'delete']) !!}
          <a href="{!! route('admin.modules.edit', [$module->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
          {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
        {!! Form::close() !!}
    </td>
  </tr>
@endforeach

</tbody>
</table>