<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($companyHr))
    <input name="_method" type="hidden" value="PATCH">
@endif


<!-- First Name Field -->
<div class="form-group col-sm-6">
               
              <label for="wizard-username">First Name:</label>
              <input type="text" name="first_name" class="form-control" id="wizard-username"  value="@if(isset($companyHr)){{ $companyHr->first_name }}@endif" >
</div>
            
<!-- Last Name Field -->
<div class="form-group col-sm-6">
                <label for="wizard-username">Last Name:</label>
                <input type="text" name="last_name" class="form-control" id="wizard-username" value="@if(isset($companyHr)){{ $companyHr->last_name }}@endif">
</div>

<!-- Address 1 Field -->
<div class="form-group col-sm-6">
                <label for="wizard-username">Address 1:</label>
                <input type="text" name="address_1" class="form-control" id="wizard-username" value="@if(isset($companyHr)){{ $companyHr->address_1 }}@endif">
</div>

<!-- Address 2 Field -->
<div class="form-group col-sm-6">
                <label for="wizard-username">Address 2:</label>
                <input type="text" name="address_2" class="form-control" id="wizard-username"  value="@if(isset($companyHr)){{ $companyHr->address_2 }}@endif">
</div>

<!-- Post Code Field -->
<div class="form-group col-sm-6">
                <label for="phone">Post Code:</label>
                <input type="text" id="wizard-username" name="post_code" placeholder="0210234567" class="form-control"  value="@if(isset($companyHr)){{ $companyHr->post_code }}@endif">
                 
</div>

<!-- City Id Field -->

                        <div class="col-sm-6 form-group">
                            <fieldset class="form-group">
                                <label for="city_id">City</label>
                                <select name="city_id" id="city_id" class="form-control select2-city" style="width: 100%" data-allow-clear="true">
                                    <option></option>
                                    @foreach ($cities as $city)
                                      @if (isset($companyHr))
                                       <option value="{{ $city->id }}" selected="selected">{{ $city->name }}</option> 
                                      @else
                                       <option value="{{ $city->id  }}">{{ $city->name }}</option> 
                                      @endif
                                    @endforeach
                                </select>
                                <div class="errorTxt"></div>

                            </fieldset>
                        </div>
<!-- State Id Field -->
                            <div class="col-sm-6 form-group">
                                <fieldset class="form-group">
                                    <label for="state_id">State</label>
                                    <select name="state_id" id="state_id" class="form-control select2-state" style="width: 100%" data-allow-clear="true">
                                        <option></option>
                                         @foreach ($states as $state)
                                             @if (isset($companyHr))
                                              <option value="{{ $state->id }}" selected="selected">{{ $state->name }}</option> 
                                             @else
                                              <option value="{{ $state->id  }}">{{ $state->name }}</option> 
                                             @endif
                                        @endforeach
                                    </select>
                                    <div class="errorTxt"></div>

                                </fieldset>
                            </div>

<!-- Country Id Field -->
                <div class="col-sm-6 form-group">
                    <fieldset class="form-group">
                        <label for="country_id">Country</label>
                        <select name="country_id" id="country_id" class="form-control select2-country" style="width: 100%" data-allow-clear="true">
                            <option></option>
                           @foreach ($countries as $country)
                                 @if (isset($companyHr))
                                  <option value="{{ $country->id }}" selected="selected">{{ $country->name }}</option> 
                                 @else
                                  <option value="{{ $country->id }}">{{ $country->name }}</option> 
                                 @endif
                            @endforeach
                        </select>
                        <div class="errorTxt"></div>

                    </fieldset>
                </div>


<!-- Telephone Job Field -->
<div class="form-group col-sm-6">
                <label for="phone">Telephone Job:</label>
                <input type="text" id="wizard-country" name="telephone_job" placeholder="0210234567" class="form-control" value="@if(isset($companyHr)){{ $companyHr->telephone_job }}@endif">
</div>

<!-- Telephone Private Field -->
<div class="form-group col-sm-6">
                <label for="phone">Telephone Private:</label>
                <input type="text" id="wizard-country" name="telephone_private" placeholder="0210234567" class="form-control" value="@if(isset($companyHr)){{ $companyHr->telephone_private }}@endif">
</div>

<!-- Email Job Field -->
<div class="form-group col-sm-6">
                <label for="email">Email Job:</label>
                <input type="email" id="email" name="email_job" placeholder="someone@mail.com" class="form-control" value="@if(isset($companyHr)){{ $companyHr->email_job }}@endif">
</div>

<!-- Email Private Field -->
<div class="form-group col-sm-6">
                <label for="email">Email Private:</label>
                <input type="email" id="email" name="email_private" placeholder="someone@mail.com" class="form-control" value="@if(isset($companyHr)){{ $companyHr->email_private }}@endif">
</div>

<!-- Civil Status Id Field -->
<div class="form-group col-sm-6">
                <label for="wizard-country">Civil Status:</label>
              <select class="form-control" name="civil_status_id" id="wizard-country" style="width: 100%" data-allow-clear="true">
                <option></option>
                @foreach ($hrCivil as $hrCivil)
                     @if (isset($companyHr))
                      <option value="{{ $hrCivil->id }}" selected="selected">{{ $hrCivil->name }}</option> 
                     @else
                      <option value="{{ $hrCivil->id  }}">{{ $hrCivil->name }}</option> 
                     @endif
                @endforeach

              </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" class="btn btn-primary"><i class="fa fa-arrow"></i> Next Step</button>
    <a href="{!! route('company.companyHrs.index') !!}" class="btn btn-default">Cancel</a>
</div>
