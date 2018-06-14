<table class="table table-striped table-bordered" id="datatables">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Position Title</th>
            <th>Tel</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Cost No</th>
            <th>Group</th>
            <th>Notes</th>
        </tr>
    </thead>
    <tbody>
    @if(isset($tickets))
        @foreach($tickets as $ticket)
          <tr class="odd gradeX">
            <td>{{ $loop->index + 1 }}</td>
          </tr>
        @endforeach
      @else
      <p>No records</p>
      @endif
    </tbody>
</table>