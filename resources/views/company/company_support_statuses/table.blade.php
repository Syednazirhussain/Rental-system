<table class="table table-striped table-bordered" id="datatables">
<thead>
  <tr>
    <th>Name</th>
    <th width="200px">Actions</th>
  </tr>
</thead>
<tbody>

@foreach($supportStatuses as $supportStatus)
  <tr class="odd gradeX">
    <td>{{ ucfirst($supportStatus->name) }}</td>
    <td  width="200px" class="center">
        {!! Form::open(['route' => ['company.supportStatuses.destroy', $supportStatus->id], 'method' => 'delete']) !!}
          <a href="{!! route('company.supportStatuses.edit', [$supportStatus->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
          {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
        {!! Form::close() !!}
    </td>
  </tr>
@endforeach

</tbody>
</table>