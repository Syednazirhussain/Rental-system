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
            <td>{!! $contract->contract_number !!}</td>
            <td>{!! $contract->contract_number !!}</td>
            <td>{!! $contract->contract_number !!}</td>
            <td>{!! $contract->contract_number !!}</td>
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['company.contracts.destroy', $service->id], 'method' => 'delete']) !!}
                <a href="{!! route('company.contracts.show', [$service->id]) !!}"><i class="fa fa-eye fa-lg text-info"></i></a>
                <a href="{!! route('company.contracts.edit', [$service->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>