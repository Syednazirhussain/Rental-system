<div class="panel">


    <div class="wizard panel-wizard" id="wizard-validation">

        <div class="wizard-wrapper">
          <ul class="wizard-steps">
            <li data-target="#wizard-1" class="active">
              <span class="wizard-step-number">1</span>
              <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
              <span class="wizard-step-caption">
                Leasing Partner
              </span>
            </li>

            <li data-target="#wizard-2">
              <span class="wizard-step-number">2</span>
              <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
              <span class="wizard-step-caption">
                 Counterpart
              </span>
            </li>

            <li data-target="#wizard-3">
              <span class="wizard-step-number">3</span>
              <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
              <span class="wizard-step-caption">
                 Contract Information
              </span>
            </li>
          </ul>
        </div>


        <div class="wizard-content">

          <!-- ===========================wizard-1===================================== -->
     
            <form action="{{ route('company.leasePartners.store') }}" name="createCompanyForm" class="wizard-pane active" id="wizard-1" method="post">

                @if (isset($company))
                    <input name="_method" type="hidden" value="PATCH">
                @endif
                <h3 class="m-t-0">Leasing Partner</h3>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-6 col-md-6 form-group">
                            <label>Parent Company</label>
                            <input type="text" name="parent_company" class="form-control">
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label>Sister Company</label>
                            <input type="text" name="sister_company" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-6 col-md-6 form-group">
                            <label>Sales Person</label>
                            <input type="text" name="sales_person" class="form-control">
                        </div>
                        <div class="col-sm-6 col-md-6 m-t-4">
                            <label class="custom-control custom-checkbox">
                              @if(isset($room) && $room->rent_calendar_available == 1)
                                <input type="checkbox" name="delegated" id="delegated" class="custom-control-input" checked="checked">
                                <span class="custom-control-indicator"></span>
                                Calender Available
                              @else
                                <input type="checkbox" name="delegated" id="delegated" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                Delegated
                              @endif
                            </label>                             
                          </div>
                    </div>
                </div>

                <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                        <a href="{!! route('company.leasePartners.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                    @if (isset($company))
                        <button type="submit" class="btn btn-primary" id="updateCompanyBtn" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                    @else
                        <button type="submit" class="btn btn-primary" id="createCompanyBtn" data-wizard-action="next">CREATE LEASING <i class="fa fa-arrow-right m-l-1"></i></button>
                    @endif
                </div>
            </form>

            <!-- ============================wizard-2==================================== -->


            <form class="wizard-pane" id="wizard-2">
                @if (isset($company))
                    <input name="_method" type="hidden" value="PATCH">
                @endif
                <h3 class="m-t-0">Company Contact Persons</h3>
                <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                  <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> PREVIOUS</button>&nbsp;&nbsp;
                  <a href="{!! route('admin.companies.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                  <button type="submit" class="btn btn-primary" id="addContactPersonBtn" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                </div>
            </form>

            <!-- ============================wizard-2==================================== -->

            <form class="wizard-pane" id="wizard-3">
                  @if (isset($company))
                      <input name="_method" type="hidden" value="PATCH">
                  @endif
                  <h3 class="m-t-0">Leasing Contract Information</h3>
                    <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                      <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> PREVIOUS</button>&nbsp;&nbsp;
                      <a href="{!! route('admin.companies.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                      <button type="submit" class="btn btn-primary" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                    </div>
            </form>

            <!-- ================================================================ -->

              <div class="wizard-pane" id="wizard-finish">
                <div class="text-xs-center m-y-4">
                  <i class="ion-checkmark-round text-success font-size-52 line-height-1"></i>
                  <h4 class="font-weight-semibold font-size-20 m-x-0 m-t-1 m-b-0">We're almost done</h4>
                  <button type="button" class="btn btn-primary m-t-4" data-wizard-action="finish">Finish</button>
                </div>
              </div>

        </div>
    </div>


</div>


@section('js')

