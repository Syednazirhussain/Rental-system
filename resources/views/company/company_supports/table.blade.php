<table class="table table-striped table-bordered" data-order='[[ 0, "desc" ]]' id="datatables">
    <thead>
        <tr>
            <th>#</th>
            <th>Subject</th>
            <th>Status</th>
            <th>Last Updated</th>
            <th>Last Comment</th>
            <th>Priority</th>
            <th>Owner</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
      @if(isset($companySupports))

        @foreach($companySupports as $companySupport) 
              <tr class="odd gradeX">
                <td>{{ $loop->index + 1 }}</td>
                <td> 
                  <a href="{{ route('company.companySupports.show',[$companySupport->id]) }}">{{ $companySupport->subject }}</a> 
                </td>
                <td>

                  @if($companySupport->companySupportStatus->name == 'Pending')

                  <span class="label label-warning">{{ $companySupport->companySupportStatus->name }}</span>

                  @elseif($companySupport->companySupportStatus->name == 'Solved')

                  <span class="label label-success">{{ $companySupport->companySupportStatus->name }}</span>

                  @elseif($companySupport->companySupportStatus->name == 'Bug')

                  <span class="label label-danger">{{ $companySupport->companySupportStatus->name }}</span>
                  
                  @endif
  
                </td>
                <td>{{  \Carbon\Carbon::parse($companySupport->updated_at)->diffForHumans() }}</td>
                
                <td>
                  {{ $companySupport->last_comment }}
                </td>

                <td>
                  @if($companySupport->companySupportPriority->name == 'Low')

                  <span class="label label-info">{{ $companySupport->companySupportPriority->name }}</span>

                  @elseif($companySupport->companySupportPriority->name == 'Normal')

                  <span class="label label-warning">{{ $companySupport->companySupportPriority->name }}</span>

                  @elseif($companySupport->companySupportPriority->name == 'Critical')

                  <span class="label label-danger">{{ $companySupport->companySupportPriority->name }}</span>

                  @else

                  <span class="label label-default">{{ $companySupport->companySupportPriority->name }}</span>

                  @endif
                </td>
                <td>
                  {{ $companySupport->user->name }}
                </td>

                <td>
                  <span class="label label-default">{{ $companySupport->companySupportCategory->name }}</span>                  
                </td>
              </tr>
        @endforeach
      @endif
    </tbody>
</table>