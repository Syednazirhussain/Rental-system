<table class="table table-responsive" id="leaseContractInformations-table">
    <thead>
        <tr>
            <th>Contract Start Date</th>
        <th>Contract Length</th>
        <th>Termination Time</th>
        <th>Contract Auto Renewal</th>
        <th>Contract Renewal</th>
        <th>Renewal Number Month</th>
        <th>Contract Type</th>
        <th>Contract Number</th>
        <th>Contract Name</th>
        <th>Contract Desc</th>
        <th>Amount Per Month</th>
        <th>Income Per Month</th>
        <th>Currency Id</th>
        <th>Cost Reference</th>
        <th>Income Reference</th>
        <th>Other Reference</th>
        <th>Lease Attachment Id</th>
        <th>Building Id</th>
        <th>Cost Number</th>
        <th>Lease Partner Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($leaseContractInformations as $leaseContractInformation)
        <tr>
            <td>{!! $leaseContractInformation->contract_start_date !!}</td>
            <td>{!! $leaseContractInformation->contract_length !!}</td>
            <td>{!! $leaseContractInformation->termination_time !!}</td>
            <td>{!! $leaseContractInformation->contract_auto_renewal !!}</td>
            <td>{!! $leaseContractInformation->contract_renewal !!}</td>
            <td>{!! $leaseContractInformation->renewal_number_month !!}</td>
            <td>{!! $leaseContractInformation->contract_type !!}</td>
            <td>{!! $leaseContractInformation->contract_number !!}</td>
            <td>{!! $leaseContractInformation->contract_name !!}</td>
            <td>{!! $leaseContractInformation->contract_desc !!}</td>
            <td>{!! $leaseContractInformation->amount_per_month !!}</td>
            <td>{!! $leaseContractInformation->income_per_month !!}</td>
            <td>{!! $leaseContractInformation->currency_id !!}</td>
            <td>{!! $leaseContractInformation->cost_reference !!}</td>
            <td>{!! $leaseContractInformation->income_reference !!}</td>
            <td>{!! $leaseContractInformation->other_reference !!}</td>
            <td>{!! $leaseContractInformation->lease_attachment_id !!}</td>
            <td>{!! $leaseContractInformation->building_id !!}</td>
            <td>{!! $leaseContractInformation->cost_number !!}</td>
            <td>{!! $leaseContractInformation->lease_partner_id !!}</td>
            <td>
                {!! Form::open(['route' => ['company.leaseContractInformations.destroy', $leaseContractInformation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.leaseContractInformations.show', [$leaseContractInformation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.leaseContractInformations.edit', [$leaseContractInformation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>