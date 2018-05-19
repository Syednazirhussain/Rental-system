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
            <th>Company</th>
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

                  @if($companySupport->supportStatus->name == 'Pending')

                  <span class="label label-warning">{{ $companySupport->supportStatus->name }}</span>

                  @elseif($companySupport->supportStatus->name == 'Solved')

                  <span class="label label-success">{{ $companySupport->supportStatus->name }}</span>

                  @elseif($companySupport->supportStatus->name == 'Bug')

                  <span class="label label-danger">{{ $companySupport->supportStatus->name }}</span>
                  
                  @endif
  
                </td>
                <td>{{  \Carbon\Carbon::parse($companySupport->updated_at)->diffForHumans() }}</td>
                
                <td>
                  {{ $companySupport->last_comment }}
                </td>

                <td>
                  @if($companySupport->supportPriority->name == 'Low')

                  <span class="label label-info">{{ $companySupport->supportPriority->name }}</span>

                  @elseif($companySupport->supportPriority->name == 'Normal')

                  <span class="label label-warning">{{ $companySupport->supportPriority->name }}</span>

                  @elseif($companySupport->supportPriority->name == 'Critical')

                  <span class="label label-danger">{{ $companySupport->supportPriority->name }}</span>

                  @else

                  <span class="label label-default">{{ $companySupport->supportPriority->name }}</span>

                  @endif
                </td>
                <td>
                  {{ $companySupport->user->name }}
                </td>
                <td> <a href="{{ route('admin.company.profile',[$companySupport->company_id]) }}">{{ $companySupport->company_name }}</a> </td>
                <td>
                  <span class="label label-default">{{ $companySupport->supportCategory->name }}</span>                  
                </td>
              </tr>
        @endforeach
      @endif
    </tbody>
</table>