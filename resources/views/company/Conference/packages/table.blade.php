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
            <td>{!! ucfirst($packages->title) !!}</td>
            <td>
                <label class="label label-primary">
                <?php 
                    $pieces = explode(",", $packages->items);
                    echo count($pieces);
                ?>
                </label>
            </td>
            <td>{!! $packages->price !!} kr</td>
            <td>@if($packages->status == 'active') <label class="label label-success">@else <label class="label label-danger"> @endif{!! ucfirst($packages->status) !!}</label> </td>
            <td>
                {!! Form::open(['route' => ['company.conference.packages.destroy', $packages->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.conference.packages.edit', [$packages->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit fa-lg text-info"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>