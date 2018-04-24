@extends('admin.default')

@section('css')

<style type="text/css">
	.form-group span{
		border : 0;
	}	
</style>

@endsection


@section('content')

<div class="container">
    <div class="row">
		<div class="col-xs-12">
        <div class="panel">
          <div class="panel-heading">
            <div class="panel-title">Default tabs</div>
          </div>
          <div class="panel-body">
            <ul class="nav nav-tabs">

              <li class="active">
                <a href="#basic_info" data-toggle="tab">
                  Basic Info
                </a>
              </li>
              <li>
                <a href="#contact_person" data-toggle="tab">
                  Contact Person
                </a>
              </li>
              <li>
                <a href="#contact" data-toggle="tab">
                  Contact
                </a>
              </li>
              <li>
                <a href="#building" data-toggle="tab">
                  Building
                </a>
              </li>
              <li>
                <a href="#modules" data-toggle="tab">
                  Modules
                </a>
              </li>
              <li>
                <a href="#admins" data-toggle="tab">
                  Admins
                </a>
              </li>
              <li>
                <a href="#invoices" data-toggle="tab">
                  Invoices
                </a>
              </li>
            </ul>

            <div class="tab-content tab-content-bordered">
              <div class="tab-pane fade in active" id="basic_info">
                                <h3 class="m-t-0">Company Information</h3>
                                <div class="row">

                                    <div class="col-md-8">
                                        <fieldset class="form-group">
                                            <label>Name</label>
                                            <span class="form-control">{{ $company->name }}</span>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label>Second Name</label>
                                            <span class="form-control">{{ $company->second_name }}</span>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label>Description</label>
                                            <span class="form-control">{{ $company->description }}</span>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                               <input type="hidden" name="logo-hidden" id="logo-hidden" value="">
                                               <img src="{{ storage_path('app').DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'company_logos'.DIRECTORY_SEPARATOR.$company->logo }}" data-src="" alt="" />
                                          </div>
                                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                          <div>
                                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                            <input type="file" name="logo" id="logo"></span>
                                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                          </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-4 form-group">
                                        <fieldset class="form-group">
                                            <label for="country_id">Country</label>
                                            <span class="form-control">{{ $company->country->name }}</span>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <fieldset class="form-group">
                                            <label for="state_id">State</label>
                                            <span class="form-control">{{ $company->state->name }}</span>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <fieldset class="form-group">
                                            <label for="city_id">City</label>
                                            <span class="form-control">{{ $company->city->name }}</span>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <fieldset class="form-group">
                                            <label for="address">Address</label>
                                            <span class="form-control">{{ $company->address }}</span>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="zipcode">Zip Code</label>
                                            <span class="form-control">{{ $company->zipcode }}</span>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="phone">Phone</label>
                                            <span class="form-control">{{ $company->phone }}</span>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="user_status_id">Status</label>
                                            <span class="form-control">{{ $company->userStatus->name }}</span>
                                        </fieldset>
                                    </div>

                                    <div class="col-sm-6 form-group">
                                    </div>

                                </div>
              </div>
              <div class="tab-pane fade" id="contact_person">
                            <h3 class="m-t-0">Company Contact Persons</h3>
                            <div class="row">
                                <div class="col-md-12" id="sectionContactPerson">
                                    <div class="person">

                                    @if (isset($company))

                                        @foreach ($company->companyContactPeople as $contactPerson)
                                        <div class="contactPersonFields">

                                                <div class="row">
                                                <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                <label for="person-name">Name</label>
                                                <span class="form-control">{{ $contactPerson->name }}</span>
                                                </fieldset>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                <label for="person-email">Email</label>
                                                <span class="form-control">{{ $contactPerson->email }}</span>
                                                </fieldset>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                <label for="person-phone">Phone</label>
                                                <span class="form-control">{{ $contactPerson->phone }}</span>
                                                </fieldset>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                <label for="person-fax">Fax</label>
												<span class="form-control">{{ $contactPerson->fax }}</span>
                                                </fieldset>
                                                </div>
                                                <div class="col-sm-12 form-group">
                                                <fieldset class="form-group">
                                                <label for="person-address">Address</label>
												<span class="form-control">{{ $contactPerson->address }}</span>
                                                </fieldset>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                <label for="person-department">Department</label>
                                                <span class="form-control">{{ $contactPerson->department }}</span>
                                                </fieldset>
                                                </div>
                                                <div class="col-sm-6 form-group">
                                                <fieldset class="form-group">
                                                <label for="person-designation">Designation</label>
                                                <span class="form-control">{{ $contactPerson->designation }}</span>
                                                </fieldset>
                                                </div>
                                                </div>
                                        </div>
                                        @endforeach
                                    @endif

                                    </div>

                                </div>
                            </div>
              </div>
              <div class="tab-pane fade" id="contact">
                                <h3 class="m-t-0">Company Contract Information</h3>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label for="contract-no">Contract No.</label>
                                        <span class="form-control">{{ $company->companySingleContract->number }}</span>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label for="contract-description">Contract</label>
                                        <span class="form-control">{{ strip_tags($company->companySingleContract->content) }}</span><br>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="start-date">Start Date</label>
                                        <span class="form-control">{{ date('m/d/Y', strtotime($company->companySingleContract->start_date)) }}</span>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="end-date">End Date</label>
                                        <span class="form-control">{{ date('m/d/Y', strtotime($company->companySingleContract->end_date)) }}</span>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                      <fieldset class="form-group">
                                          <label for="payment-method">Payment Method</label>
                                          <span class="form-control">{{ $company->companySingleContract->payment_method }}</span>
                                      </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="payment-cycle">Payment Cycle</label>
                                            <span class="form-control">{{ $company->companySingleContract->discount }}</span>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="discount">Discount</label>
                                        <span class="form-control">{{ $company->companySingleContract->discount }}</span>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <fieldset class="form-group">
                                            <label for="discount-type">Discount Type</label>
                                        </fieldset>
                                    </div>
                                </div>
              </div>
              <div class="tab-pane fade" id="building">
                                <h3 class="m-t-0">Building Information</h3>
                                <div id="sectionBuilding">
                                    <div class="building">
                                        @if (isset($company))
                                          @foreach ($company->companyBuildings as $building)
                                              <div class="buildingFields">
                                              <div class="row">
                                              <div class="col-sm-6 form-group">
                                              <label for="building-name">Building Name</label>
                                              <span class="form-control">{{ $building->name }}</span>
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <label for="building-address">Address</label>
                                              <span class="form-control">{{ $building->address }}</span>
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <label for="building-zip">Zip Code</label>
                                              <span class="form-control">{{ $building->zipcode }}</span>
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <label for="building-no-of-floors">No. of Floors</label>
                                              <span class="form-control">{{ $building->num_floors }}</span>
                                              </div>
                                              </div>

                                              <div data-building-num="{{ $building->id }}" class="sectionFloor">
                                                  @if (isset($companyBuildingFloors[$building->id]))
                                                      @foreach ($companyBuildingFloors[$building->id] as $floor)
                                                          <div class="floor">

                                                          <div class="row">

                                                          <div class="col-sm-6 form-group">
                                                          <label for="building-floor-no">Floor No.</label>
                                                          <span class="form-control">{{ $floor['floor'] }}</span>

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
              </div>
              <div class="tab-pane fade" id="modules">

              </div>
              <div class="tab-pane fade" id="admins">

              </div>
              <div class="tab-pane fade" id="invoices">

              </div>
            </div>
          </div>
        </div>
		</div>
	</div>
</div>
@endsection


