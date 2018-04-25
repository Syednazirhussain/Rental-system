@extends('admin.default')

@section('css')

<style type="text/css">
	.form-group span{
		border : 0;
	}	
</style>

@endsection


@section('content')

<div class="px-content">
    <div class="row m-t-1">

	    <div class="col-md-4 col-lg-3">

	        <div class="text-xs-center">
	        	<img src="{{ storage_path('app').DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'company_logos'.DIRECTORY_SEPARATOR.$company->logo }}" alt="" class="page-profile-v1-avatar border-round">
	        </div>

	        <div class="panel panel-transparent">
	          <div class="panel-heading p-x-1">
	            <span class="panel-title">Description</span>
	          </div>
	          <div class="panel-body p-a-1">
	          	{{ $company->description }}
	          </div>
	        </div>

	        <div class="panel panel-transparent">
	          <div class="panel-heading p-x-1">
	            <span class="panel-title">Location</span>
	          </div>
	          <div class="list-group m-y-1">
	            <p class="list-group-item p-x-1 b-a-0"><strong>Country&nbsp;</strong>{{ $company->country->name }}</p>
	            <p class="list-group-item p-x-1 b-a-0"><strong>State&nbsp;</strong>{{ $company->state->name }}</p>
	            <p class="list-group-item p-x-1 b-a-0"><strong>City&nbsp;</strong>{{ $company->city->name }}</p>
	          </div>
	        </div>

	        <div class="panel panel-transparent">
	          <div class="panel-heading p-x-1">
	            <span class="panel-title">Address</span>
	          </div>
	          <div class="panel-body p-a-1">
	          	{{ $company->address }}
	          </div>
	        </div>


	      </div>

	      <hr class="page-wide-block visible-xs visible-sm">

	      <div class="col-md-8 col-lg-9">

	        <h1 class="font-size-20 m-y-4">{{ $company->name }}<span class="font-weight-normal">'s profile</span></h1>

	        <ul class="nav nav-tabs" id="profile-tabs">
	          <li class="active">
	            <a href="#contact_person" data-toggle="tab">
	              Contact Person
	            </a>
	          </li>
	          <li>
	            <a href="#contract" data-toggle="tab">
	              Contract
	            </a>
	          </li>
	          <li>
	            <a href="#building" data-toggle="tab">
	              Buildings
	            </a>
	          </li>
	          <li>
	            <a href="#modules" data-toggle="tab">
	              Modules
	            </a>
	          </li>
	          <li>
	            <a href="#admin" data-toggle="tab">
	              Admins
	            </a>
	          </li>
	          <li>
	            <a href="#invoices" data-toggle="tab">
	              Invoices
	            </a>
	          </li>
	        </ul>

	        <div class="tab-content tab-content-bordered p-a-0 bg-white">
	          <div class="tab-pane p-a-3 fade in active" id="contact_person">
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
	          <div class="tab-pane p-a-3 fade" id="contract">
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
                                        <label for="discountType">Discount Type</label>
                                        <span class="form-control">{{ $company->companySingleContract->discountType->name }}</span>
                                    </div>
                                </div>
	          </div>
	          <div class="tab-pane p-a-3 fade" id="building">

                                <h3 class="m-t-0">Building Information</h3>
                                <div id="sectionBuilding">
                                    <div class="building">
                                        @if (isset($company))
                                          @foreach ($company->companyBuildings as $building)
                                              <div class="buildingFields">
                                              <div class="row">
                                              <div class="col-sm-6 form-group">
                                              <label for="building-name">Building Name</label><br>
                                              <span class="label label-success">{{ $building->name }}</span>
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
                                                      @foreach ($company->companyFloorRoom as $floor)
                                                            @if ($floor->building_id == $building->id)
                                                          <div class="floor">
                                                          <div class="row">

                                                          <div class="col-sm-6 form-group">
                                                          <label for="building-floor-no">Floor Name</label>
                                                          <span class="form-control">{{ $floor->floor }}</span>
                                                          </div>

                                                          <div class="col-sm-6 form-group">
                                                          <label for="building-floor-no-of-rooms">No. of Rooms</label>
                                                          <span class="form-control">{{ $floor->num_rooms }}</span>
                                                          </div>

                                                          </div>
                                                          </div>

                                                            @endif
                                                      @endforeach
                                              </div>
                                              </div>
                                              <hr>
                                          @endforeach
                                      @endif
                                    </div>
                                </div>

	          </div>
	          <div class="tab-pane p-a-3 fade" id="modules">
                                <h3 class="m-t-0">Company Modules Information</h3>
                                <div id="sectionModule">
                                    <div class="module">
                                        @if (isset($company))
                                            @foreach ($company->companyModules as $comModule)
                                              <div class="moduleFields">

                                              <div class="row">

                                              <div class="col-sm-6 form-group">
                                              <label for="module">Module</label><br>
                                              <span class="label label-success">{{ $comModule->module_id }}</span>
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <label for="price">Module Name</label>
                                              <span class="form-control">{{ $comModule->module->name }}</span>
                                              </div>

                                              <div class="col-sm-6 form-group">
                                              <label for="price">Price</label>
                                              <span class="form-control">{{ $comModule->price }}</span>
                                              </div>

                                              <div class="col-sm-6 form-group">
                                              <label for="users_limit">Users Limit</label>
                                              <span class="form-control">{{ $comModule->users_limit }}</span>
                                              </div>

                                              </div>
                                              </div>
                                              <hr>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
	          </div>

	          <div class="tab-pane p-a-3 fade" id="admin">
                                <h3 class="m-t-0">Company Admin Information</h3>
                                <div id="sectionAdmin">
                                    <div class="admin">
                                        @if (isset($company))
                                          @foreach ($company->companyUsers as $admin)
                                          
                                            <div class="adminFields">

                                            <div class="row">
												<div class="col-md-6">
												        <div class="panel box">
