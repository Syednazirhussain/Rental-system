<table class="table table-responsive" id="datatables">
    <thead>
        <tr>
            <th width="200px">Name</th>
            <th class="pull-right" width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hRCourses as $hRCourses)
        <tr>
            <td width="200px">{!! ucfirst($hRCourses->name) !!}</td>
            <td  class="pull-right" width="200px">
                {!! Form::open(['route' => ['company.hRCourses.destroy', $hRCourses->id], 'method' => 'delete']) !!}
                  <a href="{!! route('company.hRCourses.edit', [$hRCourses->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                  {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>