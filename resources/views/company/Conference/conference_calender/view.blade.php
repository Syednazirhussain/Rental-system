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

                        <div id='calendar'></div>
                        
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

            $('#calendar').fullCalendar({
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
                },
                {
                  title: 'Long Event',
                  start: '2018-03-07',
                  end: '2018-03-10'
                },
                {
                  id: 999,
                  title: 'Repeating Event',
                  start: '2018-03-09T16:00:00'
                },
                {
                  id: 999,
                  title: 'Repeating Event',
                  start: '2018-03-16T16:00:00'
                },
                {
                  title: 'Conference',
                  start: '2018-03-11',
                  end: '2018-03-13'
                },
                {
                  title: 'Meeting',
                  start: '2018-03-12T10:30:00',
                  end: '2018-03-12T12:30:00'
                },
                {
                  title: 'Lunch',
                  start: '2018-03-12T12:00:00'
                },
                {
                  title: 'Meeting',
                  start: '2018-03-12T14:30:00'
                },
                {
                  title: 'Happy Hour',
                  start: '2018-03-12T17:30:00'
                },
                {
                  title: 'Dinner',
                  start: '2018-03-12T20:00:00'
                },
                {
                  title: 'Birthday Party',
                  start: '2018-03-13T07:00:00'
                },
                {
                  title: 'Click for Google',
                  url: 'http://google.com/',
                  start: '2018-03-28'
                }
              ]
            });

          });

    </script>

@endsection

