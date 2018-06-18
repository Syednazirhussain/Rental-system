<table class="table table-striped table-bordered" id="datatables">
    <thead>
    <tr>
        <th>#</th>
        <th>Survey</th>
        <th>Category</th>
        <th>Status</th>
        <th>Questions</th>
        <th width="200px">Action</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($surveys))
        @foreach($surveys as $survey)
            <tr class="odd gradeX">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $survey->survey }}</td>
                <td>{{ $survey_categories[$survey->category_code] }}</td>
                <td>{{ $survey->status }}</td>
                <td><a href="{!! route('company.survey.show', [$survey->id]) !!}">Questions</a></td>
                <td width="200px" class="text-center">
                    {!! Form::open(['route' => ['company.survey.destroy', $survey->id], 'method' => 'delete']) !!}
                    <a href="{!! route('company.survey.edit', [$survey->id]) !!}"><i
                                class="fa fa-edit fa-lg text-info"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    @else
        <p>No records</p>
    @endif
    </tbody>
</table>