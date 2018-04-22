        <table class="table table-striped table-bordered" id="datatables">
            <thead>
              <th>Invoice ID</th>
              <th>Company Name</th>
              <th>Payment Cycle</th>
              <th>Date Created</th>
              <th>Status</th>
              <th>Due Date</th>
              <th></th>
            </thead>
            <tbody>
                @foreach($Invoices as $Invoice)

                <tr>
                  <td>{{ $Invoice->id }}</td>
                  <td>{{ ucfirst($Invoice->company->name) }}</td>
                  <td>{{ ucfirst($Invoice->payment_cycle) }}</td>
                  <td> <span class="label label-success">{{ date("M d, Y", strtotime($Invoice->created_at)) }}</span></td>
                  <td>
                  @if ($Invoice->status == "unpaid")
                    <span class="label label-danger">{{ ucfirst($Invoice->status) }}</span>
                  @elseif ($Invoice->status == "paid")
                    <span class="label label-success">{{ ucfirst($Invoice->status) }}</span>
                  @endif
                  </td>
                  <td>
                  @if ($Invoice->status == "unpaid")
                    <span class="label label-warning">{{ date("M d, Y", strtotime($Invoice->due_date)) }}</span>
                  @elseif ($Invoice->status == "paid")
                    <span> - </span>
                  @endif
                  </td>
                  <td>
                    <a href="{{ route('admin.sendInvoice',['company_id' => $Invoice->company->id ]) }}" class="btn btn-default">Send Email</a>
                  </td>
                </tr>

                @endforeach
            </tbody>
          </table>