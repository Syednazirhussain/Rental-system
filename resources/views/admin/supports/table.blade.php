<table class="table table-striped table-bordered" id="datatables">
    <thead>
        <tr>
            <th>#</th>
            <th>Subject</th>
            <th>Status</th>
            <th>Last Updated</th>
            <th>Last Comment</th>
            <th>Priority</th>
            <th>Owner</th>
            <th>Company</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
      @if(isset($supports))

        @for($i=0 ; $i < count($supports) ; $i++) 
              <tr class="odd gradeX">
                <td>{{ $i + 1 }}</td>
                <td> 
                  <a href="{{ route('admin.supports.show',[$supports[$i]->parent_id]) }}">{{ $supports[$i]->subject }}</a> 
                </td>
                <td>

                  @if($supports[$i]->supportStatus->name == 'Pending')

                  <span class="label label-warning">{{ $supports[$i]->supportStatus->name }}</span>

                  @elseif($supports[$i]->supportStatus->name == 'Solved')

                  <span class="label label-success">{{ $supports[$i]->supportStatus->name }}</span>

                  @elseif($supports[$i]->supportStatus->name == 'Bug')

                  <span class="label label-danger">{{ $supports[$i]->supportStatus->name }}</span>
                  
                  @endif
  
                </td>
                <td>{{  \Carbon\Carbon::parse($supports[$i]->updated_at)->diffForHumans() }}</td>
                <td>
                  {{ $supports[$i]->user->name }}
                </td>
                <td>
                  @if($supports[$i]->supportPriority->name == 'Low')

                  <span class="label label-info">{{ $supports[$i]->supportPriority->name }}</span>

                  @elseif($supports[$i]->supportPriority->name == 'Normal')

                  <span class="label label-warning">{{ $supports[$i]->supportPriority->name }}</span>

                  @elseif($supports[$i]->supportPriority->name == 'Critical')

                  <span class="label label-danger">{{ $supports[$i]->supportPriority->name }}</span>

                  @else

                  <span class="label label-default">{{ $supports[$i]->supportPriority->name }}</span>

                  @endif
                </td>
                <td>{{ $supports[$i]->user->name }}</td>
                <td>
                  compnsay name
 
                </td>
                <td>
                  <span class="label label-default">{{ $supports[$i]->supportCategory->name }}</span>                  
                </td>
              </tr>
        @endfor

      @else 
        <p>No records</p>
      @endif
    </tbody>
</table>