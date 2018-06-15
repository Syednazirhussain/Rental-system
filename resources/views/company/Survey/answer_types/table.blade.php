<table class="table table-striped table-bordered" id="answerTypeTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Code</th>
        </tr>
    </thead>
    <tbody>
    @foreach($answer_types as $answer_type)
        <tr>
            <td>{!! $loop->index + 1 !!}</td>
            <td>{!! $answer_type->name !!}</td>
            <td>{!! $answer_type->code !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>