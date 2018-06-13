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
                     Info About Employment
                     </span>
                  </li>
                  <li data-target="#wizard-3">
                     <span class="wizard-step-number">3</span>
                     <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
                     <span class="wizard-step-caption">
                     Salary and vacation
                     </span>
                  </li>
                  <li data-target="#wizard-6">
                     <span class="wizard-step-number">6</span>
                     <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
                     <span class="wizard-step-caption">
                     Other information
                     </span>
                  </li>
               </ul>
            </div>
            <div class="wizard-content">
               <!-- ===========================wizard-1===================================== -->
               <form  class="wizard-pane active" id="wizard-1">
                  @if (isset($companyHr))
                  <input name="_method" type="hidden" value="PATCH">
                  @endif
                  <h3 class="m-t-0">Employee Basic Information</h3>
                  <div class="row">
                     <!-- First Name Field -->
                     <div class="form-group col-sm-6">
                        <label for="wizard-username">First Name</label>
                        <input type="text" name="first_name_show" placeholder="John" class="form-control" id="firstName"  value="@if(isset($companyHr)){{ $companyHr->first_name }}@endif" >
                     </div>
                     <!-- Last Name Field -->
                     <div class="form-group col-sm-6">
                        <label for="wizard-username">Last Name</label>
                        <input type="text" name="last_name_show" placeholder="Doe" class="form-control" id="lastName" value="@if(isset($companyHr)){{ $companyHr->last_name }}@endif">
                     </div>
                  </div>
                  <div class="row">
                     <!-- Address 1 Field -->
                     <div class="form-group col-sm-6">
                        <label for="wizard-username">Address 1</label>
                        <input type="text" name="address_1_show" class="form-control"  placeholder="1516  Hoffman Avenue New York" id="Address1" value="@if(isset($companyHr)){{ $companyHr->address_1 }}@endif">
                     </div>
                     <!-- Address 2 Field -->
                     <div class="form-group col-sm-6">
                        <label for="wizard-username">Address 2</label>
                        <input type="text" name="address_2_show" class="form-control" id="Address2" placeholder="1516  Hoffman Avenue New York"  value="@if(isset($companyHr)){{ $companyHr->address_2 }}@endif">
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6 form-group">
                        <fieldset class="form-group">
                           <label for="country_id">Country</label>
                           <select name="country_id_show" id="countyId" class="form-control select2-country" style="width: 100%" data-allow-clear="true">
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
                     <div class="col-sm-6 form-group">
                        <fieldset class="form-group">
                           <label for="state_id">State</label>
                           <select name="state_id_show" id="stateId" class="form-control select2-state" style="width: 100%" data-allow-clear="true">
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
                  </div>
                  <div class="row">
                     <div class="col-sm-6 form-group">
                        <fieldset class="form-group">
                           <label for="city_id">City</label>
                           <select name="city_id_show" id="cityId" class="form-control select2-city"  style="width: 100%" data-allow-clear="true">
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
                     <!-- Post Code Field -->
                     <div class="form-group col-sm-6">
                        <label for="phone">Post Code</label>
                        <input type="text" id="postCode" name="post_code_show" placeholder="ABC123" class="form-control"  value="@if(isset($companyHr)){{ $companyHr->post_code }}@endif">
                     </div>
                  </div>
                  <!-- City Id Field -->
                  <!-- State Id Field -->
                  <div class="row">
                     <!-- Telephone Job Field -->
                     <div class="form-group col-sm-6">
                        <label for="phone">Telephone Job</label>
                        <input type="text" id="telephoneId" name="telephone_job_show" placeholder="0210234567" class="form-control" value="@if(isset($companyHr)){{ $companyHr->telephone_job }}@endif">
                     </div>
                     <!-- Telephone Private Field -->
                     <div class="form-group col-sm-6">
                        <label for="phone">Telephone Private</label>
                        <input type="text" id="telephoneJob" name="telephone_private_show" placeholder="0210234567" class="form-control" value="@if(isset($companyHr)){{ $companyHr->telephone_private }}@endif">
                     </div>
                  </div>
                  <div class="row">
                     <!-- Email Job Field -->
                     <div class="form-group col-sm-6">
                        <label for="email">Email Job</label>
                        <input type="email" id="emailJob" name="email_job_show" placeholder="someone@mail.com" class="form-control" value="@if(isset($companyHr)){{ $companyHr->email_job }}@endif">
                     </div>
                     <!-- Email Private Field -->
                     <div class="form-group col-sm-6">
                        <label for="email">Email Private</label>
                        <input type="email" id="emailId" name="email_private_show" placeholder="someone@mail.com" class="form-control" value="@if(isset($companyHr)){{ $companyHr->email_private }}@endif">
                     </div>
                  </div>
                  <div class="row">
                     <!-- Civil Status Id Field -->
                     <div class="form-group col-sm-6">
                        <label for="wizard-country">Civil Status</label>
                        <select class="form-control select2-status" name="civil_status_id_show" id="civilId" style="width: 100%" data-allow-clear="true">
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
                  </div>
                  <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                     <a href="{!! route('company.companyHrs.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                     @if (isset($companyHr))
                     <button type="button" class="btn btn-primary" id="asdBtn" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                     @else
                     <button type="button" class="btn btn-primary" id="" data-wizard-action="next">CREATE COMPANY HR <i class="fa fa-arrow-right m-l-1"></i></button>
                     @endif
                  </div>
               </form>


               <!-- ============================wizard-2==================================== -->



               <form class="wizard-pane" id="wizard-2">
                  @if (isset($companyHr))
                  <input name="_method" type="hidden" value="PATCH">
                  @endif
                  <h3 class="m-t-0">Information about employment</h3>
                  <div class="form-group col-sm-6">
                     <label for="wizard-username">Employment Date</label>
                     <input type="text" id="daterangeEmpl" name="employment_date" value="@if(isset($companyHr)){{ date('m/d/Y', strtotime($companyHr->employment_date)) }} @endif" class="form-control">
                  </div>
                  <!-- Last Name Field -->
                  <div class="form-group col-sm-6">
                     <label for="wizard-username">Termination Time In Months</label>
                     <input type="number" id="termId" name="termination_time" placeholder="01" value="@if(isset($companyHr)){{ $companyHr->termination_time }}@endif" class="form-control">
                  </div>
                  <!-- Address 1 Field -->
                  <div class="form-group col-sm-6">
                     <label for="wizard-username">Employeed Untill</label>
                     <input type="text" id="daterangeEmplUntil" name="employeed_untill" value="@if(isset($companyHr)){{ date('m/d/Y', strtotime($companyHr->employeed_untill)) }} @endif" class="form-control">
                  </div>
                  <!-- Address 2 Field -->
                  <div class="col-sm-6 form-group">
                     <fieldset class="form-group">
                        <label for="city_id">Personal Category</label>
                        <select name="personal_category" id="personalId" class="form-control select2-personal" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           @foreach ($hrPersonal as $personal)
                           @if (isset($companyHr))
                           <option value="{{ $personal->id }}" selected="selected">{{ $personal->name }}</option>
                           @else
                           <option value="{{ $personal->id  }}">{{ $personal->name }}</option>
                           @endif
                           @endforeach
                        </select>
                        <div class="errorTxt"></div>
                     </fieldset>
                  </div>
                  <!-- Post Code Field -->
                  <div class="col-sm-6 form-group">
                     <fieldset class="form-group">
                        <label for="city_id">Collective Type</label>
                        <select name="collective_type" id="collectiveId" class="form-control select2-collective" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           @foreach ($hrCollectivetype as $collective)
                           @if (isset($companyHr))
                           <option value="{{ $collective->id }}" selected="selected">{{ $collective->name }}</option>
                           @else
                           <option value="{{ $collective->id  }}">{{ $collective->name }}</option>
                           @endif
                           @endforeach                                   
                        </select>
                        <div class="errorTxt"></div>
                     </fieldset>
                  </div>
                  <!-- City Id Field -->
                  <div class="col-sm-6 form-group">
                     <fieldset class="form-group">
                        <label for="city_id">Employment Form</label>
                        <select name="employment_form" id="employFormId" class="form-control select2-emplyForm" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           @foreach ($hrEmployForm as $employ)
                           @if (isset($companyHr))
                           <option value="{{ $employ->id }}" selected="selected">{{ $employ->name }}</option>
                           @else
                           <option value="{{ $employ->id  }}">{{ $employ->name }}</option>
                           @endif
                           @endforeach  
                        </select>
                        <div class="errorTxt"></div>
                     </fieldset>
                  </div>
                  <!-- State Id Field -->
                  <div class="col-sm-6 form-group">
                     <label for="wizard-username">Insurance Date</label>
                     <input type="text" id="daterangeInsurance" name="insurance_date" value="@if(isset($companyHr)){{ date('m/d/Y', strtotime($companyHr->insurance_date)) }} @endif"  class="form-control">
                  </div>
                  <!-- Country Id Field -->
                  <div class="col-sm-6 form-group">
                     <label for="wizard-username">Insurance Fees</label>
                     <input type="number" id="insuranceFees" placeholder="10.00" value="@if(isset($companyHr)){{ $companyHr->insurance_fees }}@endif" name="insurance_fees" class="form-control">
                  </div>
                  <!-- Telephone Job Field -->
                  <div class="form-group col-sm-6">
                     <fieldset class="form-group">
                        <label for="city_id">Department</label>
                        <select name="department" id="departmentWiz2" class="form-control select2-department" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           @foreach ($hrPersonal as $personal)
                           @if (isset($companyHr))
                           <option value="{{ $personal->id }}" selected="selected">{{ $personal->name }}</option>
                           @else
                           <option value="{{ $personal->id  }}">{{ $personal->name }}</option>
                           @endif
                           @endforeach 
                        </select>
                        <div class="errorTxt"></div>
                     </fieldset>
                  </div>
                  <!-- Telephone Private Field -->
                  <div class="form-group col-sm-6">
                     <fieldset class="form-group">
                        <label for="city_id">Designation</label>
                        <select name="designation" id="desigWiz2" class="form-control select2-designation" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           @foreach ($hrDesig as $desig)
                           @if (isset($companyHr))
                           <option value="{{ $desig->id }}" selected="selected">{{ $desig->name }}</option>
                           @else
                           <option value="{{ $desig->id  }}">{{ $desig->name }}</option>
                           @endif
                           @endforeach 
                        </select>
                        <div class="errorTxt"></div>
                     </fieldset>
                  </div>
                  <!-- Email Job Field -->
                  <div class="form-group col-sm-6">
                     <fieldset class="form-group">
                        <label for="city_id">Vacancies</label>
                        <select name="vacancies" id="vacancyWiz2" class="form-control select2-vacancy" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           @foreach ($hrDesig as $desig)
                           @if (isset($companyHr))
                           <option value="{{ $desig->id }}" selected="selected">{{ $desig->name }}</option>
                           @else
                           <option value="{{ $desig->id  }}">{{ $desig->name }}</option>
                           @endif
                           @endforeach
                        </select>
                        <div class="errorTxt"></div>
                     </fieldset>
                  </div>
                  <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                     <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> PREVIOUS</button>&nbsp;&nbsp;
                     <a href="{!! route('company.companyHrs.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                     <button type="submit" class="btn btn-primary" id="" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                  </div>
               </form>

               <!-- ============================wizard-3==================================== -->


               <form class="wizard-pane" id="wizard-3">
                  @if (isset($companyHr))
                  <input name="_method" type="hidden" value="PATCH">
                  @endif
                  <h3 class="m-t-0">Information about employment</h3>
                  <div class="row">
                     <div class="form-group col-sm-6">
                        <fieldset class="form-group">
                           <label for="salary_type">Salary Type</label>
                           <select name="salary_type" id="salaryTypeWiz3" class="form-control select2-salaryType" style="width: 100%" data-allow-clear="true">
                              <option></option>
                              @foreach ($hrSalaryType as $salary)
                              @if (isset($companyHr))
                              <option value="{{ $salary->id }}" selected="selected">{{ $salary->name }}</option>
                              @else
                              <option value="{{ $salary->id  }}">{{ ucfirst($salary->name) }}</option>
                              @endif
                              @endforeach
                           </select>
                           <div class="errorTxt"></div>
                        </fieldset>
                     </div>
                     <!-- Last Name Field -->
                     <div class="form-group col-sm-6">
                        <label for="wizard-username">Salary</label>
                        <input type="number" name="salary" id="salaryId" placeholder="2000.00" value="@if(isset($companyHr)){{ $companyHr->salary }}@endif" class="form-control">
                     </div>
                  </div>
                  <div class="row">
                     <!-- Address 1 Field -->
                     <div class="form-group col-sm-6">
                        <label for="wizard-username">Employment in %</label>
                        <input type="number" name="employment_percent" value="@if(isset($companyHr)){{ $companyHr->employment_percent }}@endif" id="empInPercent" placeholder="75.00" class="form-control">
                     </div>
                     <!-- Address 2 Field -->
                     <div class="form-group col-sm-6">
                        <label for="wizard-username">Cost Division</label>
                        <input type="number" id="costDivision" name="cost_division" value="@if(isset($companyHr)){{ $companyHr->cost_division }}@endif" placeholder="00.00" class="form-control">
                     </div>
                  </div>
                  <div class="row">
                     <!-- Post Code Field -->
                     <div class="form-group col-sm-6">
                        <fieldset class="form-group">
                           <label for="project">Project</label>
                           <select name="project" id="projectWiz3" class="form-control select2-project" style="width: 100%" data-allow-clear="true">
                              <option></option>
                              @foreach ($hrCompanyPro as $project)
                              @if (isset($companyHr))
                              <option value="{{ $project->id }}" selected="selected">{{ $project->name }}</option>
                              @else
                              <option value="{{ $project->id  }}">{{ ucfirst($project->name) }}</option>
                              @endif
                              @endforeach
                           </select>
                           <div class="errorTxt"></div>
                        </fieldset>
                     </div>
                     <!-- City Id Field -->
                     <div class="form-group col-sm-6">
                        <label for="wizard-username">VAT Table</label>
                        <input type="number" name="vat_table" id="valueAdded" value="@if(isset($companyHr)){{ $companyHr->vat_table }}@endif" placeholder="00.00" class="form-control">
                     </div>
                     <!-- State Id Field -->
                  </div>
                  <div class="row">
                     <div class="form-group col-sm-6">
                        <label for="wizard-username">Vacation Days</label>
                        <input type="number" name="vacation_days" id="vacationDays" value="@if(isset($companyHr)){{ $companyHr->vacation_days }}@endif" placeholder="00.00" class="form-control">
                     </div>
                     <!-- Country Id Field -->
                     <div class="form-group col-sm-6">
                        <fieldset class="form-group">
                           <label for="salary_type">Vacation Category</label>
                           <select name="vacation_category" id="vacationWiz3" class="form-control select2-project" style="width: 100%" data-allow-clear="true">
                              <option></option>
                              @foreach ($hrVacCategory as $cat)
                              @if (isset($companyHr))
                              <option value="{{ $cat->id }}" selected="selected">{{ $cat->name }}</option>
                              @else
                              <option value="{{ $cat->id  }}">{{ ucfirst($cat->name) }}</option>
                              @endif
                              @endforeach
                           </select>
                           <div class="errorTxt"></div>
                        </fieldset>
                     </div>
                  </div>
                  <!-- Telephone Job Field -->
                  <div class="row">
                     <div class="col-sm-1 form-group">
                      @if(isset($companyHr))
                        @if($companyHr->father == 1)
                        <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="father" checked="checked" id="father">
                        <span class="custom-control-indicator"></span>
                        <strong>Father</strong>
                        </label>
                        @else
                        <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="father" id="father">
                        <span class="custom-control-indicator"></span>
                        <strong>Father</strong>
                        </label>
                        @endif

                      @else
                        <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="father" id="father">
                        <span class="custom-control-indicator"></span>
                        <strong>Father</strong>
                        </label>
                      @endif
                     </div>
                     <!-- Telephone Private Field -->
                     <div class="col-sm-1 form-group">
                      @if(isset($companyHr))
                        @if($companyHr->father == 1)
                        <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="mother" checked="checked" id="mother">
                        <span class="custom-control-indicator"></span>
                        <strong>Mother</strong>
                        </label>
                        @else
                        <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="mother" id="mother">
                        <span class="custom-control-indicator"></span>
                        <strong>Mother</strong>
                        </label>
                        @endif

                      @else
                        <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="mother" id="mother">
                        <span class="custom-control-indicator"></span>
                        <strong>Mother</strong>
                        </label>
                      @endif
                     </div>
                  </div>
                  <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                     <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> PREVIOUS</button>&nbsp;&nbsp;
                     <a href="{!! route('company.companyHrs.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                     <button type="submit" class="btn btn-primary" id="createCompanyHrBtn" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                  </div>
               </form>

               <!-- ============================wizard-4==================================== -->
               <form class="wizard-pane" id="wizard-4">
                  @if (isset($companyHr))
                  <input name="_method" type="hidden" value="PATCH">
                  @endif
                  <h3 class="m-t-0">Information about employment</h3>
                  <div class="form-group col-sm-6">
                     <label for="wizard-username">Employment Date:</label>
                     <input type="text" id="daterange-3" name="employment_date" class="form-control">
                  </div>
                  <!-- Last Name Field -->
                  <div class="form-group col-sm-6">
                     <label for="wizard-username">Termination Time:</label>
                     <input type="number" name="termination_time" class="form-control">
                  </div>
                  <!-- Address 1 Field -->
                  <div class="form-group col-sm-6">
                     <label for="wizard-username">Employeed Untill:</label>
                     <input type="text" id="daterange-3" name="employeed_untill" class="form-control">
                  </div>
                  <!-- Address 2 Field -->
                  <div class="col-sm-6 form-group">
                     <fieldset class="form-group">
                        <label for="city_id">Personal Category:</label>
                        <select name="personal_category" id="city_id" class="form-control select2-city" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           <option value="1">name</option>
                           <option value="2">name</option>
                        </select>
                        <div class="errorTxt"></div>
                     </fieldset>
                  </div>
                  <!-- Post Code Field -->
                  <div class="col-sm-6 form-group">
                     <fieldset class="form-group">
                        <label for="city_id">Collective Type:</label>
                        <select name="collective_type" class="form-control select2-city" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           <option value="1">name</option>
                           <option value="2">name</option>
                        </select>
                        <div class="errorTxt"></div>
                     </fieldset>
                  </div>
                  <!-- City Id Field -->
                  <div class="col-sm-6 form-group">
                     <fieldset class="form-group">
                        <label for="city_id">Employment Form:</label>
                        <select name="employment_form" class="form-control select2-city" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           <option value="1">name</option>
                           <option value="2">name</option>
                        </select>
                        <div class="errorTxt"></div>
                     </fieldset>
                  </div>
                  <!-- State Id Field -->
                  <div class="col-sm-6 form-group">
                     <label for="wizard-username">Insurance Date:</label>
                     <input type="text" id="daterange-4" name="insurance_date" class="form-control">
                  </div>
                  <!-- Country Id Field -->
                  <div class="col-sm-6 form-group">
                     <label for="wizard-username">Insurance Fees:</label>
                     <input type="number" name="insurance_fees" class="form-control">
                  </div>
                  <!-- Telephone Job Field -->
                  <div class="form-group col-sm-6">
                     <fieldset class="form-group">
                        <label for="city_id">Department:</label>
                        <select name="department" class="form-control select2-city" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           <option value="1">name</option>
                           <option value="2">name</option>
                        </select>
                        <div class="errorTxt"></div>
                     </fieldset>
                  </div>
                  <!-- Telephone Private Field -->
                  <div class="form-group col-sm-6">
                     <fieldset class="form-group">
                        <label for="city_id">Designation:</label>
                        <select name="designation" class="form-control select2-city" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           <option value="1">name</option>
                           <option value="2">name</option>
                        </select>
                        <div class="errorTxt"></div>
                     </fieldset>
                  </div>
                  <!-- Email Job Field -->
                  <div class="form-group col-sm-6">
                     <fieldset class="form-group">
                        <label for="city_id">Vacancies:</label>
                        <select name="vacancies" class="form-control select2-city" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           <option value="1">name</option>
                           <option value="2">name</option>
                        </select>
                        <div class="errorTxt"></div>
                     </fieldset>
                  </div>
                  <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                     <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> PREVIOUS</button>&nbsp;&nbsp;
                     <a href="{!! route('admin.companies.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                     <button type="submit" class="btn btn-primary" id="addContactPersonBtn" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
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



