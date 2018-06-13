
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

                                @if (isset($company))
                                    <input name="_method" type="hidden" value="PATCH">
                                @endif

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
                                          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                @if (isset($company))
                                                    <input type="hidden" name="logo-hidden" id="logo-hidden" value="{{ $company->logo }}">

                                                    <img src="{{ asset('storage/company_logos/'.$company->logo) }}" data-src="{{ asset('storage/company_logos/'.$company->logo) }}" alt="" />
                                                @endif
                                          </div>
                                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                          <div>
                                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                            <input type="file" name="logo" id="logo"></span>
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
                                                   <option value="{{ $status->id }}" selected="selected">{{ ucfirst($status->name) }}</option> 
                                                  @elseif ($status->name == "active")
                                                   <option value="{{ $status->id }}" selected="selected">{{ ucfirst($status->name) }}</option> 
                                                  @else
                                                   <option value="{{ $status->id  }}">{{ ucfirst($status->name) }}</option> 
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
                                    <a href="{!! route('admin.companies.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                                @if (isset($company))
                                    <button type="submit" class="btn btn-primary" id="updateCompanyBtn" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                                @else
                                    <button type="submit" class="btn btn-primary" id="createCompanyBtn" data-wizard-action="next">CREATE COMPANY <i class="fa fa-arrow-right m-l-1"></i></button>
                                @endif
                            </div>

                          </form>




                          <!-- ============================wizard-2==================================== -->






                          <form class="wizard-pane" id="wizard-2">
                            
                            @if (isset($company))
                                <input name="_method" type="hidden" value="PATCH">
                            @endif

                            <h3 class="m-t-0">Company Contact Persons</h3>


                            <button type="button" class="btn btn-primary" id="addFieldBtn"> <i class="fa fa-plus"></i> Add More </button>

                            <br><br>

                            <div class="row">
                                <div class="col-md-12" id="sectionContactPerson">

                                    <div class="person">

                                    @if (isset($company))

                                        @foreach ($company->companyContactPeople as $contactPerson)
                                        <div class="contactPersonFields">
                                            <input type="hidden" name="person[{{ $contactPerson->id }}][id]" class="remove-person-id" value="{{ $contactPerson->id }}" />
                                            <h5 class="bg-success p-x-1 p-y-1 m-t-0" >Person <i class="fa fa-times fa-lg remove-contact-person pull-right cursor-p"></i></h5>
                                                <div class="row">
                                                <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                <label for="person-name">Name</label>
                                                <input type="text" name="person[{{ $contactPerson->id }}][name]" data-person="{{ $contactPerson->id }}" class="person-name form-control" placeholder="Person Name" value="{{ $contactPerson->name }}" />
                                                </fieldset>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                <label for="person-email">Email</label>
                                                <input type="email" name="person[{{ $contactPerson->id }}][email]" class="person-email form-control" placeholder="Person Email" value="{{ $contactPerson->email }}" />
                                                </fieldset>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                <label for="person-phone">Phone</label>
                                                <input type="text" name="person[{{ $contactPerson->id }}][phone]" class="person-phone form-control" placeholder="Person Phone No" value="{{ $contactPerson->phone }}" />
                                                </fieldset>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                <label for="person-fax">Fax</label>
                                                <input type="text" name="person[{{ $contactPerson->id }}][fax]" class="person-fax form-control" placeholder="Person Fax" value="{{ $contactPerson->fax }}" />
                                                </fieldset>
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                <fieldset class="form-group">
                                                <label for="person-address">Address</label>
                                                <input type="text" name="person[{{ $contactPerson->id }}][address]" class="person-address form-control" placeholder="Person Address" value="{{ $contactPerson->address }}" />
                                                </fieldset>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                <label for="person-department">Department</label>
                                                <input type="text" name="person[{{ $contactPerson->id }}][department]" class="person-department form-control" placeholder="Department" value="{{ $contactPerson->department }}" />
                                                </fieldset>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                <label for="person-designation">Designation</label>
                                                <input type="text" name="person[{{ $contactPerson->id }}][designation]" class="person-designation form-control" placeholder="Designation" value="{{ $contactPerson->designation }}" />
                                                </fieldset>
                                                </div>
                                                </div>
                                        </div>
                                        @endforeach
                                    @endif

                                    </div>

                                </div>
                            </div>


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
                            
                                <h3 class="m-t-0">Building Information</h3>

                                <button type="button" class="btn btn-primary" id="addBuildingBtn"> <i class="fa fa-plus"></i> Add More </button>

                                <div id="sectionBuilding">
                                    <div class="building">
                                        @if (isset($company))

                                          @foreach ($company->companyBuildings as $building)
                                              <div class="buildingFields">
                                              <input type="hidden" name="building_data[{{ $building->id }}][id]" class="remove-building-id" value="{{ $building->id }}" />

                                              <h5 class="bg-success p-x-1 p-y-1" >Building <i class="fa fa-times fa-lg remove-building pull-right cursor-p"></i></h5>
                                              <div class="row">
                                              <div class="col-sm-6 form-group">
                                              <label for="building-name">Building Name</label>
                                              <input type="text" name="building_data[{{ $building->id }}][name]" data-building="{{ $contactPerson->id }}" class="building-name form-control" placeholder="Building Name" value="{{ $building->name }}" />
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <label for="building-address">Address</label>
                                              <input type="text" name="building_data[{{ $building->id }}][address]" class="building-address form-control" placeholder="Building Address" value="{{ $building->address }}" />
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <label for="building-zip">Zip Code</label>
                                              <input type="text" name="building_data[{{ $building->id }}][zipcode]" class="building-zip form-control" placeholder="Building Zipcode" value="{{ $building->zipcode }}" />
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <label for="building-no-of-floors">No. of Floors</label>
                                              <div class="row">
                                              <div class="col-sm-6 form-group">
                                              <input type="number" name="building_data[{{ $building->id }}][num_floors]" class="building-no-of-floors form-control building-no-of-floors" min="1" value="{{ $building->num_floors }}">
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <button type="button" class="btn btn-primary addFloorBtn"> <i class="fa fa-plus"></i> Add Floors </button>
                                              </div>
                                              </div>
                                              </div>
                                              </div>
                                              <div data-building-num="{{ $building->id }}" class="sectionFloor">
                                                  @if (isset($companyBuildingFloors[$building->id]))
                                                      @foreach ($companyBuildingFloors[$building->id] as $floor)
                                                          <div class="floor">
                                                          <input type="hidden" name="building_data[{{ $building->id }}][floor][{{ $floor['id'] }}][id]" class="remove-floor-id" value="{{ $floor['id'] }}" />

                                                          <div class="row">
                                                          <div class="col-sm-6 form-group">
                                                          <label for="building-floor-no">Floor No.</label>
                                                          <input type="name" name="building_data[{{ $building->id }}][floor][{{ $floor['id'] }}][floor_number]" class="form-control building-floor-no" placeholder="Floor Name" value="{{ $floor['floor'] }}" />
                                                          </div>
                                                          <div class="col-sm-6 form-group">
                                                          <label for="building-floor-no-of-rooms">No. of Rooms</label>
                                                          <div class="row">
                                                          <div class="col-sm-6">
                                                          <input type="number" name="building_data[{{ $building->id }}][floor][{{ $floor['id'] }}][floor_rooms]" class="form-control building-floor-no-of-rooms" min="1" value="{{ $floor['num_rooms'] }}" />
                                                          </div>
                                                          <div class="col-sm-6">
                                                          <i class="fa fa-times fa-lg remove-floor cursor-p"></i>
                                                          </div>
                                                          </div>
                                                          </div>
                                                          </div>
                                                          </div>
                                                      @endforeach
                                                  @endif
                                              </div>
                                              </div>
                                          @endforeach
                                      @endif
                                    </div>
                                </div>


                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> PREVIOUS</button>&nbsp;&nbsp;
                              <a href="{!! route('admin.companies.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                              <button type="submit" class="btn btn-primary" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                            </div>



                          </form>



                          <!-- ============================wizard-4==================================== -->




                          <form class="wizard-pane" id="wizard-4">
                           
                                <h3 class="m-t-0">Company Contract Information</h3>

                                @if (isset($company))
                                <input name="_method" type="hidden" value="PATCH">
                                 
                                  <input type="hidden" name="contract_id" id="contract-id" value="{{ !is_null($company->companySingleContract) ? $company->companySingleContract->id:"" }}" />
                                  <input type="hidden" name="number_hidden" id="contract-no-hidden" class="form-control" value="{{ !is_null($company->companySingleContract) ? $company->companySingleContract->number:"" }}"  />
                  
                                @endif

                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label for="contract-no">Contract No.</label>
                                        <input type="text" name="number" id="contract-no" class="form-control" placeholder="Contract No" value="{{ (isset($company) && !is_null($company->companySingleContract)) ? $company->companySingleContract->number:'' }}"  />
                                        <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label for="contract-description">Contract</label>
                                        <textarea name="content" id="contract-content" class="form-control" rows="10">{{ (isset($company) && !is_null($company->companySingleContract)) ? $company->companySingleContract->content:'' }}</textarea>
                                        <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="start-date">Start Date</label>
                                        <input type="text" name="start_date" id="daterange-3" value="{{ (isset($company) && !is_null($company->companySingleContract)) ? date('m/d/Y', strtotime($company->companySingleContract->start_date)):'01/01/2018' }}" class="form-control">
                                        <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="end-date">End Date</label>
                                        <input type="text" name="end_date" id="daterange-4" value="{{ (isset($company) && !is_null($company->companySingleContract)) ? date('m/d/Y', strtotime($company->companySingleContract->end_date)):'12/31/2018' }}" class="form-control">
                                        <div class="errorTxt"></div>
                                    </div>
                                    <div class="col-sm-6 form-group">

                                      <fieldset class="form-group">
                                          <label for="payment-method">Payment Method</label>
                                          <select name="payment_method" class="form-control select2-payment-method" style="width: 100%" data-allow-clear="true">
                                              <option></option>
                                              @foreach ($paymentMethods as $paymentMethod)
                                                  @if ((isset($company) && !is_null($company->companySingleContract)) && $paymentMethod->code == $company->companySingleContract->payment_method)
                                                    <option value="{{ $paymentMethod->code }}" selected="selected">{{ $paymentMethod->name }}</option> 
                                                   @else
                                                    <option value="{{ $paymentMethod->code  }}">{{ $paymentMethod->name }}</option> 
                                                   @endif
                                              @endforeach
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
                                                  @if ((isset($company) && !is_null($company->companySingleContract)) && $paymentCycle->id == $company->companySingleContract->payment_cycle)
                                                    <option value="{{ $paymentCycle->id }}" selected="selected">{{ $paymentCycle->name }}</option> 
                                                  @else
                                                    <option value="{{ $paymentCycle->id  }}">{{ $paymentCycle->name }}</option> 
                                                  @endif
                                                @endforeach
                                            </select>
                                            <div class="errorTxt"></div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="discount">Discount</label>
                                        <input type="number" name="discount" id="discount" class="form-control" value="{{ (isset($company) && !is_null($company->companySingleContract)) ? $company->companySingleContract->discount:'0' }}">
                                        <div class="errorTxt"></div>
                                        
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="discount-type">Discount Type</label>
                                            <select name="discount_type" class="form-control select2-discount-type" style="width: 100%" data-allow-clear="true">
                                                <option></option>
                                                @foreach ($discountTypes as $discountType)
                                                  @if ((isset($company) && !is_null($company->companySingleContract)) && $discountType->id == $company->companySingleContract->discount_type)
                                                    <option value="{{ $discountType->id }}" selected="selected">{{ $discountType->name }}</option> 
                                                  @else
                                                    <option value="{{ $discountType->id  }}">{{ $discountType->name }}</option> 
                                                  @endif
                                                @endforeach
                                            </select>
                                            <div class="errorTxt"></div>
                                        </fieldset>
                                    </div>
                                </div>


                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> PREVIOUS</button>&nbsp;&nbsp;
                              <a href="{!! route('admin.companies.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                              <button type="submit" class="btn btn-primary" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                            </div>


                          </form>



                          <!-- ============================wizard-5==================================== -->


                          <form class="wizard-pane" id="wizard-5">

                                @if (isset($company))
                                    <input name="_method" type="hidden" value="PATCH">
                                @endif
                            
                                <h3 class="m-t-0">Company Modules Information</h3>

                                <button type="button" class="btn btn-primary" id="addModuleBtn"> <i class="fa fa-plus"></i> Add More </button>

                                <div id="sectionModule">
                                    <div class="module">
                                        @if (isset($company))
                                            @foreach ($company->companyModules as $comModule)
                                              <div class="moduleFields">
                                              <input type="hidden" name="module[{{ $comModule->id }}][pk]" class="remove-module-id" value="{{ $comModule->id }}" />

                                              <h5 class="bg-success p-x-1 p-y-1" >Module <i class="fa fa-times fa-lg remove-module pull-right cursor-p"></i></h5>
                                              <div class="row">
                                              <div class="col-sm-6 form-group">
                                              <label for="module">Module</label>
                                              <select name="module[{{ $comModule->id }}][id]" class="module-id form-control" style="width: 100%" data-allow-clear="true">
                                                <option value="0">Select Module</option>                                              
                                                @foreach ($modules as $module)
                                                  @if ($module->id == $comModule->module_id)
                                                  <option value="{{ $module->id }}" selected="selected">{{ $module->name }}</option>
                                                  @else
                                                  <option value="{{ $module->id }}">{{ $module->name }}</option>
                                                  @endif
                                                @endforeach
                                              </select>
                                              <div class="errorTxt"></div>
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <label for="price">Price</label>
                                              <input type="number" name="module[{{ $comModule->id }}][price]" class="module-price form-control" min="1" value="{{ $comModule->price }}" />
                                              </div>'
                                              <div class="col-sm-6 form-group">
                                              <label for="users_limit">Users Limit</label>
                                              <input type="number" name="module[{{ $comModule->id }}][users_limit]" class="users-limit form-control" value="10" min="1" value="{{ $comModule->users_limit }}" />
                                              </div>
                                              </div>
                                              </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>


                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> PREVIOUS</button>&nbsp;&nbsp;
                              <a href="{!! route('admin.companies.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                              <button type="submit" class="btn btn-primary" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                            </div>



                          </form>



                          <!-- ============================wizard-6==================================== -->



                          <form class="wizard-pane" id="wizard-6">
                            

                                <h3 class="m-t-0">Company Admin Information</h3>

                                @if (isset($company))
                                <input name="_method" type="hidden" value="PATCH">                           
                                @endif
                                
                                <button type="button" class="btn btn-primary" id="addAdminBtn"> <i class="fa fa-plus"></i> Add More </button>

                                <div id="sectionAdmin">
                                    <div class="admin">

                                        @if (isset($company))

                                          @foreach ($company->companyUsers as $admin)
                                          
                                            <div class="adminFields">
                                            <input type="hidden" name="admin[{{ $admin->id }}][id]" class="remove-admin-id" value="{{ $admin->id }}" />
                                            <input type="hidden" name="admin[{{ $admin->id }}][user_id]" class="admin-user-id" value="{{ $admin->user->id }}" />
                                            <input type="hidden" name="admin[{{ $admin->id }}][email_hidden]" class="admin-email-hidden" value="{{ $admin->user->email }}" />
                                            <input type="hidden" name="admin[{{ $admin->id }}][old_password]" class="old-password-hidden" value="true" />
                                            
                                            <h5 class="bg-success p-x-1 p-y-1" >Admin <i class="fa fa-times fa-lg remove-admin pull-right cursor-p"></i></h5>
                                            <div class="row">
                                            <div class="col-sm-12 form-group">
                                            <label for="admin-name">Name</label>
                                            <input type="text" name="admin[{{ $admin->id }}][name]"  class="admin-name form-control" placeholder="Admin Name" value="{{ $admin->user->name }}">
                                            </div>
                                            <div class="col-sm-12 form-group">
                                            <label for="admin-email">Email</label>
                                            <input type="email" name="admin[{{ $admin->id }}][email]" class="admin-email form-control" placeholder="Admin Email" value="{{ $admin->user->email }}">
                                            </div>
                                            <div class="col-sm-12 form-group">
                                            <label for="admin-password">Password</label>
                                            <input type="password" name="admin[{{ $admin->id }}][password]" class="admin-pass form-control" placeholder="Admin Password">
                                            </div>
                                            </div>
                                            </div>

                                          @endforeach

                                        @endif
                                    </div>
                                </div>



                            <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                              <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> PREVIOUS</button>&nbsp;&nbsp;
                              <a href="{!! route('admin.companies.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                              <button type="submit" class="btn btn-primary" id="finish-btn" data-wizard-action="next">FINISH  <i class="fa fa-arrow-right m-l-1"></i></button>
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
