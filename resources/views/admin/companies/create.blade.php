@extends('admin.default')

@section('content')





@section('css')

        <!-- styles -->
        <link href="{{ asset('/skin-1/assets/draganddrop/jquery.fileuploader.css') }}" media="all" rel="stylesheet">
        <link href="{{ asset('/skin-1/assets/draganddrop/css/jquery.fileuploader-theme-dragdrop.css') }}" media="all" rel="stylesheet">
        

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




                          
                          <form class="wizard-pane active" id="wizard-1">

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
                                        <input type="file" name="files">
                                    </div>


                                    <div class="col-sm-4 form-group">
                                        <fieldset class="form-group">
                                            <label for="country_id">Country</label>
                                            <select name="country_id" id="country_id" class="form-control select2-country" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                <option value="NC">North Carolina</option>
                                                <option value="OH">Ohio</option>
                                                <option value="PA">Pennsylvania</option>
                                                <option value="RI">Rhode Island</option>
                                                <option value="SC">South Carolina</option>
                                                <option value="VT">Vermont</option>
                                                <option value="VA">Virginia</option>
                                                <option value="WV">West Virginia</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <fieldset class="form-group">
                                            <label for="state_id">State</label>
                                            <select name="state_id" id="state_id" class="form-control select2-state" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                <option value="GA">Georgia</option>
                                                <option value="IN">Indiana</option>
                                                <option value="ME">Maine</option>
                                                <option value="MD">Maryland</option>
                                                <option value="MA">Massachusetts</option>
                                                <option value="MI">Michigan</option>
                                                <option value="NH">New Hampshire</option>
                                                <option value="NJ">New Jersey</option>
                                                <option value="NY">New York</option>
                                                <option value="NC">North Carolina</option>
                                                <option value="OH">Ohio</option>
                                                <option value="PA">Pennsylvania</option>
                                                <option value="RI">Rhode Island</option>
                                                <option value="SC">South Carolina</option>
                                                <option value="VT">Vermont</option>
                                                <option value="VA">Virginia</option>
                                                <option value="WV">West Virginia</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <fieldset class="form-group">
                                            <label for="city_id">City</label>
                                            <select name="city_id" id="city_id" class="form-control select2-city" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                <option value="AK">Alaska</option>
                                                <option value="HI">Hawaii</option>
                                                <option value="CA">California</option>
                                                <option value="NV">Nevada</option>
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
                                        <fieldset class="form-group">
                                            <label for="max_users">Max Users</label>
                                            <input name="max_users" id="max_users" type="number" class="form-control" min="1" max="3">
                                        </fieldset>
                                    </div>
                                </div>

                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="button" class="btn btn-primary" data-wizard-action="next">STEP 2 <i class="fa fa-arrow-right m-l-1"></i></button>
                            </div>

                          </form>




                          <!-- ============================wizard-2==================================== -->






                          <form class="wizard-pane" id="wizard-2">
                            

                            <h3 class="m-t-0">Company Contact Person Information</h3>


                            <button type="button" class="btn btn-primary" id="addFieldBtn"> <i class="fa fa-plus"></i> Add More </button>

                            <br><br>

                            <div class="row">
                                <div class="col-md-12" id="sectionContactPerson">

                                        <div id="person-1">

                                            <div id="contactPersonFields">

                                                <h5 class="bg-success p-x-1 p-y-1 m-t-0" >Person <i class="fa fa-times fa-lg remove-contact-person pull-right cursor-p"></i></h5>

                                                <div class="row">
                                                    <div class="col-sm-6 form-group">
                                                        <fieldset class="form-group">
                                                            <label for="person-name">Name</label>
                                                            <input type="text" name="person_name[]" class="person-name form-control" placeholder="john doe">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <fieldset class="form-group">
                                                            <label for="person-email">Email</label>
                                                            <input type="email" name="person_email[]" class="person-email form-control" placeholder="john@example.com">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <fieldset class="form-group">
                                                            <label for="person-phone">Phone</label>
                                                            <input type="text" name="person_phone[]" class="person-phone form-control" placeholder="0987654321">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <fieldset class="form-group">
                                                            <label for="person-fax">Fax</label>
                                                            <input type="text" name="person_fax[]" class="person-fax form-control" placeholder="0987654321">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-sm-12 form-group">
                                                        <fieldset class="form-group">
                                                            <label for="person-address">Address</label>
                                                            <input type="text" name="person_address[]" class="person-address form-control" placeholder="ST-12 Phase-3/B Crown Center Alaska.">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <fieldset class="form-group">
                                                            <label for="person-department">Department</label>
                                                            <input type="text" name="person_department[]" class="person-department form-control" placeholder="Human Resource Department">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-sm-6 form-group">
                                                        <fieldset class="form-group">
                                                            <label for="person-designation">Designation</label>
                                                            <input type="text" name="person_designation[]" class="person-designation form-control" placeholder="Asst. Manager">
                                                        </fieldset>
                                                    </div>
                                                </div>    
                                            </div>
                                            
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
                                    <div class="building-1">
                                        <div id="buildingFields" class="buildingFields">

                                            <h5 class="bg-success p-x-1 p-y-1" >Building <i class="fa fa-times fa-lg remove-building pull-right cursor-p"></i></h5>
                                            
                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label for="building-name">Building Name</label>
                                                    <input type="text" name="building_name" id="building-name" class="form-control" placeholder="Crown Towers">
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="building-address">Address</label>
                                                    <input type="text" name="building_address" id="building-address" class="form-control" placeholder="ST-12 Phase-3/B Crown Center Alaska.">
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="building-zip">Zip Code</label>
                                                    <input type="text" name="building_zip" id="building-zip" class="form-control" placeholder="ABC-999">
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="building-no-of-floors">No. of Floors</label>
                                                    <div class="row">
                                                        <div class="col-sm-6 form-group">
                                                            <input type="number" name="building_no_of_floors" id="building-no-of-floors" class="form-control building-no-of-floors" min="1" value="1">
                                                        </div>
                                                        <div class="col-sm-6 form-group">
                                                            <button type="button" class="btn btn-primary addFloorBtn"> <i class="fa fa-plus"></i> Add Floors </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sectionFloor">
                                            </div>
                                        </div>
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
                                        <input type="text" name="contract_no" id="contract-no" class="form-control" placeholder="ZXC-886">
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label for="contract-description">Contract</label>
                                        <textarea name="contract_description" id="markdown" class="form-control" rows="10"></textarea>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="start-date">Start Date</label>
                                        <input type="text" name="start_date" id="daterange-3" value="10/24/1984" class="form-control">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="end-date">End Date</label>
                                        <input type="text" name="end_date" id="daterange-4" value="10/24/1984" class="form-control">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="payment-method">Payment Method</label>
                                        <select name="payment_method" class="form-control select2-status" style="width: 100%" data-allow-clear="true">
                                            <option></option>
                                            <option value="1">Paypal</option>
                                            <option value="2">Stripe</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="payment-cycle">Payment Cycle</label>
                                        <select name="payment_cycle" class="form-control select2-status" style="width: 100%" data-allow-clear="true">
                                            <option></option>
                                            <option value="1">Monthly</option>
                                            <option value="2">Yearly</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="discount">Discount</label>
                                        <input type="number" name="discount" id="discount" class="form-control" min="1" >
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="discount-type">Discount Type</label>
                                        <select name="discount_type" class="form-control select2-status" style="width: 100%" data-allow-clear="true">
                                            <option></option>
                                            <option value="1">Sale</option>
                                            <option value="2">Sale 2</option>
                                        </select>
                                    </div>
                                </div>


                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp;
                              <button type="button" class="btn btn-primary" data-wizard-action="next">STEP 5 <i class="fa fa-arrow-right m-l-1"></i></button>
                            </div>


                          </form>



                          <!-- ============================wizard-5==================================== -->


                          <form class="wizard-pane" id="wizard-5">
                            
                                <h3 class="m-t-0">Company Modules Information</h3>

                                <button type="button" class="btn btn-primary" id="addModuleBtn"> <i class="fa fa-plus"></i> Add More </button>

                                <div id="sectionModule">
                                    <div id="module-1">
                                        <div id="moduleFields">

                                            <h5 class="bg-success p-x-1 p-y-1" >Module <i class="fa fa-times fa-lg remove-module pull-right cursor-p"></i></h5>

                                            <div class="row">
                                                <div class="col-sm-6 form-group">
                                                    <label for="module">Module</label>
                                                    <select name="module" class="form-control select2-status" style="width: 100%" data-allow-clear="true">
                                                        <option></option>
                                                        <option value="1">Module</option>
                                                        <option value="2">Module 2</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                    <label for="price">Price</label>
                                                    <input type="number" name="price" id="price" class="form-control" min="1" >
                                                </div>
                                            </div>

                                        </div>
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
                                    <div id="admin">
                                        <div id="adminFields" class="adminFields">

                                            <h5 class="bg-success p-x-1 p-y-1" >Admin <i class="fa fa-times fa-lg remove-admin pull-right cursor-p"></i></h5>
                                
                                            <div class="row">
                                                <div class="col-sm-12 form-group">
                                                    <label for="admin-name">Name</label>
                                                    <input type="text" name="admin_name" id="admin-name"  class="form-control" placeholder="john doe">
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <label for="admin-email">Email</label>
                                                    <input type="email" name="admin_email" id="admin-email" class="form-control" placeholder="john@example.com">
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                    <label for="admin-password">Password</label>
                                                    <input type="password" name="admin_password" id="admin-password" class="form-control" placeholder="testingpass123">
                                                </div>
                                            </div>

                                        </div>
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
<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script> -->
<script src="{{ asset('/skin-1/assets/draganddrop/jquery.fileuploader.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/skin-1/assets/draganddrop/js/custom.js') }}" type="text/javascript"></script>


