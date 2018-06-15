<table class="table table-striped table-bordered" id="datatables">
    <thead>
        <tr>
            <th>#</th>
            <th>Survey</th>
            <th>Category</th>
            <th>Status</th>
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
          </tr>
        @endforeach
      @else
      <p>No records</p>
      @endif
    </tbody>
</table>