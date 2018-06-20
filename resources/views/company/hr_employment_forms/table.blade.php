<table class="table table-responsive" id="hrEmploymentForms-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hrEmploymentForms as $hrEmploymentForm)
        <tr>
            <td>{!! $hrEmploymentForm->name !!}</td>
            <td>
                {!! Form::open(['route' => ['company.hrEmploymentForms.destroy', $hrEmploymentForm->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.hrEmploymentForms.show', [$hrEmploymentForm->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('company.hrEmploymentForms.edit', [$hrEmploymentForm->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>