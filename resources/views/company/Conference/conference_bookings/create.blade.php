@extends('company.default')


@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Conference Bookings / </span>Add Conference Booking</h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Conference Booking</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.conference.conferenceBookings.store') }}" method="POST" id="">

                            @include('company.Conference.conference_bookings.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')


    <script>

            // -------------------------------------------------------------------------
            // Initialize Select2

            $(function() {
              $('.select2').select2({
                placeholder: 'Select value',
              });
            });


            
          $('#booking_date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            }
          },
          function(start, end, label) {

          });


            
          $('#start_dateime').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            }            
          },
          function(start, end, label) {

          });



          $('#end_datetime').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            }            
          },
          function(start, end, label) {

          });


    </script>


@endsection


