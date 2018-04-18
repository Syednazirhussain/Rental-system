<table class="table table-striped table-bordered" id="datatables">
<thead>
  <tr>
    <th>Name</th>
    <th>Second Name</th>
    <th>Address</th>
    <th>Zipcode</th>
    <th>Phone</th>
    <th width="200px">Actions</th>
  </tr>
</thead>
<tbody>


@foreach($companies as $company)
  <tr class="odd gradeX">
    <td>{{ ucfirst($company->name) }}</td>
    <td>{{ $company->second_name }}</td>
    <td>{{ $company->address }}</td>
    <td>{{ $company->zipcode }}</td>
    <td>{{ $company->phone }}</td>
    <td  width="200px" class="center">
        {!! Form::open(['route' => ['admin.companies.destroy', $company->id], 'method' => 'delete']) !!}
          <a href="{{ route('admin.generateInvoice', ['company_id' => $company->id]) }}" class="btn btn-primary btn-xs">Generate Invoice&nbsp;<i class="fa fa-arrow-right fa-md"></i></a>
          <a href="{!! route('admin.companies.edit', [$company->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
          {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
        {!! Form::close() !!}
    </td>
      

  </tr>
@endforeach

</tbody>
</table>