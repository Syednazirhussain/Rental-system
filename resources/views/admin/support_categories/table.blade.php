<table class="table table-striped table-bordered" id="datatables">
<thead>
  <tr>
    <th>Name</th>
    <th width="200px">Actions</th>
  </tr>
</thead>
<tbody>

@foreach($supportCategories as $supportCategory)
  <tr class="odd gradeX">
    <td>{{ ucfirst($supportCategory->name) }}</td>
    <td  width="200px" class="center">
        {!! Form::open(['route' => ['admin.supportCategories.destroy', $supportCategory->id], 'method' => 'delete']) !!}
          <a href="{!! route('admin.supportCategories.edit', [$supportCategory->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
          {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
        {!! Form::close() !!}
    </td>
  </tr>
@endforeach

</tbody>
</table>