<table class="table table-striped table-bordered" id="datatables">
    <thead>
    <tr>
        <th>#</th>
        <th>Topic</th>
        <th>Survey</th>
        <th>Answer Type</th>
        <th>Status</th>
        <th width="200px">Action</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($survey_questions))
        @foreach($survey_questions as $question)
            <tr class="odd gradeX">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $question->topic }}</td>
                <td>{{ $surveys[$question->survey_id] }}</td>
                <td>{{ $answer_types[$question->answer_type] }}</td>
                <td>{{ $question->status }}</td>
                <td width="200px" class="text-center">
                    {!! Form::open(['route' => ['company.survey_question.destroy', $question->id], 'method' => 'delete']) !!}
                    <a href="{!! route('company.survey_question.show', [$question->id]) !!}"><i
                                class="fa fa-eye fa-lg text-info"></i></a>
                    <a href="{!! route('company.survey_question.edit', [$question->id]) !!}"><i
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