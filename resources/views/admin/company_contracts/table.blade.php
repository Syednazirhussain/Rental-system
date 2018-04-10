<table class="table table-responsive" id="companyContracts-table">
    <thead>
        <tr>
            <th>Company Id</th>
        <th>Number</th>
        <th>Content</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Termindation Date</th>
        <th>Payment Method</th>
        <th>Payment Cycle</th>
        <th>Discount</th>
        <th>Discount Type</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($companyContracts as $companyContract)
        <tr>
            <td>{!! $companyContract->company_id !!}</td>
            <td>{!! $companyContract->number !!}</td>
            <td>{!! $companyContract->content !!}</td>
            <td>{!! $companyContract->start_date !!}</td>
            <td>{!! $companyContract->end_date !!}</td>
            <td>{!! $companyContract->termindation_date !!}</td>
            <td>{!! $companyContract->payment_method !!}</td>
            <td>{!! $companyContract->payment_cycle !!}</td>
            <td>{!! $companyContract->discount !!}</td>
            <td>{!! $companyContract->discount_type !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.companyContracts.destroy', $companyContract->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.companyContracts.show', [$companyContract->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.companyContracts.edit', [$companyContract->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>