<table class="table table-responsive" id="supports-table">
    <thead>
        <tr>
            <th>Parent Id</th>
        <th>Subject</th>
        <th>Content</th>
        <th>Html</th>
        <th>Status Id</th>
        <th>Priority Id</th>
        <th>User Id</th>
        <th>Category Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($supports as $support)
        <tr>
            <td>{!! $support->parent_id !!}</td>
            <td>{!! $support->subject !!}</td>
            <td>{!! $support->content !!}</td>
            <td>{!! $support->html !!}</td>
            <td>{!! $support->status_id !!}</td>
            <td>{!! $support->priority_id !!}</td>
            <td>{!! $support->user_id !!}</td>
            <td>{!! $support->category_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.supports.destroy', $support->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.supports.show', [$support->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.supports.edit', [$support->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>