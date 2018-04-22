<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th>Title</th>
            <th>Price Per Attendee</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($foods as $food)
        <tr>
            <td>{!! $food->title !!}</td>
            <td>{!! $food->price_per_attendee !!}</td>
            <td>
                {!! Form::open(['route' => ['company.conference.foods.destroy', $food->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.conference.foods.edit', [$food->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>