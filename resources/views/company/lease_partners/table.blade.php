<table class="table table-responsive" id="leasePartners-table">
    <thead>
        <tr>
            <th>Parent Company</th>
        <th>Sister Company</th>
        <th>Sales Person</th>
        <th>Delegated</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($leasePartners as $leasePartner)
        <tr>
            <td>{!! $leasePartner->parent_company !!}</td>
            <td>{!! $leasePartner->sister_company !!}</td>
            <td>{!! $leasePartner->sales_person !!}</td>
            <td>{!! $leasePartner->delegated !!}</td>
            <td>
                {!! Form::open(['route' => ['company.leasePartners.destroy', $leasePartner->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.leasePartners.show', [$leasePartner->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.leasePartners.edit', [$leasePartner->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>