<table class="table table-striped table-bordered" id="datatables">
    <thead>
        <tr>
            <th>#</th>
            <th>Customer</th>
            <th>Org.no</th>
            <th>Cust Category</th>
            <th>Tel</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Address</th>
            <th>Address 2</th>
            <th>Post Number</th>
            <th>City</th>
            <th>Country</th>
            <th width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
    @if(isset($customers))
        @foreach($customers as $customer)
          <tr class="odd gradeX">
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->org_no }}</td>
            <td>{{ $customer->category }}</td>
            <td>{{ $customer->tel_number }}</td>
            <td>{{ $customer->mobile }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->address_1 }}</td>
            <td>{{ $customer->address_2 }}</td>
            <td>{{ $customer->mobile }}</td>
            <td>{{ $customer->city }}</td>
            <td>{{ $customer->country }}</td>
              <td  width="200px" class="text-center">
                  {!! Form::open(['route' => ['company.rcustomer.destroy', $customer->id], 'method' => 'delete']) !!}
                  <a href="{!! route('company.rcustomer.show', [$customer->id]) !!}"><i class="fa fa-eye fa-lg text-info"></i></a>
                  <a href="{!! route('company.rcustomer.edit', [$customer->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                  {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                  {!! Form::close() !!}
              </td>
          </tr>
        @endforeach
      @else
      <p>No records</p>
      @endif
    </tbody>
</table>