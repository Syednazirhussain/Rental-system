@extends('admin.default')

@section('css')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<style type="text/css">
	.form-group span{
		border : 0;
	}	
</style>

@endsection


@section('content')

<div class="px-content">
    <div class="row m-t-1">

	    <div class="col-md-2">

	        <div class="text-xs-center">
	        	@if( isset($company->logo) != 'default.png' )
	        	<img src="{{ asset('storage/company_logos/'.$company->logo) }}" alt="" class="page-profile-v1-avatar border-round" width="150px">
	        	@else
	        	<img src="{{ asset('/skin-1/assets/images/default.png') }}" alt="" class="page-profile-v1-avatar border-round" width="150px">
	        	@endif
	        </div>

	        <div class="panel panel-transparent">
	          <div class="panel-heading p-x-1">
	            <span class="panel-title"><strong>Description</strong></span>
	          </div>
	          <div class="panel-body p-a-1">
	          	{{ $company->description }}
	          </div>
	        </div>

	        <div class="panel panel-transparent">
	          <div class="panel-heading p-x-1">
	            <span class="panel-title"><strong>Location</strong></span>
	          </div>

	          <div class="list-group m-y-1">
	          	<table class="table">
	          		<tr>
	          			<td>Country</td>
	          			<td><em>{{ $company->country->name }}</em></td>
	          		</tr>
	          		<tr>
	          			<td>State</td>
	          			<td><em>{{ $company->state->name }}</em></td>
	          		</tr>
	          		<tr>
	          			<td>City</td>
	          			<td>{{ $company->city->name }}</td>
	          		</tr>
	          		<tr>
	          			<td>Zip Code</td>
	          			<td><em>{{ $company->zipcode }}</em></td>
	          		</tr>
	          	</table>
	          </div>

	          <div class="panel-heading p-x-1">
	            <span class="panel-title"><strong>Address</strong></span>
	          </div>
	          <div class="panel-body p-a-1">
	          	{{ $company->address }}
	          </div>
	        </div>




	      </div>

	      <hr class="page-wide-block visible-xs visible-sm">

	      <div class="col-md-10">

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
                    <h3 class="m-t-0">Contact Persons <a href="" title="Edit contact person"><i class="fa fa-pencil-square-o m-l-1"></i></a></h3>
                    <div class="px-content">
                    	@if (count($company->companyContactPeople) > 0)
					    
					        <div class="table-default">
					          <table class="table" id="datatables1">
					            <thead>
					              <tr>
					                <th>Name</th>
					                <th>Email</th>
					                <th>Phone</th>
					                <th width="200px">Address</th>
					                <th>Fax</th>
					                <th>Department</th>
					                <th>Designation</th>
					              </tr>
					            </thead>
					            <tbody>
					            @foreach ($company->companyContactPeople as $contactPerson)
					              <tr class="odd gradeX">
					              	<td>{{ $contactPerson->name }}</td>
					              	<td>{{ $contactPerson->email }}</td>
					              	<td>{{ $contactPerson->phone }}</td>
					              	<td>{{ $contactPerson->address }}</td>
					              	<td>{{ $contactPerson->fax }}</td>
					              	<td>{{ $contactPerson->department }}</td>
					              	<td>{{ $contactPerson->designation }}</td>
					              </tr>
					            @endforeach
					            </tbody>
					          </table>
					        </div>
					    @else
					    	<div class="well">
					    		<span class="text-center">No record found</span>
					    	</div>
					    @endif
					</div>

	          </div>
	          <div class="tab-pane p-a-3 fade" id="contract">
                    <h3 class="m-t-0">Contract Information <a href="" title="Edit contact person"><i class="fa fa-pencil-square-o m-l-1"></i></a></h3>
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                    	<fieldset class="form-group">
	                                        <label for="contract-no">Contract No.</label>
	                                        <span class="form-control">{{ $company->companySingleContract->number }}</span>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                    	<fieldset class="form-group">
	                                        <label for="contract-description">Contract</label>
	                                        <span class="form-control">{{ strip_tags($company->companySingleContract->content) }}</span><br>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                    	<fieldset class="form-group">
	                                        <label for="start-date">Start Date</label>
	                                        <span class="form-control">{{ Carbon\Carbon::parse($company->companySingleContract->start_date)->format('F d, Y') }}</span>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                    	<fieldset class="form-group">
	                                        <label for="end-date">End Date</label>
	                                        <span class="form-control">{{ Carbon\Carbon::parse($company->companySingleContract->end_date)->format('F d, Y') }}</span>
                                        </fieldset>
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
                                            <span class="form-control">{{ $company->companySingleContract->paymentCycle->name }}</span>
                                        </fieldset>
                                    </div>

                                    <div class="col-sm-6 form-group">
                                    	<fieldset class="form-group">
	                                        <label for="discount">Discount</label>
	                                        <span class="form-control">{{ $company->companySingleContract->discount }}&nbsp;SEK</span>
                                        </fieldset>
                                    </div>
                                     <div class="col-sm-6 form-group">
                                     	<fieldset class="form-group">
	                                        <label for="discountType">Discount Type</label>
	                                        <span class="form-control">{{ $company->companySingleContract->discountType->name }}</span>
                                        </fieldset>
                                    </div>
                                </div>
	          </div>
	          <div class="tab-pane p-a-3 fade" id="building">
					<h3 class="m-t-0">Buildings Information <a href="" title="Edit contact person"><i class="fa fa-pencil-square-o m-l-1"></i></a></h3>
					@if ( count($company->companyBuildings) > 0 )
                    <table class="table">
                    	@foreach ($company->companyBuildings as $building)
                    	<thead>
                    		<th width="300px">Building Name</th>
                    		<th >Address</th>
                    		<th>Zip Code</th>
                    		<th>No. of Floors</th>
                    	</thead>
                    	<tbody>
                    		<tr>
                    			<td>{{ $building->name }}</td>
                    			<td>{{ $building->address }}</td>
                    			<td>{{ $building->zipcode }}</td>
                    			<td>{{ $building->num_floors }}</td>
                    		</tr>
							@foreach ($company->companyFloorRoom as $floor)
								@if ($floor->building_id == $building->id)
								<tr>
									<td>Floor Name: <span class="label label-success">{{ $floor->floor }}</span></td>
									<td>No. of Rooms: <span class="label label-success">{{ $floor->num_rooms }}</span></td>
								</tr>
								@endif
							@endforeach
                    	</tbody>
                    	@endforeach
                    </table>
                    @else
			    	<div class="well">
			    		<span class="text-center">No record found</span>
			    	</div>
                    @endif

