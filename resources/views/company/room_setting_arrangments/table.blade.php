<table class="table table-responsive" id="roomSettingArrangments-table">
    <thead>
        <tr>
            <th>Room Id</th>
        <th>Company Id</th>
        <th>Building Id</th>
        <th>Name</th>
        <th>Number Persons</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roomSettingArrangments as $roomSettingArrangment)
        <tr>
            <td>{!! $roomSettingArrangment->room_id !!}</td>
            <td>{!! $roomSettingArrangment->company_id !!}</td>
            <td>{!! $roomSettingArrangment->building_id !!}</td>
            <td>{!! $roomSettingArrangment->name !!}</td>
            <td>{!! $roomSettingArrangment->number_persons !!}</td>
            <td>
                {!! Form::open(['route' => ['company.roomSettingArrangments.destroy', $roomSettingArrangment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.roomSettingArrangments.show', [$roomSettingArrangment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.roomSettingArrangments.edit', [$roomSettingArrangment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>