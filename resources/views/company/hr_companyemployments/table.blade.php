<table class="table table-responsive" id="hrCompanyemployments-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hrCompanyemployments as $hrCompanyemployment)
        <tr>
            <td>{!! $hrCompanyemployment->name !!}</td>
            <td>
                {!! Form::open(['route' => ['company.hrCompanyemployments.destroy', $hrCompanyemployment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.hrCompanyemployments.show', [$hrCompanyemployment->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye fa-lg text-info"></i></a>
                    <a href="{!! route('company.hrCompanyemployments.edit', [$hrCompanyemployment->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit fa-lg text-info"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>