<!-- 

                                <div id="sectionBuilding">
                                    <div class="building">
                                        @if ( count($company->companyBuildings) > 0 )
                                          @foreach ($company->companyBuildings as $building)
                                              <div class="buildingFields">
                                              <div class="row">
                                              <div class="col-sm-6 form-group">
                                              <fieldset class="form-group">
                                              <label for="building-name">Building Name</label><br>
                                              <span class="label label-success">{{ $building->name }}</span>
                                              </fieldset>
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <fieldset class="form-group">
                                              <label for="building-address">Address</label>
                                              <span class="form-control">{{ $building->address }}</span>
                                              </fieldset>
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <fieldset class="form-group">
                                              <label for="building-zip">Zip Code</label>
                                              <span class="form-control">{{ $building->zipcode }}</span>
                                              </fieldset>
                                              </div>
                                              <div class="col-sm-6 form-group">
                                              <fieldset class="form-group">
                                              <label for="building-no-of-floors">No. of Floors</label>
                                              <span class="form-control">{{ $building->num_floors }}</span>
                                              </fieldset>
                                              </div>
                                              </div>

                                              <div data-building-num="{{ $building->id }}" class="sectionFloor">
                                                      @foreach ($company->companyFloorRoom as $floor)
                                                            @if ($floor->building_id == $building->id)
                                                          <div class="floor">
                                                          <div class="row">

                                                          <div class="col-sm-6 form-group">
                                                          <fieldset class="form-group">
                                                          <label for="building-floor-no">Floor Name</label>
                                                          <span class="form-control">{{ $floor->floor }}</span>
                                                          </fieldset>
                                                          </div>

                                                          <div class="col-sm-6 form-group">
                                                          <fieldset class="form-group">
                                                          <label for="building-floor-no-of-rooms">No. of Rooms</label>
                                                          <span class="form-control">{{ $floor->num_rooms }}</span>
                                                          </fieldset>
                                                          </div>

                                                          </div>
                                                          </div>

                                                            @endif
                                                      @endforeach
                                              </div>
                                              </div>
                                              <hr>
                                          @endforeach
                                      @else
								    	<div class="well">
								    		<span class="text-center">No record found</span>
								    	</div>
                                      @endif
                                    </div>
                                </div> -->

	          </div>
	          <div class="tab-pane p-a-3 fade" id="modules">
					<h3 class="m-t-0">Modules Information <a href="" title="Edit contact person"><i class="fa fa-pencil-square-o m-l-1"></i></a></h3>
                    <div id="sectionModule">
                    	@if (isset($company))
                        <div class="module">
 							<table class="table" id="datatables3">
				              <thead>
				                <tr>
				                  <th>Module ID</th>
				                  <th>Name</th>
				                  <th>Price</th>
				                  <th>Users Limit</th>
				                </tr>
				              </thead>
				              <tbody>
				                @foreach ($company->companyModules as $comModule)
				                <tr>
				                  <td><span class="label label-success">{{ $comModule->module_id }}</span></td>
				                  <td>{{ $comModule->module->name }}</td>
				                  <td>{{ $comModule->price }}&nbsp;SEK</td>
				                  <td>{{ $comModule->users_limit }}</td>
				                </tr>
				                @endforeach
				              </tbody>
				            </table>                        	
                        </div>
                        @else
							<div class="well">
								<span class="text-center">No record found</span>
							</div>
                        @endif
                    </div>
	          </div>

	          <div class="tab-pane p-a-3 fade" id="admin">
                    <h3 class="m-t-0">Admins Information <a href="" title="Edit contact person"><i class="fa fa-pencil-square-o m-l-1"></i></a></h3>
                    <div id="sectionAdmin">
                    	@if (isset($company))
                        <div class="admin">
 							<table class="table">
				              <thead>
				                <tr>
				                  <th>Name</th>
				                  <th>Email</th>
				                  <th>Role</th>
				                </tr>
				              </thead>
				              <tbody>
				              	
				                @foreach ($company->companyUsers as $admin)
				                <tr>
				                  <td>{{ $admin->user->name }}</td>
				                  <td>{{ $admin->user->email }}</td>
				                  <td><?php echo ucfirst(str_replace('_', ' ', $admin->user->user_role_code)); ?></td>
				                </tr>
				                @endforeach
				              </tbody>
				            </table>                                        
                        </div>
                        @else
							<div class="well">
								<span class="text-center">No record found</span>
							</div>
                        @endif
                    </div>
	          </div>

	          <div class="tab-pane p-a-3 fade" id="invoices">
                    <h3 class="m-t-0">Invoices</h3>
                    <div id="sectionBuilding">
                        <div class="building">
                   			@if ( count($company->companyInvoices) > 0)
							<table class="table" id="datatables2">
				              <thead>
				                <tr>
				                  <th>Payment Cycle</th>
				                  <th>Discount</th>
				                  <th>Tax</th>
				                  <th>Total</th>
				                  <th>Due Date</th>
				                  <th>Status</th>
				                  <th></th>
				                </tr>
				              </thead>
				              <tbody>
				                @foreach ($company->companyInvoices as $invoice)
				                <tr>
				                  <td>{{ $invoice->paymentCycle->name }}</td>
				                  <td>{{ $invoice->discount }}&nbsp;SEK</td>
				                  <td>{{ $invoice->tax }}&nbsp;SEK</td>
				                  <td>{{ $invoice->total }}&nbsp;SEK</td>
				                  <td>{{ Carbon\Carbon::parse($invoice->due_date)->format('F d, Y')  }}</td>
				                  <td>
				                  	@if($invoice->status == 'paid')
				                        <span class="label label-success">{{ $invoice->status }}</span>
				                    @else
				                        <span class="label label-danger">{{ $invoice->status }}</span>
				                    @endif
				                  </td>
				                  <td>
				                  	<a href="{{ route('admin.viewInvoice',[$company->id,$invoice->id]) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;View</a>
				                  	<form class="form-inline" style="display: inline;" action="{{ route('admin.companyInvoices.destroy', [$invoice->id]) }}" method="post">
				                      <input name="_method" type="hidden" value="DELETE">
				                      <input name="_token" type="hidden" value="{{ csrf_token() }}">
				                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')""><i class="fa fa-trash"></i> Delete</button>
				                    </form>
				                  	<a href="{{ route('admin.sendInvoiceById',[$company->id,$invoice->id]) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Send Email</a>
				                  </td>
				                </tr>
				                @endforeach
				              </tbody>
				            </table>
				            @else
				            	<div class="well">
				            		<span class="text-md-center">No record available</span>
				            	</div>
				            @endif
                        </div>
                    </div>
	          </div>
	        </div>
	    </div>

   	</div>
</div>
@endsection

@section('js')

  <script>


    $(function() {
      $('#datatables1').dataTable();
      $('#datatables1_wrapper .table-caption').text('');
      $('#datatables1_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });

    $(function() {
      $('#datatables2').dataTable();
      $('#datatables2_wrapper .table-caption').text('');
      $('#datatables2_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });

    $(function() {
      $('#datatables3').dataTable();
      $('#datatables3_wrapper .table-caption').text('');
      $('#datatables3_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });

  </script>

@endsection
