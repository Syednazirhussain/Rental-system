<table class="table table-responsive" id="hRCourses-table">
    <thead>
        <tr>
            <th>Name</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hRCourses as $hRCourses)
        <tr>
            <td>{!! $hRCourses->name !!}</td>
            <td  width="200px" class="center">
                {!! Form::open(['route' => ['company.hRCourses.destroy', $hRCourses->id], 'method' => 'delete']) !!}
                  <a href="{!! route('company.hRCourses.edit', [$hRCourses->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                  {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>