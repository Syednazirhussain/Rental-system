<div class="row">

	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">Customer</label>
                <select class="form-control select2-customer" id="customer_id" name="customer_id">
                    <option value=""></option>
                    @foreach($getCompanyCustomer as $companyCustomer)
                    <option <?php if(isset($companyCustomerInfo) && $companyCustomerInfo->user_id == $companyCustomer->user_id ) { echo "selected"; } ?> value="{{$companyCustomer->user_id}}">{{$companyCustomer->user->name}}</option>
                    @endforeach
                </select>
                <div class="errorTxt"></div>
            </div>
	</div>

	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">Address</label>
                <input class="form-control" id="customer_address" name="customer_address" value="@if(isset($companyCustomerInfo)){{$companyCustomerInfo->address}}@endif" placeholder="Hagagatan 1, vi SE-113 49 Stockholm">
                <div class="errorTxt"></div>
            </div>
	</div>

</div>

<div class="row">
	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">Country</label>
                <select class="form-control select2-country" id="customer_country" name="customer_country">
                    <option></option>
                    @foreach ($countries as $country)
                         @if (isset($company) && $country->short == $company->country->short)
                          <option value="{{ $country->id }}" @if(isset($companyCustomerInfo) && $country->id == $companyCustomerInfo->$country_id )  @endif >{{ $country->name }}</option> 
                         @elseif ($country->short == 'SE')
                          <option <?php if(isset($companyCustomerInfo) && $companyCustomerInfo->country_id == $country->id ) { echo "selected"; } ?> value="{{ $country->id }}" >{{ $country->name }}</option> 
                         @else
                          <option value="{{ $country->id }}" >{{ $country->name }}</option> 
                         @endif
                    @endforeach
                </select>
                <div class="errorTxt"></div>
            </div>
	</div>

	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">State</label>
                <select class="form-control select2-state" id="customer_state" name="customer_state">
                    <option></option>
                    @foreach ($states as $state)
                         @if (isset($company) && $state->id == $company->state->id)
                          <option value="{{ $state->id }}" selected="selected">{{ $state->name }}</option> 
                         @else
                          <option <?php if(isset($companyCustomerInfo) && $companyCustomerInfo->state_id == $state->id ) { echo "selected"; } ?> value="{{ $state->id  }}">{{ $state->name }}</option> 
                         @endif
                    @endforeach
                </select>
                <div class="errorTxt"></div>
            </div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">City</label>
                <select class="form-control select2-city" id="customer_city" name="customer_city">
                    <option></option>
                    @foreach ($cities as $city)
                      @if (isset($company) && $city->id == $company->city->id)
                       <option value="{{ $city->id }}" selected="selected">{{ $city->name }}</option> 
                      @else
                       <option <?php if(isset($companyCustomerInfo) && $companyCustomerInfo->city_id == $city->id ) { echo "selected"; } ?> value="{{ $city->id  }}">{{ $city->name }}</option> 
                      @endif
                    @endforeach
                </select>
                <div class="errorTxt"></div>
            </div>
	</div>

	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">Postal Code</label>
                <input class="form-control" id="customer_post_code" name="customer_post_code" value="@if(isset($companyCustomerInfo)){{$companyCustomerInfo->postal_code}}@endif" placeholder="ABC123">
                <div class="errorTxt"></div>
            </div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">Telephone</label>
                <input class="form-control" id="customer_telephone" name="customer_telephone" value="@if(isset($companyCustomerInfo)){{$companyCustomerInfo->telephone}}@endif" placeholder="111222333">
                <div class="errorTxt"></div>
            </div>
	</div>

	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">Mobile</label>
                <input class="form-control" id="customer_mobile" name="customer_mobile" value="@if(isset($companyCustomerInfo)){{$companyCustomerInfo->mobile}}@endif" placeholder="111222333">
                <div class="errorTxt"></div>
            </div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">Fax</label>
                <input class="form-control" id="customer_fax" name="customer_fax" value="@if(isset($companyCustomerInfo)){{$companyCustomerInfo->fax}}@endif" placeholder="111222333">
                <div class="errorTxt"></div>
            </div>
	</div>

	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">Organization No.</label>
                <input class="form-control" id="customer_org_num" name="customer_org_num" value="@if(isset($companyCustomerInfo)){{$companyCustomerInfo->organization_num}}@endif" placeholder="111222333">
                <div class="errorTxt"></div>
            </div>
	</div>
</div>
