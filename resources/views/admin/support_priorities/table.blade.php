<table class="table table-striped table-bordered" id="datatables">
<thead>
  <tr>
    <th>Name</th>
    <th width="200px">Actions</th>
  </tr>
</thead>
<tbody>

@foreach($supportPriorities as $supportPriority)
  <tr class="odd gradeX">
    <td>{{ ucfirst($supportPriority->name) }}</td>
    <td  width="200px" class="center">
        {!! Form::open(['route' => ['admin.supportPriorities.destroy', $supportPriority->id], 'method' => 'delete']) !!}
          <a href="{!! route('admin.supportPriorities.edit', [$supportPriority->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
          {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
        {!! Form::close() !!}
    </td>
  </tr>
@endforeach

</tbody>
</table>