@extends('admin.default')

@section('content')





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
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="john">
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="second_name">Second Name</label>
                                            <input type="text" name="second_name" id="second_name" class="form-control" placeholder="doe">
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <fieldset class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control" placeholder="between 20 to 150 characters"></textarea>
                                        </fieldset>
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
                              <button type="button" class="btn btn-primary btn-lg" data-wizard-action="next">STEP 2 <i class="fa fa-arrow-right m-l-1"></i></button>
                            </div>

                          </form>




                          <!-- ============================wizard-2==================================== -->






                          <form class="wizard-pane" id="wizard-2">
                            

                            <h3 class="m-t-0">Company Contact Person Information</h3>


                            <div class="row">
                                <div class="col-md-12">
                                    
                                        <h5 class="m-t-0">Person # 1</h5>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                    <label for="person-name">Name</label>
                                                    <input type="text" name="person_name" id="person-name" class="form-control" placeholder="john doe">
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                    <label for="person-email">Email</label>
                                                    <input type="email" name="person_email" id="person-email" class="form-control" placeholder="john@example.com">
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                    <label for="person-phone">Phone</label>
                                                    <input type="text" name="person_phone" id="person-phone" class="form-control" placeholder="0987654321">
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                    <label for="person-fax">Fax</label>
                                                    <input type="text" name="person_fax" id="person-fax" class="form-control" placeholder="0987654321">
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <fieldset class="form-group">
                                                    <label for="person-address">Address</label>
                                                    <input type="text" name="person_address" id="person-address" class="form-control" placeholder="ST-12 Phase-3/B Crown Center Alaska.">
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                    <label for="person-department">Department</label>
                                                    <input type="text" name="person_department" id="person-department" class="form-control" placeholder="Human Resource Department">
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                    <label for="person-designation">Designation</label>
                                                    <input type="text" name="person_designation" id="person-designation" class="form-control" placeholder="Asst. Manager">
                                                </fieldset>
                                            </div>
                                        </div>


                                </div>
                            </div>





                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="button" class="btn btn-lg" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp;
                              <button type="button" class="btn btn-primary btn-lg" data-wizard-action="next">STEP 3 <i class="fa fa-arrow-right m-l-1"></i></button>
                            </div>



                          </form>





                          <!-- ============================wizard-2==================================== -->






                          <form class="wizard-pane" id="wizard-3">
                            

                                <h3 class="m-t-0">Building Information</h3>

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
                                        <input type="number" name="building_no_of_floors" id="building-no-of-floors" class="form-control" min="1">
                                    </div>
                                </div>

                                <h3 class="m-t-0">Floor Information</h3>

                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label for="building-floor-no">Floor No.</label>
                                        <input type="number" name="building_floor_no" id="building-floor-no" class="form-control" min="1" >
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="building-floor-no-of-rooms">No. of Rooms</label>
                                        <input type="number" name="building_floor_no_of_rooms" id="building-floor-no-of-rooms" class="form-control" min="1" >
                                    </div>
                                </div>




                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="button" class="btn btn-lg" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp;
                              <button type="button" class="btn btn-primary btn-lg" data-wizard-action="next">STEP 4 <i class="fa fa-arrow-right m-l-1"></i></button>
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
                              <button type="button" class="btn btn-lg" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp;
                              <button type="button" class="btn btn-primary btn-lg" data-wizard-action="next">STEP 5 <i class="fa fa-arrow-right m-l-1"></i></button>
                            </div>



                          </form>



                          <!-- ============================wizard-5==================================== -->


                          <form class="wizard-pane" id="wizard-5">
                            


                                <h3 class="m-t-0">Company Modules Information</h3>

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




                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="button" class="btn btn-lg" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp;
                              <button type="button" class="btn btn-primary btn-lg" data-wizard-action="next">STEP 6 <i class="fa fa-arrow-right m-l-1"></i></button>
                            </div>



                          </form>



                          <!-- ============================wizard-6==================================== -->



                          <form class="wizard-pane" id="wizard-6">
                            

                                <h3 class="m-t-0">Company Admin Information</h3>

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



                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="button" class="btn btn-lg" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp;
                              <button type="submit" class="btn btn-primary btn-lg" data-wizard-action="next"><i class="fa fa-plus m-r-1"></i> Add Company </button>
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

      /*$('#wizard-1').pxValidate({
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
      });*/














      /*$("#wizard-2").pxValidate({
        ignore: '.ignore, .select2-input',
        focusInvalid: true,
        rules: {
          'person-name': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'person-email': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'person-phone': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'person-fax': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'person-address': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'person-department': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
          'person-designation': {
            required:  true,
            minlength: 3,
            maxlength: 20,
          },
        },
      });*/










      // $("#wizard-3").pxValidate({
      //   ignore: '.ignore',
      //   focusInvalid: true,
      //   rules: {
      //     'building-name': {
      //       required:  true,
      //       minlength: 3,
      //       maxlength: 20,
      //     },
      //     'building-address': {
      //       required:  true,
      //       minlength: 3,
      //       maxlength: 20,
      //     },
      //     'building-zip': {
      //       required:  true,
      //       minlength: 3,
      //       maxlength: 20,
      //     },
      //     'building-no-of-floors': {
      //       required:  true,
      //       minlength: 3,
      //       maxlength: 20,
      //     },
      //     'building-floor-no': {
      //       required:  true,
      //       minlength: 3,
      //       maxlength: 20,
      //     },
      //     'building-floor-no-of-rooms': {
      //       required:  true,
      //       minlength: 3,
      //       maxlength: 20,
      //     },
      //   },
      // });






        // $("#wizard-4").pxValidate({
        //     ignore: '.ignore',
        //     focusInvalid: true,
        //     rules: {
        //       'contract-no': {
        //         required:  true,
        //         minlength: 3,
        //         maxlength: 20,
        //       },
        //       'contract-description': {
        //         required:  true,
        //         minlength: 3,
        //         maxlength: 20,
        //       },
        //       'start-date': {
        //         required:  true,
        //         minlength: 3,
        //         maxlength: 20,
        //       },
        //       'end-date': {
        //         required:  true,
        //         minlength: 3,
        //         maxlength: 20,
        //       },
        //       'payment-method': {
        //         required:  true,
        //         minlength: 3,
        //         maxlength: 20,
        //       },
        //       'payment-cycle': {
        //         required:  true,
        //         minlength: 3,
        //         maxlength: 20,
        //       },
        //       'discount': {
        //         required:  true,
        //         minlength: 3,
        //         maxlength: 20,
        //       },
        //       'discount-type': {
        //         required:  true,
        //         minlength: 3,
        //         maxlength: 20,
        //       }
        //     },
        //   });





        $("#wizard-5").pxValidate({
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
          });



        $("#wizard-6").pxValidate({
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


</script>







@endsection
