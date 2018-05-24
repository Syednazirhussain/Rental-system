<table class="table table-striped table-bordered" id="datatables">
    <thead>
        <tr>
            <th>#</th>
            <th>Subject</th>
            <th>Status</th>
            <th>Last Updated</th>
            <th>Agent</th>
        </tr>
    </thead>
    <tbody>
    @if(isset($tickets))
        @foreach($tickets as $ticket)
          <tr class="odd gradeX">
            <td>{{ $loop->index + 1 }}</td>
            <td> <a href="{{ route('company.supports.show',[$ticket->id]) }}">{{ $ticket->subject }}</a></td>
            <td>
                @if($ticket->supportStatus->name == 'Pending')
                    <span class="label label-warning">{{ $ticket->supportStatus->name }}</span>
                @elseif($ticket->supportStatus->name == 'Solved')
                    <span class="label label-primary">{{ $ticket->supportStatus->name }}</span>
                @elseif($ticket->supportStatus->name == 'Bug')
                    <span class="label label-danger">{{ $ticket->supportStatus->name }}</span>
                @else
                    <span class="label label-default">{{ $ticket->supportStatus->name }}</span>
                @endif
            </td>
            <td>{{  \Carbon\Carbon::parse($ticket->updated_at)->format('F d, Y') }}</td>
            <td>my_agent</td>
          </tr>
        @endforeach
      @else
      <p>No records</p>
      @endif
    </tbody>
</table>