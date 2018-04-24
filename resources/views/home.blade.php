@extends('admin.default')

@section('content')
<div class="px-content">
    <div class="page-header">
      <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Newsletter / </span>Groups</h1>
    </div>

    <div class="panel">
      <div class="panel-body">


        <div class="col-md-12">
            <form id="dashboard_form" action="/dashboard" method="POST">
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="start_date">Start Date</label>
                        <input type="datepicker" name="start_date" class="form-control" id="start_date">
                    </div>
                    <div class="col-md-4">
                        <label for="end_date">End Date</label>
                        <input type="datepicker" name="end_date" class="form-control" id="end_date">
                    </div>
                </div>
            </form>
            <br/>
        </div>
        @if ($messages)
        <div class="col-md-12 row">
            <div class="col-md-3">
                <h4>Delivered: {{ $delivered }}</h4>
            </div>
            <div class="col-md-3">
                <h4>Opened: {{ $opened }}</h4>
            </div>
            <div class="col-md-3">
                <h4>Clicked: {{ $clicked }}</h4>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Subject</th>
                    <th scope="col">ToEmail</th>
                    <th scope="col">Status</th>
                    <th scope="col">Open Count</th>
                    <th scope="col">Click Count</th>
                    <th scope="col">Send Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages['messages'] as $message)
                    <tr>
                        <th scope="row">{{ $loop->index }}</th>
                        <td>{{ $message['subject'] }}</td>
                        <td>{{ $message['to_email'] }}</td>
                        <td>{{ $message['status'] }}</td>
                        <td>{{ $message['opens_count'] }}</td>
                        <td>{{ $message['clicks_count'] }}</td>
                        <td>{{ $message['last_event_time'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection

{{-- Include jquery for datepicker--}}
@section('js')
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        $('#start_date').datepicker();
        $('#start_date').datepicker('setDate', -10);
        $('#end_date').datepicker();
        $('#end_date').datepicker('setDate', 1);
    </script>
    @parent
@stop
