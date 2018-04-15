
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
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Company Name" value="{{ isset($company) ? $company->name:'' }}" />
                                            <div class="errorTxt"></div>
                                            
                                        </fieldset>

                                        <fieldset class="form-group">
                                            <label for="second_name">Second Name</label>
                                            <input type="text" name="second_name" id="second_name" class="form-control" placeholder="Second Name" value="{{ isset($company) ? $company->name:'' }}" />
                                            <div class="errorTxt"></div>
                                        </fieldset>

                                        <fieldset class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Company Description">{{ isset($company) ? $company->description:'' }}</textarea>
                                            <div class="errorTxt"></div>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-4">
                                        <!-- <label id="file-custom-3" class="custom-file" for="logo">
                                          <input type="file" id="logo" name="logo" class="form-control">
                                        </label>
                                        <div class="errorTxt"></div> -->

                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                          <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                                          <div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                                <input type="file" name="logo" id="logo" />
                                            </span>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                          </div>
                                        </div>
                                        <div class="errorTxt"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <fieldset class="form-group">
                                            <label for="country_id">Country</label>
                                            <select name="country_id" id="country_id" class="form-control select2-country" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                @foreach ($countries as $country)
                                                     @if (isset($company) && $country->short == $company->country->short)
                                                      <option value="{{ $country->id }}" selected="selected">{{ $country->name }}</option> 
                                                     @elseif ($country->short == 'SE')
                                                      <option value="{{ $country->id }}" selected="selected">{{ $country->name }}</option> 
                                                     @else
                                                      <option value="{{ $country->id }}">{{ $country->name }}</option> 
                                                     @endif
                                                @endforeach
                                            </select>
                                            <div class="errorTxt"></div>

                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <fieldset class="form-group">
                                            <label for="state_id">State</label>
                                            <select name="state_id" id="state_id" class="form-control select2-state" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                @foreach ($states as $state)
                                                     @if (isset($company) && $state->id == $company->state->id)
                                                      <option value="{{ $state->id }}" selected="selected">{{ $state->name }}</option> 
                                                     @else
                                                      <option value="{{ $state->id  }}">{{ $state->name }}</option> 
                                                     @endif
                                                @endforeach
                                            </select>
                                            <div class="errorTxt"></div>

                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <fieldset class="form-group">
                                            <label for="city_id">City</label>
                                            <select name="city_id" id="city_id" class="form-control select2-city" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                @foreach ($cities as $city)
                                                  @if (isset($company) && $city->id == $company->city->id)
                                                   <option value="{{ $city->id }}" selected="selected">{{ $city->name }}</option> 
                                                  @else
                                                   <option value="{{ $city->id  }}">{{ $city->name }}</option> 
                                                  @endif
                                                @endforeach
                                            </select>
                                            <div class="errorTxt"></div>

                                        </fieldset>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <fieldset class="form-group">
                                            <label for="address">Address</label>
                                            <input name="address" id="address" type="text" id="address" class="form-control" placeholder="Company Address" value="{{ isset($company) ? $company->address:'' }}">
                                            <div class="errorTxt"></div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="zipcode">Zip Code</label>
                                            <input name="zipcode" id="zipcode" type="text" id="zipcode" class="form-control" placeholder="Zipcode" value="{{ isset($company) ? $company->zipcode:'' }}">
                                            <div class="errorTxt"></div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="phone">Phone</label>
                                            <input name="phone" id="phone" type="text" id="phone" class="form-control" placeholder="Phone Number" value="{{ isset($company) ? $company->phone:'' }}">
                                            <div class="errorTxt"></div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="user_status_id">Status</label>
                                            <select name="user_status_id" id="user_status_id" class="form-control select2-status" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                @foreach ($userStatus as $status)
                                                  @if (isset($company) && $status->id == $company->userStatus->id)
                                                   <option value="{{ $status->id }}" selected="selected">{{ $status->name }}</option> 
                                                  @elseif ($status->name == "active")
                                                   <option value="{{ $status->id }}" selected="selected">{{ $status->name }}</option> 
                                                  @else
                                                   <option value="{{ $status->id  }}">{{ $status->name }}</option> 
                                                  @endif
                                                @endforeach
                                            </select>
                                            <div class="errorTxt"></div>

                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                    </div>
                                </div>

                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                                @if (isset($company))
                                    <button type="submit" class="btn btn-primary" id="updateCompanyBtn" data-wizard-action="next">UPDATE COMPANY <i class="fa fa-arrow-right m-l-1"></i></button>
                                @else
                                    <button type="submit" class="btn btn-primary" id="createCompanyBtn" data-wizard-action="next">CREATE COMPANY <i class="fa fa-arrow-right m-l-1"></i></button>
                                @endif
                            </div>

                          </form>




                          <!-- ============================wizard-2==================================== -->






                          <form class="wizard-pane" id="wizard-2">
                            

                            <h3 class="m-t-0">Company Contact Persons</h3>


                            <button type="button" class="btn btn-primary" id="addFieldBtn"> <i class="fa fa-plus"></i> Add More </button>

                            <br><br>

                            <div class="row">
                                <div class="col-md-12" id="sectionContactPerson">

                                    <div class="person">
                                    </div>

                                </div>
                            </div>


                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <!-- <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp; -->
                              <button type="submit" class="btn btn-primary" id="addContactPersonBtn" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
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
                              <!-- <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp; -->
                              <button type="submit" class="btn btn-primary" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
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
                                          <select name="payment_method" class="form-control select2-payment-method" style="width: 100%" data-allow-clear="true">
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
                                            <select name="payment_cycle" class="form-control select2-payment-cycle" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                @foreach ($paymentCycles as $paymentCycle)
                                                  <option value="{{ $paymentCycle->id }}">{{ $paymentCycle->name }}</option> 
                                                @endforeach
                                            </select>
                                            <div class="errorTxt"></div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="discount">Discount</label>
                                        <input type="number" name="discount" id="discount" class="form-control" value="0">
                                        <div class="errorTxt"></div>
                                        
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="discount-type">Discount Type</label>
                                            <select name="discount_type" class="form-control select2-discount-type" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                @foreach ($discountTypes as $discountType)
                                                  <option value="{{ $discountType->id }}">{{ $discountType->name }}</option> 
                                                @endforeach
                                            </select>
                                            <div class="errorTxt"></div>
                                        </fieldset>
                                    </div>
                                </div>


                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <!-- <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp; -->
                              <button type="submit" class="btn btn-primary" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
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
                              <!-- <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp; -->
                              <button type="submit" class="btn btn-primary" data-wizard-action="next">STEP 6 <i class="fa fa-arrow-right m-l-1"></i></button>
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
                              <!-- <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp; -->
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
