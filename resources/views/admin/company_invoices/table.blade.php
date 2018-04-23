        <div class="container" ng-app="myApp" ng-controller="myCtrl">
          <div class="row">
            <div class="col-md-12">
                <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                      </div>
                      <div class="modal-body">
                        <p>This is a small modal.</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>          
        </div>

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
                    <a href="{{ route('admin.viewInvoice',['company_id' => $Invoice->company->id,'invoice_id' => $Invoice->id]) }}" class="btn btn-success">View Invoice</a>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" ng-click="viewInvoice()">View Invoice</button>
                  </td>
                </tr>

                @endforeach
            </tbody>
          </table>