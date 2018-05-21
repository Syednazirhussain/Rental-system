<table class="table table-striped table-bordered" data-order='[[ 0, "desc" ]]' id="datatables">
    <thead>
        <tr>
            <th>#</th>
            <th>Subject</th>
            <th>Status</th>
            <th>Last Updated</th>
            <th>Last Comment</th>
            <th>Priority</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
      @if(isset($supports))

        @foreach($supports as $support) 
              <tr class="odd gradeX">
                <td>{{ $loop->index + 1 }}</td>
                <td> 
                  <a href="{{ route('companyCustomer.supports.show',[$support->id]) }}">{{ $support->subject }}</a> 
                </td>
                <td>

                  @if($support->companySupportStatus->name == 'Pending')

                  <span class="label label-warning">{{ $support->companySupportStatus->name }}</span>

                  @elseif($support->companySupportStatus->name == 'Solved')

                  <span class="label label-success">{{ $support->companySupportStatus->name }}</span>

                  @elseif($support->companySupportStatus->name == 'Bug')

                  <span class="label label-danger">{{ $support->companySupportStatus->name }}</span>
                  
                  @endif
  
                </td>
                <td>{{  \Carbon\Carbon::parse($support->updated_at)->diffForHumans() }}</td>
                
                <td>
                  {{ $support->last_comment }}
                </td>

                <td>
                  @if($support->companySupportPriority->name == 'Low')

                  <span class="label label-info">{{ $support->companySupportPriority->name }}</span>

                  @elseif($support->companySupportPriority->name == 'Normal')

                  <span class="label label-warning">{{ $support->companySupportPriority->name }}</span>

                  @elseif($support->companySupportPriority->name == 'Critical')

                  <span class="label label-danger">{{ $support->companySupportPriority->name }}</span>

                  @else

                  <span class="label label-default">{{ $support->companySupportPriority->name }}</span>

                  @endif
                </td>

                <td>
                  <span class="label label-default">{{ $support->companySupportCategory->name }}</span>                  
                </td>
              </tr>
        @endforeach
      @endif
    </tbody>
</table>