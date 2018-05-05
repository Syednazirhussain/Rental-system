        <div class="m-b-3">
          <div class="row">
            <div class="col-md-3">
              <form class="form-inline" id="statusFrom" action="{{ route('admin.companyInvoices.update') }}" method="POST">
                <input name="_method" type="hidden" value="PATCH">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input type="hidden" name="checkboxes_hidden" id="checkboxes_hidden" value="" />
                
                <select class="form-control" name="status" id="status-dropdown" style="width: 40%;">
                  <option value="0">Marked As</option>
                  <option value="paid">Paid</option>
                  <option value="unpaid">Unpaid</option>
                </select>
                <button type="submit" class="btn btn-success">Submit</button>
              </form>
            </div>
          </div>          
        </div>

        <table class="table table-striped table-bordered" id="datatables">
            <thead>
              <th></th>
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
                    <td>
                      <div class="checkbox">
                        <input type="checkbox" class="chk invoice-checkbox" value="{{ $Invoice->id }}">
                      </div>
                    </td>
                    <td>{{ $Invoice->id }}</td>
                    <td>
                    @if(!is_null($Invoice->company))
                      {{ $Invoice->company->name }}
                    @endif
                    </td>
                    <td>{{ $Invoice->payment_cycle }}</td>
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
                    <td class="pull-right">
                    @if(!is_null($Invoice->company))
                      <a href="{{ route('admin.sendInvoice',['company_id' => $Invoice->company->id ]) }}" class="btn btn-default btn-sm">Send Email</a>
                      <a href="{{ route('admin.viewInvoice',['company_id' => $Invoice->company->id,'invoice_id' => $Invoice->id]) }}" class="btn btn-info btn-sm">View Invoice</a>
                    @endif
                     
                      <form class="form-inline" style="display: inline;" action="{{ route('admin.companyInvoices.destroy', [$Invoice->id]) }}" method="post">
                        <input name="_method" type="hidden" value="DELETE">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"">Delete Invoice</button>
                      </form>
                    </td>
                  </tr>

                  @endforeach

            </tbody>
          </table>

