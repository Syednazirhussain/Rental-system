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
                        <div class="panel-title">Booking Conference</div>
                    </div>
                    <div class="panel-body">


                        <ul class="nav nav-tabs">
                          <li class="active">
                            <a href="#BookingFormTab" data-toggle="tab">Booking</a>
                          </li>
                          <li>
                            <a href="#CustomerFormTab" data-toggle="tab">Customer</a>
                          </li>
                          <li>
                            <a href="#BillingFormTab" data-toggle="tab">Billing</a>
                          </li>
                        </ul>

                            <form action="{{ route('company.conference.conferenceBookings.store') }}" method="POST" id="bookingForm">

                                <div class="tab-content tab-content-bordered">
                                  <div class="tab-pane fade in active" id="BookingFormTab">
                                    @include('company.Conference.conference_bookings.fields')
                                  </div>
                                  <div class="tab-pane fade" id="CustomerFormTab">
                                    @include('company.Conference.conference_bookings.customer_form')
                                  </div>
                                  <div class="tab-pane fade" id="BillingFormTab">
                                    @include('company.Conference.conference_bookings.billing_form')
                                  </div>
                                  
                                </div>

                                                                
                                <div class="row">
                                    <div class="col-sm-12 m-t-3">
                                            <button id="submitBtn" type="submit" class="btn btn-primary">@if(isset($conferenceBooking))  <i class="fa fa-refresh"></i>  Update Booking  @else <i class="fa fa-plus"></i>  Add Booking @endif</button>
                                            <a href="{!! route('company.conference.conferenceBookings.index') !!}" class="btn btn-default"> <i class="fa fa-times"></i> Cancel</a>
                                    </div>
                                </div>


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

                    ignore: [],
                    
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
                          'deposit': {
                            required: true,
                          },

                          'customer_id': {
                            required: true,
                          },
                          'customer_address': {
                            required: true,
                          },
                          'customer_country': {
                            required: true,
                          },
                          'customer_state': {
                            required: true,
                          },
                          'customer_city': {
                            required: true,
                          },
                          'customer_post_code': {
                            required: true,
                          },
                          'customer_telephone': {
                            required: true,
                          },
                          'customer_mobile': {
                            required: true,
                          },
                          'customer_fax': {
                            required: true,
                          },
                          'customer_org_num': {
                            required: true,
                          },

                          'invoice_send': {
                            required: true,
                          },
                          'reference': {
                            required: true,
                          },
                          'contact_person': {
                            required: true,
                          },
                          'cost': {
                            required: true,
                          },
                          'payment_conditions': {
                            required: true,
                          },
                          'interest_fees': {
                            required: true,
                          },
                          'payment_reminder': {
                            required: true,
                          },
                          'remarks': {
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
                          'deposit': {
                            required: "Please enter deposit amount",
                          },
                          'remarks': {
                            required: "Please enter remarks",
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
              roomTax = $(this).find(':selected').attr('data-room-tax');
              $('#tax').val(roomTax);
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


          $(".eqpUnits").keyup(function() {

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



          $(".foodUnits").keyup(function() {

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


          $(".packageUnits").keyup(function() {

              packageCheckBoxUpdate();
              totalPriceCalculations();

          });




          // ==============================================
          // ==============================================
          // ==============================================
          // ======= ====== CUSTOMER FORM ======= ====== == 
          // ==============================================
          // ==============================================
          // ==============================================





            $(function() {
              $('.select2-customer').select2({
                placeholder: 'Select Customer',
              })
            });



            $(function() {
              $('.select2-country').select2({
                placeholder: 'Select country',
              })
            });



            $(function() {
              $('.select2-state').select2({
                placeholder: 'Select state',
              })
            });



            $(function() {
              $('.select2-city').select2({
                placeholder: 'Select city',
              })
            });


            $(function() {
              $('.select2-invoice_send').select2({
                placeholder: 'Select invoice send',
              })
            });



            $(function() {
              $('.select2-contact_person').select2({
                placeholder: 'Select contact person',
              })
            });



            $(function() {
              $('.select2-payment_conditions').select2({
                placeholder: 'Select payment conditions',
              })
            });



            $(function() {
              $('.select2-interest_fees').select2({
                placeholder: 'Select interest fees',
              })
            });



            $(function() {
              $('.select2-payment_reminder').select2({
                placeholder: 'Select payment reminder',
              })
            });






            $('#submitBtn').on('click', function() {


                // BOOKING FIELDS
                var room_id = $('#room_id').val();
                var room_layout_id = $('#room_layout_id').val();
                var booking_status = $('#booking_status').val();
                var payment_method_code = $('#payment_method_code').val();



                // CUSTOMER FIELDS
                var customer_id = $('#customer_id').val();
                var customer_address = $('#customer_address').val();
                var customer_country = $('#customer_country').val();
                var customer_state = $('#customer_state').val();
                var customer_city = $('#customer_city').val();
                var customer_post_code = $('#customer_post_code').val();
                var customer_telephone = $('#customer_telephone').val();
                var customer_mobile = $('#customer_mobile').val();
                var customer_fax = $('#customer_fax').val();
                var customer_org_num = $('#customer_org_num').val();



                // BILLING FIELDS
                var invoice_send = $('#invoice_send').val();
                var reference = $('#reference').val();
                var contact_person = $('#contact_person').val();
                var cost = $('#cost').val();
                var payment_conditions = $('#payment_conditions').val();
                var interest_fees = $('#interest_fees').val();
                var payment_reminder = $('#payment_reminder').val();




                if(room_id == '' || room_layout_id == '' || booking_status == '' || payment_method_code == '' ) {

                    $('ul.nav-tabs li:first-child').addClass('active');
                    $('ul.nav-tabs li:nth-child(2)').removeClass('active');
                    $('ul.nav-tabs li:nth-child(3)').removeClass('active');

                    $('#BookingFormTab').addClass('active in');
                    $('#CustomerFormTab').removeClass('active in');
                    $('#BillingFormTab').removeClass('active in');

                } else if (customer_id == '' || customer_address == '' || customer_country == '' || customer_state == '' || customer_city == '' || customer_post_code == '' || customer_telephone == '' || customer_mobile == '' || customer_fax == '' || customer_org_num == '') {

                    $('ul.nav-tabs li:first-child').removeClass('active');
                    $('ul.nav-tabs li:nth-child(2)').addClass('active');
                    $('ul.nav-tabs li:nth-child(3)').removeClass('active');

                    $('#BookingFormTab').removeClass('active in');
                    $('#CustomerFormTab').addClass('active in');
                    $('#BillingFormTab').removeClass('active in');

                } else if (invoice_send == '' || reference == '' || contact_person == '' || cost == '' || payment_conditions == '' || interest_fees == '' || payment_reminder == '') {

                    $('ul.nav-tabs li:first-child').removeClass('active');
                    $('ul.nav-tabs li:nth-child(2)').removeClass('active');
                    $('ul.nav-tabs li:nth-child(3)').addClass('active');

                    $('#BookingFormTab').removeClass('active in');
                    $('#CustomerFormTab').removeClass('active in');
                    $('#BillingFormTab').addClass('active in');

                }

            });








    </script>


@endsection


