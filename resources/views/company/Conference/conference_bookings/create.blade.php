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
                        <form action="{{ route('company.conference.conferenceBookings.store') }}" method="POST" id="bookingForm">

                            @include('company.Conference.conference_bookings.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection





@section('js')



<script type="text/javascript">




              // Initialize validator
              $('#bookingForm').validate({
                    
                    rules: {

                          'attendees': {
                            required: true,
                          },
                          'room_id': {
                            required: true,
                          },
                          'room_layout_id': {
                            required: true,
                          },
                          'duration_code': {
                            required: true,
                          },
                          'booking_status': {
                            required: true,
                          },
                          'payment_method_code': {
                            required: true,
                          },

                    },

                    messages: {
                          'attendees': {
                            required: "Please enter attendees",
                          },
                          'room_id': {
                            required: "Please select room",
                          },
                          'room_layout_id': {
                            required: "Please select room layout",
                          },
                          'duration_code': {
                            required: "Please select duration",
                          },
                          'booking_status': {
                            required: "Please select status",
                          },
                          'payment_method_code': {
                            required: "Please select pay method",
                          },
                    },

                    errorPlacement: function(error, element) {
                        var placement = $(element).parent().find('.errorTxt');
                        if (placement) {
                          $(placement).append(error)
                        } else {
                          error.insertAfter(element);
                        }
                    }

              });





          // ==============================================






          function totalPriceCalculations() {


              var room_price      = $('#room_price').val();
              var equipment_price = $('#equipment_price').val();
              var food_price      = $('#food_price').val();
              var package_price   = $('#package_price').val();
              var tax             = $('#tax').val();


              if (room_price != '') {
                room_price = $('#room_price').val();
              } else {
                room_price = 0;
              }


              if (equipment_price != '') {
                equipment_price = $('#equipment_price').val();
              } else {
                equipment_price = 0;
              }


              if (food_price != '') {
                food_price = $('#food_price').val();
              } else {
                food_price = 0;
              }


              if (package_price != '') {
                package_price = $('#package_price').val();
              } else {
                package_price = 0;
              }


              if (tax != '') {
                tax = $('#tax').val();
              } else {
                tax = 0;
              }


              // alert(room_price+ " . "+equipment_price+ " . "+food_price+ " . "+package_price+ " . "+tax);

              var totalPrice = parseFloat(room_price) + parseFloat(equipment_price) + parseFloat(food_price) + parseFloat(package_price);
              
              var totalPriceAfterTax = (parseFloat(totalPrice) / 100) * parseFloat(tax);

              var finalTotal = parseFloat(totalPriceAfterTax) + parseFloat(totalPrice);
              
              $('#total_price').val(parseFloat(finalTotal).toFixed(2));
          }



          // ==============================================











            // -------------------------------------------------------------------------
            // Initialize Select2


            $(function() {
              $('.select2-rooms').select2({
                placeholder: 'Select Room',
              })
            });

            $(function() {
              $('.select2-layouts').select2({
                placeholder: 'Select Room Layout',
              })
            });

            $(function() {
              $('.select2-duration').select2({
                placeholder: 'Select Duration',
              })
            });

            $(function() {
              $('.select2-status').select2({
                placeholder: 'Select Booking Status',
              })
            });

            $(function() {
              $('.select2-payment-methods').select2({
                placeholder: 'Select Payment Method',
              })
            });

            
          $('#booking_date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'MM/DD/YYYY'
            }
          },
          function(start, end, label) {

          });


            
          /*$('#start_datetime').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            },

             minDate:'04/23/2018',
             maxDate:'04/23/2018',
              // disabledDates: [new Date()],
            },
          function(start, end, label) {

          });
*/

       /* $('#start_datetime').timepicker({
                maxHours: 24
            });

        $('#end_datetime').timepicker({
                maxHours: 24
            });
*/


         /* $('#end_datetime').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: true,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            }            
          },
          function(start, end, label) {

          });*/

          var roomHourlyPrice;
          var roomDayPrice;
          var roomPrice = 0;


          function generateTimeFields() {

                  $('#start_datetime').remove();

                  var startTime = '<input type="text" id="start_datetime" placeholder="" value="" name="start_datetime" class="form-control">';

                  $('.start-time').append(startTime);

                  $('#start_datetime').timepicker({
                      maxHours: 24
                  });


                  $('#end_datetime').remove();

                  var endTime = '<input type="text" id="end_datetime" placeholder="" value="" name="end_datetime" class="form-control">';

                  $('.end-time').append(endTime);

                  $('#end_datetime').timepicker({
                      maxHours: 24
                  });
          }



          // ==============================================



          $(document).ready(function() {
              $('#duration-section').hide();
          });

          $("#room_id").on('change', function() {
              $('#duration-section').show();
          });



          // ==============================================




          function calculateRoomPrice(price, time) {

                // roomHourlyPrice = $("#room_id").find(':selected').attr('data-hour-price');
                roomHourlyPrice = price;

                var valuestart = $('#start_datetime').val();
                var valuestop = $('#end_datetime').val();

                // alert(valuestart);
                // alert(valuestop);

                if (time == "time") {
                  //create date format          
                  var timeStart = new Date("01/01/2007 " + valuestart).getHours();
                  var timeEnd = new Date("01/01/2007 " + valuestop).getHours();
                } else {
                  //create date format          
                  var timeStart = new Date("01/01/2007 " + valuestart).getDay();
                  var timeEnd = new Date("01/01/2007 " + valuestop).getDay();
                }

                var hourDiff = timeEnd - timeStart;  

                // alert(parseInt(hourDiff));
                // alert(parseFloat(roomHourlyPrice));

                roomPrice = (roomHourlyPrice*hourDiff);

                $('#room_price').val(parseFloat(roomPrice).toFixed(2));

                totalPriceCalculations();
          }




          // ==============================================




          $(document).timepicker().on('changeTime.timepicker', "#end_datetime", function(e) {

                roomHourlyPrice = $("#room_id").find(':selected').attr('data-hour-price');
                time = "time";
                calculateRoomPrice(roomHourlyPrice, time);

          });






          // ==============================================





          $("#duration_code").on('change', function() {

              roomDayPrice = $("#room_id").find(':selected').attr('data-day-price');
              durationCode = $(this).find(':selected').attr('data-duration-code');

              if (durationCode == "hour") {

                generateTimeFields();

              } else if (durationCode == "multiple_days") {

                  $('#start_datetime').remove();

                  var startTime = '<input type="text" id="start_datetime" placeholder="" value="" name="start_datetime" class="form-control">';

                  $('.start-time').append(startTime);

                  $('#start_datetime').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    timePicker: true,
                    locale: {
                        format: 'MM/DD/YYYY h:mm A'
                    },

                     minDate: new Date(),
                     // maxDate:'04/23/2018',
                      // disabledDates: [new Date()],
                    },
                  function(start, end, label) {

                  });


                  $('#end_datetime').remove();

                  var endTime = '<input type="text" id="end_datetime" placeholder="" value="" name="end_datetime" class="form-control">';

                  $('.end-time').append(endTime);

                  Date.prototype.addDays = function(days) {
                    var dat = new Date(this.valueOf());
                    dat.setDate(dat.getDate() + days);
                    return dat;
                  }

                  var dat = new Date();

                  $('#end_datetime').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    timePicker: true,
                    locale: {
                        format: 'MM/DD/YYYY h:mm A'
                    },

                    startDate: dat.addDays(1),
                    minDate: dat.addDays(1),
                     // maxDate:'04/23/2018',
                      // disabledDates: [new Date()],
                    },
                  
                  function(start, end, label) {

                  });

                roomPrice = (roomDayPrice*3);

              } else if (durationCode == "halfday_morning") {

                  generateTimeFields();

              } else if (durationCode == "halfday_afternoon") {

                  generateTimeFields();

              }

          });





          // ==============================================






          function equipmentCheckBoxUpdate() {

              var sumOfEqpPrice = 0;

              $('.equipment-check-box:checkbox:checked').each(function () {

                  var eqpid         = $(this).attr('data-eqpid');
                  var eqpprice      = $(this).attr('data-eqpprice');
                  var isMultiUnits  = $(this).attr('data-isMultiUnits');

                  // alert(isMultiUnits);


                  if (isMultiUnits != '1') {

                    sumOfEqpPrice += parseFloat(eqpprice);

                  } else {

                    eqpUnitsVal   = $(this).parent().parent().prev().children().children().val();
                    sumOfEqpPrice += parseFloat(eqpprice) * parseInt(eqpUnitsVal);

                  }

              });

              $('#equipment_price').val(parseFloat(sumOfEqpPrice).toFixed(2));
          }

          $(".equipment-check-box").on('change', function() {

              equipmentCheckBoxUpdate();
              totalPriceCalculations();



          });



          $(".eqpUnits").on('change', function() {

              equipmentCheckBoxUpdate();
              totalPriceCalculations();



          });





          // ==============================================





          function foodCheckBoxUpdate() {

              var sumOfFoodPrice = 0;

              $('.food-check-box:checkbox:checked').each(function () {

                  var foodid    = $(this).attr('data-foodid');
                  var foodprice = $(this).attr('data-foodprice');

                  foodUnitsVal    = $(this).parent().parent().prev().children().children().val();
                  sumOfFoodPrice += parseFloat(foodprice) * parseInt(foodUnitsVal);



              });


              $('#food_price').val(parseFloat(sumOfFoodPrice).toFixed(2));

          }

          $(".food-check-box").on('change', function() {

              foodCheckBoxUpdate();
              totalPriceCalculations();

          });


          $(".foodUnits").on('change', function() {

              foodCheckBoxUpdate();
              totalPriceCalculations();

          });



          // ==============================================




          function packageCheckBoxUpdate() {

              var sumOfpackagePrice = 0;

              $('.package-check-box:checkbox:checked').each(function () {

                  var packageid    = $(this).attr('data-packageid');
                  var packageprice = $(this).attr('data-packageprice');

                  packageUnitsVal    = $(this).parent().parent().prev().children().children().val();
                  sumOfpackagePrice += parseFloat(packageprice) * parseInt(packageUnitsVal);

              });

              $('#package_price').val(parseFloat(sumOfpackagePrice).toFixed(2));

          }

          $(".package-check-box").on('change', function() {

              packageCheckBoxUpdate();
              totalPriceCalculations();



          });


          $(".packageUnits").on('change', function() {

              packageCheckBoxUpdate();
              totalPriceCalculations();



          });




          // ==============================================







    </script>


@endsection


