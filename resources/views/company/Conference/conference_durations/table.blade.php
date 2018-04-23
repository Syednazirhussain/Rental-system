<table class="table table-responsive" id="conferenceDurations-table">
    <thead>
        <tr>
            <th>Code</th>
        <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($conferenceDurations as $conferenceDuration)
        <tr>
            <td>{!! $conferenceDuration->code !!}</td>
            <td>{!! $conferenceDuration->name !!}</td>
            <td>
                {!! Form::open(['route' => ['company/Conference.conferenceDurations.destroy', $conferenceDuration->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company/Conference.conferenceDurations.show', [$conferenceDuration->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company/Conference.conferenceDurations.edit', [$conferenceDuration->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>