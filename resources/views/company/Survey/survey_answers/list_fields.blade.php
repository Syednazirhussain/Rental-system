<table class="table table-striped table-bordered" id="datatables">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Survey</th>
        <th>Category</th>
        <th>Status</th>
        <th>View in Detail</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($survey_answers))
        @foreach($survey_answers as $answer)
            <tr class="odd gradeX">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $answer->name }}</td>
                <td>{{ $answer->survey }}</td>
                <td>{{ $categories[$answer->category_code] }}</td>
                <td>{{ $answer->status }}</td>
                <td><a href="{{ route('company.survey_answers.show', [$answer->survey_id, $answer->user_id]) }}">View Answer</a></td>
            </tr>
        @endforeach
    @else
        <p>No records</p>
    @endif
    </tbody>
</table>