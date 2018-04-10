@extends('admin.default')

@section('content')





@section('css')

        <!-- styles -->


@endsection



        <div class="px-content">
            <div class="page-header">
                <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Companies / </span>Add Company</h1>
            </div>
            



            <div class="row">
                
                <div class="col-md-12">
                

                    <div class="panel">
                      <div class="wizard panel-wizard" id="wizard-validation">
                        
                        <div class="wizard-wrapper">
                          <ul class="wizard-steps">
                            <li data-target="#wizard-1" class="active">
                              <span class="wizard-step-number">1</span>
                              <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
                              <span class="wizard-step-caption">
                                Basic Info.
                              </span>
                            </li>
                            <li data-target="#wizard-2">
                              <span class="wizard-step-number">2</span>
                              <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
                              <span class="wizard-step-caption">
                                 Contact Persons
                              </span>
                            </li>
                            <li data-target="#wizard-3">
                              <span class="wizard-step-number">3</span>
                              <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
                              <span class="wizard-step-caption">
                                 Buildings
                              </span>
                            </li>
                            <li data-target="#wizard-4">
                              <span class="wizard-step-number">4</span>
                              <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
                              <span class="wizard-step-caption">
                                 Contract
                              </span>
                            </li>
                            <li data-target="#wizard-5">
                              <span class="wizard-step-number">5</span>
                              <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
                              <span class="wizard-step-caption">
                                 Modules
                              </span>
                            </li>
                            <li data-target="#wizard-6">
                              <span class="wizard-step-number">6</span>
                              <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
                              <span class="wizard-step-caption">
                                 Admins
                              </span>
                            </li>
                          </ul>
                        </div>

                        <div class="wizard-content">




                          <!-- ===========================wizard-1===================================== -->




                          
                          <form action="{{ route('admin.companies.store') }}" name="createCompanyForm" class="wizard-pane active" id="wizard-1" method="post">

                                <h3 class="m-t-0">Company Basic Information</h3>

                                <div class="row">

                                    <div class="col-md-8">
                                        <fieldset class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="john">
                                        </fieldset>

                                        <fieldset class="form-group">
                                            <label for="second_name">Second Name</label>
                                            <input type="text" name="second_name" id="second_name" class="form-control" placeholder="doe">
                                        </fieldset>

                                        <fieldset class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control" rows="4" placeholder="between 20 to 150 characters"></textarea>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-4">
                                        <label id="file-custom-3" class="custom-file" for="logo">
                                          <input type="file" id="logo" name="logo" class="form-control">
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <fieldset class="form-group">
                                            <label for="country_id">Country</label>
                                            <select name="country_id" id="country_id" class="form-control select2-country" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                <option value="1">Sweden</option>
                                                <option value="2">Pakistan</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <fieldset class="form-group">
                                            <label for="state_id">State</label>
                                            <select name="state_id" id="state_id" class="form-control select2-state" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                <option value="1">Stockholm</option>
                                                <option value="2">Sindh</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <fieldset class="form-group">
                                            <label for="city_id">City</label>
                                            <select name="city_id" id="city_id" class="form-control select2-city" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                <option value="1">Stockholm</option>
                                                <option value="2">Karachi</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <fieldset class="form-group">
                                            <label for="address">Address</label>
                                            <input name="address" id="address" type="text" id="address" class="form-control" placeholder="ST-12 Phase-3/B Crown Center Alaska.">
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="zipcode">Zip Code</label>
                                            <input name="zipcode" id="zipcode" type="text" id="zipcode" class="form-control" placeholder="ABC-999">
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="phone">Phone</label>
                                            <input name="phone" id="phone" type="text" id="phone" class="form-control" placeholder="0987654321">
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="user_status_id">Status</label>
                                            <select name="user_status_id" id="user_status_id" class="form-control select2-status" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                    </div>
                                </div>

                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="submit" class="btn btn-primary" id="createCompanyBtn" data-wizard-action="next">CREATE COMPANY <i class="fa fa-arrow-right m-l-1"></i></button>
                            </div>

                          </form>




                          <!-- ============================wizard-2==================================== -->






                          <form class="wizard-pane" id="wizard-2">
                            

                            <h3 class="m-t-0">Company Contact Person Information</h3>


                            <button type="button" class="btn btn-primary" id="addFieldBtn"> <i class="fa fa-plus"></i> Add More </button>

                            <br><br>

                            <div class="row">
                                <div class="col-md-12" id="sectionContactPerson">

                                    <div class="person">
                                    </div>

                                </div>
                            </div>


                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp;
                              <button type="button" class="btn btn-primary" data-wizard-action="next">STEP 3 <i class="fa fa-arrow-right m-l-1"></i></button>
                            </div>


                          </form>





                          <!-- ============================wizard-2==================================== -->






                          <form class="wizard-pane" id="wizard-3">
                            
                                <h3 class="m-t-0">Building Information</h3>

                                <button type="button" class="btn btn-primary" id="addBuildingBtn"> <i class="fa fa-plus"></i> Add More </button>

                                <div id="sectionBuilding">
                                    <div class="building">
                                        
                                    </div>
                                </div>


                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp;
                              <button type="button" class="btn btn-primary" data-wizard-action="next">STEP 4 <i class="fa fa-arrow-right m-l-1"></i></button>
                            </div>



                          </form>



                          <!-- ============================wizard-4==================================== -->




                          <form class="wizard-pane" id="wizard-4">
                           
                                <h3 class="m-t-0">Company Contract Information</h3>

                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label for="contract-no">Contract No.</label>
                                        <input type="text" name="number" id="contract-no" class="form-control" placeholder="ZXC-886">
                                        <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label for="contract-description">Contract</label>
                                        <textarea name="content" id="contract-content" class="form-control" rows="10"></textarea>
                                        <div class="errorTxt"></div>
                                        <input type="hidden" name="contract_description" id="contract-content-hidden" />
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="start-date">Start Date</label>
                                        <input type="text" name="start_date" id="daterange-3" value="10/24/1984" class="form-control">
                                        <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="end-date">End Date</label>
                                        <input type="text" name="end_date" id="daterange-4" value="10/24/1984" class="form-control">
                                        <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-sm-6 form-group">

                                      <fieldset class="form-group">
                                          <label for="payment-method">Payment Method</label>
                                          <select name="payment_method" class="form-control select2-status" style="width: 100%" data-allow-clear="true">
                                              <option></option>
                                              <option value="cheque">Cheque</option>
                                              <option value="bank">Bank Transfer</option>
                                          </select>
                                          <div class="errorTxt"></div>
                                      </fieldset>

                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="payment-cycle">Payment Cycle</label>
                                            <select name="payment_cycle" class="form-control select2-status" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                <option value="1">Monthly</option>
                                                <option value="2">Yearly</option>
                                            </select>
                                            <div class="errorTxt"></div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="discount">Discount</label>
                                        <input type="number" name="discount" id="discount" class="form-control" min="1" >
                                        <div class="errorTxt"></div>
                                        
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="discount-type">Discount Type</label>
                                            <select name="discount_type" class="form-control select2-status" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                <option value="1">Fixed Price</option>
                                                <option value="2">Percentage</option>
                                            </select>
                                            <div class="errorTxt"></div>
                                        </fieldset>
                                    </div>
                                </div>


                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp;
                              <button type="submit" class="btn btn-primary" data-wizard-action="next">STEP 5 <i class="fa fa-arrow-right m-l-1"></i></button>
                            </div>


                          </form>



                          <!-- ============================wizard-5==================================== -->


                          <form class="wizard-pane" id="wizard-5">
                            
                                <h3 class="m-t-0">Company Modules Information</h3>

                                <button type="button" class="btn btn-primary" id="addModuleBtn"> <i class="fa fa-plus"></i> Add More </button>

                                <div id="sectionModule">
                                    <div class="module">
                                    </div>
                                </div>


                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp;
                              <button type="button" class="btn btn-primary" data-wizard-action="next">STEP 6 <i class="fa fa-arrow-right m-l-1"></i></button>
                            </div>



                          </form>



                          <!-- ============================wizard-6==================================== -->



                          <form class="wizard-pane" id="wizard-6">
                            

                                <h3 class="m-t-0">Company Admin Information</h3>
                                
                                <button type="button" class="btn btn-primary" id="addAdminBtn"> <i class="fa fa-plus"></i> Add More </button>

                                <div id="sectionAdmin">
                                    <div class="admin">
                                    </div>
                                </div>



                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp;
                              <button type="submit" class="btn btn-primary" data-wizard-action="next"><i class="fa fa-plus m-r-1"></i> Add Company </button>
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



                </div>

            </div>




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
            // Initialize Markdown
            
            $(function() {
              $('#contract-content').markdown({
                iconlibrary: 'fa',
                footer:      '<div id="md-character-footer"></div><small id="md-character-counter" class="text-muted">350 character left</small>',
            
                onChange: function(e) {
                  var contentLength = e.getContent().length;
            
                  if (contentLength > 350) {
                    $('#md-character-counter')
                      .removeClass('text-muted')
                      .addClass('text-danger')
                      .html((contentLength - 350) + ' character surplus.');
                  } else {
                    $('#md-character-counter')
                      .removeClass('text-danger')
                      .addClass('text-muted')
                      .html((350 - contentLength) + ' character left.');
                  }
                },

                onBlur: function(e) {
                          $('#contract-content-hidden').val(e.getContent());
                          // alert(e.getContent())
                        }
              });
            
              // Update character counter
              $('#contract-content').trigger('change');
            });
            
            
              $('#daterange-3').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
              });
            
              $('#daterange-4').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
              });
              // -------------------------------------------------------------------------
              // Initialize Select2
              
              $(function() {
                $('.select2-country').select2({
                  placeholder: 'Select country',
                });
              });
              
              $(function() {
                $('.select2-state').select2({
                  placeholder: 'Select state',
                });
              });
              
              $(function() {
                $('.select2-city').select2({
                  placeholder: 'Select city',
                });
              });
              
              $(function() {
                $('.select2-status').select2({
                  placeholder: 'Select status',
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


      $('#wizard-1').pxValidate({
        ignore: '.ignore',
        focusInvalid: false,
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

        submitHandler: function() {

            // var data = $('#wizard-1').serialize();
            var myform = document.getElementById("wizard-1");
            var data = new FormData(myform );

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
                },
                error: function(xhr,status,error)  {

                }

            });
        }
      });


      $('#wizard-2').validate();
      
      $('#wizard-2').on('submit', function(e) {
       
            e.preventDefault();

            // test if form is valid 
            if($('#wizard-2').validate().form()) {

              var myform = document.getElementById("wizard-2");
              var data = new FormData(myform );
              data.append('company_id', company_id);

              // console.log(data);

              /*$.ajax({
                  url: '{{ route("admin.companyContactPeople.store") }}',
                  data: data,
                  cache: false,
                  contentType: false,
                  processData: false,
                  type: 'POST', // For jQuery < 1.9
                  success: function(data){
                      // myform.pxWizard('goTo', 2);

                      console.log(data);
                  },
                  error: function(xhr,status,error)  {

                  }

              });*/
                console.log("validates");
            } else {
                console.log("does not validate");
            }
        });



      $('#wizard-3').validate();
      
      $('#wizard-3').on('submit', function(e) {
       
            e.preventDefault();

            // test if form is valid 
            if( $('#wizard-3').validate().form() ) {

              var myform = document.getElementById("wizard-3");
              var data = new FormData(myform);
              data.append('company_id', company_id);

              /*console.log(data);

              $.ajax({
                  url: '{{ route("admin.companyBuildings.store") }}',
                  data: data,
                  cache: false,
                  contentType: false,
                  processData: false,
                  type: 'POST', // For jQuery < 1.9
                  success: function(data){
                      // myform.pxWizard('goTo', 2);

                      console.log(data);
                  },
                  error: function(xhr,status,error)  {

                  }

              });*/
                console.log("validates");
            } else {
                console.log("does not validate");
            }
        });


      $('#wizard-4').validate({

          rules: {
              "contract_no": {
                  required: true,
                  maxlength: 150
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

                      console.log(data);
                  },
                  error: function(xhr,status,error)  {

                  }

              });
                console.log("validates");
            } else {
                console.log("does not validate");
            }
        });