<!-- 												          <div class="page-about-us-team-avatar box-cell p-y-3 p-l-3 valign-top">
												            <img src="assets/demo/avatars/1.jpg" alt="" class="border-round">
												          </div> -->
												          <div class="box-cell p-y-2 p-x-3 valign-middle">
												            <div class="font-size-14"><strong>{{ $admin->user->name }}</strong></div>
												            <p class="text-muted font-size-11 font-weight-semibold">
												            	{{ $admin->user->email }}
												            </p>
												            <p>
												            	Role: <strong><?php echo ucfirst(str_replace('_', ' ', $admin->user->user_role_code)); ?></strong>
												            </p>
												          </div>
												        </div>
												</div>
                                            </div>
                                            </div>
                                            <hr>
                                          @endforeach

                                        @endif
                                    </div>
                                </div>
	          </div>
	          
	          <div class="tab-pane p-a-3 fade" id="invoices">
                                <h3 class="m-t-0">Company Invoices</h3>
                                <div id="sectionBuilding">
                                    <div class="building">
                                        @if (isset($company->companyInvoices))
                                          @foreach ($company->companyInvoices as $invoice)
                                              <div class="buildingFields">

                                              <div class="row">

                                              <div class="col-sm-6 form-group">
                                              <label for="building-name">Status</label><br>
                                              @if($invoice->status == 'paid')
                                              <span class="label label-success">{{ $invoice->status }}</span>
                                              @else
                                              <span class="label label-danger">{{ $invoice->status }}</span>
                                              @endif
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <label for="building-zip">Due Date</label>
                                              <span class="form-control">{{ $invoice->due_date }}</span>
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <label for="building-address">Payment Cycle</label>
                                              <span class="form-control">{{ $invoice->paymentCycle->name }}</span>
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <label for="building-no-of-floors">Discount</label>
                                              <span class="form-control">{{ $invoice->discount }}</span>
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <label for="building-no-of-floors">Tax</label>
                                              <span class="form-control">{{ $invoice->tax }}</span>
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <label for="building-no-of-floors">Total</label>
                                              <span class="form-control">{{ $invoice->total }}</span>
                                              </div>

                                              </div>

                                              </div>
                                              <hr>
                                          @endforeach
                                      @endif
                                    </div>
                                </div>
	          </div>
	        </div>
	    </div>

   	</div>
</div>
@endsection


