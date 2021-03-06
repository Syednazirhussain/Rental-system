<table class="table table-responsive" id="leaseAttachments-table">
    <thead>
        <tr>
            <th>File Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($leaseAttachments as $leaseAttachment)
        <tr>
            <td>{!! $leaseAttachment->file_name !!}</td>
            <td>
                {!! Form::open(['route' => ['company.leaseAttachments.destroy', $leaseAttachment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.leaseAttachments.show', [$leaseAttachment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.leaseAttachments.edit', [$leaseAttachment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>