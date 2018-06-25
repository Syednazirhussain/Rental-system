<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Booking Criteria</th>
            <th>Is Multi Units</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($equipments as $equipments)
        <tr>
            <td>{!! ucfirst($equipments->title) !!}</td>
            <td>{!! $equipments->price !!}</td>
            <td>{!! ucfirst($equipments->conferenceEquipmentsCriterion->title) !!}</td>
            <td>@if($equipments->is_multi_units == '1') <label class="label label-success">Yes</label> @else <label class="label label-danger">No</label> @endif </td>
            <td>
                {!! Form::open(['route' => ['company.conference.equipments.destroy', $equipments->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.conference.equipments.edit', [$equipments->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit fa-lg text-info"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>