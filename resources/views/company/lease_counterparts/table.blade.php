<table class="table table-responsive" id="leaseCounterparts-table">
    <thead>
        <tr>
            <th>Organization Number</th>
        <th>Company Name</th>
        <th>Contract Person</th>
        <th>Tel</th>
        <th>Email</th>
        <th>Lease Partner Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($leaseCounterparts as $leaseCounterpart)
        <tr>
            <td>{!! $leaseCounterpart->organization_number !!}</td>
            <td>{!! $leaseCounterpart->company_name !!}</td>
            <td>{!! $leaseCounterpart->contract_person !!}</td>
            <td>{!! $leaseCounterpart->tel !!}</td>
            <td>{!! $leaseCounterpart->email !!}</td>
            <td>{!! $leaseCounterpart->lease_partner_id !!}</td>
            <td>
                {!! Form::open(['route' => ['company.leaseCounterparts.destroy', $leaseCounterpart->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.leaseCounterparts.show', [$leaseCounterpart->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.leaseCounterparts.edit', [$leaseCounterpart->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>