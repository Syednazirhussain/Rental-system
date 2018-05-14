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
                <td>

                  @if($support->supportStatus->name == 'Pending')

                  <span class="label label-warning">{{ $support->supportStatus->name }}</span>

                  @elseif($support->supportStatus->name == 'Solved')

                  <span class="label label-success">{{ $support->supportStatus->name }}</span>

                  @elseif($support->supportStatus->name == 'Bug')

                  <span class="label label-danger">{{ $support->supportStatus->name }}</span>
                  
                  @endif
  
                </td>
                <td>{{  \Carbon\Carbon::parse($support->updated_at)->diffForHumans() }}</td>
                <td>no agent</td>
                <td>
                  @if($support->supportPriority->name == 'Low')

                  <span class="label label-info">{{ $support->supportPriority->name }}</span>

                  @elseif($support->supportPriority->name == 'Normal')

                  <span class="label label-warning">{{ $support->supportPriority->name }}</span>

                  @elseif($support->supportPriority->name == 'Critical')

                  <span class="label label-danger">{{ $support->supportPriority->name }}</span>

                  @else

                  <span class="label label-default">{{ $support->supportPriority->name }}</span>

                  @endif
                </td>
                <td>{{ $support->user->name }}</td>
                <td>
                  <span class="label label-default">{{ $support->supportCategory->name }}</span>                  
                </td>
              </tr>
              @endif
          @endforeach
      @else 
        <p>No records</p>
      @endif
    </tbody>
</table>