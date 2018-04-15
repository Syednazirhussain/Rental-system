@extends('admin.default')




@section('css')

        <!-- styles -->


@endsection


@section('content')


        <div class="px-content">
            <div class="page-header">
                <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Companies / </span>Add Company</h1>
            </div>

            @include('admin.companies.fields')

        </div>




@endsection







@section('js')

<!-- js -->



<script type="text/javascript">

var company_id = "";

 /* $(function() {
    $('#dropzonejs').dropzone({

      paramName: "logo",
      url: "/",
      acceptedFiles: "image/*",
      autoProcessQueue: false,
      autoQueue: false,
      maxFiles: 1,
      parallelUploads: 1,
      maxFilesize:     10,
      filesizeBase:    1000,

      resize: function(file) {
        return {
          srcX:      0,
          srcY:      0,
          srcWidth:  file.width,
          srcHeight: file.height,
          trgWidth:  file.width,
          trgHeight: file.height,
        };
      },
    });


    // Mock the file upload progress (only for the demo)
    //
    Dropzone.prototype.uploadFiles = function(files) {
      var minSteps         = 6;
      var maxSteps         = 60;
      var timeBetweenSteps = 100;
      var bytesPerStep     = 100000;
      var isUploadSuccess  = Math.round(Math.random());

      var self = this;

      for (var i = 0; i < files.length; i++) {

        var file = files[i];
        var totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

        for (var step = 0; step < totalSteps; step++) {
          var duration = timeBetweenSteps * (step + 1);

          setTimeout(function(file, totalSteps, step) {
            return function() {
              file.upload = {
                progress: 100 * (step + 1) / totalSteps,
                total: file.size,
                bytesSent: (step + 1) * file.size / totalSteps
              };

              self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
              if (file.upload.progress == 100) {

                if (isUploadSuccess) {
                  file.status =  Dropzone.SUCCESS;
                  self.emit('success', file, 'success', null);
                } else {
                  file.status =  Dropzone.ERROR;
                  self.emit('error', file, 'Some upload error', null);
                }

                self.emit('complete', file);
                self.processQueue();
              }
            };
          }(file, totalSteps, step), duration);
        }
      }
    };
  });*/



            // -------------------------------------------------------------------------

              $(function() {
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
              });
            
            
              $('#daterange-3').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                startDate: "01/01/2018",
              });
            
              $('#daterange-4').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                startDate: "12/31/2018",

              });
              // -------------------------------------------------------------------------
              // Initialize Select2
              
              $(function() {
                $('.select2-country').select2({
                  placeholder: 'Select Country',
                });
              });
              
              $(function() {
                $('.select2-state').select2({
                  placeholder: 'Select State',
                });
              });
              
              $(function() {
                $('.select2-city').select2({
                  placeholder: 'Select City',
                });
              });
              
              $(function() {
                $('.select2-status').select2({
                  placeholder: 'Select Status',
                });
              });

              $(function() {
                $('.select2-payment-method').select2({
                  placeholder: 'Select Payment Method',
                });
              });

              $(function() {
                $('.select2-payment-cycle').select2({
                  placeholder: 'Select Payment Cycle',
                });
              });

              $(function() {
                $('.select2-discount-type').select2({
                  placeholder: 'Select Discount Type',
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


     


      var companyCreated = 0;

      $('#wizard-1').validate({

          rules: {
              'name': {
                required:  true,
                minlength: 3,
                maxlength: 100,
              },
              'second_name': {
                required:  false,
                maxlength: 100,
              },
              'description': {
                required:  false,
              },
              'country_id': {
                required:  true,
              },
              'state_id': {
                required:  true,
              },
              'city_id': {
                required:  true,
              },
              'address': {
                required:  true,
                maxlength: 150,
              },
              'zipcode': {
                required:  true,
                minlength: 3,
                maxlength: 20,
              },
              'phone': {
                required:  true,
                minlength: 7,
                maxlength: 20,
              },
              'user_status_id': {
                required:  true,
              },
              'max_users': {
                required:  true,
                min: 1,
                max: 3,
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


      $('#wizard-1').on('submit', function(e) {
       
            e.preventDefault();

            // test if form is valid 
            if( $('#wizard-1').validate().form() ) {


              if (companyCreated == 0) {

                  var myform = document.getElementById("wizard-1");
                  var data = new FormData(myform);

                  $.ajax({
                      url: '{{ route("admin.companies.store") }}',
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

              if (contactPersonCreated == 0) {

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
                            // myform.pxWizard('goTo', 2);

                            contactPersonCreated = data.success;

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

              if (companyBuildingCreated == 0) {

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
      
      $('#wizard-4').on('submit', function(e) {
       
            e.preventDefault();

            // test if form is valid 
            if( $('#wizard-4').validate().form() ) {


              if (companyContractCreated == 0) {

                  var myform = document.getElementById("wizard-4");
                  var data = new FormData(myform);
                  data.append('company_id', company_id);

                  $.ajax({
                      url: '{{ route("admin.companyContracts.store") }}',
                      data: data,
                      cache: false,
                      contentType: false,
                      processData: false,
                      type: 'POST', // For jQuery < 1.9
                      success: function(data){
                          // myform.pxWizard('goTo', 2);
                          companyContractCreated = data.success;
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



      var companyModuleCreated = 0;

      $('#wizard-5').validate();
      
      $('#wizard-5').on('submit', function(e) {
       
            e.preventDefault();

            // test if form is valid 
            if( $('#wizard-5').validate().form() ) {

              if (companyModuleCreated == 0) {
                  var myform = document.getElementById("wizard-5");
                  var data = new FormData(myform);
                  data.append('company_id', company_id);

                  // console.log(data);

                  $.ajax({
                      url: '{{ route("admin.companyModules.store") }}',
                      data: data,
                      cache: false,
                      contentType: false,
                      processData: false,
                      type: 'POST', // For jQuery < 1.9
                      success: function(data){
                          // myform.pxWizard('goTo', 2);

                          companyModuleCreated = data.success;

                          // console.log(data);
                      },
                      error: function(xhr,status,error)  {

                      }

                  });

              }
                // console.log("validates");
            } else {
                // console.log("does not validate");
            }
        });



      var companyAdminCreated = 0;

      $('#wizard-6').validate();
      
      $('#wizard-6').on('submit', function(e) {
       
            e.preventDefault();

            // test if form is valid 
            if( $('#wizard-6').validate().form() ) {

                if (companyAdminCreated == 0) {

                  var myform = document.getElementById("wizard-6");
                  var data = new FormData(myform);
                  data.append('company_id', company_id);

                  // console.log(data);

                  $.ajax({
                      url: '{{ route("admin.companyUsers.store") }}',
                      data: data,
                      cache: false,
                      contentType: false,
                      processData: false,
                      type: 'POST', // For jQuery < 1.9
                      success: function(data){
                          // myform.pxWizard('goTo', 2);
                          companyAdminCreated = data.success;
                          // console.log(data);
                      },
                      error: function(xhr,status,error)  {

                      }

                  });

                }
                // console.log("validates");
            } else {
                // console.log("does not validate");
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




            $(document).ready(function(){
                $('.remove-contact-person').hide();
                $('.remove-module').hide();
                $('.remove-admin').hide();
                $('.remove-admin').hide();
                $('#addBuildingBtn').trigger('click');
                $('.remove-building').hide();

                $('#addFieldBtn').trigger('click');
                // $('.remove-contact-person').hide();

                $('#addModuleBtn').trigger('click');
                $('.remove-module').hide();

                $('#addAdminBtn').trigger('click');
                $('.remove-admin').hide();

            });

    


            // Add More Contact Persons

            var i = 0;

            $('#addFieldBtn').on('click', function() {


            var person = '<div class="contactPersonFields">';
                person += '<h5 class="bg-success p-x-1 p-y-1 m-t-0" >Person <i class="fa fa-times fa-lg remove-contact-person pull-right cursor-p"></i></h5>';
                person += '<div class="row">';
                person += '<div class="col-sm-6 form-group">';
                person += '<fieldset class="form-group">';
                person += '<label for="person-name">Name</label>';
                person += '<input type="text" name="person['+i+'][name]" class="person-name form-control" placeholder="john doe">';
                person += '</fieldset>';
                person += '</div>';
                person += '<div class="col-sm-6 form-group">';
                person += '<fieldset class="form-group">';
                person += '<label for="person-email">Email</label>';
                person += '<input type="email" name="person['+i+'][email]" class="person-email form-control" placeholder="john@example.com">';
                person += '</fieldset>';
                person += '</div>';
                person += '<div class="col-sm-6 form-group">';
                person += '<fieldset class="form-group">';
                person += '<label for="person-phone">Phone</label>';
                person += '<input type="text" name="person['+i+'][phone]" class="person-phone form-control" placeholder="0987654321">';
                person += '</fieldset>';
                person += '</div>';
                person += '<div class="col-sm-6 form-group">';
                person += '<fieldset class="form-group">';
                person += '<label for="person-fax">Fax</label>';
                person += '<input type="text" name="person['+i+'][fax]" class="person-fax form-control" placeholder="0987654321">';
                person += '</fieldset>';
                person += '</div>';
                person += '<div class="col-sm-12 form-group">';
                person += '<fieldset class="form-group">';
                person += '<label for="person-address">Address</label>';
                person += '<input type="text" name="person['+i+'][address]" class="person-address form-control" placeholder="ST-12 Phase-3/B Crown Center Alaska.">';
                person += '</fieldset>';
                person += '</div>';
                person += '<div class="col-sm-6 form-group">';
                person += '<fieldset class="form-group">';
                person += '<label for="person-department">Department</label>';
                person += '<input type="text" name="person['+i+'][department]" class="person-department form-control" placeholder="Human Resource Department">';
                person += '</fieldset>';
                person += '</div>';
                person += '<div class="col-sm-6 form-group">';
                person += '<fieldset class="form-group">';
                person += '<label for="person-designation">Designation</label>';
                person += '<input type="text" name="person['+i+'][designation]" class="person-designation form-control" placeholder="Asst. Manager">';
                person += '</fieldset>';
                person += '</div>';
                person += '</div>';
                person += '</div>';

                $(".person").prepend(person);

                i += 1;

                $('.person-name').each(function () {
                    $(this).rules("add", {
                        required: true,
                        maxlength: 100,
                    });
                });

                $('.person-email').each(function () {
                    $(this).rules("add", {
                        required: true,
                        maxlength: 100,
                        email: true,
                    });
                });

                $('.person-phone').each(function () {
                    $(this).rules("add", {
                        required: true,
                        rangelength: [7, 20],
                    });
                });

                $('.person-fax').each(function () {
                    $(this).rules("add", {
                        rangelength: [7, 20],                        
                    });
                });

                $('.person-address').each(function () {
                    $(this).rules("add", {
                        maxlength: 150,
                    });
                });

                $('.person-department').each(function () {
                    $(this).rules("add", {
                        maxlength: 100,
                    });
                });

                $('.person-designation').each(function () {
                    $(this).rules("add", {
                        maxlength: 100,                        
                    });
                });

            });


            $(document).on('click', '.remove-contact-person', function() {
                $(this).closest('.contactPersonFields').remove();
            });



            // Add More Buildings

            var j = 0;
            var buildingNum = 1;

            $('#addBuildingBtn').on('click', function() {

              var building = '<div class="buildingFields">';
                  building += '<h5 class="bg-success p-x-1 p-y-1" >Building <i class="fa fa-times fa-lg remove-building pull-right cursor-p"></i></h5>';
                  building += '<div class="row">';
                  building += '<div class="col-sm-6 form-group">';
                  building += '<label for="building-name">Building Name</label>';
                  building += '<input type="text" name="building_data['+buildingNum+'][name]" class="building-name form-control" placeholder="Crown Towers">';
                  building += '</div>';
                  building += '<div class="col-sm-6 form-group">';
                  building += '<label for="building-address">Address</label>';
                  building += '<input type="text" name="building_data['+buildingNum+'][address]" class="building-address form-control" placeholder="ST-12 Phase-3/B Crown Center Alaska.">';
                  building += '</div>';
                  building += '<div class="col-sm-6 form-group">';
                  building += '<label for="building-zip">Zip Code</label>';
                  building += '<input type="text" name="building_data['+buildingNum+'][zipcode]" class="building-zip form-control" placeholder="ABC-999">';
                  building += '</div>';
                  building += '<div class="col-sm-6 form-group">';
                  building += '<label for="building-no-of-floors">No. of Floors</label>';
                  building += '<div class="row">';
                  building += '<div class="col-sm-6 form-group">';
                  building += '<input type="number" name="building_data['+buildingNum+'][num_floors]" class="building-no-of-floors form-control building-no-of-floors" min="1" value="1">';
                  building += '</div>';
                  building += '<div class="col-sm-6 form-group">';
                  building += '<button type="button" class="btn btn-primary addFloorBtn"> <i class="fa fa-plus"></i> Add Floors </button>';
                  building += '</div>';
                  building += '</div>';
                  building += '</div>';
                  building += '</div>';
                  building += '<div data-building-num="'+buildingNum+'" class="sectionFloor">';
                  building += '</div>';
                  building += '</div>';

                  $('.building').prepend(building);

                  j += 1;
                  buildingNum += 1;

                  $('.building-name').each(function () {
                      $(this).rules("add", {
                          required: true,
                          maxlength: 200,
                      });
                  });

                  $('.building-address').each(function () {
                      $(this).rules("add", {
                          required: true,
                          maxlength: 150,
                      });
                  });

                  $('.building-zip').each(function () {
                      $(this).rules("add", {
                          required: true,
                          rangelength: [3, 20],
                      });
                  });

                  $('.building-no-of-floors').each(function () {
                      $(this).rules("add", {
                          required: true,
                          digits: true,
                      });
                  });

            });


            $(document).on('click', '.remove-building', function() {

                $(this).closest('.buildingFields').remove();

            });


            // Add More Floors

            var k = 1;

            $(document).on('click', '.addFloorBtn', function() {

                // var building_num = $(this).parent().parent().parent().parent().parent().parent().parent().find('.buildingFields').data('building-num');
                var num_floors = $(this).parent().parent().find('.building-no-of-floors').val();
                var floorSecion = $(this).parent().parent().parent().parent().parent().find('.sectionFloor');
                var building_num = floorSecion.data('building-num');
                var floorsExist = $(this).parent().parent().parent().parent().parent().find('.floor');

                



                if (num_floors <= floorsExist.length) {
                    alert('Floors are already added');
                } else {

                    for (i=1; i <= num_floors-floorsExist.length; i++) {

                         var m = i-1;
                         var floor = '<div class="floor">';
                            floor += '<div id="floorFields">';
                            floor += '<div class="row">';
                            floor += '<div class="col-sm-6 form-group">';
                            floor += '<label for="building-floor-no">Floor No.</label>';
                            floor += '<input type="name" name="building_data['+building_num+'][floor]['+m+'][floor_number]" class="form-control building-floor-no" min="1" >';
                            floor += '</div>';
                            floor += '<div class="col-sm-6 form-group">';
                            floor += '<label for="building-floor-no-of-rooms">No. of Rooms</label>';
                            floor += '<div class="row">';
                            floor += '<div class="col-sm-6">';
                            floor += '<input type="number" name="building_data['+building_num+'][floor]['+m+'][floor_rooms]" class="form-control building-floor-no-of-rooms" min="1" >';
                            floor += '</div>';
                            floor += '<div class="col-sm-6">';
                            floor += '<i class="fa fa-times fa-lg remove-floor cursor-p"></i>';
                            floor += '</div>';
                            floor += '</div>';
                            floor += '</div>';
                            floor += '</div>';
                            floor += '</div>';
                            floor += '</div>';

                        floorSecion.append(floor);

                         $('.building-floor-no').each(function () {
                              $(this).rules("add", {
                                  required: true,
                                  maxlength: 100,
                              });
                          });


                         $('.building-floor-no-of-rooms').each(function () {
                              $(this).rules("add", {
                                  required: true,
                                  digits: true,
                              });
                          });
                    }
                    
                }

            });


            $(document).on('click', '.remove-floor', function() {
                $(this).closest('.floor').remove();
            });


            // Add More Module

            var modulesList = {
              @foreach ($modules as $module)
                  {{ $module->id }}: "{{ $module->name }}",
              @endforeach
              };


            function checkSelected(val) {
                var ret = false;
                $(".module-id").each(function() {
                    if ($(this).val() === val) {
                        ret = true;
                    }
                });
                return ret;
            }


            function totalSelectedValue(){
                var total = 0;
                $(".module-id option:selected").each(function() {
                    total = total + parseInt($(this).val(), 10);
                });
                return total;
            }
 
            $(document).on('change', '.module-id', function() {

                  $('option', this).each(function() {

                      // alert($(this).val());

                      if (checkSelected($(this).val()) && $(this).val() !== "") {
                          // alert($(this).val());
                          $('.module-id option[value=' + $(this).val() + ']').prop('disabled', true);;

                          $(this).prop('disabled', false);;
                          // $('.module-id option[value=' + $(this).val() + ']').attr('disabled', 'disabled');
                          // $('.module-id option[value=' + $(this).val() + ']').remove();
                      } else {

                          // $('.module-id option[value=' + $(this).val() + ']').prop('disabled', false);
                      }
                  });
            });

            $(document).on('select2:unselecting', '.module-id', function (e) {

                  console.log(e.params);
                  var moduleVal = e.params.args.data.id;
                  $('option', this).each(function() {
                      $('.module-id option[value=' + moduleVal + ']').prop('disabled', false);
                  
                  // $('.module-id option[value=' + moduleVal + ']').first().prop('disabled', false);

                   });
                  $('.select2-module').select2({
                      placeholder: 'Select Module',
                  });
              // Do something
            });

            var moduleNum = 0;

            $('#addModuleBtn').on('click', function() {

                var moduleIdName = "module["+moduleNum+"][id]";

                var module = '<div class="moduleFields">';
                    module += '<h5 class="bg-success p-x-1 p-y-1" >Module <i class="fa fa-times fa-lg remove-module pull-right cursor-p"></i></h5>';
                    module += '<div class="row">';
                    module += '<div class="col-sm-6 form-group">';
                    module += '<label for="module">Module</label>';
                    module += '<select name="module['+moduleNum+'][id]" class="module-id form-control select2-module" style="width: 100%" data-allow-clear="true">';
                    module += '</select>';
                    module += '<div class="errorTxt"></div>';
                    module += '</div>'
                    module += '<div class="col-sm-6 form-group">';
                    module += '<label for="price">Price</label>';
                    module += '<input type="number" name="module['+moduleNum+'][price]" class="module-price form-control" min="1" />';
                    module += '</div>'
                    module += '<div class="col-sm-6 form-group">';
                    module += '<label for="users_limit">Users Limit</label>';
                    module += '<input type="number" name="module['+moduleNum+'][users_limit]" class="users-limit form-control" value="10" min="1" />';
                    module += '</div>'
                    module += '</div>'
                    module += '</div>'

                $('.module').prepend(module);

                // later:
                var option = '<option></option>';
                $.each(modulesList, function (index, value) {
                    option += '<option value="'+index+'">'+value+'</option>';
                });

                $('select[name="' + moduleIdName + '"]').html(option);

                moduleNum += 1;

                $('.module-id').each(function () {
                      $(this).rules("add", {
                          required: true
                      });
                  });

                  $('.module-price').each(function () {
                      $(this).rules("add", {
                          required: true,
                          digits: true,
                      });
                  });

                  $('.users-limit').each(function () {
                      $(this).rules("add", {
                          required: true,
                          digits: true,
                      });
                  });


                  $('.select2-module').select2({
                      placeholder: 'Select Module',
                  });

            });


            $(document).on('click', '.remove-module', function() {

                $(this).closest('.moduleFields').remove();

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



            // Add More Admin

            

            var p = 0;
            $('#addAdminBtn').on('click', function() {
                if ($(".adminFields").length < 3) {

                  var admin = '<div class="adminFields">';
                      admin += '<h5 class="bg-success p-x-1 p-y-1" >Admin <i class="fa fa-times fa-lg remove-admin pull-right cursor-p"></i></h5>';
                      admin += '<div class="row">';
                      admin += '<div class="col-sm-12 form-group">';
                      admin += '<label for="admin-name">Name</label>';
                      admin += '<input type="text" name="admin['+p+'][name]"  class="admin-name form-control" placeholder="john doe">';
                      admin += '</div>';
                      admin += '<div class="col-sm-12 form-group">';
                      admin += '<label for="admin-email">Email</label>';
                      admin += '<input type="email" name="admin['+p+'][email]" class="admin-email form-control" placeholder="john@example.com">';
                      admin += '</div>';
                      admin += '<div class="col-sm-12 form-group">';
                      admin += '<label for="admin-password">Password</label>';
                      admin += '<input type="password" name="admin['+p+'][password]" class="admin-pass form-control" placeholder="testingpass123">';
                      admin += '</div>';
                      admin += '</div>';
                      admin += '</div>';



                    $('.admin').prepend(admin);

                      p += 1;

                    $('.admin-name').each(function () {
                        $(this).rules("add", {
                            required: true
                        });
                    });

                    $('.admin-email').each(function () {
                        var adminEmail = $(this);
                        $(this).rules("add", {
                            required: true,
                            email: true,
                            notEqualToGroup: ['.admin-email'],
                            remote: {
                                url: "{{ route('validate.admin') }}",
                                type: "POST",
                                cache: false,
                                dataType: "json",
                                data: {
                                    admin_email: function() { return adminEmail.val(); }
                                },
                                dataFilter: function(response) {

                                    // console.log(response);
                                    return checkField(response);
                                }
                            },
                            messages: {
                                remote: "This admin already have an account",
                                notEqualToGroup: "Please enter a unique email",
                            }
                        });
                    });

                    $('.admin-pass').each(function () {
                        $(this).rules("add", {
                            required: true,
                            rangelength: [6,20],
                        });
                    });

                } else {
                    alert('Max 3 Admin allowed');
                }
            });


            $(document).on('click', '.remove-admin', function() {
                $(this).closest('.adminFields').remove();
            });


</script>



<script type="text/html" id="form_tpl">
    <div class = "control-group" > <label class = "control-label"
    for = 'emp_name' > Employer Name </label>
        <div class="controls">
            <input type="text" name="work_emp_name[<%= element.i %>]" class="work_emp_name"
                   value=""/ > </div>
    </div>
</script>



@endsection










