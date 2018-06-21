<table class="table table-striped table-bordered" id="datatables">
    <thead>
        <tr>
            <th>#</th>
            <th>Topic</th>
            <th>Survey</th>
            <th>Answer Type</th>
            <th>Status</th>
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
          </tr>
        @endforeach
      @else
      <p>No records</p>
      @endif
    </tbody>
</table>