<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th>Title</th>
            <th>Items</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($packages as $packages)
        <tr>
            <td>{!! $packages->title !!}</td>
            <td>{!! $packages->items !!}</td>
            <td>{!! $packages->price !!}</td>
            <td>{!! $packages->status !!}</td>
            <td>
                {!! Form::open(['route' => ['company.conference.packages.destroy', $packages->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.conference.packages.edit', [$packages->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>