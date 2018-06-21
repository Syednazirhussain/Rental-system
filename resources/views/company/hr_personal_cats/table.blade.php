<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th width="200px">Name</th>
            <th class="pull-right" width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hrPersonalCats as $hrPersonalCat)
        <tr>
            <td>{!! ucfirst($hrPersonalCat->name) !!}</td>
            <td class="pull-right">
                {!! Form::open(['route' => ['company.hrPersonalCats.destroy', $hrPersonalCat->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.hrPersonalCats.edit', [$hrPersonalCat->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit fa-lg text-info"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>