<script type="text/javascript">





            // -------------------------------------------------------------------------
            // Initialize Markdown
            
            $(function() {
              $('#markdown').markdown({
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
              });
            
              // Update character counter
              $('#markdown').trigger('change');
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

/*      $('#wizard-1').pxValidate({
        ignore: '.ignore',
        focusInvalid: false,
        rules: {
          'name': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'second_name': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'description': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'country_id': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'state_id': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'city_id': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'address': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'zipcode': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'phone': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'user_status_id': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'max_users': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },

        },
      });
*/






    






/*      $("#wizard-2").pxValidate({
        ignore: '.ignore, .select2-input',
        focusInvalid: true,
        rules: {

        },
      });

        $(".person-name").rules("add", { 
          required:true
        });

        $(".person-email").rules("add", { 
          required:true
        });

        $(".person-phone").rules("add", { 
          required:true
        });

        $(".person-fax").rules("add", { 
          required:true
        });

        $(".person-address").rules("add", { 
          required:true
        });

        $(".person-department").rules("add", { 
          required:true
        });

        $(".person-designation").rules("add", { 
          required:true
        });*/








/*      $("#wizard-3").pxValidate({
        ignore: '.ignore',
        focusInvalid: true,
        rules: {
          'building-name': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'building-address': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'building-zip': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'building-no-of-floors': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'building-floor-no': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'building-floor-no-of-rooms': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
        },
      });*/






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
            });

    


            // Add More Contact Persons
            var i = 1;
            $('#addFieldBtn').on('click', function() {

                var personData = $('#contactPersonFields').clone(true);

                i = i+1;

                dataForAppend = '<div id="person-'+i+'"';
                dataForAppend += "></div>";

                $('#sectionContactPerson').prepend(dataForAppend);

                $('#person-'+i).html(personData);

                $('.remove-contact-person').show();

                $('.remove-contact-person').last().hide();


            });


            $('#sectionContactPerson').on('click', '.remove-contact-person', function() {

                $(this).closest('#contactPersonFields').remove();

            });



            // Add More Buildings

            var j = 1;
            $('#addBuildingBtn').on('click', function() {

                var buildingData = $('#buildingFields').clone(true);

                j = j+1;

                dataForBuildingAppend = '<div id="building-'+j+'"';
                dataForBuildingAppend += "></div>";

                $('#sectionBuilding').prepend(dataForBuildingAppend);

                $('#building-'+j).html(buildingData);

            });


            $('#buildingFields').on('click', '.remove-building', function() {

                $(this).closest('#buildingFields').remove();

            });


            var floor = '<div class="floor">';
                floor += '<div id="floorFields">';
                floor += '<div class="row">';
                floor += '<div class="col-sm-6 form-group">';
                floor += '<label for="building-floor-no">Floor No.</label>';
                floor += '<input type="name" name="building_floor_no" class="form-control building-floor-no" min="1" >';
                floor += '</div>';
                floor += '<div class="col-sm-6 form-group">';
                floor += '<label for="building-floor-no-of-rooms">No. of Rooms</label>';
                floor += '<div class="row">';
                floor += '<div class="col-sm-6">';
                floor += '<input type="number" name="building_floor_no_of_rooms" class="form-control building-floor-no-of-rooms" min="1" >';
                floor += '</div>';
                floor += '<div class="col-sm-6">';
                floor += '<i class="fa fa-times fa-lg remove-floor cursor-p"></i>';
                floor += '</div>';
                floor += '</div>';
                floor += '</div>';
                floor += '</div>';
                floor += '</div>';
                floor += '</div>';


            // Add More Floors

            var k = 1;

            $('.buildingFields').on('click', '.addFloorBtn', function() {

                var num_floors = $(this).parent().parent().find('.building-no-of-floors').val();
                var floorSecion = $(this).parent().parent().parent().parent().parent().find('.sectionFloor');
                var floorsExist = $(this).parent().parent().parent().parent().parent().find('.floor');


                if (num_floors <= floorsExist.length) {
                    alert('Floors are already added');
                } else {

                    for (i=1; i <= num_floors-floorsExist.length; i++) {
                        floorSecion.append(floor);
                    }
                    
                }

            });


            $('.buildingFields').on('click', '.remove-floor', function() {

                $(this).closest('.floor').remove();

            });


            // Add More Module

            var m = 1;
            $('#addModuleBtn').on('click', function() {

                var moduleData = $('#moduleFields').clone(true);

                m = m+1;

                dataForModuleAppend = '<div id="module-'+m+'"';
                dataForModuleAppend += "></div>";

                $('#sectionModule').prepend(dataForModuleAppend);

                $('#module-'+m).html(moduleData);

                $('.remove-module').show();

                $('.remove-module').last().hide();

            });


            $('#moduleFields').on('click', '.remove-module', function() {

                $(this).closest('#moduleFields').remove();

            });



            // Add More Admin

            $('#addAdminBtn').on('click', function() {



                if ($(".adminFields").length < 3) {

                    var adminData = $('#adminFields').clone(true);


                    console.log($(".adminFields").length);

                    dataForAdminAppend = '<div id="admin"';
                    dataForAdminAppend += "></div>";

                    $('#sectionAdmin').prepend(dataForAdminAppend);

                    $('#admin').html(adminData);

                    $('.remove-admin').show();

                    $('.remove-admin').last().hide();


                } else {
                    alert('Max 3 Admin allowed');
                }

            });


            $('#adminFields').on('click', '.remove-admin', function() {

                $(this).closest('#adminFields').remove();

            });


</script>







@endsection










