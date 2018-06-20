<table class="table table-responsive" id="roomSettingArrangments-table">
    <thead>
        <tr>
        <th>Room Id</th>
        <th>Company</th>
        <th>Building</th>
        <th>Name</th>
        <th>Number Persons</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roomSettingArrangments as $roomSettingArrangment)
        <tr>
            <td>{!! $roomSettingArrangment->room_id !!}</td>
            <td>{!! $roomSettingArrangment->company->name !!}</td>
            <td>{!! $roomSettingArrangment->companyBuilding->name !!}</td>
            <td>{!! $roomSettingArrangment->name !!}</td>
            <td>{!! $roomSettingArrangment->number_persons !!}</td>
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['company.roomSettingArrangments.destroy',$roomSettingArrangment->id], 'method' => 'delete']) !!}
                <a href="{!! route('company.roomSettingArrangments.show', [$roomSettingArrangment->id]) !!}"><i class="fa fa-eye fa-lg text-info"></i></a>
                <a href="{!! route('company.roomSettingArrangments.edit', [$roomSettingArrangment->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>