<script type="text/javascript">


    // -------------------------------------------------------------------------


    $('#contract-content').summernote({
      height: 200,
      toolbar: [
        ['parastyle', ['style']],
        ['fontstyle', ['fontname', 'fontsize']],
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['insert', ['picture', 'link', 'video', 'table', 'hr']],
        ['history', ['undo', 'redo']],
        ['misc', ['codeview', 'fullscreen']],
        ['help', ['help']]
      ],
    });
 
    
      $('#daterange-3').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        startDate: "01/01/2018",
      });
    

      // -------------------------------------------------------------------------
      // Initialize Select2
      
      $(function() {
        $('.select2-country').select2({
          placeholder: 'Select Country',
        });
      });
              

              
              


    
    // -------------------------------------------------------------------------
    // Initialize wizard validation example

    $(function() {
      var $wizard = $('#wizard-validation');

      $wizard.pxWizard();

      // Init plugins
      $('#wizard-country').select2({
        placeholder: 'Select your country...'
      }).change(function() { $(this).valid(); });
      $('#wizard-postal-code').mask("999999");
      $('#wizard-3-number').mask("9999 9999 9999 9999");
      $('#wizard-csv').mask("999");
      $('[data-toggle="tooltip"]').tooltip();

      // Rules

      var editCompany = 0;
      var companyCreated = 0;

      $('#wizard-1').validate({

          rules: {
              'parent_company': {
                required:  true,
                minlength: 3,
                maxlength: 100,
              },
              'sister_company': {
                required:  false,
                minlength: 3,
                maxlength: 100,
              },
              'sales_person': {
                required:  false,
                maxlength: 100,
              }
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


      $('#wizard-1').on('submit', function(e) {

       
            e.preventDefault();

            // test if form is valid 
            if( $('#wizard-1').validate().form() ) {


              if (editCompany == 0 && companyCreated == 0) {

                  var myform = document.getElementById("wizard-1");
                  var data = new FormData(myform);

                  $.ajax({
                      url: '{{ route("company.leasePartners.store") }}',
                      data: data,
                      cache: false,
                      contentType: false,
                      processData: false,
                      type: 'POST', // For jQuery < 1.9
                      success: function(data){
                          // myform.pxWizard('goTo', 2);
                          company_id = data.company.id;
                          companyCreated = data.success;

                          // console.log(data);
                      },
                      error: function(xhr,status,error)  {

                      }

                  });

              } else {

                  var myform = document.getElementById("wizard-1");
                  var data = new FormData(myform);
                  data.append('company_id', editCompany);

                  <?php
                    if (isset($company)) {
                       $updateRoute = route("admin.companies.update", [$company->id]);
                    } else {
                      $updateRoute = '';
                    }
                  ?>

                  $.ajax({
                      url: '{{ $updateRoute }}',
                      data: data,
                      cache: false,
                      contentType: false,
                      processData: false,
                      type: 'POST', // For jQuery < 1.9
                      success: function(data){
                          // myform.pxWizard('goTo', 2);

                          // console.log(data);
                      },
                      error: function(xhr,status,error)  {

                      }

                  });

              }

            } else {
                // console.log("does not validate");
            }
        });


      $('#state_id').on('change', function() {

          var getStateId = $('#state_id').val();
          // alert(state_id);

          $.ajax({
              url: '{{ route("cities.list") }}',
              data: { state_id: getStateId },
              dataType: 'json',
              cache: false,
              type: 'POST', // For jQuery < 1.9
              success: function(data){
                  
                  if (data.success == 1) {
                    var option = "";
                    
                    $.each(data.cities, function(i, item) {
                        option += '<option data-state="'+item.state_id+'" value="'+item.id+'">'+item.name+'</option>';
                    });

                    $('#city_id').html(option);


                  }

                  // console.log(data);
              },
              error: function(xhr,status,error)  {

              }

          });
      });


     
      var contactPersonCreated = 0;

      $('#wizard-2').validate();
      
      $('#wizard-2').on('submit', function(e) {
       
            e.preventDefault();

            // test if form is valid 
            if($('#wizard-2').validate().form()) {

              if (editCompany == 0 && contactPersonCreated == 0) {

                    var myform = document.getElementById("wizard-2");
                    var data = new FormData(myform );
                    data.append('company_id', company_id);

                    // console.log(data);

                    $.ajax({
                        url: '{{ route("admin.companyContactPeople.store") }}',
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'POST', // For jQuery < 1.9
                        success: function(data){
                            contactPersonCreated = data.success;

                            // console.log(data);
                        },
                        error: function(xhr,status,error)  {

                        }

                    });
                } else {

                    var myform = document.getElementById("wizard-2");
                    var data = new FormData(myform );
                    data.append('company_id', editCompany);

                    // console.log(data);

                    $.ajax({
                        url: '{{ route("admin.companyContactPeople.update") }}',
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'POST', // For jQuery < 1.9
                        success: function(data) {

                            
                            $.each(data.createdFields, function (index, value) {

                               $('input[data-person-id="new-'+index+'"]').val(value);
                               $('input[data-person-id="new-'+index+'"]').attr('name', "person["+value+"][id]");
                               $('input[data-person-id="new-'+index+'"]').attr("data-person-id", value);

                               $('input[data-person-name="new-'+index+'"]').attr('name', "person["+value+"][name]");
                               $('input[data-person-name="new-'+index+'"]').attr("data-person-name", value);

                               $('input[data-person-email="new-'+index+'"]').attr('name', "person["+value+"][email]");                               
                               $('input[data-person-email="new-'+index+'"]').attr("data-person-email", value);

                               $('input[data-person-phone="new-'+index+'"]').attr('name', "person["+value+"][phone]");
                               $('input[data-person-phone="new-'+index+'"]').attr("data-person-phone", value);

                               $('input[data-person-fax="new-'+index+'"]').attr('name', "person["+value+"][fax]");      
                               $('input[data-person-fax="new-'+index+'"]').attr("data-person-fax", value);

                               $('input[data-person-department="new-'+index+'"]').attr('name', "person["+value+"][department]"); 
                               $('input[data-person-department="new-'+index+'"]').attr("data-person-department", value);

                               $('input[data-person-address="new-'+index+'"]').attr('name', "person["+value+"][address]");
                               $('input[data-person-designation="new-'+index+'"]').attr("data-person-address", value);

                               $('input[data-person-designation="new-'+index+'"]').attr('name', "person["+value+"][designation]");
                               $('input[data-person-designation="new-'+index+'"]').attr("data-person-designation", value);

                            });

                            // contactPersonCreated = data.success;

                            // console.log(data);
                        },
                        error: function(xhr,status,error)  {

                        }

                    });
                }
            } else {
                // console.log("does not validate");
            }
        });



      var companyBuildingCreated = 0;

      $('#wizard-3').validate();
      
      $('#wizard-3').on('submit', function(e) {
       
            e.preventDefault();

            // test if form is valid 
            if( $('#wizard-3').validate().form() ) {

              if (editCompany == 0 && companyBuildingCreated == 0) {

                    var myform = document.getElementById("wizard-3");
                    var data = new FormData(myform);
                    data.append('company_id', company_id);

                    $.ajax({
                        url: '{{ route("admin.companyBuildings.store") }}',
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'POST', // For jQuery < 1.9
                        success: function(data){
                            // myform.pxWizard('goTo', 2);

                            companyBuildingCreated = data.success;

                            // console.log(data);
                        },
                        error: function(xhr,status,error)  {

                        }

                    });

                } else {

                    var myform = document.getElementById("wizard-3");
                    var data = new FormData(myform );
                    data.append('company_id', editCompany);

                    // console.log(data);

                    $.ajax({
                        url: '{{ route("admin.companyBuildings.update") }}',
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'POST', // For jQuery < 1.9
                        success: function(data) {

                            
                            $.each(data.createdFields, function (index, value) {



                               $('input[data-building-id="new-'+index+'"]').val(value['id']);
                               $('input[data-building-id="new-'+index+'"]').attr('name', "building_data["+value['id']+"][id]");
                               $('input[data-building-id="new-'+index+'"]').attr("data-building-id", value['id']);

                               $('input[data-building-name="new-'+index+'"]').attr('name', "building_data["+value['id']+"][name]");
                               $('input[data-building-name="new-'+index+'"]').attr("data-building-name", value['id']);

                               $('input[data-building-address="new-'+index+'"]').attr('name', "building_data["+value['id']+"][address]");                               
                               $('input[data-building-address="new-'+index+'"]').attr("data-building-address", value['id']);

                               $('input[data-building-zipcode="new-'+index+'"]').attr('name', "building_data["+value['id']+"][zipcode]");
                               $('input[data-building-zipcode="new-'+index+'"]').attr("data-building-zipcode", value['id']);

                               $('input[data-building-numfloors="new-'+index+'"]').attr('name', "building_data["+value['id']+"][num_floors]");      
                               $('input[data-building-numfloors="new-'+index+'"]').attr("data-building-numfloors", value['id']);

                                $.each(value.floors, function (flIndex, flValue) {

                                   $('input[data-floor-id="new-'+flValue['index']+'"]').val(flValue['floorId']);
                                   $('input[data-floor-id="new-'+flValue['index']+'"]').attr('name', "building_data["+value['id']+"][floor]["+flValue['floorId']+"][id]");
                                   $('input[data-floor-id="new-'+flValue['index']+'"]').attr("data-floor-id", flValue['floorId']);

                                   $('input[data-floor-number="new-'+flValue['index']+'"]').attr('name', "building_data["+value['id']+"][floor]["+flValue['floorId']+"][floor_number]"); 
                                   $('input[data-floor-number="new-'+flValue['index']+'"]').attr("data-floor-number", flValue['floorId']);

                                   $('input[data-floor-rooms="new-'+flValue['index']+'"]').attr('name', "building_data["+value['id']+"][floor]["+flValue['floorId']+"][floor_rooms]");
                                   $('input[data-floor-rooms="new-'+flValue['index']+'"]').attr("data-floor-rooms", flValue['floorId']);

                                });

                               // $('input[data-person-designation="new-'+index+'"]').attr('name', "building_data["+value['id']+"][designation]");
                               // $('input[data-person-designation="new-'+index+'"]').attr("data-person-designation", value);

                            });

                            // contactPersonCreated = data.success;

                            // console.log(data);
                        },
                        error: function(xhr,status,error)  {

                        }

                    });
                }

            } else {
                // console.log("does not validate");
            }
        });


      var companyContractCreated = 0;

      checkField = function(response) {
          switch ($.parseJSON(response).code) {
              case 200:
                  return "true"; // <-- the quotes are important!
              case 401:
                  // alert("Sorry, our system has detected that an account with this email address already exists.");
                  break;
              case undefined:
                  alert("An undefined error occurred.");
                  break;
              default:
                  alert("An undefined error occurred");
                  break;
          }
          return false;
      };

      $('#wizard-4').validate({

          rules: {
              "number": {
                  required: true,
                  maxlength: 150,
                  remote: {
                      // url: "{{ route('validate.contract') }}",
                      // type: "POST",
                      // cache: false,
                      // dataType: "json",
                      // data: {
                      //     number: function() { return $("#contract-no").val(); }
                      // },
                      // dataFilter: function(response) {

                      //     // console.log(response);
                      //     return checkField(response);
                      // }

                      param: {
                          url: "{{ route('validate.contract') }}",
                          type: "POST",
                          cache: false,
                          dataType: "json",
                          data: {
                              number: function() { return $("#contract-no").val(); }
                          },
                          dataFilter: function(response) {

                              // console.log(response);
                              return checkField(response);
                          }
                      },
                      depends: function(element) {
                          // compare email address in form to hidden field
                          return ($(element).val() !== $('#contract-no-hidden').val());
                      }
                  }
              },
              "start_date": {
                  required: true
              },
              "end_date": {
                  required: true
              },
              "payment_method": {
                  required: true
              },
              "payment_cycle": {
                  required: true
              },
              "discount": {
                  required: true
              }
          },

          messages: {
             "number": {

                remote: "A contract with same number already exists",
             }
          },
          // errorElement : 'div',
          // errorLabelContainer: '.errorTxt'
          errorPlacement: function(error, element) {
            var placement = $(element).parent().find('.errorTxt');
            if (placement) {
              $(placement).append(error)
            } else {
              error.insertAfter(element);
            }
          }

      });
      




      // Validate

      $wizard.on('stepchange.px.wizard', function(e, data) {
        // Validate only if jump to the forward step
        if (data.nextStepIndex < data.activeStepIndex) { return; }

        var $form = $wizard.pxWizard('getActivePane');

        if (!$form.valid()) {
          e.preventDefault();
        }
      });

      // Finish

      $wizard.on('finished.px.wizard', function() {
        //
        // Collect and send data...
        //

        $('#wizard-finish').find('.ion-checkmark-round').removeClass('ion-checkmark-round').addClass('ion-checkmark-circled');
        $('#wizard-finish').find('h4').text('Thank You!');
        $('#wizard-finish').find('button').remove();
      });

    });

    jQuery.validator.addMethod("notEqualToGroup", function(value, element, options) {
                // get all the elements passed here with the same class
                var elems = $(element).parents('form').find(options[0]);
                // the value of the current element
                var valueToCompare = value;
                // count
                var matchesFound = 0;
                // loop each element and compare its value with the current value
                // and increase the count every time we find one
                jQuery.each(elems, function(){
                thisVal = $(this).val();
                if(thisVal == valueToCompare){
                  matchesFound++;
                }
                });
                // count should be either 0 or 1 max
                if(this.optional(element) || matchesFound <= 1) {
                        //elems.removeClass('error');
                        return true;
                    } else {
                        //elems.addClass('error');
                    }
                });


</script>

@endsection


