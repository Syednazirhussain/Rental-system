<table class="table table-responsive" id="roomLayouts-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Image</th>
        <th>Update At</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roomLayouts as $roomLayout)
        <tr>
            <td>{!! $roomLayout->title !!}</td>
            <td>{!! $roomLayout->image !!}</td>
            <td>{!! $roomLayout->update_at !!}</td>
            <td>
                {!! Form::open(['route' => ['company/Conference.roomLayouts.destroy', $roomLayout->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company/Conference.roomLayouts.show', [$roomLayout->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company/Conference.roomLayouts.edit', [$roomLayout->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>