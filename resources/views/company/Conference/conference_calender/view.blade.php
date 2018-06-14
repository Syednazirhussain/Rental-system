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
            <h1><i class="page-header-icon ion-android-checkbox-outline"></i> Conference Calender</h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Conference Calender</div>
                    </div>
                    <div class="panel-body">

                        <div id="calendar"></div>
                        <input id="calendar_data" type="hidden" value="{{ isset($dataBooking) ? $dataBooking : '' }}">
                        <input id="calendar_data_room" type="hidden" value="{{ isset($dataRooms) ? $dataRooms : '' }}">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection



@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="{{ asset('/js/scheduler.min.js') }}"></script>

    <script type="text/javascript">
        
          $(document).ready(function() {

            /*$('#calendar').fullCalendar({
              header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
              },
              defaultDate: '2018-03-12',
              navLinks: true, // can click day/week names to navigate views
              editable: true,
              eventLimit: true, // allow "more" link when too many events
              events: [
                {
                  title: 'All Day Event',
                  start: '2018-03-01'
                }
              ]
            });*/

          });


        var data = document.getElementById('calendar_data').value;
        var dataRoom = document.getElementById('calendar_data_room').value;
        var colors = ['#00ffff', '#f14d39', '#ffc371', '#56f9bb', '#952097', '#1f2a7e', '#c5b3f9' ]
        
        if(data) { data = JSON.parse(data); }
        
        if(dataRoom) { dataRoom = JSON.parse(dataRoom); }

        var event_data = [];
        var resource_data = [];

        for(var i=0; i< data.length; i++) {
            event_data.push({'title' : 'Booking', 'start' : data[i].start_datetime ? data[i].start_datetime : '', 'end' : data[i].end_datetime ? data[i].end_datetime : '', 'color' : colors[i % 7], 'resourceId' : data[i].id});
        }

        for(var i=0; i< dataRoom.length; i++) {
            resource_data.push({'id': dataRoom[i].id,'title': dataRoom[i].name});
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
            resourceLabelText: 'Booking No.',
            resources: resource_data,
        });

        jQuery(".fc-body .fc-resource-area .fc-scroller .fc-rows td").click(function() {

            getRoomID = $(this).parent().attr('data-resource-id');
            url = "{{ route('company.conference.conferenceBookings.create', array(''))}}/"+getRoomID;
            // alert($(this).parent().attr('data-resource-id'));
            location.href = url;
            // console.log(url);
        });



    </script>

@endsection

