<table class="table table-striped table-bordered" id="contractsTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Room Name</th>
            <th>Contract No</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($room_contracts as $contract)
        <tr>
            <td>{!! $loop->index + 1 !!}</td>
            <td>{!! $contract->number !!}</td>
            <td>{!! $contract->number !!}</td>
            <td>{!! $contract->start_date !!}</td>
            <td>{!! $contract->end_date !!}</td>
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['company.contracts.destroy', $contract->id], 'method' => 'delete']) !!}
                <a href="{{ route('company.generateInvoice', ['contract_id' => $contract->id]) }}" class="btn btn-primary btn-xs">Generate Invoice&nbsp;<i class="fa fa-arrow-right fa-md"></i></a>
                <a href="{!! route('company.contracts.show', [$contract->id]) !!}"><i class="fa fa-eye fa-lg text-info"></i></a>
                <a href="{!! route('company.contracts.edit', [$contract->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>