/*        $("#wizard-4").pxValidate({
            ignore: '.ignore',
            focusInvalid: true,
            rules: {
              'contract-no': {
                required:  true,
                minlength: 3,
                maxlength: 20,
              },
              'contract-description': {
                required:  true,
                minlength: 3,
                maxlength: 20,
              },
              'start-date': {
                required:  true,
                minlength: 3,
                maxlength: 20,
              },
              'end-date': {
                required:  true,
                minlength: 3,
                maxlength: 20,
              },
              'payment-method': {
                required:  true,
                minlength: 3,
                maxlength: 20,
              },
              'payment-cycle': {
                required:  true,
                minlength: 3,
                maxlength: 20,
              },
              'discount': {
                required:  true,
                minlength: 3,
                maxlength: 20,
              },
              'discount-type': {
                required:  true,
                minlength: 3,
                maxlength: 20,
              }
            },
          });*/





/*        $("#wizard-5").pxValidate({
            ignore: '.ignore',
            focusInvalid: true,
            rules: {
              'module': {
                required:  true,
              },
              'price': {
                required:  true,
                minlength: 3,
                maxlength: 20,
              },
            },
          });*/



/*        $("#wizard-6").pxValidate({
            ignore: '.ignore',
            focusInvalid: true,
            rules: {
              'admin-name': {
                required:  true,
                minlength: 3,
                maxlength: 20,
              },
              'admin-email': {
                required:  true,
                minlength: 3,
                maxlength: 20,
                email: true
              },
              'admin-password': {
                required:  true,
                minlength: 6,
                maxlength: 20,
              },
            },
          });

*/











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


                $("#wizard-2").validate({
                    rules: {
                        "person_name[0]": {
                            required: true
                        }
                    }
                });

                $("#wizard-3").validate({
                    rules: {
                        "building_name[0]": {
                            required: true
                        }
                    }
                });

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
                person += '<input type="text" name="person_name['+i+']" class="person-name form-control" placeholder="john doe">';
                person += '</fieldset>';
                person += '</div>';
                person += '<div class="col-sm-6 form-group">';
                person += '<fieldset class="form-group">';
                person += '<label for="person-email">Email</label>';
                person += '<input type="email" name="person_email['+i+']" class="person-email form-control" placeholder="john@example.com">';
                person += '</fieldset>';
                person += '</div>';
                person += '<div class="col-sm-6 form-group">';
                person += '<fieldset class="form-group">';
                person += '<label for="person-phone">Phone</label>';
                person += '<input type="text" name="person_phone['+i+']" class="person-phone form-control" placeholder="0987654321">';
                person += '</fieldset>';
                person += '</div>';
                person += '<div class="col-sm-6 form-group">';
                person += '<fieldset class="form-group">';
                person += '<label for="person-fax">Fax</label>';
                person += '<input type="text" name="person_fax['+i+']" class="person-fax form-control" placeholder="0987654321">';
                person += '</fieldset>';
                person += '</div>';
                person += '<div class="col-sm-12 form-group">';
                person += '<fieldset class="form-group">';
                person += '<label for="person-address">Address</label>';
                person += '<input type="text" name="person_address['+i+']" class="person-address form-control" placeholder="ST-12 Phase-3/B Crown Center Alaska.">';
                person += '</fieldset>';
                person += '</div>';
                person += '<div class="col-sm-6 form-group">';
                person += '<fieldset class="form-group">';
                person += '<label for="person-department">Department</label>';
                person += '<input type="text" name="person_department['+i+']" class="person-department form-control" placeholder="Human Resource Department">';
                person += '</fieldset>';
                person += '</div>';
                person += '<div class="col-sm-6 form-group">';
                person += '<fieldset class="form-group">';
                person += '<label for="person-designation">Designation</label>';
                person += '<input type="text" name="person_designation['+i+']" class="person-designation form-control" placeholder="Asst. Manager">';
                person += '</fieldset>';
                person += '</div>';
                person += '</div>';
                person += '</div>';

                $(".person").prepend(person);

                i += 1;

                /*$('.person-name').each(function () {
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
                });*/

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

                  /*$('.building-name').each(function () {
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
                  });*/

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

            var module = '<div class="moduleFields">';
                module += '<h5 class="bg-success p-x-1 p-y-1" >Module <i class="fa fa-times fa-lg remove-module pull-right cursor-p"></i></h5>';
                module += '<div class="row">';
                module += '<div class="col-sm-6 form-group">';
                module += '<label for="module">Module</label>';
                module += '<select name="module" class="form-control select2-status" style="width: 100%" data-allow-clear="true">';
                module += '<option></option>';
                module += '<option value="1">Module</option>/';
                module += '<option value="2">Module 2</option>';
                module += '</select>';
                module += '</div>'
                module += '<div class="col-sm-6 form-group">';
                module += '<label for="price">Price</label>';
                module += '<input type="number" name="price" id="price" class="form-control" min="1" >';
                module += '</div>'
                module += '</div>'
                module += '</div>'


            $('#addModuleBtn').on('click', function() {
                $('.module').prepend(module);
            });


            $(document).on('click', '.remove-module', function() {

                $(this).closest('.moduleFields').remove();

            });



            // Add More Admin

            var admin = '<div class="adminFields">';
                admin += '<h5 class="bg-success p-x-1 p-y-1" >Admin <i class="fa fa-times fa-lg remove-admin pull-right cursor-p"></i></h5>';
                admin += '<div class="row">';
                admin += '<div class="col-sm-12 form-group">';
                admin += '<label for="admin-name">Name</label>';
                admin += '<input type="text" name="admin_name" id="admin-name"  class="form-control" placeholder="john doe">';
                admin += '</div>';
                admin += '<div class="col-sm-12 form-group">';
                admin += '<label for="admin-email">Email</label>';
                admin += '<input type="email" name="admin_email" id="admin-email" class="form-control" placeholder="john@example.com">';
                admin += '</div>';
                admin += '<div class="col-sm-12 form-group">';
                admin += '<label for="admin-password">Password</label>';
                admin += '<input type="password" name="admin_password" id="admin-password" class="form-control" placeholder="testingpass123">';
                admin += '</div>';
                admin += '</div>';
                admin += '</div>';


            $('#addAdminBtn').on('click', function() {
                if ($(".adminFields").length < 3) {

                    $('.admin').prepend(admin);
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










