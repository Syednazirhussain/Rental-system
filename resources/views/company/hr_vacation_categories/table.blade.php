<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th width="200px">Name</th>
            <th class="pull-right" width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hrVacationCategories as $hrVacationCategory)
        <tr>
            <td width="200px">{!! ucfirst($hrVacationCategory->name) !!}</td>
            <td class="pull-right" width="200px">
                {!! Form::open(['route' => ['company.hrVacationCategories.destroy', $hrVacationCategory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.hrVacationCategories.edit', [$hrVacationCategory->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit fa-lg text-info"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>