@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet">
    <link href="{{ asset('/css/scheduler.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css" media="print" rel="stylesheet">
    <style>
        .fc-body .fc-resource-area .fc-scroller .fc-rows td {
            cursor: pointer;
        }
        .fc-body .fc-resource-area .fc-scroller .fc-rows td:hover {
            -webkit-box-shadow: 0 3px 14px 0 rgba(0,0,0,.15);
            -moz-box-shadow: 0 3px 14px 0 rgba(0,0,0,.15);
            box-shadow: 0 3px 14px 0 rgba(0,0,0,.15);
            background: #e8e8e8;
        }
    </style>
@endsection

@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Contract / </span>Contract Status</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="calendar"></div>
                <input id="calendar_data" type="hidden" value="{{ isset($data) ? $data : '' }}">
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="{{ asset('/js/scheduler.min.js') }}"></script>
    <script>
        var data = document.getElementById('calendar_data').value;
        var colors = ['#00ffff', '#f14d39', '#ffc371', '#56f9bb', '#952097', '#1f2a7e', '#c5b3f9' ]
        if(data) {
            data = JSON.parse(data);
        }
        console.log(data);
        var event_data = [];
        var resource_data = []
        for(var i=0; i< data.length; i++) {
            event_data.push({'title' : data[i].name, 'start' : data[i].start_date ? data[i].start_date : '', 'end' : data[i].end_date ? data[i].end_date : '', 'color' : colors[i % 7], 'resourceId' : data[i].id});
            resource_data.push({'id': data[i].id, 'title' : data[i].buildingName + ' - ' + data[i].floor + ' - ' + data[i].name});
        }

        $('#calendar').fullCalendar({
            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
            height: 650,
            navLinks: true,
            header: {
                left: 'prev,next today month',
                center: 'title',
                right: 'timelineYear,timelineMonth,timelineWeek'
            },
            //Events
            events: event_data,
            defaultView: 'timelineDay',
            resourceLabelText: 'Rooms',
            resources: resource_data,
        });

        jQuery(".fc-body .fc-resource-area .fc-scroller .fc-rows td").click(function(){
            location.href = "{{ route('company.contracts.create') }}";
        });
    </script>
@endsection