@if(isset($companyHr))
<form action="{{ route('company.companyHrs.update', $companyHr->id) }}" method="POST" id="hiddenForm">
   <input type="hidden" name="_method" value="PATCH">
   @else
<form method="POST" action="{{ route('company.companyHrs.store') }}" id="hiddenForm">
   @endif
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <input type="hidden" name="first_name" id="fname"  value="" >
   <input type="hidden" name="last_name" id="lname"  value="" >
   <input type="hidden" name="address_1" id="AddressOne"  value="" >
   <input type="hidden" name="address_2" id="AddressTwo" value="" >
   <input type="hidden" name="post_code" id="pCode" value="" >
   <input type="hidden" name="city_id" id="cId"  value="" >
   <input type="hidden" name="state_id" id="sId"  value="" >
   <input type="hidden" name="country_id" id="countyHiddenId"  value="" >
   <input type="hidden" name="telephone_job" id="tId"  value="" >
   <input type="hidden" name="telephone_private" id="tPrivate"  value="" >
   <input type="hidden" name="email_private" id="eId"  value="" >
   <input type="hidden" name="email_job" id="ePrivate"  value="" >
   <input type="hidden" name="civil_status_id" id="cStatusId"  value="" >
   <input type="hidden" name="employment_date" id="daterangeEmpl_hidden"  value="" >
   <input type="hidden" name="termination_time" id="termId_hidden"  value="" >
   <input type="hidden" name="employeed_untill" id="daterangeEmplUntil_hidden"  value="" >
   <input type="hidden" name="personal_category" id="personalId_hidden"  value="" >
   <input type="hidden" name="collective_type" id="collectiveId_hidden"  value="" >
   <input type="hidden" name="employment_form" id="employFormId_hidden"  value="" >
   <input type="hidden" name="insurance_date" id="daterangeInsurance_hidden"  value="" >
   <input type="hidden" name="insurance_fees" id="insuranceFees_hidden"  value="" >
   <input type="hidden" name="department" id="departmentWiz2_hidden"  value="" >
   <input type="hidden" name="designation" id="desigWiz2_hidden"  value="" >
   <input type="hidden" name="vacancies" id="vacancyWiz2_hidden"  value="" >
   <!-- ================= wiz-3 =================== -->
   <input type="hidden" name="salary_type" id="salaryTypeWiz3_hidden"  value="" >
   <input type="hidden" name="salary" id="salaryId_hidden"  value="" >
   <input type="hidden" name="employment_percent" id="empInPercent_hidden"  value="" >
   <input type="hidden" name="cost_division" id="costDivision_hidden"  value="" >
   <input type="hidden" name="project" id="projectWiz3_hidden"  value="" >
   <input type="hidden" name="vat_table" id="valueAdded_hidden"  value="" >
   <input type="hidden" name="vacation_days" id="vacationDays_hidden"  value="" >
   <input type="hidden" name="vacation_category" id="vacationWiz3_hidden"  value="" >
   <input type="hidden" class="father_and_mother" name="father" id="father_hidden" value="">
   <input type="hidden" class="father_and_mother" name="mother" id="mother_hidden" value="">
