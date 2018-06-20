<table class="table table-responsive" id="hrPersonalCats-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hrPersonalCats as $hrPersonalCat)
        <tr>
            <td>{!! $hrPersonalCat->name !!}</td>
            <td>
                {!! Form::open(['route' => ['company.hrPersonalCats.destroy', $hrPersonalCat->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.hrPersonalCats.show', [$hrPersonalCat->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye fa-lg text-info"></i></a>
                    <a href="{!! route('company.hrPersonalCats.edit', [$hrPersonalCat->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit fa-lg text-info"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>