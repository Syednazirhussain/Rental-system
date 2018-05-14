<table class="table table-striped table-bordered" id="datatables">
    <thead>
        <tr>
            <th>#</th>
            <th>Subject</th>
            <th>Status</th>
            <th>Last Updated</th>
            <th>Agent</th>
            <th>Priority</th>
            <th>Owner</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($supports))
            @foreach($supports as $support)
              @if($support->parent_id == 0) 
              <tr class="odd gradeX">
                <td>{{ $loop->index + 1 }}</td>
                <td> <a href="{{ route('admin.supports.show',[$support->id]) }}">{{ $support->subject }}</a> </td>
                <td>{{ $support->supportStatus->name }}  </td>
                <td>{{ $support->updated_at }}</td>
                <td>no agent</td>
                <td>{{ $support->supportPriority->name }}</td>
                <td>{{ $support->user->name }}</td>
                <td>{{ $support->supportCategory->name }}</td>
              </tr>
              @endif
          @endforeach
      @else 
        <p>No records</p>
      @endif
    </tbody>
</table>