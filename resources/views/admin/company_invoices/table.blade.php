<table class="table table-responsive" id="companyInvoices-table">
    <thead>
        <tr>
            <th>Company Id</th>
        <th>Payment Cycle Id</th>
        <th>Discount</th>
        <th>Tax</th>
        <th>Total</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyInvoices as $companyInvoice)
        <tr>
            <td>{!! $companyInvoice->company_id !!}</td>
            <td>{!! $companyInvoice->payment_cycle_id !!}</td>
            <td>{!! $companyInvoice->discount !!}</td>
            <td>{!! $companyInvoice->tax !!}</td>
            <td>{!! $companyInvoice->total !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.companyInvoices.destroy', $companyInvoice->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.companyInvoices.show', [$companyInvoice->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.companyInvoices.edit', [$companyInvoice->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>