</form>





@section('js')
<script type="text/javascript">
   var editCompany = 0;


/*        $(function() {
             $('#contract-content').summernote({
               height: 200,
               toolbar: [
                 ['parastyle', ['style']],
                 ['fontstyle', ['fontname', 'fontsize']],
                 ['style', ['bold', 'italic', 'underline', 'clear']],
                 ['font', ['strikethrough', 'superscript', 'subscript']],
                 ['color', ['color']],
                 ['para', ['ul', 'ol', 'paragraph']],
                 ['height', ['height']],
                 ['insert', ['picture', 'link', 'video', 'table', 'hr']],
                 ['history', ['undo', 'redo']],
                 ['misc', ['codeview', 'fullscreen']],
                 ['help', ['help']]
               ],
             });
           });*/
         
         
           $('#daterange-3').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
             startDate: "01/01/2018",
           });
         
           $('#daterange-4').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
             startDate: "12/31/2018",
   
           });
         
           $('#daterangeEmpl').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
   
           });
   
         
           $('#daterangeEmplUntil').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
             startDate: moment().add('year', 1),
   
           });
           $('#daterangeInsurance').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
   
           });
           $('#daterange-4').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
   
           });
           $('#daterange-4').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
             startDate: "12/31/2018",
   
           });
           $('#daterange-4').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
             startDate: "12/31/2018",
   
           });
           $('#daterange-4').daterangepicker({
             singleDatePicker: true,
             showDropdowns: true,
             startDate: "12/31/2018",
   
           });
           // -------------------------------------------------------------------------
           // Initialize Select2
           
           $(function() {
             $('.select2-country').select2({
               placeholder: 'Select Country',
             });
           });
           
           $(function() {
             $('.select2-state').select2({
               placeholder: 'Select State',
             });
           });
           
           $(function() {
             $('.select2-city').select2({
               placeholder: 'Select City',
             });
           });
           
           $(function() {
             $('.select2-status').select2({
               placeholder: 'Select Status',
             });
           });
           
           $(function() {
             $('.select2-personal').select2({
               placeholder: 'Select Personal Category',
             });
           });
           
           $(function() {
             $('.select2-collective').select2({
               placeholder: 'Select Collective',
             });
           });
           
           $(function() {
             $('.select2-emplyForm').select2({
               placeholder: 'Select Employment Form',
             });
           });
           
           $(function() {
             $('.select2-department').select2({
               placeholder: 'Select Department',
             });
           });
           
           $(function() {
             $('.select2-designation').select2({
               placeholder: 'Select Designation',
             });
           });
           
           $(function() {
             $('.select2-vacancy').select2({
               placeholder: 'Select Vacancy',
             });
           });
           
           $(function() {
             $('.select2-salaryType').select2({
               placeholder: 'Select Salary Type',
             });
           });
           
           $(function() {
             $('.select2-project').select2({
               placeholder: 'Select Salary Type',
             });
           });
   
           $(function() {
             $('.select2-payment-method').select2({
               placeholder: 'Select Payment Method',
             });
           });
   
           $(function() {
             $('.select2-payment-cycle').select2({
               placeholder: 'Select Payment Cycle',
             });
           });
   
           $(function() {
             $('.select2-discount-type').select2({
               placeholder: 'Select Discount Type',
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
   
   
   
   
   var companyCreated = 0;
   
   $('#wizard-1').validate({
   
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
       errorPlacement: function(error, element) {
         var placement = $(element).parent().find('.errorTxt');
         if (placement) {
           $(placement).append(error)
         } else {
           error.insertAfter(element);
         }
       }
   
   });
   
   
   $('#createCompanyHrBtn').on('click', function(e) {
    
         // e.preventDefault();
         // alert('button');
         //Get
         var fname         =       $('#firstName').val();
         var lname         =       $('#lastName').val();
         var add1          =       $('#Address1').val();
         var add2          =       $('#Address2').val();
         var pcode         =       $('#postCode').val();
         var city          =       $('#cityId').val();
         var state         =       $('#stateId').val();
         var country       =       $('#countyId').val();
         var telephone     =       $('#telephoneId').val();
         var telephoneJ    =       $('#telephoneJob').val();
         var emailId       =       $('#emailId').val();
         var emailJob      =       $('#emailJob').val();
         var civilId       =       $('#civilId').val();
         var daterangeEmpl =       $('#daterangeEmpl').val();
         var termId        =       $('#termId').val();
         var daterangeEmplUntil =  $('#daterangeEmplUntil').val();
         var personalId    =       $('#personalId').val();
         var collectiveId =        $('#collectiveId').val();
         var employFormId =        $('#employFormId').val();
         var daterangeInsurance =  $('#daterangeInsurance').val();
         var insuranceFees =       $('#insuranceFees').val();
         var departmentWiz2 =      $('#departmentWiz2').val();
         var desigWiz2   =         $('#desigWiz2').val();
         var vacancyWiz2 =         $('#vacancyWiz2').val();
   
         var salaryTypeWiz3 =         $('#salaryTypeWiz3').val();
         var salaryId =         $('#salaryId').val();
         var empInPercent =         $('#empInPercent').val();
         var costDivision =         $('#costDivision').val();
         var projectWiz3 =         $('#projectWiz3').val();
         var valueAdded =         $('#valueAdded').val();
         var vacationDays =         $('#vacationDays').val();
         var vacationWiz3 =         $('#vacationWiz3').val();
         var father        =         $('#father').val();
         var mother        =         $('#mother').val();
         // alert(father);
         //Set
         $('#fname').val(fname);
         $('#lname').val(lname);
         $('#AddressOne').val(add1);
         $('#AddressTwo').val(add2);
         $('#pCode').val(pcode);
         $('#cId').val(city);
         $('#sId').val(state);
         $('#countyHiddenId').val(country);
         $('#tId').val(telephone);
         $('#tPrivate').val(telephoneJ);
         $('#eId').val(emailId);
         $('#ePrivate').val(emailJob);
         $('#cStatusId').val(civilId);
         $('#daterangeEmpl_hidden').val(daterangeEmpl);
         $('#termId_hidden').val(termId);
         $('#daterangeEmplUntil_hidden').val(daterangeEmplUntil);
         $('#personalId_hidden').val(personalId);
         $('#collectiveId_hidden').val(collectiveId);
         $('#employFormId_hidden').val(employFormId);
         $('#daterangeInsurance_hidden').val(daterangeInsurance);
         $('#insuranceFees_hidden').val(insuranceFees);
         $('#departmentWiz2_hidden').val(departmentWiz2);
         $('#desigWiz2_hidden').val(desigWiz2);
         $('#vacancyWiz2_hidden').val(vacancyWiz2);
   
         $('#salaryTypeWiz3_hidden').val(salaryTypeWiz3);
         $('#salaryId_hidden').val(salaryId);
         $('#empInPercent_hidden').val(empInPercent);
         $('#costDivision_hidden').val(costDivision);
         $('#projectWiz3_hidden').val(projectWiz3);
         $('#valueAdded_hidden').val(valueAdded);
         $('#vacationDays_hidden').val(vacationDays);
         $('#vacationWiz3_hidden').val(vacationWiz3);
         $('#father_hidden').val(father);
         $('#mother_hidden').val(mother);
   
         $( "#hiddenForm" ).submit();
   
      /*   $('#txt_name').val(bla);
   
   
   
         $("#txt_name").keyup(function(){
         alert($(this).val());
     });*/
         
     });
   
   
   $('#state_id').on('change', function() {
   
       var getStateId = $('#state_id').val();
       // alert(state_id);
   
       $.ajax({
           url: '{{ route("cities.list") }}',
           data: { state_id: getStateId },
           dataType: 'json',
           cache: false,
           type: 'POST', // For jQuery < 1.9
           success: function(data){
               
               if (data.success == 1) {
                 var option = "";
                 
                 $.each(data.cities, function(i, item) {
                     option += '<option data-state="'+item.state_id+'" value="'+item.id+'">'+item.name+'</option>';
                 });
   
                 $('#city_id').html(option);
   
   
               }
   
               // console.log(data);
           },
           error: function(xhr,status,error)  {
   
           }
   
       });
   });
   
   
   
   var contactPersonCreated = 0;
   
   $('#wizard-2').validate();
   
   $('#wizard-2').on('submit', function(e) {
         e.preventDefault();
   
         // test if form is valid 
         if($('#wizard-2').validate().form()) {
   
           if (editCompany == 0 && contactPersonCreated == 0) {
   
                 var myform = document.getElementById("wizard-2");
                 var data = new FormData(myform );
                 data.append('company_id', company_id);
   
                 // console.log(data);
   
                 $.ajax({
                     url: '{{ route("company.hrCompanyEmployments.store") }}',
                     data: data,
                     cache: false,
                     contentType: false,
                     processData: false,
                     type: 'POST', // For jQuery < 1.9
                     success: function(data){
                         // contactPersonCreated = data.success;
   
                           console.log(data);
                     },
                     error: function(xhr,status,error)  {
   
                     }
   
                 });
             } else {
   
                 var myform = document.getElementById("wizard-2");
                 var data = new FormData(myform );
                 data.append('company_id', editCompany);
   
                 // console.log(data);
   
                 $.ajax({
                     url: '{{ route("admin.companyContactPeople.update") }}',
                     data: data,
                     cache: false,
                     contentType: false,
                     processData: false,
                     type: 'POST', // For jQuery < 1.9
                     success: function(data) {
   
                         
                         $.each(data.createdFields, function (index, value) {
   
                            $('input[data-person-id="new-'+index+'"]').val(value);
                            $('input[data-person-id="new-'+index+'"]').attr('name', "person["+value+"][id]");
                            $('input[data-person-id="new-'+index+'"]').attr("data-person-id", value);
   
                            $('input[data-person-name="new-'+index+'"]').attr('name', "person["+value+"][name]");
                            $('input[data-person-name="new-'+index+'"]').attr("data-person-name", value);
   
                            $('input[data-person-email="new-'+index+'"]').attr('name', "person["+value+"][email]");                               
                            $('input[data-person-email="new-'+index+'"]').attr("data-person-email", value);
   
                            $('input[data-person-phone="new-'+index+'"]').attr('name', "person["+value+"][phone]");
                            $('input[data-person-phone="new-'+index+'"]').attr("data-person-phone", value);
   
                            $('input[data-person-fax="new-'+index+'"]').attr('name', "person["+value+"][fax]");      
                            $('input[data-person-fax="new-'+index+'"]').attr("data-person-fax", value);
   
                            $('input[data-person-department="new-'+index+'"]').attr('name', "person["+value+"][department]"); 
                            $('input[data-person-department="new-'+index+'"]').attr("data-person-department", value);
   
                            $('input[data-person-address="new-'+index+'"]').attr('name', "person["+value+"][address]");
                            $('input[data-person-designation="new-'+index+'"]').attr("data-person-address", value);
   
                            $('input[data-person-designation="new-'+index+'"]').attr('name', "person["+value+"][designation]");
                            $('input[data-person-designation="new-'+index+'"]').attr("data-person-designation", value);
   
                         });
   
                         // contactPersonCreated = data.success;
   
                         // console.log(data);
                     },
                     error: function(xhr,status,error)  {
   
                     }
   
                 });
             }
         } else {
             // console.log("does not validate");
         }
     });
   
   
   
   var companyBuildingCreated = 0;
   
   $('#wizard-3').validate();
   
   $('#wizard-3').on('submit', function(e) {
    
         e.preventDefault();
   
         // test if form is valid 
         if( $('#wizard-3').validate().form() ) {
   
           if (editCompany == 0 && companyBuildingCreated == 0) {
   
                 var myform = document.getElementById("wizard-3");
                 var data = new FormData(myform);
                 data.append('company_id', company_id);
   
                 $.ajax({
                     url: '{{ route("admin.companyBuildings.store") }}',
                     data: data,
                     cache: false,
                     contentType: false,
                     processData: false,
                     type: 'POST', // For jQuery < 1.9
                     success: function(data){
                         // myform.pxWizard('goTo', 2);
   
                         companyBuildingCreated = data.success;
   
                         // console.log(data);
                     },
                     error: function(xhr,status,error)  {
   
                     }
   
                 });
   
             } else {
   
                 var myform = document.getElementById("wizard-3");
                 var data = new FormData(myform );
                 data.append('company_id', editCompany);
   
                 // console.log(data);
   
                 $.ajax({
                     url: '{{ route("admin.companyBuildings.update") }}',
                     data: data,
                     cache: false,
                     contentType: false,
                     processData: false,
                     type: 'POST', // For jQuery < 1.9
                     success: function(data) {
   
                         
                         $.each(data.createdFields, function (index, value) {
   
   
   
                            $('input[data-building-id="new-'+index+'"]').val(value['id']);
                            $('input[data-building-id="new-'+index+'"]').attr('name', "building_data["+value['id']+"][id]");
                            $('input[data-building-id="new-'+index+'"]').attr("data-building-id", value['id']);
   
                            $('input[data-building-name="new-'+index+'"]').attr('name', "building_data["+value['id']+"][name]");
                            $('input[data-building-name="new-'+index+'"]').attr("data-building-name", value['id']);
   
                            $('input[data-building-address="new-'+index+'"]').attr('name', "building_data["+value['id']+"][address]");                               
                            $('input[data-building-address="new-'+index+'"]').attr("data-building-address", value['id']);
   
                            $('input[data-building-zipcode="new-'+index+'"]').attr('name', "building_data["+value['id']+"][zipcode]");
                            $('input[data-building-zipcode="new-'+index+'"]').attr("data-building-zipcode", value['id']);
   
                            $('input[data-building-numfloors="new-'+index+'"]').attr('name', "building_data["+value['id']+"][num_floors]");      
                            $('input[data-building-numfloors="new-'+index+'"]').attr("data-building-numfloors", value['id']);
   
                             $.each(value.floors, function (flIndex, flValue) {
   
                                $('input[data-floor-id="new-'+flValue['index']+'"]').val(flValue['floorId']);
                                $('input[data-floor-id="new-'+flValue['index']+'"]').attr('name', "building_data["+value['id']+"][floor]["+flValue['floorId']+"][id]");
                                $('input[data-floor-id="new-'+flValue['index']+'"]').attr("data-floor-id", flValue['floorId']);
   
                                $('input[data-floor-number="new-'+flValue['index']+'"]').attr('name', "building_data["+value['id']+"][floor]["+flValue['floorId']+"][floor_number]"); 
                                $('input[data-floor-number="new-'+flValue['index']+'"]').attr("data-floor-number", flValue['floorId']);
   
                                $('input[data-floor-rooms="new-'+flValue['index']+'"]').attr('name', "building_data["+value['id']+"][floor]["+flValue['floorId']+"][floor_rooms]");
                                $('input[data-floor-rooms="new-'+flValue['index']+'"]').attr("data-floor-rooms", flValue['floorId']);
   
                             });
   
                            // $('input[data-person-designation="new-'+index+'"]').attr('name', "building_data["+value['id']+"][designation]");
                            // $('input[data-person-designation="new-'+index+'"]').attr("data-person-designation", value);
   
                         });
   
                         // contactPersonCreated = data.success;
   
                         // console.log(data);
                     },
                     error: function(xhr,status,error)  {
   
                     }
   
                 });
             }
   
         } else {
             // console.log("does not validate");
         }
     });
   
   
   var companyContractCreated = 0;
   
   checkField = function(response) {
       switch ($.parseJSON(response).code) {
           case 200:
               return "true"; // <-- the quotes are important!
           case 401:
               // alert("Sorry, our system has detected that an account with this email address already exists.");
               break;
           case undefined:
               alert("An undefined error occurred.");
               break;
           default:
               alert("An undefined error occurred");
               break;
       }
       return false;
   };
   
   $('#wizard-4').validate({
   
       rules: {
           "number": {
               required: true,
               maxlength: 150,
               remote: {
                   // url: "{{ route('validate.contract') }}",
                   // type: "POST",
                   // cache: false,
                   // dataType: "json",
                   // data: {
                   //     number: function() { return $("#contract-no").val(); }
                   // },
                   // dataFilter: function(response) {
   
                   //     // console.log(response);
                   //     return checkField(response);
                   // }
   
                   param: {
                       url: "{{ route('validate.contract') }}",
                       type: "POST",
                       cache: false,
                       dataType: "json",
                       data: {
                           number: function() { return $("#contract-no").val(); }
                       },
                       dataFilter: function(response) {
   
                           // console.log(response);
                           return checkField(response);
                       }
                   },
                   depends: function(element) {
                       // compare email address in form to hidden field
                       return ($(element).val() !== $('#contract-no-hidden').val());
                   }
               }
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
   
       messages: {
          "number": {
   
             remote: "A contract with same number already exists",
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
   
           if (editCompany == 0 && companyContractCreated == 0) {
   
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
                       companyContractCreated = data.success;
                       // console.log(data);
                   },
                   error: function(xhr,status,error)  {
   
                   }
   
               });
   
           } else {
   
               var myform = document.getElementById("wizard-4");
               var data = new FormData(myform);
               data.append('company_id', editCompany);
   
               <?php
      if (isset($company)) {
         $updateRoute = route("admin.companyContracts.update", [$company->id]);
      } else {
        $updateRoute = '';
      }
      ?>
   
               $.ajax({
                   url: '{{ $updateRoute }}',
                   data: data,
                   cache: false,
                   contentType: false,
                   processData: false,
                   type: 'POST', // For jQuery < 1.9
                   success: function(data){
                       // myform.pxWizard('goTo', 2);
   
                       // console.log(data);
                   },
                   error: function(xhr,status,error)  {
   
                   }
   
               });
           }
   
   
         } else {
             // console.log("does not validate");
         }
     });
   
   
   
   var companyModuleCreated = 0;
   
   $('#wizard-5').validate();
   
   $('#wizard-5').on('submit', function(e) {
    
         e.preventDefault();
   
         // test if form is valid 
         if( $('#wizard-5').validate().form() ) {
   
           if (editCompany == 0 && companyModuleCreated == 0) {
               var myform = document.getElementById("wizard-5");
               var data = new FormData(myform);
               data.append('company_id', company_id);
   
               // console.log(data);
   
               $.ajax({
                   url: '{{ route("admin.companyModules.store") }}',
                   data: data,
                   cache: false,
                   contentType: false,
                   processData: false,
                   type: 'POST', // For jQuery < 1.9
                   success: function(data){
                       // myform.pxWizard('goTo', 2);
   
                       companyModuleCreated = data.success;
   
                       // console.log(data);
                   },
                   error: function(xhr,status,error)  {
   
                   }
   
               });
   
           } else {
   
               var myform = document.getElementById("wizard-5");
               var data = new FormData(myform);
               data.append('company_id', editCompany);
   
               $.ajax({
                   url: '{{ route("admin.companyModules.update") }}',
                   data: data,
                   cache: false,
                   contentType: false,
                   processData: false,
                   type: 'POST', // For jQuery < 1.9
                   success: function(data){
                       // myform.pxWizard('goTo', 2);
   
                        $.each(data.createdFields, function (index, value) {
   
                            $('input[data-module-pk="new-'+index+'"]').val(value);
                            $('input[data-module-pk="new-'+index+'"]').attr('name', "module["+value+"][pk]");
                            $('input[data-module-pk="new-'+index+'"]').attr("data-module-pk", value);
   
                            $('select[data-module-id="new-'+index+'"]').attr('name', "module["+value+"][id]");
                            $('select[data-module-id="new-'+index+'"]').attr("data-module-id", value);
   
                            $('input[data-module-price="new-'+index+'"]').attr('name', "module["+value+"][price]");                               
                            $('input[data-module-price="new-'+index+'"]').attr("data-module-price", value);
   
                            $('input[data-module-users="new-'+index+'"]').attr('name', "module["+value+"][users_limit]");
                            $('input[data-module-users="new-'+index+'"]').attr("data-module-users", value);
   
                         });
   
   
                       // console.log(data);
                   },
                   error: function(xhr,status,error)  {
   
                   }
   
               });
           }
   
   
             // console.log("validates");
         } else {
             // console.log("does not validate");
         }
     });
   
   
   
   var companyAdminCreated = 0;
   
   $('#wizard-6').validate();
   
   $('#wizard-6').on('submit', function(e) {
    
         e.preventDefault();
   
         // test if form is valid 
         if( $('#wizard-6').validate().form() ) {
   
             $('#finish-btn').attr('disabled', 'disabled');
             $('#finish-btn').text('Processing..');
   
             if (editCompany == 0 && companyAdminCreated == 0) {
   
                 var myform = document.getElementById("wizard-6");
                 var data = new FormData(myform);
                 data.append('company_id', company_id);
   
   
                 // console.log(data);
   
                 $.ajax({
                     url: '{{ route("admin.companyUsers.store") }}',
                     data: data,
                     cache: false,
                     contentType: false,
                     processData: false,
                     type: 'POST', // For jQuery < 1.9
                     success: function(data){
                         // myform.pxWizard('goTo', 2);
                         if(data.success == 1) {
                           companyAdminCreated = data.success;
                           location.href = "{{ route('admin.companies.index') }}";
                         } else {
                           alert("Could not create company admins(s)");
                         }
                         // console.log(data);
                     },
                     error: function(xhr,status,error)  {
   
                     }
   
                 });
   
             } else {
   
                 var myform = document.getElementById("wizard-6");
                 var data = new FormData(myform);
                 data.append('company_id', editCompany);
   
                 $.ajax({
                     url: '{{ route("admin.companyUsers.update") }}',
                     data: data,
                     cache: false,
                     contentType: false,
                     processData: false,
                     type: 'POST', // For jQuery < 1.9
                     success: function(data) {
                         // myform.pxWizard('goTo', 2);
   
                         $.each(data.createdFields, function (index, value) {
   
   
                            $('input[data-admin-id="new-'+index+'"]').val(value['id']);
                            $('input[data-admin-id="new-'+index+'"]').attr('name', "admin["+value['id']+"][id]");
                            $('input[data-admin-id="new-'+index+'"]').attr("data-admin-id", value['id']);
   
                            $('input[data-admin-user-id="new-'+index+'"]').val(value['user_id']);
                            $('input[data-admin-user-id="new-'+index+'"]').attr('name', "admin["+value['id']+"][user_id]");
                            $('input[data-admin-user-id="new-'+index+'"]').attr("data-admin-user-id", value['id']);
   
                            $('input[data-email-hidden="new-'+index+'"]').val(value['email']);
                            $('input[data-email-hidden="new-'+index+'"]').attr('name', "admin["+value['id']+"][email_hidden]");
                            $('input[data-email-hidden="new-'+index+'"]').attr("data-email-hidden", value['id']);
   
                            $('input[data-old-password="new-'+index+'"]').val("true");
                            $('input[data-old-password="new-'+index+'"]').attr('name', "admin["+value['id']+"][old_password]");
                            $('input[data-old-password="new-'+index+'"]').attr("data-old-password", value['id']);
   
                            $('input[data-admin-name="new-'+index+'"]').attr('name', "admin["+value['id']+"][name]");
                            $('input[data-admin-name="new-'+index+'"]').attr("data-admin-name", value['id']);
   
                            $('input[data-admin-email="new-'+index+'"]').attr('name', "admin["+value['id']+"][email]");                               
                            $('input[data-admin-email="new-'+index+'"]').attr("data-admin-email", value['id']);
   
                            $('input[data-admin-password="new-'+index+'"]').attr('name', "admin["+value['id']+"][password]");
                            $('input[data-admin-password="new-'+index+'"]').attr("data-admin-password", value['id']);
   
                            
                           
                         });
   
                         adminValidationRules();
   
                         if(data.success == 1) {
                           location.href = "{{ route('admin.companies.index') }}";
                         } else {
                           alert("Could not update admins(s)");
                         }
                         // console.log(data);
                     },
                     error: function(xhr,status,error)  {
   
                     }
   
                 });
             }
   
             // console.log("validates");
         } else {
             // console.log("does not validate");
         }
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
   
   
   
   
         $(document).ready(function() {
             // $('.remove-contact-person').hide();
             // $('.remove-module').hide();
             // $('.remove-admin').hide();
             // $('.remove-building').hide();
   
             if (editCompany == 0) {
                 $('#addFieldBtn').trigger('click');
                 $('#addBuildingBtn').trigger('click');
                 $('#addAdminBtn').trigger('click');
                 $('#addModuleBtn').trigger('click');
             }
             // $('.remove-contact-person').hide();
   
             // $('.remove-module').hide();
   
   
         });
   
   
   
   
         // Add More Contact Persons
   
         // company contact person validation rules
         function contactPersonValidateRules() {
   
           $('.person-name').each(function () {
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
             });
         }
   
         var i = 0;
   
         $('#addFieldBtn').on('click', function() {
   
   
             var person = '<div class="contactPersonFields">';
                 person += '<input type="hidden" name="person['+i+'][id]" data-person-id="new-'+i+'" class="person-id" value="new-'+i+'" />';
                 person += '<h5 class="bg-success p-x-1 p-y-1 m-t-0" >Person <i class="fa fa-times fa-lg remove-contact-person pull-right cursor-p"></i></h5>';
                 person += '<div class="row">';
                 person += '<div class="col-sm-6 form-group">';
                 person += '<fieldset class="form-group">';
                 person += '<label for="person-name">Name</label>';
                 person += '<input type="text" name="person['+i+'][name]" data-person-name="new-'+i+'" class="person-name form-control" placeholder="Person Name">';
                 person += '</fieldset>';
                 person += '</div>';
                 person += '<div class="col-sm-6 form-group">';
                 person += '<fieldset class="form-group">';
                 person += '<label for="person-email">Email</label>';
                 person += '<input type="email" name="person['+i+'][email]" data-person-email="new-'+i+'" class="person-email form-control" placeholder="Person Email">';
                 person += '</fieldset>';
                 person += '</div>';
                 person += '<div class="col-sm-6 form-group">';
                 person += '<fieldset class="form-group">';
                 person += '<label for="person-phone">Phone</label>';
                 person += '<input type="text" name="person['+i+'][phone]" data-person-phone="new-'+i+'" class="person-phone form-control" placeholder="Persone Phone">';
                 person += '</fieldset>';
                 person += '</div>';
                 person += '<div class="col-sm-6 form-group">';
                 person += '<fieldset class="form-group">';
                 person += '<label for="person-fax">Fax</label>';
                 person += '<input type="text" name="person['+i+'][fax]" data-person-fax="new-'+i+'" class="person-fax form-control" placeholder="Person Faxx">';
                 person += '</fieldset>';
                 person += '</div>';
                 person += '<div class="col-sm-12 form-group">';
                 person += '<fieldset class="form-group">';
                 person += '<label for="person-address">Address</label>';
                 person += '<input type="text" name="person['+i+'][address]" data-person-address="new-'+i+'" class="person-address form-control" placeholder="ST-12 Phase-3/B Crown Center Alaska.">';
                 person += '</fieldset>';
                 person += '</div>';
                 person += '<div class="col-sm-6 form-group">';
                 person += '<fieldset class="form-group">';
                 person += '<label for="person-department">Department</label>';
                 person += '<input type="text" name="person['+i+'][department]" data-person-department="new-'+i+'" class="person-department form-control" placeholder="Human Resource Department">';
                 person += '</fieldset>';
                 person += '</div>';
                 person += '<div class="col-sm-6 form-group">';
                 person += '<fieldset class="form-group">';
                 person += '<label for="person-designation">Designation</label>';
                 person += '<input type="text" name="person['+i+'][designation]" data-person-designation="new-'+i+'" class="person-designation form-control" placeholder="Asst. Manager">';
                 person += '</fieldset>';
                 person += '</div>';
                 person += '</div>';
                 person += '</div>';
   
                 $(".person").prepend(person);
   
                 i += 1;
   
                 
                 contactPersonValidateRules();
         });
   
   
         $(document).on('click', '.remove-contact-person', function() {
   
             if (confirm('Are you sure?')) {
   
                 if (editCompany == 0) {
                   $(this).closest('.contactPersonFields').remove();
                 } else {
   
                   var getPersonId = $(this).parent().parent().find('.remove-person-id').val();
                   var data = { _method: "delete", person_id: getPersonId };
                   // console.log(data);
   
                   $.ajax({
                       url: '{{ route("admin.companyContactPeople.destroy") }}',
                       data: data,
                       cache: false,
                       type: 'POST', // For jQuery < 1.9
                       success: function(data){
                           // myform.pxWizard('goTo', 2);
   
                           // console.log(data);
                       },
                       error: function(xhr,status,error)  {
   
                       }
   
                   });
   
                   $(this).closest('.contactPersonFields').remove();
                 }
   
             }
         });
   
   
   
         // Add More Buildings
   
         var j = 0;
         var buildingNum = 1;
   
         $('#addBuildingBtn').on('click', function() {
   
           $('.remove-building-id').each(function () {
               if (buildingNum == $(this).val()) {
                   buildingNum += 998;
               }
           });
   
           var building = '<div class="buildingFields">';
               building += '<input type="hidden" name="building_data['+buildingNum+'][id]" data-building-id="new-'+buildingNum+'" class="building-id" value="new-'+buildingNum+'" />';
               building += '<h5 class="bg-success p-x-1 p-y-1" >Building <i class="fa fa-times fa-lg remove-building pull-right cursor-p"></i></h5>';
               building += '<div class="row">';
               building += '<div class="col-sm-6 form-group">';
               building += '<label for="building-name">Building Name</label>';
               building += '<input type="text" name="building_data['+buildingNum+'][name]" data-building-name="new-'+buildingNum+'" class="building-name form-control" placeholder="Crown Towers">';
               building += '</div>';
               building += '<div class="col-sm-6 form-group">';
               building += '<label for="building-address">Address</label>';
               building += '<input type="text" name="building_data['+buildingNum+'][address]" data-building-address="new-'+buildingNum+'" class="building-address form-control" placeholder="ST-12 Phase-3/B Crown Center Alaska.">';
               building += '</div>';
               building += '<div class="col-sm-6 form-group">';
               building += '<label for="building-zip">Zip Code</label>';
               building += '<input type="text" name="building_data['+buildingNum+'][zipcode]" data-building-zipcode="new-'+buildingNum+'" class="building-zip form-control" placeholder="ABC-999">';
               building += '</div>';
               building += '<div class="col-sm-6 form-group">';
               building += '<label for="building-no-of-floors">No. of Floors</label>';
               building += '<div class="row">';
               building += '<div class="col-sm-6 form-group">';
               building += '<input type="number" name="building_data['+buildingNum+'][num_floors]" data-building-numfloors="new-'+buildingNum+'" class="building-no-of-floors form-control building-no-of-floors" min="1" value="1">';
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
   
               $('.building-name').each(function () {
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
               });
   
         });
   
   
         $(document).on('click', '.remove-building', function() {
   
             if (confirm('Are you sure?')) {
   
                 if (editCompany == 0) {
                   $(this).closest('.buildingFields').remove();
                 } else {
   
                   var getBuildingId = $(this).parent().parent().find('.remove-building-id').val();
                   var data = { _method: "delete", building_id: getBuildingId };
                   // console.log(data);
   
                   $.ajax({
                       url: '{{ route("admin.companyBuildings.destroy.building") }}',
                       data: data,
                       cache: false,
                       type: 'POST', // For jQuery < 1.9
                       success: function(data){
                           // myform.pxWizard('goTo', 2);
   
                           // console.log(data);
                       },
                       error: function(xhr,status,error)  {
   
                       }
   
                   });
   
                   $(this).closest('.buildingFields').remove();
                 }
   
             }
   
             
   
         });
   
   
         // Add More Floors
   
         var k = 1;
   
         $(document).on('click', '.addFloorBtn', function(e) {
   
             // var building_num = $(this).parent().parent().parent().parent().parent().parent().parent().find('.buildingFields').data('building-num');
             var num_floors = $(this).parent().parent().find('.building-no-of-floors').val();
             var floorSecion = $(e.target).closest('.buildingFields').find('.sectionFloor');
             var building_num = floorSecion.data('building-num');
             var floorsExist = $(this).parent().parent().parent().parent().parent().find('.floor');
   
             
   
   
   
             if (num_floors <= floorsExist.length) {
                 alert('Floors are already added');
             } else {
   
                 for (i=1; i <= num_floors-floorsExist.length; i++) {
   
                      var m = i-1;
                      var floor = '<div class="floor">';
                         floor += '<input type="hidden" name="building_data['+building_num+'][floor]['+m+'][id]" data-floor-id="new-'+m+'" class="floor-id" value="new-'+m+'" />';
                         floor += '<div class="row">';
                         floor += '<div class="col-sm-6 form-group">';
                         floor += '<label for="building-floor-no">Floor No.</label>';
                         floor += '<input type="name" name="building_data['+building_num+'][floor]['+m+'][floor_number]" data-floor-number="new-'+m+'" placeholder="Floor Name" class="form-control building-floor-no" min="1" >';
                         floor += '</div>';
                         floor += '<div class="col-sm-6 form-group">';
                         floor += '<label for="building-floor-no-of-rooms">No. of Rooms</label>';
                         floor += '<div class="row">';
                         floor += '<div class="col-sm-6">';
                         floor += '<input type="number" name="building_data['+building_num+'][floor]['+m+'][floor_rooms]" data-floor-rooms="new-'+m+'" class="form-control building-floor-no-of-rooms" min="1" >';
                         floor += '</div>';
                         floor += '<div class="col-sm-6">';
                         floor += '<i class="fa fa-times fa-lg remove-floor cursor-p"></i>';
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
   
   
         $(document).on('click', '.remove-floor', function(e) {
   
             if (confirm('Are you sure?')) {
   
                 if (editCompany == 0) {
                   $(this).closest('.floor').remove();
                 } else {
   
                   var getFloorId = $(e.target).closest('.floor').find('.remove-floor-id').val();
                   // alert(getFloorId);
   
                   var data = { _method: "delete", floor_id: getFloorId };
   
                   $.ajax({
                       url: '{{ route("admin.companyBuildings.destroy.floor") }}',
                       data: data,
                       cache: false,
                       type: 'POST', // For jQuery < 1.9
                       success: function(data){
                           // myform.pxWizard('goTo', 2);
   
                           // console.log(data);
                       },
                       error: function(xhr,status,error)  {
   
                       }
   
                   });
   
                   $(this).closest('.floor').remove();
                 }
   
             }
   
   
             
         });
   
   
        
   
   
   
   
   
   
         jQuery.validator.addMethod("notEqualToGroup", function(value, element, options) {
             // get all the elements passed here with the same class
             var elems = $(element).parents('form').find(options[0]);
             // the value of the current element
             var valueToCompare = value;
             // count
             var matchesFound = 0;
             // loop each element and compare its value with the current value
             // and increase the count every time we find one
             jQuery.each(elems, function(){
             thisVal = $(this).val();
             if(thisVal == valueToCompare){
               matchesFound++;
             }
             });
             // count should be either 0 or 1 max
             if(this.optional(element) || matchesFound <= 1) {
                     //elems.removeClass('error');
                     return true;
                 } else {
                     //elems.addClass('error');
                 }
             });
   
   
   
         // Add More Admin
   
         
         function adminValidationRules() {
   
                 $('.admin-name').each(function () {
                     $(this).rules("add", {
                         required: true
                     });
                 });
   
                 $('.admin-email').each(function () {
                     var adminEmail = $(this);
                     $(this).rules("add", {
                         required: true,
                         email: true,                           
                         notEqualToGroup: ['.admin-email'],
                         remote: {
                             // url: "{{ route('validate.admin') }}",
                             // type: "POST",
                             // cache: false,
                             // dataType: "json",
                             // data: {
                             //     admin_email: function() { return adminEmail.val(); }
                             // },
                             // dataFilter: function(response) {
   
                             //     // console.log(response);
                             //     return checkField(response);
                             // }
   
                             param: {
                                 url: "{{ route('validate.admin') }}",
                                 type: "POST",
                                 cache: false,
                                 dataType: "json",
                                 data: {
                                     admin_email: function() { return adminEmail.val(); }
                                 },
                                 dataFilter: function(response) {
   
                                     // console.log(response);
                                     return checkField(response);
                                 }
                             },
                             depends: function(element) {
                                 // compare email address in form to hidden field
                                 return ($(element).val() !== $(element).closest('.adminFields').find(".admin-email-hidden").val());
                             }
                         },
                         messages: {
                             remote: "This admin already have an account",
                             notEqualToGroup: "Please enter a unique email",
                         }
                     });
                 });
   
                 $('.admin-pass').each(function () {
                     $(this).rules("add", {
                         required: {
                             depends: function(element) {
                                 // compare email address in form to hidden field
                                 return ('true' !== $(element).closest('.adminFields').find(".old-password-hidden").val());
                             },
                           },
                         minlength: 6,
   
                     });
                 });
         }
   
         var p = 0;
         $('#addAdminBtn').on('click', function() {
             if ($(".adminFields").length < 3) {
   
               var admin = '<div class="adminFields">';
                   admin += '<input type="hidden" name="admin['+p+'][id]" data-admin-id="new-'+p+'" class="remove-admin-id" value="new-'+p+'" />';
                   admin += '<input type="hidden" name="admin['+p+'][user_id]" data-admin-user-id="new-'+p+'" class="admin-user-id" value="new-'+p+'" />';
                   admin += '<input type="hidden" name="admin['+p+'][email_hidden]" data-email-hidden="new-'+p+'" class="admin-email-hidden" value="new-'+p+'" />';
                   admin += '<input type="hidden" name="admin['+p+'][old_password]" data-old-password="new-'+p+'" class="old-password-hidden" value="new-'+p+'" />';
                   admin += '<h5 class="bg-success p-x-1 p-y-1" >Admin <i class="fa fa-times fa-lg remove-admin pull-right cursor-p"></i></h5>';
                   admin += '<div class="row">';
                   admin += '<div class="col-sm-12 form-group">';
                   admin += '<label for="admin-name">Name</label>';
                   admin += '<input type="text" name="admin['+p+'][name]" data-admin-name="new-'+p+'" class="admin-name form-control" placeholder="Admin Name">';
                   admin += '</div>';
                   admin += '<div class="col-sm-12 form-group">';
                   admin += '<label for="admin-email">Email</label>';
                   admin += '<input type="email" name="admin['+p+'][email]" data-admin-email="new-'+p+'" class="admin-email form-control" placeholder="Admin Email">';
                   admin += '</div>';
                   admin += '<div class="col-sm-12 form-group">';
                   admin += '<label for="admin-password">Password</label>';
                   admin += '<input type="password" name="admin['+p+'][password]" data-admin-password="new-'+p+'" class="admin-pass form-control" placeholder="Admin Password">';
                   admin += '</div>';
                   admin += '</div>';
                   admin += '</div>';
   
   
   
                 $('.admin').prepend(admin);
   
                   p += 1;
   
                 adminValidationRules();
   
             } else {
                 alert('Max 3 Admin allowed');
             }
         });
   
   
         $(document).on('click', '.remove-admin', function() {
   
             if (confirm('Are you sure?')) {
   
                 if (editCompany == 0) {
                   $(this).closest('.adminFields').remove();
                 } else {
   
                   var getAdminId = $(this).closest('.adminFields').find('.remove-admin-id').val();
                   var data = { _method: "delete", admin_id: getAdminId };
                   // console.log(data);
   
                   $.ajax({
                       url: '{{ route("admin.companyUsers.destroy") }}',
                       data: data,
                       cache: false,
                       type: 'POST', // For jQuery < 1.9
                       success: function(data) {
                           // myform.pxWizard('goTo', 2);
   
                           // console.log(data);
                       },
                       error: function(xhr,status,error)  {
   
                       }
   
                   });
   
                   $(this).closest('.adminFields').remove();
                 }
   
             }
             
         });
   
   
   
         
</script>
@endsection