<table class="table table-striped table-bordered" id="datatables">
    <thead>
        <tr>
            <th>#</th>
            <th>Contact Person</th>
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
            <th>Website</th>
            <th>Notes</th>
            <th>Active</th>
            <th>Discount</th>
            <th>Created</th>
            <th>Changed</th>
            <th>Changed by</th>
        </tr>
    </thead>
    <tbody>
    @if(isset($customers))
        @foreach($customers as $customer)
          <tr class="odd gradeX">
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $customer->name }}</td>
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
          </tr>
        @endforeach
      @else
      <p>No records</p>
      @endif
    </tbody>
</table>