



@extends('company.default')


@section('content')


     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Conference Bookings / </span>Edit Booking # {{$conferenceBooking->id}}</h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit Booking # {{$conferenceBooking->id}}</div>
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
                          <li>
                            <a href="#ArticlesFormTab" data-toggle="tab">Articles</a>
                          </li>
                          <li>
                            <a href="#draftFormTab" data-toggle="tab">Draft</a>
                          </li>

                          <li>
                            <a href="#signageFormTab" data-toggle="tab">Signage</a>
                          </li>
                        </ul>

                            <form action="{{ route('company.conference.conferenceBookings.update', $conferenceBooking->id) }}" method="POST" id=""  enctype="multipart/form-data">

                            <input type="hidden" name="_method" value="PATCH">

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
                                  <div class="tab-pane fade" id="ArticlesFormTab">
                                    @include('company.Conference.conference_bookings.articles_form')
                                  </div>  
                                  <div class="tab-pane fade" id="draftFormTab">
                                    @include('company.Conference.conference_bookings.draft_form')

                                  </div>      
                                  <div class="tab-pane fade" id="signageFormTab">
                                    @include('company.Conference.conference_bookings.signage_form')

                                  </div>                              
                                </div>
                                                                
                                <div class="row">
                                    <div class="col-sm-12 m-t-3">
                                            <button type="submit" class="btn btn-primary">@if(isset($conferenceBooking))  <i class="fa fa-refresh"></i>  Update   @else <i class="fa fa-plus"></i>  Add Booking @endif</button>
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

                          'booking_type': {
                            required: true,
                          },
                          'cancellation_policy': {
                            required: true,
                          },
                          'booking_category': {
                            required: true,
                          },
                          'booking_color': {
                            required: true,
                          },
                          'signage': {
                            required: true,
                          },
                          'customer_in_place': {
                            required: true,
                          },
                          'contact_person_in_place': {
                            required: true,
                          },
                          'event_name': {
                            required: true,
                          },
                          'telephone_number': {
                            required: true,
                          },
                          'email_address': {
                            required: true,
                          },
                          'project_leader': {
                            required: true,
                          },
                          'other_personal': {
                            required: true,
                          },
                          'sales_person': {
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

            $(function() {
              $('.select2-type').select2({
                placeholder: 'Select Booking Type',
              })
            });

            $(function() {
              $('.select2-policy').select2({
                placeholder: 'Select Cancellation Policy',
              })
            });

            $(function() {
              $('.select2-category').select2({
                placeholder: 'Select Booking Category',
              })
            });

            $(function() {
              $('.select2-agency').select2({
                placeholder: 'Select Booking Agency',
              })
            });

            $(function() {
              $('.select2-color').select2({
                placeholder: 'Select Booking Color',
              })
            });

            $(function() {
              $('.select2-signage').select2({
                placeholder: 'Select Signage',
              })
            });


            $('#project_time').timepicker({
                      maxHours: 24

                  });

            $('#writer_time').timepicker({
                      maxHours: 24

                  });

            $('#clearing_time').timepicker({
                      maxHours: 24

                  });

            $('#furnishing_time').timepicker({
                      maxHours: 24

                  });

            $('#first_person_time').timepicker({
                      maxHours: 24

                  });

            $('#guest_arrival').timepicker({
                      maxHours: 24

                  });

            $('#morning_coffee').timepicker({
                      maxHours: 24

                  });

            $('#meeting_start').timepicker({
                      maxHours: 24

                  });

            $('#lunch').timepicker({
                      maxHours: 24

                  });

            $('#after_noon_coffee').timepicker({
                      maxHours: 24

                  });

            $('#meeting_end').timepicker({
                      maxHours: 24

                  });

            $('#dinner').timepicker({
                      maxHours: 24

                  });

            $('#party').timepicker({
                      maxHours: 24

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
                      maxHours: 24,
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
              $('#duration-section').show();
              durationCode = $('#duration-section').find(':selected').attr('data-duration-code');
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





          $(document).ready(function() {

              roomDayPrice = $("#room_id").find(':selected').attr('data-day-price');
              durationCode = $("#duration_code").find(':selected').attr('data-duration-code');

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



            $(function() {
              $('.select2-reference').select2({
                placeholder: 'Select reference',
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



                // DRAFT FIELDS
                var booking_type = $('#booking_type').val();
                var cancellation_policy = $('#cancellation_policy').val();
                var booking_category = $('#booking_category').val();
                var booking_color = $('#booking_color').val();
                var signage = $('#signage').val();
                var customer_in_place = $('#customer_in_place').val();
                var contact_person_in_place = $('#contact_person_in_place').val();
                var event_name = $('#event_name').val();
                var telephone_number = $('#telephone_number').val();
                var email_address = $('#email_address').val();
                var project_leader = $('#project_leader').val();
                var other_personal = $('#other_personal').val();
                var sales_person = $('#sales_person').val();




                if(room_id == '' || room_layout_id == '' || booking_status == '' || payment_method_code == '' ) {

                    $('ul.nav-tabs li:first-child').addClass('active');
                    $('ul.nav-tabs li:nth-child(2)').removeClass('active');
                    $('ul.nav-tabs li:nth-child(3)').removeClass('active');
                    $('ul.nav-tabs li:nth-child(4)').removeClass('active');
                    $('ul.nav-tabs li:nth-child(5)').removeClass('active');

                    $('#BookingFormTab').addClass('active in');
                    $('#CustomerFormTab').removeClass('active in');
                    $('#BillingFormTab').removeClass('active in');
                    $('#ArticlesFormTab').removeClass('active in');
                    $('#draftFormTab').removeClass('active in');

                } else if (customer_id == '' || customer_address == '' || customer_country == '' || customer_state == '' || customer_city == '' || customer_post_code == '' || customer_telephone == '' || customer_mobile == '' || customer_fax == '' || customer_org_num == '') {

                    $('ul.nav-tabs li:first-child').removeClass('active');
                    $('ul.nav-tabs li:nth-child(2)').addClass('active');
                    $('ul.nav-tabs li:nth-child(3)').removeClass('active');
                    $('ul.nav-tabs li:nth-child(4)').removeClass('active');
                    $('ul.nav-tabs li:nth-child(5)').removeClass('active');

                    $('#BookingFormTab').removeClass('active in');
                    $('#CustomerFormTab').addClass('active in');
                    $('#BillingFormTab').removeClass('active in');
                    $('#ArticlesFormTab').removeClass('active in');
                    $('#draftFormTab').removeClass('active in');

                } else if (invoice_send == '' || contact_person == '' || cost == '' || payment_conditions == '' || interest_fees == '' || payment_reminder == '') {

                    $('ul.nav-tabs li:first-child').removeClass('active');
                    $('ul.nav-tabs li:nth-child(2)').removeClass('active');
                    $('ul.nav-tabs li:nth-child(3)').addClass('active');
                    $('ul.nav-tabs li:nth-child(4)').removeClass('active');
                    $('ul.nav-tabs li:nth-child(5)').removeClass('active');

                    $('#BookingFormTab').removeClass('active in');
                    $('#CustomerFormTab').removeClass('active in');
                    $('#BillingFormTab').addClass('active in');
                    $('#ArticlesFormTab').removeClass('active in');
                    $('#draftFormTab').removeClass('active in');

                } else if (booking_type == '' || cancellation_policy == '' || booking_category == '' || booking_color == '' || signage == '' || customer_in_place == '' || contact_person_in_place == '' || event_name == '' || telephone_number == '' || email_address == '' || project_leader == '' || other_personal == '' || sales_person == '') {

                    $('ul.nav-tabs li:first-child').removeClass('active');
                    $('ul.nav-tabs li:nth-child(2)').removeClass('active');
                    $('ul.nav-tabs li:nth-child(3)').removeClass('active');
                    $('ul.nav-tabs li:nth-child(4)').removeClass('active');
                    $('ul.nav-tabs li:nth-child(5)').addClass('active');

                    $('#BookingFormTab').removeClass('active in');
                    $('#CustomerFormTab').removeClass('active in');
                    $('#BillingFormTab').removeClass('active in');
                    $('#ArticlesFormTab').removeClass('active in');
                    $('#draftFormTab').addClass('active in');


                }

            });

   function isEmpty(val)
   {
       return (val === undefined || val == null || val.length <= 0) ? true : false;
   }

  var editRoom = "{{ isset($conferenceBooking) ? $conferenceBooking->id: 0 }}";

  var user_id = "{{ auth()->guard('company')->user()->id  }}";


  if(editRoom != 0)
  {


/* Conference Booking notes works start   */

    $('#popup-BookingNotes').on("click",function(){
       $('.error').empty();
       $('#popup-modalBtnBookingNotes').text("Add");
       $('#Editor-bookingNotes').val("");
    });

    var popupEditBookingNotesId;
    var currentOperationBookingNotes = 0;

    $(document).on('click','.BookingNoteEdit-popup',function(){
       $('.error').empty();
       currentOperationBookingNotes = 1;
       popupEditBookingNotesId = $(this).attr('data-userBookingNote');

       var url = "{{ route('company.editBookingNotes', array("")) }}/"+popupEditBookingNotesId;

       $.ajax({
          url  : url,
          type : "GET",
          success : function(response){
             if(response.hasOwnProperty("status"))
             {
                alert(response.msg);
             }
             else
             {
                $('#popup-modal-BookingNotes').modal('toggle');
                $('#Editor-bookingNotes').val(response.note);
                $('#popup-modalBtnBookingNotes').text("Update");
             }
          }
       });
    });

    $(document).on('click','#popup-modalBtnBookingNotes',function(){
       
       
       if(currentOperationBookingNotes == 1)
       {
          var textEditor = $('#Editor-bookingNotes').val();

          if(isEmpty(textEditor))
          {
             //alert("Please provide some content");
             $('.error').text("Please provide some content");
          }
          else if(textEditor.length > 500)
          {
             // alert("Please enter characters between 1 to 100");
             $('.error').text("Please enter characters between 1 to 500");
          }
          else
          {
             var jsObj = {
                'conferenceBookingId' : editRoom,
                'note'   : textEditor,
                'code' : 'booking_note'
             };
             
             var url = "{{ route('company.updateBookingNotes', array("")) }}/"+popupEditBookingNotesId;


             $.ajax({
                url  : url,
                type : "PUT",
                data : jsObj,
                success : function(response){
                   if(response.hasOwnProperty("status"))
                   {
                      alert(response.msg);
                   }
                   else
                   {
                      currentOperationBookingNotes = 0;
                      $('#Editor-bookingNotes').val("");

                       var jsObjB = {
                          'conferenceBookingId' : editRoom,
                          'code'        : 'booking_note'
                       };

                       $.post("{{ route('company.getBookingNotes') }}",jsObjB,function(response){
                          if(response.hasOwnProperty("status"))
                          {
                             var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                             $('#log-BookingNotes').html(html);
                          }
                          else
                          {
                             var html = '';
                             var created_at;
                             var updated_at;
                             for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
                             {
                                created_at = new Date(response.conferenceBookingNotes[i].created_at);
                                updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                                if(user_id == response.conferenceBookingNotes[i].user_id)
                                {
                                   html += '<tr>';
                                   for(var j = 0 ; j < response.users.length ; j++)
                                   {
                                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                      {
                                         html += '<td>'+response.users[j].name+'</td>';
                                         break;
                                      }
                                      
                                   }
                                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg BookingNoteEdit-popup" data-userBookingNote="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg BookingNoteDelete-popup" data-userBookingNote="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                                   html += '</tr>';
                                }
                                else
                                {
                                   html += '<tr>';
                                   for(var j = 0 ; j < response.users.length ; j++)
                                   {
                                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                      {
                                         html += '<td>'+response.users[j].name+'</td>';
                                         break;
                                      }
                                      
                                   }
                                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '</tr>';
                                }
                             }
                             html += '</tbody>';
                             html += '</table>'; 
                             $('#log-BookingNotes').html('');               
                             $('#log-BookingNotes').html(html);               
                          }
                       });

                      $("#popup-modal-BookingNotes .close").click();
                   }
                } 
             });

          }
       }
       else
       {
          var note = $('#Editor-bookingNotes').val();

          if(isEmpty(note))
          {
             // alert("Please provide some content");
             $('.error').text("Please provide some content");
          }
          else if(note.length > 500)
          {
             // alert("Please enter characters between 1 to 100");
             $('.error').text("Please enter characters between 1 to 500");
          }
          else
          {
             var jsObj = {
                'conferenceBookingId' : editRoom,
                'note' : note,
                'code' : 'booking_note' 
             };

             $.ajax({
                url : "{{ route('company.createBookingNotes') }}",
                type : "POST",
                data : jsObj,
                dataType : "json",
                success : function(response){
                   if(response.hasOwnProperty("status"))
                   {
                      alert(response.msg);
                   }
                   else
                   {
                      $('#Editor-bookingNotes').val("");

                       var jsObjB = {
                          'conferenceBookingId' : editRoom,
                          'code'        : 'booking_note'
                       };

                       $.post("{{ route('company.getBookingNotes') }}",jsObjB,function(response){
                          if(response.hasOwnProperty("status"))
                          {
                             var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                             $('#log-BookingNotes').html(html);
                          }
                          else
                          {
                             var html = '';
                             var created_at;
                             var updated_at;
                             for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
                             {
                                created_at = new Date(response.conferenceBookingNotes[i].created_at);
                                updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                                if(user_id == response.conferenceBookingNotes[i].user_id)
                                {
                                   html += '<tr>';
                                   for(var j = 0 ; j < response.users.length ; j++)
                                   {
                                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                      {
                                         html += '<td>'+response.users[j].name+'</td>';
                                         break;
                                      }
                                      
                                   }
                                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg BookingNoteEdit-popup" data-userBookingNote="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg BookingNoteDelete-popup" data-userBookingNote="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                                   html += '</tr>';
                                }
                                else
                                {
                                   html += '<tr>';
                                   for(var j = 0 ; j < response.users.length ; j++)
                                   {
                                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                      {
                                         html += '<td>'+response.users[j].name+'</td>';
                                         break;
                                      }
                                      
                                   }
                                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '</tr>';
                                }
                             }
                             html += '</tbody>';
                             html += '</table>'; 
                             $('#log-BookingNotes').html('');               
                             $('#log-BookingNotes').html(html);               
                          }
                       });

                      $("#popup-modal-BookingNotes .close").click();

                   }
                }
             });
          }
       }
    });

    $(document).on('click','.BookingNoteDelete-popup',function(){

       if( confirm("Are you sure you want to delete this record!") ) 
       {
          var bookingNoteId = $(this).attr('data-userBookingNote');

          var url = "{{ route('company.deleteBookingNotes', array("")) }}/"+bookingNoteId;

          $.ajax({
             url : url,
             type : "DELETE",
             success : function(response){
                if(response.hasOwnProperty("status"))
                {
                   alert(response.msg);
                }
                else
                {

                   var jsObjB = {
                      'conferenceBookingId' : editRoom,
                      'code'        : 'booking_note'
                   };

                   $.post("{{ route('company.getBookingNotes') }}",jsObjB,function(response){
                      if(response.hasOwnProperty("status"))
                      {
                         var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                         $('#log-BookingNotes').html(html);
                      }
                      else
                      {
                         var html = '';
                         var created_at;
                         var updated_at;
                         for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
                         {
                            created_at = new Date(response.conferenceBookingNotes[i].created_at);
                            updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                            if(user_id == response.conferenceBookingNotes[i].user_id)
                            {
                               html += '<tr>';
                               for(var j = 0 ; j < response.users.length ; j++)
                               {
                                  if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                  {
                                     html += '<td>'+response.users[j].name+'</td>';
                                     break;
                                  }
                                  
                               }
                               html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                               html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                               html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                               html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg BookingNoteEdit-popup" data-userBookingNote="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg BookingNoteDelete-popup" data-userBookingNote="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                               html += '</tr>';
                            }
                            else
                            {
                               html += '<tr>';
                               for(var j = 0 ; j < response.users.length ; j++)
                               {
                                  if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                  {
                                     html += '<td>'+response.users[j].name+'</td>';
                                     break;
                                  }
                                  
                               }
                               html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                               html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                               html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                               html += '</tr>';
                            }
                         }
                         html += '</tbody>';
                         html += '</table>'; 
                         $('#log-BookingNotes').html('');               
                         $('#log-BookingNotes').html(html);               
                      }
                   });

                }
             }
          });
       } 
    });


/* Conference Booking notes works end   */



/* Internal Communication Notes work start */


    $('#popup-InternalCommunication').on("click",function(){
       $('.error').empty();
       $('#popup-modalBtnInternalCommunication').text("Add");
       $('#Editor-InternalCommunication').val("");
    });

    var popupEditICNotesId;
    var currentOperationICNotes = 0;

    $(document).on('click','.InternalCommunicationNotesEdit-popup',function(){
       $('.error').empty();
       currentOperationICNotes = 1;
       popupEditICNotesId = $(this).attr('data-userInternalCommunicationNotes');

       var url = "{{ route('company.editBookingNotes', array("")) }}/"+popupEditICNotesId;

       $.ajax({
          url  : url,
          type : "GET",
          success : function(response){
             if(response.hasOwnProperty("status"))
             {
                alert(response.msg);
             }
             else
             {
                $('#popup-modal-InternalCommunication').modal('toggle');
                $('#Editor-InternalCommunication').val(response.note);
                $('#popup-modalBtnInternalCommunication').text("Update");
             }
          }
       });
    });

    $(document).on('click','#popup-modalBtnInternalCommunication',function(){
       
       
       if(currentOperationICNotes == 1)
       {
          var textEditor = $('#Editor-InternalCommunication').val();

          if(isEmpty(textEditor))
          {
             //alert("Please provide some content");
             $('.error').text("Please provide some content");
          }
          else if(textEditor.length > 500)
          {
             // alert("Please enter characters between 1 to 100");
             $('.error').text("Please enter characters between 1 to 500");
          }
          else
          {
             var jsObj = {
                'conferenceBookingId' : editRoom,
                'note'   : textEditor,
                'code' : 'internal_communication'
             };
             
             var url = "{{ route('company.updateBookingNotes', array("")) }}/"+popupEditICNotesId;


             $.ajax({
                url  : url,
                type : "PUT",
                data : jsObj,
                success : function(response){
                   if(response.hasOwnProperty("status"))
                   {
                      alert(response.msg);
                   }
                   else
                   {
                      currentOperationICNotes = 0;
                      $('#Editor-InternalCommunication').val("");

                       var jsObj = {
                          'conferenceBookingId' : editRoom,
                          'code'        : 'internal_communication'
                       };

                       $.post("{{ route('company.getBookingNotes') }}",jsObj,function(response){
                          if(response.hasOwnProperty("status"))
                          {
                             var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                             $('#log-InternalCommunicationNotes').html(html);
                          }
                          else
                          {
                             var html = '';
                             var created_at;
                             var updated_at;
                             for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
                             {
                                created_at = new Date(response.conferenceBookingNotes[i].created_at);
                                updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                                if(user_id == response.conferenceBookingNotes[i].user_id)
                                {
                                   html += '<tr>';
                                   for(var j = 0 ; j < response.users.length ; j++)
                                   {
                                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                      {
                                         html += '<td>'+response.users[j].name+'</td>';
                                         break;
                                      }
                                      
                                   }
                                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg InternalCommunicationNotesEdit-popup" data-userInternalCommunicationNotes="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg InternalCommunicationNotesDelete-popup" data-userInternalCommunicationNotes="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                                   html += '</tr>';
                                }
                                else
                                {
                                   html += '<tr>';
                                   for(var j = 0 ; j < response.users.length ; j++)
                                   {
                                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                      {
                                         html += '<td>'+response.users[j].name+'</td>';
                                         break;
                                      }
                                      
                                   }
                                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '</tr>';
                                }
                             }
                             html += '</tbody>';
                             html += '</table>'; 
                             $('#log-InternalCommunicationNotes').html('');               
                             $('#log-InternalCommunicationNotes').html(html);               
                          }
                       });

                      $("#popup-modal-InternalCommunication .close").click();
                   }
                } 
             });

          }
       }
       else
       {
          var note = $('#Editor-InternalCommunication').val();

          if(isEmpty(note))
          {
             // alert("Please provide some content");
             $('.error').text("Please provide some content");
          }
          else if(note.length > 500)
          {
             // alert("Please enter characters between 1 to 100");
             $('.error').text("Please enter characters between 1 to 500");
          }
          else
          {
             var jsObj = {
                'conferenceBookingId' : editRoom,
                'note' : note,
                'code' : 'internal_communication' 
             };

             $.ajax({
                url : "{{ route('company.createBookingNotes') }}",
                type : "POST",
                data : jsObj,
                dataType : "json",
                success : function(response){
                   if(response.hasOwnProperty("status"))
                   {
                      alert(response.msg);
                   }
                   else
                   {
                      $('#Editor-InternalCommunication').val("");

                       var jsObj = {
                          'conferenceBookingId' : editRoom,
                          'code'        : 'internal_communication'
                       };

                       $.post("{{ route('company.getBookingNotes') }}",jsObj,function(response){
                          if(response.hasOwnProperty("status"))
                          {
                             var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                             $('#log-InternalCommunicationNotes').html(html);
                          }
                          else
                          {
                             var html = '';
                             var created_at;
                             var updated_at;
                             for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
                             {
                                created_at = new Date(response.conferenceBookingNotes[i].created_at);
                                updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                                if(user_id == response.conferenceBookingNotes[i].user_id)
                                {
                                   html += '<tr>';
                                   for(var j = 0 ; j < response.users.length ; j++)
                                   {
                                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                      {
                                         html += '<td>'+response.users[j].name+'</td>';
                                         break;
                                      }
                                      
                                   }
                                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg InternalCommunicationNotesEdit-popup" data-userInternalCommunicationNotes="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg InternalCommunicationNotesDelete-popup" data-userInternalCommunicationNotes="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                                   html += '</tr>';
                                }
                                else
                                {
                                   html += '<tr>';
                                   for(var j = 0 ; j < response.users.length ; j++)
                                   {
                                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                      {
                                         html += '<td>'+response.users[j].name+'</td>';
                                         break;
                                      }
                                      
                                   }
                                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                   html += '</tr>';
                                }
                             }
                             html += '</tbody>';
                             html += '</table>'; 
                             $('#log-InternalCommunicationNotes').html('');               
                             $('#log-InternalCommunicationNotes').html(html);               
                          }
                       });


                      $("#popup-modal-InternalCommunication .close").click();

                   }
                }
             });
          }
       }
    });

    $(document).on('click','.InternalCommunicationNotesDelete-popup',function(){

       if( confirm("Are you sure you want to delete this record!") ) 
       {
          var NoteId = $(this).attr('data-userInternalCommunicationNotes');

          var url = "{{ route('company.deleteBookingNotes', array("")) }}/"+NoteId;

          $.ajax({
             url : url,
             type : "DELETE",
             success : function(response){
                if(response.hasOwnProperty("status"))
                {
                   alert(response.msg);
                }
                else
                {

                 var jsObj = {
                    'conferenceBookingId' : editRoom,
                    'code'        : 'internal_communication'
                 };

                 $.post("{{ route('company.getBookingNotes') }}",jsObj,function(response){
                    if(response.hasOwnProperty("status"))
                    {
                       var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                       $('#log-InternalCommunicationNotes').html(html);
                    }
                    else
                    {
                       var html = '';
                       var created_at;
                       var updated_at;
                       for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
                       {
                          created_at = new Date(response.conferenceBookingNotes[i].created_at);
                          updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                          if(user_id == response.conferenceBookingNotes[i].user_id)
                          {
                             html += '<tr>';
                             for(var j = 0 ; j < response.users.length ; j++)
                             {
                                if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                {
                                   html += '<td>'+response.users[j].name+'</td>';
                                   break;
                                }
                                
                             }
                             html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                             html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                             html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                             html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg InternalCommunicationNotesEdit-popup" data-userInternalCommunicationNotes="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg InternalCommunicationNotesDelete-popup" data-userInternalCommunicationNotes="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                             html += '</tr>';
                          }
                          else
                          {
                             html += '<tr>';
                             for(var j = 0 ; j < response.users.length ; j++)
                             {
                                if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                {
                                   html += '<td>'+response.users[j].name+'</td>';
                                   break;
                                }
                                
                             }
                             html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                             html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                             html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                             html += '</tr>';
                          }
                       }
                       html += '</tbody>';
                       html += '</table>'; 
                       $('#log-InternalCommunicationNotes').html('');               
                       $('#log-InternalCommunicationNotes').html(html);               
                    }
                 });

                }
             }
          });
       } 
    });


/* Internal Communication notes works end  */



    $('#popup-Customer').on("click",function(){
       $('.error').empty();
       $('#popup-modalBtnCustomer').text("Add");
       $('#Editor-Customer').val("");
    });

    var popupEditCNotesId;
    var currentOperationCNotes = 0;

    $(document).on('click','.CustomerNotesEdit-popup',function(){
       $('.error').empty();
       currentOperationCNotes = 1;
       popupEditCNotesId = $(this).attr('data-userCustomerNotes');

       var url = "{{ route('company.editBookingNotes', array("")) }}/"+popupEditCNotesId;

       $.ajax({
          url  : url,
          type : "GET",
          success : function(response){
             if(response.hasOwnProperty("status"))
             {
                alert(response.msg);
             }
             else
             {
                $('#popup-modal-Customer').modal('toggle');
                $('#Editor-Customer').val(response.note);
                $('#popup-modalBtnCustomer').text("Update");
             }
          }
       });
    });

    $(document).on('click','#popup-modalBtnCustomer',function(){
       
       
       if(currentOperationCNotes == 1)
       {
          var textEditor = $('#Editor-Customer').val();

          if(isEmpty(textEditor))
          {
             //alert("Please provide some content");
             $('.error').text("Please provide some content");
          }
          else if(textEditor.length > 500)
          {
             // alert("Please enter characters between 1 to 100");
             $('.error').text("Please enter characters between 1 to 500");
          }
          else
          {
             var jsObj = {
                'conferenceBookingId' : editRoom,
                'note'   : textEditor,
                'code' : 'customer'
             };
             
             var url = "{{ route('company.updateBookingNotes', array("")) }}/"+popupEditCNotesId;


             $.ajax({
                url  : url,
                type : "PUT",
                data : jsObj,
                success : function(response){
                   if(response.hasOwnProperty("status"))
                   {
                      alert(response.msg);
                   }
                   else
                   {
                      currentOperationCNotes = 0;
                      $('#Editor-Customer').val("");

                      var jsObjC = {
                        'conferenceBookingId' : editRoom,
                        'code'        : 'customer'
                     };

                     $.post("{{ route('company.getBookingNotes') }}",jsObjC,function(response){
                        if(response.hasOwnProperty("status"))
                        {
                           var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                           $('#log-Customer').html(html);
                        }
                        else
                        {
                           var html = '';
                           var created_at;
                           var updated_at;
                           for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
                           {
                              created_at = new Date(response.conferenceBookingNotes[i].created_at);
                              updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                              if(user_id == response.conferenceBookingNotes[i].user_id)
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                 html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg CustomerNotesEdit-popup" data-userCustomerNotes="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg CustomerNotesDelete-popup" data-userCustomerNotes="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                                 html += '</tr>';
                              }
                              else
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                 html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '</tr>';
                              }
                           }
                           html += '</tbody>';
                           html += '</table>'; 
                           $('#log-Customer').html('');               
                           $('#log-Customer').html(html);               
                        }
                     });

                      $("#popup-modal-Customer .close").click();
                   }
                } 
             });

          }
       }
       else
       {
          var note = $('#Editor-Customer').val();

          if(isEmpty(note))
          {
             // alert("Please provide some content");
             $('.error').text("Please provide some content");
          }
          else if(note.length > 500)
          {
             // alert("Please enter characters between 1 to 100");
             $('.error').text("Please enter characters between 1 to 500");
          }
          else
          {
             var jsObj = {
                'conferenceBookingId' : editRoom,
                'note' : note,
                'code' : 'customer' 
             };

             $.ajax({
                url : "{{ route('company.createBookingNotes') }}",
                type : "POST",
                data : jsObj,
                dataType : "json",
                success : function(response){
                   if(response.hasOwnProperty("status"))
                   {
                      alert(response.msg);
                   }
                   else
                   {
                      $('#Editor-Customer').val("");

                      var jsObjC = {
                        'conferenceBookingId' : editRoom,
                        'code'        : 'customer'
                     };

                     $.post("{{ route('company.getBookingNotes') }}",jsObjC,function(response){
                        if(response.hasOwnProperty("status"))
                        {
                           var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                           $('#log-Customer').html(html);
                        }
                        else
                        {
                           var html = '';
                           var created_at;
                           var updated_at;
                           for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
                           {
                              created_at = new Date(response.conferenceBookingNotes[i].created_at);
                              updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                              if(user_id == response.conferenceBookingNotes[i].user_id)
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                 html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg CustomerNotesEdit-popup" data-userCustomerNotes="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg CustomerNotesDelete-popup" data-userCustomerNotes="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                                 html += '</tr>';
                              }
                              else
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                 html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '</tr>';
                              }
                           }
                           html += '</tbody>';
                           html += '</table>'; 
                           $('#log-Customer').html('');               
                           $('#log-Customer').html(html);               
                        }
                     });


                      $("#popup-modal-Customer .close").click();

                   }
                }
             });
          }
       }
    });

    $(document).on('click','.CustomerNotesDelete-popup',function(){

       if( confirm("Are you sure you want to delete this record!") ) 
       {
          var NoteId = $(this).attr('data-userCustomerNotes');

          var url = "{{ route('company.deleteBookingNotes', array("")) }}/"+NoteId;

          $.ajax({
             url : url,
             type : "DELETE",
             success : function(response){
                if(response.hasOwnProperty("status"))
                {
                   alert(response.msg);
                }
                else
                {

                  var jsObjC = {
                    'conferenceBookingId' : editRoom,
                    'code'        : 'customer'
                 };

                 $.post("{{ route('company.getBookingNotes') }}",jsObjC,function(response){
                    if(response.hasOwnProperty("status"))
                    {
                       var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                       $('#log-Customer').html(html);
                    }
                    else
                    {
                       var html = '';
                       var created_at;
                       var updated_at;
                       for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
                       {
                          created_at = new Date(response.conferenceBookingNotes[i].created_at);
                          updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                          if(user_id == response.conferenceBookingNotes[i].user_id)
                          {
                             html += '<tr>';
                             for(var j = 0 ; j < response.users.length ; j++)
                             {
                                if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                {
                                   html += '<td>'+response.users[j].name+'</td>';
                                   break;
                                }
                                
                             }
                             html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                             html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                             html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                             html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg CustomerNotesEdit-popup" data-userCustomerNotes="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg CustomerNotesDelete-popup" data-userCustomerNotes="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                             html += '</tr>';
                          }
                          else
                          {
                             html += '<tr>';
                             for(var j = 0 ; j < response.users.length ; j++)
                             {
                                if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                {
                                   html += '<td>'+response.users[j].name+'</td>';
                                   break;
                                }
                                
                             }
                             html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                             html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                             html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                             html += '</tr>';
                          }
                       }
                       html += '</tbody>';
                       html += '</table>'; 
                       $('#log-Customer').html('');               
                       $('#log-Customer').html(html);               
                    }
                 });

                }
             }
          });
       } 
    });


    $('#popup-ITDepartment').on("click",function(){
       $('.error').empty();
       $('#popup-modalBtnITDepartment').text("Add");
       $('#Editor-ITDepartment').val("");
    });

    var popupEditITDNotesId;
    var currentOperationITDNotes = 0;

    $(document).on('click','.ITDepartmentNotesEdit-popup',function(){
       $('.error').empty();
       currentOperationITDNotes = 1;
       popupEditITDNotesId = $(this).attr('data-userITDepartmentNotes');

       var url = "{{ route('company.editBookingNotes', array("")) }}/"+popupEditITDNotesId;

       $.ajax({
          url  : url,
          type : "GET",
          success : function(response){
             if(response.hasOwnProperty("status"))
             {
                alert(response.msg);
             }
             else
             {
                $('#popup-modal-ITDepartment').modal('toggle');
                $('#Editor-ITDepartment').val(response.note);
                $('#popup-modalBtnITDepartment').text("Update");
             }
          }
       });
    });

    $(document).on('click','#popup-modalBtnITDepartment',function(){
       
       
       if(currentOperationITDNotes == 1)
       {
          var textEditor = $('#Editor-ITDepartment').val();

          if(isEmpty(textEditor))
          {
             //alert("Please provide some content");
             $('.error').text("Please provide some content");
          }
          else if(textEditor.length > 500)
          {
             // alert("Please enter characters between 1 to 100");
             $('.error').text("Please enter characters between 1 to 500");
          }
          else
          {
             var jsObj = {
                'conferenceBookingId' : editRoom,
                'note'   : textEditor,
                'code' : 'it_department'
             };
             
             var url = "{{ route('company.updateBookingNotes', array("")) }}/"+popupEditITDNotesId;


             $.ajax({
                url  : url,
                type : "PUT",
                data : jsObj,
                success : function(response){
                   if(response.hasOwnProperty("status"))
                   {
                      alert(response.msg);
                   }
                   else
                   {
                      currentOperationITDNotes = 0;
                      $('#Editor-ITDepartment').val("");

                      var jsObj = {
                        'conferenceBookingId' : editRoom,
                        'code'        : 'it_department'
                     };

                     $.post("{{ route('company.getBookingNotes') }}",jsObj,function(response){
                        if(response.hasOwnProperty("status"))
                        {
                           var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                           $('#log-ITDepartment').html(html);
                        }
                        else
                        {
                           var html = '';
                           var created_at;
                           var updated_at;
                           for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
                           {
                              created_at = new Date(response.conferenceBookingNotes[i].created_at);
                              updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                              if(user_id == response.conferenceBookingNotes[i].user_id)
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                 html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg ITDepartmentNotesEdit-popup" data-userITDepartmentNotes="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg ITDepartmentNotesDelete-popup" data-userITDepartmentNotes="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                                 html += '</tr>';
                              }
                              else
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                 html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '</tr>';
                              }
                           }
                           html += '</tbody>';
                           html += '</table>'; 
                           $('#log-ITDepartment').html('');               
                           $('#log-ITDepartment').html(html);               
                        }
                     });

                      $("#popup-modal-ITDepartment .close").click();
                   }
                } 
             });

          }
       }
       else
       {
          var note = $('#Editor-ITDepartment').val();

          if(isEmpty(note))
          {
             // alert("Please provide some content");
             $('.error').text("Please provide some content");
          }
          else if(note.length > 500)
          {
             // alert("Please enter characters between 1 to 100");
             $('.error').text("Please enter characters between 1 to 500");
          }
          else
          {
             var jsObj = {
                'conferenceBookingId' : editRoom,
                'note' : note,
                'code' : 'it_department' 
             };

             $.ajax({
                url : "{{ route('company.createBookingNotes') }}",
                type : "POST",
                data : jsObj,
                dataType : "json",
                success : function(response){
                   if(response.hasOwnProperty("status"))
                   {
                      alert(response.msg);
                   }
                   else
                   {
                      $('#Editor-ITDepartment').val("");


                      var jsObjIT = {
                        'conferenceBookingId' : editRoom,
                        'code'        : 'it_department'
                     };

                     $.post("{{ route('company.getBookingNotes') }}",jsObjIT,function(response){
                        if(response.hasOwnProperty("status"))
                        {
                           var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                           $('#log-ITDepartment').html(html);
                        }
                        else
                        {
                           var html = '';
                           var created_at;
                           var updated_at;
                           for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
                           {
                              created_at = new Date(response.conferenceBookingNotes[i].created_at);
                              updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                              if(user_id == response.conferenceBookingNotes[i].user_id)
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                 html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg ITDepartmentNotesEdit-popup" data-userITDepartmentNotes="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg ITDepartmentNotesDelete-popup" data-userITDepartmentNotes="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                                 html += '</tr>';
                              }
                              else
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                                 html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                                 html += '</tr>';
                              }
                           }
                           html += '</tbody>';
                           html += '</table>'; 
                           $('#log-ITDepartment').html('');               
                           $('#log-ITDepartment').html(html);               
                        }
                     });

                      $("#popup-modal-ITDepartment .close").click();

                   }
                }
             });
          }
       }
    });

    $(document).on('click','.ITDepartmentNotesDelete-popup',function(){

       if( confirm("Are you sure you want to delete this record!") ) 
       {
          var NoteId = $(this).attr('data-userITDepartmentNotes');

          var url = "{{ route('company.deleteBookingNotes', array("")) }}/"+NoteId;

          $.ajax({
             url : url,
             type : "DELETE",
             success : function(response){
                if(response.hasOwnProperty("status"))
                {
                   alert(response.msg);
                }
                else
                {
                    var jsObj = {
                      'conferenceBookingId' : editRoom,
                      'code'        : 'it_department'
                   };

                   $.post("{{ route('company.getBookingNotes') }}",jsObj,function(response){
                      if(response.hasOwnProperty("status"))
                      {
                         var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                         $('#log-ITDepartment').html(html);
                      }
                      else
                      {
                         var html = '';
                         var created_at;
                         var updated_at;
                         for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
                         {
                            created_at = new Date(response.conferenceBookingNotes[i].created_at);
                            updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                            if(user_id == response.conferenceBookingNotes[i].user_id)
                            {
                               html += '<tr>';
                               for(var j = 0 ; j < response.users.length ; j++)
                               {
                                  if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                  {
                                     html += '<td>'+response.users[j].name+'</td>';
                                     break;
                                  }
                                  
                               }
                               html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                               html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                               html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                               html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg ITDepartmentNotesEdit-popup" data-userITDepartmentNotes="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg ITDepartmentNotesDelete-popup" data-userITDepartmentNotes="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                               html += '</tr>';
                            }
                            else
                            {
                               html += '<tr>';
                               for(var j = 0 ; j < response.users.length ; j++)
                               {
                                  if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                                  {
                                     html += '<td>'+response.users[j].name+'</td>';
                                     break;
                                  }
                                  
                               }
                               html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                               html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                               html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                               html += '</tr>';
                            }
                         }
                         html += '</tbody>';
                         html += '</table>'; 
                         $('#log-ITDepartment').html('');               
                         $('#log-ITDepartment').html(html);               
                      }
                   });
                 
                }
             }
          });
       } 
    });



    $(document).ready(function(){

       var jsObjB = {
          'conferenceBookingId' : editRoom,
          'code'        : 'booking_note'
       };

       $.post("{{ route('company.getBookingNotes') }}",jsObjB,function(response){
          if(response.hasOwnProperty("status"))
          {
             var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
             $('#log-BookingNotes').html(html);
          }
          else
          {
             var html = '';
             var created_at;
             var updated_at;
             for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
             {
                created_at = new Date(response.conferenceBookingNotes[i].created_at);
                updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                if(user_id == response.conferenceBookingNotes[i].user_id)
                {
                   html += '<tr>';
                   for(var j = 0 ; j < response.users.length ; j++)
                   {
                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                      {
                         html += '<td>'+response.users[j].name+'</td>';
                         break;
                      }
                      
                   }
                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg BookingNoteEdit-popup" data-userBookingNote="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg BookingNoteDelete-popup" data-userBookingNote="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                   html += '</tr>';
                }
                else
                {
                   html += '<tr>';
                   for(var j = 0 ; j < response.users.length ; j++)
                   {
                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                      {
                         html += '<td>'+response.users[j].name+'</td>';
                         break;
                      }
                      
                   }
                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '</tr>';
                }
             }
             html += '</tbody>';
             html += '</table>'; 
             $('#log-BookingNotes').html('');               
             $('#log-BookingNotes').html(html);               
          }
       });



       var jsObjIC = {
          'conferenceBookingId' : editRoom,
          'code'        : 'internal_communication'
       };

       $.post("{{ route('company.getBookingNotes') }}",jsObjIC,function(response){
          if(response.hasOwnProperty("status"))
          {
             var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
             $('#log-InternalCommunicationNotes').html(html);
          }
          else
          {
             var html = '';
             var created_at;
             var updated_at;
             for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
             {
                created_at = new Date(response.conferenceBookingNotes[i].created_at);
                updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                if(user_id == response.conferenceBookingNotes[i].user_id)
                {
                   html += '<tr>';
                   for(var j = 0 ; j < response.users.length ; j++)
                   {
                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                      {
                         html += '<td>'+response.users[j].name+'</td>';
                         break;
                      }
                      
                   }
                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg InternalCommunicationNotesEdit-popup" data-userInternalCommunicationNotes="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg InternalCommunicationNotesDelete-popup" data-userInternalCommunicationNotes="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                   html += '</tr>';
                }
                else
                {
                   html += '<tr>';
                   for(var j = 0 ; j < response.users.length ; j++)
                   {
                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                      {
                         html += '<td>'+response.users[j].name+'</td>';
                         break;
                      }
                      
                   }
                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '</tr>';
                }
             }
             html += '</tbody>';
             html += '</table>'; 
             $('#log-InternalCommunicationNotes').html('');               
             $('#log-InternalCommunicationNotes').html(html);               
          }
       });



        var jsObjC = {
          'conferenceBookingId' : editRoom,
          'code'        : 'customer'
       };

       $.post("{{ route('company.getBookingNotes') }}",jsObjC,function(response){
          if(response.hasOwnProperty("status"))
          {
             var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
             $('#log-Customer').html(html);
          }
          else
          {
             var html = '';
             var created_at;
             var updated_at;
             for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
             {
                created_at = new Date(response.conferenceBookingNotes[i].created_at);
                updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                if(user_id == response.conferenceBookingNotes[i].user_id)
                {
                   html += '<tr>';
                   for(var j = 0 ; j < response.users.length ; j++)
                   {
                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                      {
                         html += '<td>'+response.users[j].name+'</td>';
                         break;
                      }
                      
                   }
                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg CustomerNotesEdit-popup" data-userCustomerNotes="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg CustomerNotesDelete-popup" data-userCustomerNotes="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                   html += '</tr>';
                }
                else
                {
                   html += '<tr>';
                   for(var j = 0 ; j < response.users.length ; j++)
                   {
                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                      {
                         html += '<td>'+response.users[j].name+'</td>';
                         break;
                      }
                      
                   }
                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '</tr>';
                }
             }
             html += '</tbody>';
             html += '</table>'; 
             $('#log-Customer').html('');               
             $('#log-Customer').html(html);               
          }
       });


        var jsObjIT = {
          'conferenceBookingId' : editRoom,
          'code'        : 'it_department'
       };

       $.post("{{ route('company.getBookingNotes') }}",jsObjIT,function(response){
          if(response.hasOwnProperty("status"))
          {
             var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
             $('#log-ITDepartment').html(html);
          }
          else
          {
             var html = '';
             var created_at;
             var updated_at;
             for(var i = 0 ; i < response.conferenceBookingNotes.length ; i++)
             {
                created_at = new Date(response.conferenceBookingNotes[i].created_at);
                updated_at = new Date(response.conferenceBookingNotes[i].updated_at);

                if(user_id == response.conferenceBookingNotes[i].user_id)
                {
                   html += '<tr>';
                   for(var j = 0 ; j < response.users.length ; j++)
                   {
                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                      {
                         html += '<td>'+response.users[j].name+'</td>';
                         break;
                      }
                      
                   }
                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '<td> <a href="javascript:void(0)"><i class="fa fa-edit text-primary fa-lg ITDepartmentNotesEdit-popup" data-userITDepartmentNotes="'+response.conferenceBookingNotes[i].id+'"></i></a>&nbsp;&nbsp;<a href="javascript:void(0)"><i class="fa fa-trash text-danger fa-lg ITDepartmentNotesDelete-popup" data-userITDepartmentNotes="'+response.conferenceBookingNotes[i].id+'"></i></a> </td>';
                   html += '</tr>';
                }
                else
                {
                   html += '<tr>';
                   for(var j = 0 ; j < response.users.length ; j++)
                   {
                      if( response.users[j].id == response.conferenceBookingNotes[i].user_id )
                      {
                         html += '<td>'+response.users[j].name+'</td>';
                         break;
                      }
                      
                   }
                   html += '<td>'+response.conferenceBookingNotes[i].note+'</td>';
                   html += '<td>'+dateFormat(created_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '<td>'+dateFormat(updated_at, "dddd, mmmm dS, yyyy, h:MM:ss TT")+'</td>';
                   html += '</tr>';
                }
             }
             html += '</tbody>';
             html += '</table>'; 
             $('#log-ITDepartment').html('');               
             $('#log-ITDepartment').html(html);               
          }
       });


    });



}














    </script>


@endsection


