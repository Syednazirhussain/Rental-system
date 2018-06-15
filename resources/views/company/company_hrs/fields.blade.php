<div class="row">
   <div class="col-md-12">
      <div class="panel">
         <div class="wizard panel-wizard" id="wizard-validation">
            <div class="wizard-wrapper">
               <ul class="wizard-steps">
                  <li data-target="#wizard-1" class="">
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
                  <li data-target="#wizard-4"  class="active">
                     <span class="wizard-step-number">4</span>
                     <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
                     <span class="wizard-step-caption">
                     Other information
                     </span>
                  </li>
               </ul>
            </div>
            <div class="wizard-content">
               <!-- ===========================wizard-1===================================== -->
               <form class="wizard-pane " id="wizard-1" method="post">
                  @if (isset($companyHr))
                  <input name="_method" type="hidden" value="PATCH">
                  @endif
                  <h3 class="m-t-0">Employee Basic Information</h3>
                  <div class="row">
                     <!-- First Name Field -->
                     <div class="form-group col-sm-6">
                        <label for="">First Name</label>
                        <input type="text" name="first_name_show" placeholder="John" class="form-control" id="firstName"  value="@if(isset($companyHr)){{ $companyHr->first_name }}@endif" >
                     </div>
                     <!-- Last Name Field -->
                     <div class="form-group col-sm-6">
                        <label for="">Last Name</label>
                        <input type="text" name="last_name_show" placeholder="Doe" class="form-control" id="lastName" value="@if(isset($companyHr)){{ $companyHr->last_name }}@endif">
                     </div>
                  </div>
                  <div class="row">
                     <!-- Address 1 Field -->
                     <div class="form-group col-sm-6">
                        <label for="">Address 1</label>
                        <input type="text" name="address_1_show" class="form-control"  placeholder="1516  Hoffman Avenue New York" id="Address1" value="@if(isset($companyHr)){{ $companyHr->address_1 }}@endif">
                     </div>
                     <!-- Address 2 Field -->
                     <div class="form-group col-sm-6">
                        <label for="">Address 2</label>
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
                     <button type="submit" class="btn btn-primary" id="createCompanyBtn" data-wizard-action="next">CREATE COMPANY HR <i class="fa fa-arrow-right m-l-1"></i></button>
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
                     <label for="">Employment Date</label>
                     <input type="text" id="daterangeEmpl" name="employment_date" value="@if(isset($companyHr)){{ date('m/d/Y', strtotime($companyHr->employment_date)) }} @endif" class="form-control">
                  </div>
                  <!-- Last Name Field -->
                  <div class="form-group col-sm-6">
                     <label for="">Termination Time In Months</label>
                     <input type="number" id="termId" name="termination_time" placeholder="01" value="@if(isset($companyHr)){{ $companyHr->termination_time }}@endif" class="form-control">
                  </div>
                  <!-- Address 1 Field -->
                  <div class="form-group col-sm-6">
                     <label for="">Employeed Untill</label>
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
                     <label for="">Insurance Date</label>
                     <input type="text" id="daterangeInsurance" name="insurance_date" value="@if(isset($companyHr)){{ date('m/d/Y', strtotime($companyHr->insurance_date)) }} @endif"  class="form-control">
                  </div>
                  <!-- Country Id Field -->
                  <div class="col-sm-6 form-group">
                     <label for="">Insurance Fees</label>
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
                        <label for="">Salary</label>
                        <input type="number" name="salary" id="salaryId" placeholder="2000.00" value="@if(isset($companyHr)){{ $companyHr->salary }}@endif" class="form-control">
                     </div>
                  </div>
                  <div class="row">
                     <!-- Address 1 Field -->
                     <div class="form-group col-sm-6">
                        <label for="">Employment in %</label>
                        <input type="number" name="employment_percent" value="@if(isset($companyHr)){{ $companyHr->employment_percent }}@endif" id="empInPercent" placeholder="75.00" class="form-control">
                     </div>
                     <!-- Address 2 Field -->
                     <div class="form-group col-sm-6">
                        <label for="">Cost Division</label>
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
                        <label for="">VAT Table</label>
                        <input type="number" name="vat_table" id="valueAdded" value="@if(isset($companyHr)){{ $companyHr->vat_table }}@endif" placeholder="00.00" class="form-control">
                     </div>
                     <!-- State Id Field -->
                  </div>
                  <div class="row">
                     <div class="form-group col-sm-6">
                        <label for="">Vacation Days</label>
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
                       
                        <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input"  <?php if($companyHr->father == 1){ echo "checked='checked'"; } ?> id="father">
                        <span class="custom-control-indicator"></span>
                        <strong>Father</strong>
                        </label>
                        
                      @else
                        <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="father">
                        <span class="custom-control-indicator"></span>
                        <strong>Father</strong>
                        </label>
                      @endif
                     </div>
                     <!-- Telephone Private Field -->
                     <div class="col-sm-1 form-group">
                      @if(isset($companyHr))
                   
                        <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input"  <?php if($companyHr->mother == 1){ echo "checked='checked'"; } ?> id="mother">
                        <span class="custom-control-indicator"></span>
                        <strong>Mother</strong>
                        </label>
      
                      @else
                        <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="mother">
                        <span class="custom-control-indicator"></span>
                        <strong>Mother</strong>
                        </label>
                      @endif
                     </div>
                  </div>
                  <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                     <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> PREVIOUS</button>&nbsp;&nbsp;
                     <a href="{!! route('company.companyHrs.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                     <button type="submit" class="btn btn-primary" id="" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                  </div>
               </form>

               <!-- ============================wizard-4==================================== -->
               <form class="wizard-pane active" id="wizard-4">
                  @if (isset($companyHr))
                  <input name="_method" type="hidden" value="PATCH">
                  @endif
                  <h3 class="m-t-0">Information about employment</h3>

                  <div class="row">

                     
                        <div class="col-sm-6 col-md-6 form-group">
                           <label for="">Languages</label>
                           <input type="text" name="languages" class="form-control languages" data-role="tagsinput" />
                        </div>
                        <div class="col-sm-6 col-md-6 form-group">
                           <label for="">Skills</label>
                           <input type="text" name="skills" class="form-control skills" data-role="tagsinput" />
                        </div>
                     

                     
                        <div class="col-sm-6 col-md-6 form-group">
                           <label for="city_id">HR Courses</label>
                           <select name="name[]" id="city_id" class="form-control select2-hrCourses" multiple>
                              <option></option>
                              @foreach($HRCourses as $HRCourse)
                                 <option value="{{$HRCourse->id}}">{{$HRCourse->name}}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="col-sm-6 col-md-6 form-group m-t-4">
                           <label class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <strong>Driving License</strong>
                           </label>
                        </div>
                     

                     <div class="col-sm-12 col-md-12">
                      <div class="panel">
                        <div class="panel-heading">
                          <div class="panel-title">Pre-Employment Details</div>
                        </div>
                        <div class="panel-body">
                          <div class="pull-right">
                            <button class="btn btn-primary addEmployment" type="button"><i class="fa fa-plus"></i> Add</button>
                          </div>
                          <div class="row preEmployments">

                            <div class="row">

                              <div class="col-sm-12 col-sm-12 m-t-2">

                                  <div class="col-sm-2 col-md-2 form-group">
                                    <label for="sitting_name">Organization Name</label>
                                    <input type="text" name="organization_name[]" id="organization_name" class="form-control" >
                                  </div>

                                  <div class="col-sm-2 col-md-2 form-group">
                                    <label for="sitting_number_person">Job Title</label>
                                    <input type="text" name="job_title[]" id="job_title" class="form-control" >
                                  </div> 

                                 <div class="col-sm-4 col-md-4 form-group">
                                    <label for="sitting_number_person">Learning Courses</label>
                                    <input type="text" name="courses[]" data-role="tagsinput" class="form-control courses" >
                                  </div>

                                 <div class="col-sm-2 col-md-2 form-group">
                                    <label for="sitting_number_person">Employment Form</label>
                                    <input type="text"  name="employed_from[]" class="form-control employed_from">
                                  </div>

                                 <div class="col-sm-2 col-md-2 form-group">
                                    <label for="sitting_number_person">Employment Until</label>
                                    <input type="text"  name="employed_until[]" class="form-control employed_until">
                                  </div>
                     
                              </div>

                            </div>

                          </div>
                        </div>            
                      </div>
                    </div>



                     
                        <div class="col-sm-12 col-md-12 form-group">
                           <label for="">Attach Files</label>
                           <input type="file" name="files" class="form-control uploadFiles">
                        </div>
                        <div class="col-sm-12 col-md-12 form-group">
                          <label>HR Notes</label>
                          <textarea name="hr_note" id="hr_note"></textarea>
                        </div>
                    

                        <div class="col-sm-12 col-md-12 form-group">
                           <label for="">Manager Notes</label>
                           <textarea name="manager_note" id="manager_note"></textarea>
                        </div>
                        <div class="col-sm-12 col-md-12 form-group">
                          <label>Salary Development Notes</label>
                          <textarea name="sal_dev_note" id="sal_dev_note"></textarea>
                        </div>
                     
                  </div>

                  <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                     <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> PREVIOUS</button>&nbsp;&nbsp;
                     <a href="{!! route('company.companyHrs.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                     <button type="submit" class="btn btn-primary"  data-wizard-action="next">Create Company Hr <i class="fa fa-arrow-right m-l-1"></i></button>
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
   
   var editCompanyHr = "{{ (isset($companyHr)) ? $companyHr->id : 0 }}";


   $('#createCompanyHrBtn').on('click', function() {

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


         var father  =   0;
         var mother  =   0;

         if($('#father').is(':checked'))
         {
            father = 1;
         }
         

         if($('#mother').is(':checked'))
         {
            mother = 1;
         }


         

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

         var data = $('#wizard-4').serializeArray();

         console.log(data);


         // $('#hiddenForm').submit();
     });

   $(document).on('click', ".addEmployment", function() {
      
      $('.employed_from').daterangepicker({
       singleDatePicker: true,
       showDropdowns: true,
       startDate: "01/01/2018",
     });

      $('.employed_until').daterangepicker({
       singleDatePicker: true,
       showDropdowns: true,
       startDate: "12/31/2018",
     });


      $('.courses').tagsinput({
            maxTags: 6
      });




   });

   $(document).ready(function(){
      $('.languages').tagsinput({
            maxTags: 10
      });

      $('.skills').tagsinput({
            maxTags: 10
      });
   });




   $('.employed_from').daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      startDate: "01/01/2018",
   });

   $('.employed_until').daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      startDate: "12/31/2018",
   });

   $('.addEmployment').click(function(){
      var employment = '<div class="row">';
      employment += '<div class="col-sm-12 col-sm-12 m-t-2">';
      employment += '<div class="col-sm-2 col-md-2 form-group">';
      employment += '<label for="sitting_name">Organization Name</label>';
      employment += '<input type="text" name="organization_name[]" id="organization_name" class="form-control" >';
      employment += '</div>';
      employment += '<div class="col-sm-2 col-md-2 form-group">';
      employment += '<label for="sitting_number_person">Job Title</label>';
      employment += '<input type="text" name="job_title[]" id="job_title" class="form-control" >';
      employment += '</div> ';
      employment += '<div class="col-sm-4 col-md-4 form-group">';
      employment += '<label for="sitting_number_person">Learning Courses</label>';
      employment += '<input type="text" name="courses[]" class="form-control courses" >';
      employment += '</div>';
      employment += '<div class="col-sm-2 col-md-2 form-group">';
      employment += '<label for="sitting_number_person">Employment Form</label>';
      employment += '<input type="text"  name="employed_from[]" class="form-control employed_from">';
      employment += '</div>';
      employment += '<div class="col-sm-2 col-md-2 form-group">';
      employment += '<label for="sitting_number_person">Employment Until</label>';
      employment += '<input type="text"  name="employed_until[]" class="form-control employed_until">';
      employment += '</div>';
      employment += '</div>';
      employment += '</div>';
      $('.preEmployments').prepend(employment);

   });

       $('#hr_note').summernote({
      height: 112,
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

   $('#manager_note').summernote({
      height: 112,
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

   $('#sal_dev_note').summernote({
      height: 112,
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

       $("input[name='files']").fileuploader({
        theme: 'thumbnails',
        enableApi: true,
        addMore: true,
        thumbnails: {
            box: '<div class="fileuploader-items">' +
                      '<ul class="fileuploader-items-list">' +
                          '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner">+</div></li>' +
                      '</ul>' +
                  '</div>',
            item: '<li class="fileuploader-item">' +
                       '<div class="fileuploader-item-inner">' +
                           '<div class="thumbnail-holder">${image}</div>' +
                           '<div class="actions-holder">' +
                               '<a class="fileuploader-action fileuploader-action-remove" title="Remove"><i class="remove"></i></a>' +
                           '</div>' +
                           '<div class="progress-holder">${progressBar}</div>' +
                       '</div>' +
                   '</li>',
            item2: '<li class="fileuploader-item">' +
                       '<div class="fileuploader-item-inner">' +
                           '<div class="thumbnail-holder">${image}</div>' +
                           '<div class="actions-holder">' +
                               '<a class="fileuploader-action fileuploader-action-remove" title="Remove"><i class="remove"></i></a>' +
                           '</div>' +
                       '</div>' +
                   '</li>',
            startImageRenderer: true,
            canvasImage: false,
            _selectors: {
                list: '.fileuploader-items-list',
                item: '.fileuploader-item',
                start: '.fileuploader-action-start',
                retry: '.fileuploader-action-retry',
                remove: '.fileuploader-action-remove'
            },
            onItemShow: function(item, listEl) {
                var plusInput = listEl.find('.fileuploader-thumbnails-input');
                
                plusInput.insertAfter(item.html);
                
                if(item.format == 'image') {
                    item.html.find('.fileuploader-item-icon').hide();
                }
            }
        },
        afterRender: function(listEl, parentEl, newInputEl, inputEl) {
            var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                api = $.fileuploader.getInstance(inputEl.get(0));
        
            plusInput.on('click', function() {
                api.open();
            });
        },
        extensions: ['jpg','gif','png','jpeg','bmp','pdf','txt','docx','doc','odt','rtf'],
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

      jQuery.validator.addMethod("alphanumeric", function(value, element) {
              return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
      }); 
  

      $('#wizard-1').validate({
          rules: {
              'first_name': {
                required:  true,
              },
              'last_name': {
                required:  true,
                maxlength: 100,
              },
              'address_1': {
                required:  true,
              },
              'address_2': {
                required:  true,
              },
              'post_code': {
                required:  true,
                alphanumeric: true
              },
              'city_id': {
                required:  true,
              },
              'state_id': {
                required:  true,
              },
              'country_id': {
                required:  true,
              },
              'telephone_job': {
                required:  true,
                digits: true,
              },
              'telephone_private': {
                required:  true,
                digits: true,
              },
              'email_job': {
                required:  true,
                email: true,
              },
              'email_private': {
                required:  true,
                email: true
              },
              'civil_status_id': {
                required:  true,
              },
            }
      });


      $('#wizard-1').on('submit', function(e) {

            e.preventDefault();


            // test if form is valid 
            if( $('#wizard-1').validate().form() ) {




            } else {
                // console.log("does not validate");
            }
        });


      $('#wizard-2').validate();
      
      $('#wizard-2').on('submit', function(e) {
       
            e.preventDefault();

            // test if form is valid 
            if($('#wizard-2').validate().form()) {

            } else {
                // console.log("does not validate");
            }
        });


      $('#wizard-3').validate();
      
      $('#wizard-3').on('submit', function(e) {
       
            e.preventDefault();

            // test if form is valid 
            if( $('#wizard-3').validate().form() ) {



            } else {
                // console.log("does not validate");
            }
        });

/*      $('#wizard-4').validate({

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
      });*/
      
      $('#wizard-4').on('submit', function(e) {
       alert('step-4 submit');
            e.preventDefault();

            // test if form is valid 
            if( $('#wizard-4').validate().form() ) {

                  var myform = document.getElementById("wizard-4");
                  var data = new FormData(myform);
                  
                  $.ajax({
                      url: '{{ route("company.hrOtherInformation.store") }}',
                      data: data,
                      cache: false,
                      contentType: false,
                      processData: false,
                      type: 'POST', // For jQuery < 1.9
                      success: function(data){

                        console.log(data);
                          // myform.pxWizard('goTo', 2);
                          // company_id = data.company.id;
                          // companyCreated = data.success;

                          // console.log(data);
                      },
                      error: function(xhr,status,error)  {

                      }

                  });

            } else {
                // console.log("does not validate");
            }
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

            $(function() {
             $('.select2-hrCourses').select2({
               placeholder: 'Select Discount Type',
             });
           });
   
         
</script>
@endsection