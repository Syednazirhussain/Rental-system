<div class="row">
   <div class="col-md-12">
      <div class="panel">
         <div class="wizard panel-wizard" id="wizard-validation">
            <div class="wizard-wrapper">
               <ul class="wizard-steps">
                  <li data-target="#wizard-1">
                     <span class="wizard-step-number">1</span>
                     <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
                     <span class="wizard-step-caption">
                     Basic Info.
                     </span>
                  </li>
                  <li data-target="#wizard-2" >
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
                  <li data-target="#wizard-4" class="active">
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
               <form class="wizard-pane " id="wizard-1">
                  @if (isset($companyHr))
                  <input name="_method" type="hidden" value="PATCH">
                  @endif
                  <h3 class="m-t-0">Employee Basic Information</h3>
                  <div class="row">
                     <!-- First Name Field -->
                     <div class="form-group col-sm-6">
                        <label for="">First Name</label>
                        <input type="text" name="first_name" placeholder="John" class="form-control" id="first_name"  value="@if(isset($companyHr)){{ $companyHr->first_name }}@endif" >
                        <div class="errorTxt"></div>
                     </div>
                     <!-- Last Name Field -->
                     <div class="form-group col-sm-6">
                        <label for="">Last Name</label>
                        <input type="text" name="last_name" placeholder="Doe" class="form-control" id="last_name" value="@if(isset($companyHr)){{ $companyHr->last_name }}@endif">
                        <div class="errorTxt"></div>
                     </div>
                  </div>

                  <div class="row">
                     <!-- Address 1 Field -->
                     <div class="form-group col-sm-6">
                        <label for="">Address 1</label>
                        <input type="text" name="address_1" class="form-control"  placeholder="1516  Hoffman Avenue New York" id="address_1" value="@if(isset($companyHr)){{ $companyHr->address_1 }}@endif">
                        <div class="errorTxt"></div>
                     </div>
                     <!-- Address 2 Field -->
                     <div class="form-group col-sm-6">
                        <label for="">Address 2</label>
                        <input type="text" name="address_2" class="form-control" id="address_2" placeholder="1516  Hoffman Avenue New York"  value="@if(isset($companyHr)){{ $companyHr->address_2 }}@endif">
                        <div class="errorTxt"></div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6 form-group">
                        <fieldset class="form-group">
                           <label for="country_id">Country</label>
                           <select name="country_id" id="country_id" class="form-control select2-country" style="width: 100%" data-allow-clear="true">
                              <option></option>
                              @foreach ($countries as $country)
                              @if (isset($companyHr) && $companyHr->country_id == $country->id)
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
                           <select name="state_id" id="state_id" class="form-control select2-state" style="width: 100%" data-allow-clear="true">
                              <option></option>
                              @foreach ($states as $state)
                              @if (isset($companyHr) && $companyHr->state_id == $state->id)
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
                           <select name="city_id" id="city_id" class="form-control select2-city"  style="width: 100%" data-allow-clear="true">
                              <option></option>
                              @foreach ($cities as $city)
                              @if (isset($companyHr) && $companyHr->city_id == $city->id)
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
                        <label for="post_code">Post Code</label>
                        <input type="text" id="post_code" name="post_code" placeholder="ABC123" class="form-control"  value="@if(isset($companyHr)){{ $companyHr->post_code }}@endif">
                        <div class="errorTxt"></div>
                     </div>
                  </div>
                  <!-- City Id Field -->
                  <!-- State Id Field -->
                  <div class="row">
                     <!-- Telephone Job Field -->
                     <div class="form-group col-sm-6">
                        <label for="telephone_job">Telephone Job</label>
                        <input type="text" id="telephone_job" name="telephone_job" placeholder="0210234567" class="form-control" value="@if(isset($companyHr)){{ $companyHr->telephone_job }}@endif">
                        <div class="errorTxt"></div>
                     </div>
                     <!-- Telephone Private Field -->
                     <div class="form-group col-sm-6">
                        <label for="telephone_private">Telephone Private</label>
                        <input type="text" id="telephone_private" name="telephone_private" placeholder="0210234567" class="form-control" value="@if(isset($companyHr)){{ $companyHr->telephone_private }}@endif">
                        <div class="errorTxt"></div>
                     </div>
                  </div>
                  <div class="row">
                     <!-- Email Job Field -->
                     <div class="form-group col-sm-6">
                        <label for="email_job">Email Job</label>
                        <input type="email" id="email_job" name="email_job" placeholder="someone@mail.com" class="form-control" value="@if(isset($companyHr)){{ $companyHr->email_job }}@endif">
                        <div class="errorTxt"></div>
                     </div>
                     <!-- Email Private Field -->
                     <div class="form-group col-sm-6">
                        <label for="email_private">Email Private</label>
                        <input type="email" id="email_private" name="email_private" placeholder="someone@mail.com" class="form-control" value="@if(isset($companyHr)){{ $companyHr->email_private }}@endif">
                        <div class="errorTxt"></div>
                     </div>
                  </div>
                  <div class="row">
                     <!-- Civil Status Id Field -->
                     <div class="form-group col-sm-6">
                        <label for="civil_status_id">Civil Status</label>
                        <select class="form-control select2-status" name="civil_status_id" id="civil_status_id" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           @foreach ($hrCivil as $hrCivil)
                           @if (isset($companyHr) && $companyHr->civil_status_id == $hrCivil->id)
                           <option value="{{ $hrCivil->id }}" selected="selected">{{ $hrCivil->name }}</option>
                           @else
                           <option value="{{ $hrCivil->id  }}">{{ $hrCivil->name }}</option>
                           @endif
                           @endforeach
                        </select>
                        <div class="errorTxt"></div>
                     </div>
                  </div>


                  <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                     <a href="{!! route('company.companyHrs.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                     @if (isset($companyHr))
                     <button type="button" class="btn btn-primary" id="asdBtn" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                     @else
                     <button type="button" class="btn btn-primary" id="createCompanyBtn" data-wizard-action="next">CREATE COMPANY HR <i class="fa fa-arrow-right m-l-1"></i></button>
                     @endif
                  </div>
               </form>


               <!-- ============================wizard-2==================================== -->
               <form class="wizard-pane" id="wizard-2">
                  @if (isset($companyHr))

                  <input name="_method" type="hidden" value="PATCH">
                  @endif
                  <h3 class="m-t-0">Information about employment </p></h3>
                  <div class="form-group col-sm-6">
                     <label for="employment_date">Employment Date</label>
                     <input type="text" name="employment_date" value="@if(isset($companyHr)){{ $companyHr->employment_date }} @endif" class="form-control" id="employment_date">
                     <div class="errorTxt"></div>
                  </div>
                  <!-- Last Name Field -->
                  <div class="form-group col-sm-6">
                     <label for="termination_time">Termination Time In Months</label>
                     <input type="number" id="termination_time" name="termination_time" min="1.00" placeholder="01" value="@if(isset($companyHr)){{ $companyHr->termination_time }}@endif" class="form-control">
                     <div class="errorTxt"></div>
                  </div>
                  <!-- Address 1 Field -->
                  <div class="form-group col-sm-6">
                     <label for="employeed_untill">Employeed Untill</label>
                     <input type="text" name="employeed_untill" value="@if(isset($companyHr)){{ $companyHr->employeed_untill }} @endif" class="form-control"  id="employeed_untill">
                     <div class="errorTxt"></div>
                  </div>
                  <!-- Address 2 Field -->
                  <div class="col-sm-6 form-group">
                     <fieldset class="form-group">
                        <label for="personal_category">Personal Category</label>
                        <select name="personal_category" id="personal_category" class="form-control select2-personal" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           @foreach ($hrPersonal as $personal)
                           @if (isset($companyHr) && $companyHr->personal_category == $personal->id)
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
                        <label for="collective_type">Collective Type</label>
                        <select name="collective_type" id="collective_type" class="form-control select2-collective" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           @foreach ($hrCollectivetype as $collective)
                           @if (isset($companyHr) && $companyHr->collective_type == $collective->id)
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
                        <label for="employment_form">Employment Form</label>
                        <select name="employment_form" id="employment_form" class="form-control select2-employment_form" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           @foreach ($hrEmployForm as $employ)
                           @if (isset($companyHr) && $companyHr->employment_form == $employ->id)
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
                     <label for="insurance_date">Insurance Date</label>
                     <input type="text" name="insurance_date" value="@if(isset($companyHr)){{ $companyHr->insurance_date }} @endif"  class="form-control"  id="insurance_date">
                     <div class="errorTxt"></div>
                  </div>
                  <!-- Country Id Field -->
                  <div class="col-sm-6 form-group">
                     <label for="insurance_fees">Insurance Fees</label>
                     <input type="number" id="insurance_fees" placeholder="10.00" min="1.00" value="@if(isset($companyHr)){{ $companyHr->insurance_fees }}@endif" name="insurance_fees" class="form-control">
                     <div class="errorTxt"></div>
                  </div>
                  <!-- Telephone Job Field -->
                  <div class="form-group col-sm-6">
                     <fieldset class="form-group">
                        <label for="department">Department</label>
                        <select name="department" id="department" class="form-control select2-department" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           @foreach ($hrPersonal as $personal)
                           @if (isset($companyHr) && $companyHr->department == $personal->id)
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
                        <label for="designation">Designation</label>
                        <select name="designation" id="designation" class="form-control select2-designation" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           @foreach ($hrDesig as $desig)
                           @if (isset($companyHr) && $companyHr->designation == $desig->id)
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
                        <label for="vacancies">Vacations Attest By</label>
                        <select name="vacancies" id="vacancies" class="form-control select2-vacancy" style="width: 100%" data-allow-clear="true">
                           <option></option>
                           @foreach ($hrDesig as $desig)
                           @if (isset($companyHr) && $companyHr->vacancies == $desig->id)
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
                           <select name="salary_type" id="salary_type" class="form-control select2-salary_type" style="width: 100%" data-allow-clear="true">
                              <option></option>
                              @foreach ($hrSalaryType as $salary)
                              @if (isset($companyHr) && $companyHr->salary_type == $salary->id)
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
                        <label for="salary">Salary</label>
                        <input type="number" name="salary" id="salary" min="1.00" placeholder="2000.00" value="@if(isset($companyHr)){{ $companyHr->salary }}@endif" class="form-control">
                        <div class="errorTxt"></div>
                     </div>
                  </div>
                  <div class="row">
                     <!-- Address 1 Field -->
                     <div class="form-group col-sm-6">
                        <label for="employment_percent">Employment in % (percentage)</label>
                        <input type="number" name="employment_percent" min="1.00" value="@if(isset($companyHr)){{ $companyHr->employment_percent }}@endif" id="employment_percent" placeholder="75.00" class="form-control">
                        <div class="errorTxt"></div>
                     </div>
                     <!-- Address 2 Field -->
                     <div class="form-group col-sm-6">
                        <label for="cost_division">Cost Division</label>
                        <input type="number" id="cost_division" min="1.00" name="cost_division" value="@if(isset($companyHr)){{ $companyHr->cost_division }}@endif" placeholder="00.00" class="form-control">
                        <div class="errorTxt"></div>
                     </div>
                  </div>
                  <div class="row">
                     <!-- Post Code Field -->
                     <div class="form-group col-sm-6">
                        <fieldset class="form-group">
                           <label for="project">Project</label>
                           <select name="project" id="project" class="form-control select2-project" style="width: 100%" data-allow-clear="true">
                              <option></option>
                              @foreach ($hrCompanyPro as $project)
                              @if (isset($companyHr) && $companyHr->project == $project->id)
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
                        <label for="vat_table">VAT Table</label>
                        <input type="number" name="vat_table" id="vat_table" min="1.00" value="@if(isset($companyHr)){{ $companyHr->vat_table }}@endif" placeholder="00.00" class="form-control">
                        <div class="errorTxt"></div>
                     </div>
                     <!-- State Id Field -->
                  </div>
                  <div class="row">
                     <div class="form-group col-sm-6">
                        <label for="vacation_days">Vacation Days</label>
                        <input type="number" name="vacation_days" id="vacation_days" min="1.00" value="@if(isset($companyHr)){{ $companyHr->vacation_days }}@endif" placeholder="00.00" class="form-control">
                        <div class="errorTxt"></div>
                     </div>
                     <!-- Country Id Field -->
                     <div class="form-group col-sm-6">
                        <fieldset class="form-group">
                           <label for="vacation_category">Vacation Category</label>
                           <select name="vacation_category" id="vacation_category" class="form-control select2-vacation_category" style="width: 100%" data-allow-clear="true">
                              <option></option>
                              @foreach ($hrVacCategory as $cat)
                              @if (isset($companyHr) && $companyHr->vacation_category == $cat->id)
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
                        @if(isset($companyHr) && $companyHr->father == 1)
                           <label class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="father" checked="checked">
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
                        @if(isset($companyHr) && $companyHr->mother == 1)
                           <label class="custom-control custom-checkbox">
                           <input type="checkbox" class="custom-control-input" id="mother" checked="checked">
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
                     <button type="button" class="btn btn-primary" id="" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                  </div>
               </form>

               <!-- ============================wizard-4==================================== -->
               <form class="wizard-pane" id="wizard-4" enctype="multipart/form-data">
                  @if (isset($companyHr))
                     <input name="_method" type="hidden" value="PATCH">
                  @endif
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <h3 class="m-t-0">Information about employment</h3>

                  <div class="row">
                     <div class="col-sm-6 col-md-6 form-group">
                        <label for="">Languages</label>
                        <input type="text" id="languages" name="languages" value="@if(isset($companyHrOtherInfo)){{ $companyHrOtherInfo->languages }}@endif" class="form-control languages" data-role="tagsinput" />
                        <div class="errorTxt"></div>
                     </div>
                     <div class="col-sm-6 col-md-6 form-group">
                        <label for="">Skills</label>
                        <input type="text" name="skills" value="@if(isset($companyHrOtherInfo)){{ $companyHrOtherInfo->skills }}@endif" id="skills" class="form-control skills" data-role="tagsinput" />
                        <div class="errorTxt"></div>
                     </div>
                     <div class="col-sm-6 col-md-6 form-group">
                        <label for="name">HR Courses</label>
                        <select name="name[]" id="name" class="form-control select2-name" multiple>
                           <option></option>
                           @if(isset($companyHrOtherInfo))
                              @foreach($HRCourses as $HRCourse)
                                 <option value="{{$HRCourse->id}}" selected="selected">{{$HRCourse->name}}</option>
                              @endforeach
                           @else
                              @foreach($HRCourses as $HRCourse)
                                 <option value="{{$HRCourse->id}}">{{$HRCourse->name}}</option>
                              @endforeach
                           @endif
                        </select>
                        <div class="errorTxt"></div>
                     </div>
                     <div class="col-sm-6 col-md-6 form-group m-t-4">
                        @if(isset($companyHrOtherInfo) && $companyHrOtherInfo->driving_license == 1)
                           <label class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="driving_license" checked="checked">
                              <span class="custom-control-indicator"></span>
                              <strong>Driving License</strong>
                           </label>
                        @else
                           <label class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="driving_license">
                              <span class="custom-control-indicator"></span>
                              <strong>Driving License</strong>
                           </label>
                        @endif
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
                          @if(isset($companyHrPreEmployment))
                           @foreach($companyHrPreEmployment as $companyHrPreEmploy)
                             <div class="row preEmployments">
                               <div class="row">
                                 <div class="col-sm-12 col-sm-12 m-t-2">
                                     <div class="col-sm-2 col-md-2 form-group">
                                       <label for="sitting_name">Organization Name</label>
                                       <input type="text" name="organization_name[]" value="@if(isset($companyHrPreEmploy)){{ $companyHrPreEmploy->organization_name }}@endif" class="form-control organization_name">
                                     </div>
                                     <div class="col-sm-2 col-md-2 form-group">
                                       <label for="sitting_number_person">Job Title</label>
                                       <input type="text" name="job_title[]" value="@if(isset($companyHrPreEmploy)){{ $companyHrPreEmploy->job_title }}@endif" class="form-control job_title">
                                     </div> 
                                    <div class="col-sm-4 col-md-4 form-group">
                                       <label for="sitting_number_person">Learning Courses</label>
                                       <input type="text" name="courses[]" value="@if(isset($companyHrPreEmploy)){{ $companyHrPreEmploy->courses }}@endif" data-role="tagsinput" class="form-control courses">
                                     </div>
                                    <div class="col-sm-2 col-md-2 form-group">
                                       <label for="sitting_number_person">Employment From</label>
                                       <input type="text"  name="employed_from[]" value="@if(isset($companyHrPreEmploy)){{ $companyHrPreEmploy->employed_from }}@endif" class="form-control employed_from">
                                     </div>
                                    <div class="col-sm-2 col-md-2 form-group">
                                       <label for="sitting_number_person">Employment Until</label>
                                       <input type="text"  name="employed_until[]" value="@if(isset($companyHrPreEmploy)){{ $companyHrPreEmploy->employed_until }}@endif" class="form-control employed_until">
                                     </div>
                                 </div>
                               </div>
                             </div>
                             @endforeach
                          @else
                             <div class="row preEmployments">
                               <div class="row">
                                 <div class="col-sm-12 col-sm-12 m-t-2">
                                     <div class="col-sm-2 col-md-2 form-group">
                                       <label for="sitting_name">Organization Name</label>
                                       <input type="text" name="organization_name[]" class="form-control organization_name" >
                                     </div>
                                     <div class="col-sm-2 col-md-2 form-group">
                                       <label for="sitting_number_person">Job Title</label>
                                       <input type="text" name="job_title[]" class="form-control job_title" >
                                     </div> 
                                    <div class="col-sm-4 col-md-4 form-group">
                                       <label for="sitting_number_person">Learning Courses</label>
                                       <input type="text" name="courses[]" data-role="tagsinput" class="form-control courses" >
                                     </div>
                                    <div class="col-sm-2 col-md-2 form-group">
                                       <label for="sitting_number_person">Employment From</label>
                                       <input type="text"  name="employed_from[]" class="form-control employed_from">
                                     </div>
                                    <div class="col-sm-2 col-md-2 form-group">
                                       <label for="sitting_number_person">Employment Until</label>
                                       <input type="text"  name="employed_until[]" class="form-control employed_until">
                                     </div>
                                 </div>
                               </div>
                             </div>
                          @endif
                        </div> 

                      </div>
                    </div>


                  <div class="col-sm-12 col-md-12 form-group">
                     <label for="">Attach Files</label>
                     <input type="file" name="docFiles" class="form-control uploadFiles">
                  </div>



                  @if (isset($companyHr))

                     <div class="col-sm-12 col-md-12 form-group">
                        <span><a href="javascript:void(0)" data-toggle="modal" id="check-HrNotes" data-companyhr="@if(isset($companyHr)){{ $companyHr->id }}@endif" data-target="#modal-HrNotes"><i class="fa fa-chevron-circle-up"></i>&nbsp;HR Notes</a></span>
                        <div class="modal fade" id="modal-HrNotes" tabindex="-1">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">HR Notes</h4>
                              </div>
                              <div class="modal-body">
                                 <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                       <textarea name="hr_note" placeholder="write your note here.." id="hrNoteEditor" style="width: 100%;height: 100px"></textarea>                                          
                                    </div>
                                    <div class="col-sm-12 col-md-12" id="hrNotes-logs">
                                      
                                    </div>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="modalBtn"></button>
                                 <button type="button" class="btn" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancel</button>
                              </div>
                            </div>
                          </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-md-12 form-group">
                        <span><a href="javascript:void(0)" data-toggle="modal" id="check-ManagerNotes" data-companyhr="@if(isset($companyHr)){{ $companyHr->id }}@endif" data-target="#modal-ManagerNote"><i class="fa fa-chevron-circle-up"></i>&nbsp;Manager Notes</a></span>
                        <div class="modal fade" id="modal-ManagerNote" tabindex="-1">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Manager Notes</h4>
                              </div>
                              <div class="modal-body">

                                 <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                       <textarea name="manager_note" placeholder="write your note here.." id="managerNoteEditor" style="width: 100%;height: 100px"></textarea>                                          
                                    </div>
                                    <div class="col-sm-12 col-md-12" id="managerNote-logs">
                                      
                                    </div>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="modalBtnManger"></button>
                                 <button type="button" class="btn" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancel</button>
                              </div>
                            </div>
                          </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-md-12 form-group">
                        <span><a href="javascript:void(0)" data-toggle="modal" id="check-SalDevNotes" data-companyhr="@if(isset($companyHr)){{ $companyHr->id }}@endif" data-target="#modal-SalDevNote"><i class="fa fa-chevron-circle-up"></i>&nbsp;Salary Development Notes</a></span>
                        <div class="modal fade" id="modal-SalDevNote" tabindex="-1">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Salary Development Notes</h4>
                              </div>
                              <div class="modal-body">
                                 <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                       <textarea name="sal_dev_note" placeholder="write your note here.." id="salDevNoteEditor" style="width: 100%;height: 100px"></textarea>                                          
                                    </div>
                                    <div class="col-sm-12 col-md-12" id="salDevNote-logs">
                                      
                                    </div>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="modalBtnSalDev"></button>
                                 <button type="button" class="btn" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Cancel</button>
                              </div>
                            </div>
                          </div>
                        </div>
                     </div>

                     @endif
                  </div>

                  <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                     <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> PREVIOUS</button>&nbsp;&nbsp;
                     <a href="{!! route('company.companyHrs.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                     <button type="submit"  class="btn btn-primary" id="finish-btn"  data-wizard-action="next">@if(isset($companyHr)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i> Create  @endif<i class="fa fa-arrow-right m-l-1"></i></button>
                  </div>
               </form>

               <!-- ================================================================ -->

               <!-- <div class="wizard-pane" id="wizard-finish">
                  <div class="text-xs-center m-y-4">
                     <i class="ion-checkmark-round text-success font-size-52 line-height-1"></i>
                     <h4 class="font-weight-semibold font-size-20 m-x-0 m-t-1 m-b-0">We're almost done</h4>
                     <button type="button" class="btn btn-primary m-t-4" data-wizard-action="finish">Finish</button>
                  </div>
               </div> -->

            </div>
         </div>
      </div>
   </div>
</div>


@section('js')

<script type="text/javascript">

   function isEmpty(val)
   {
       return (val === undefined || val == null || val.length <= 0) ? true : false;
   }

   var editCompanyHr = "{{ (isset($companyHr)) ? $companyHr->id : 0 }}";

   if (editCompanyHr != 0) 
   {
      var edit_hr_note = $('#edit_hr_note').val();
      var edit_manager_note = $('#edit_manager_note').val();
      var edit_sal_dev_note = $('#edit_sal_dev_note').val();

      // console.log(edit_hr_note+" "+edit_manager_note+" "+edit_sal_dev_note);

      $('#hr_note').val(edit_hr_note);
      $('#manager_note').val(edit_manager_note);
      $('#sal_dev_note').val(edit_sal_dev_note);

      var companyHrId;
      var user_id = "{{ auth()->guard('company')->user()->id  }}";

// This is Salary Development Note Work Start //

      $('#check-SalDevNotes').on('click',function(){

         $('#modalBtnSalDev').text("Save");

         companyHrId = $(this).attr('data-companyhr');

         var jsObj = {
            'companyHrId' : companyHrId,
            'code'        : 'sal_dev_note'
         };

         $.post("{{ route('company.companyHrs.getHrNotes') }}",jsObj,function(response){
            if(response.hasOwnProperty("status"))
            {
               var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
               $('#salDevNote-logs').html(html);
            }
            else
            {
               var html = '';
               html += '<table class="table table-striped">';
               html += '<thead>';
               html += '<th>User</th>';
               html += '<th>Notes</th>';
               html += '<th></th>';
               html += '</thead>';
               html += '<tbody>';
               for(var i = 0 ; i < response.companyHrNotes.length ; i++)
               {

                  if(user_id == response.companyHrNotes[i].user_id)
                  {
                     html += '<tr>';
                     for(var j = 0 ; j < response.users.length ; j++)
                     {
                        if( response.users[j].id == response.companyHrNotes[i].user_id )
                        {
                           html += '<td>'+response.users[j].name+'</td>';
                           break;
                        }
                        
                     }
                     html += '<td>'+response.companyHrNotes[i].note+'</td>';
                     html += '<td> <i class="fa fa-edit text-primary fa-lg salDevNoteEdit" data-userSalDevNotes="'+response.companyHrNotes[i].id+'"></i>&nbsp;&nbsp;<i class="fa fa-trash text-danger fa-lg salDevNoteDelete" data-userSalDevNotes="'+response.companyHrNotes[i].id+'"></i> </td>';
                     html += '</tr>';
                  }
                  else
                  {
                     html += '<tr>';
                     for(var j = 0 ; j < response.users.length ; j++)
                     {
                        if( response.users[j].id == response.companyHrNotes[i].user_id )
                        {
                           html += '<td>'+response.users[j].name+'</td>';
                           break;
                        }
                        
                     }
                     html += '<td>'+response.companyHrNotes[i].note+'</td>';
                     html += '</tr>';
                  }
               }
               html += '</tbody>';
               html += '</table>'; 
               $('#salDevNote-logs').html('');               
               $('#salDevNote-logs').html(html);               
            }
         });
      });

      var salDevNote_currentOperation = 0;
      var salDevNoteId;

      $(document).on('click','.salDevNoteEdit',function(){

         $('#modalBtnSalDev').text("Update");

         salDevNote_currentOperation = 1;

         salDevNoteId = $(this).attr('data-userSalDevNotes');

         var url = "{{ route('company.editHrNotes', array("")) }}/"+salDevNoteId;

         $.ajax({
            url  : url,
            type : "GET",
            success : function(response){
               if(response.hasOwnProperty("status"))
               {
                  alert(response.msg);
               }
               else
               {
                  $('#salDevNoteEditor').val(response.note);
               }
            }
         });
      });

      $(document).on('click','#modalBtnSalDev',function(){

         if(salDevNote_currentOperation)
         {
            var textEditor = $('#salDevNoteEditor').val();

            var jsObj = {
               'note'   : textEditor
            };

            var url = "{{ route('company.updateHrNotes', array("")) }}/"+salDevNoteId;

            $.ajax({
               url  : url,
               type : "PUT",
               data : jsObj,
               success : function(response){
                  if(response.hasOwnProperty("status"))
                  {
                     alert(response.msg);
                  }
                  else
                  {
                     managerNote_currentOperation = 0;
                     $('#modalBtnSalDev').text("Save");
                     $('#salDevNoteEditor').val("");

                     var jsObj = {
                        'companyHrId' : companyHrId,
                        'code'        : 'sal_dev_note'
                     };

                     $.post("{{ route('company.companyHrs.getHrNotes') }}",jsObj,function(response){
                        if(response.hasOwnProperty("status"))
                        {
                           var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                           $('#salDevNote-logs').html(html);
                        }
                        else
                        {
                           var html = '';
                           html += '<table class="table table-striped">';
                           html += '<thead>';
                           html += '<th>User</th>';
                           html += '<th>Notes</th>';
                           html += '<th></th>';
                           html += '</thead>';
                           html += '<tbody>';
                           for(var i = 0 ; i < response.companyHrNotes.length ; i++)
                           {

                              if(user_id == response.companyHrNotes[i].user_id)
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.companyHrNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                 html += '<td> <i class="fa fa-edit text-primary fa-lg salDevNoteEdit" data-userSalDevNotes="'+response.companyHrNotes[i].id+'"></i>&nbsp;&nbsp;<i class="fa fa-trash text-danger fa-lg salDevNoteDelete" data-userSalDevNotes="'+response.companyHrNotes[i].id+'"></i> </td>';
                                 html += '</tr>';
                              }
                              else
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.companyHrNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                 html += '</tr>';
                              }
                           }
                           html += '</tbody>';
                           html += '</table>'; 
                           $('#salDevNote-logs').html('');               
                           $('#salDevNote-logs').html(html);               
                        }
                     });
                  }
               } 
            });
         }
         else
         {
            var textEditor =  $('#salDevNoteEditor').val();

            if(isEmpty(textEditor))
            {
               alert("Please provide some content");
            }
            else
            {
               var jsObj = {
                  'companyHrId' : companyHrId,
                  'note' : textEditor,
                  'code' : 'sal_dev_note'
               };

               $.ajax({
                  url : "{{ route('company.HrNotes.createHrNote') }}",
                  type : "POST",
                  data : jsObj,
                  dataType : "json",
                  success : function(response){
                     if(response.hasOwnProperty("status"))
                     {
                        alert(response.msg);
                     }
                     else
                     {
                        $('#modalBtnSalDev').text("Save");
                        $('#salDevNoteEditor').val("");

                        var jsObj = {
                           'companyHrId' : companyHrId,
                           'code'        : 'sal_dev_note'
                        };

                        $.post("{{ route('company.companyHrs.getHrNotes') }}",jsObj,function(response){
                           if(response.hasOwnProperty("status"))
                           {
                              var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                              $('#salDevNote-logs').html(html);
                           }
                           else
                           {
                              var html = '';
                              html += '<table class="table table-striped">';
                              html += '<thead>';
                              html += '<th>User</th>';
                              html += '<th>Notes</th>';
                              html += '<th></th>';
                              html += '</thead>';
                              html += '<tbody>';
                              for(var i = 0 ; i < response.companyHrNotes.length ; i++)
                              {

                                 if(user_id == response.companyHrNotes[i].user_id)
                                 {
                                    html += '<tr>';
                                    for(var j = 0 ; j < response.users.length ; j++)
                                    {
                                       if( response.users[j].id == response.companyHrNotes[i].user_id )
                                       {
                                          html += '<td>'+response.users[j].name+'</td>';
                                          break;
                                       }
                                       
                                    }
                                    html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                    html += '<td> <i class="fa fa-edit text-primary fa-lg salDevNoteEdit" data-userSalDevNotes="'+response.companyHrNotes[i].id+'"></i>&nbsp;&nbsp;<i class="fa fa-trash text-danger fa-lg salDevNoteDelete" data-userSalDevNotes="'+response.companyHrNotes[i].id+'"></i> </td>';
                                    html += '</tr>';
                                 }
                                 else
                                 {
                                    html += '<tr>';
                                    for(var j = 0 ; j < response.users.length ; j++)
                                    {
                                       if( response.users[j].id == response.companyHrNotes[i].user_id )
                                       {
                                          html += '<td>'+response.users[j].name+'</td>';
                                          break;
                                       }
                                       
                                    }
                                    html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                    html += '</tr>';
                                 }
                              }
                              html += '</tbody>';
                              html += '</table>'; 
                              $('#salDevNote-logs').html('');               
                              $('#salDevNote-logs').html(html);               
                           }

                        });
                     }
                  }
               });
            }
         }
      });

      $(document).on('click','.salDevNoteDelete',function(){
         if( confirm("Are you sure you want to delete this record!") ) 
         {
            var salNoteId = $(this).attr('data-userSalDevNotes');

            var url = "{{ route('company.deleteHrNote', array("")) }}/"+salNoteId;

            $.ajax({
               url : url,
               type : "DELETE",
               success : function(response){
                  if(response.hasOwnProperty("status"))
                  {
                     alert(response.msg);
                  }
                  else
                  {
                     var jsObj = {
                        'companyHrId' : companyHrId,
                        'code'        : 'sal_dev_note'
                     };

                     $.post("{{ route('company.companyHrs.getHrNotes') }}",jsObj,function(response){
                        if(response.hasOwnProperty("status"))
                        {
                           var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                           $('#salDevNote-logs').html(html);
                        }
                        else
                        {
                           var html = '';
                           html += '<table class="table table-striped">';
                           html += '<thead>';
                           html += '<th>User</th>';
                           html += '<th>Notes</th>';
                           html += '<th></th>';
                           html += '</thead>';
                           html += '<tbody>';
                           for(var i = 0 ; i < response.companyHrNotes.length ; i++)
                           {
                              if(user_id == response.companyHrNotes[i].user_id)
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.companyHrNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                 html += '<td> <i class="fa fa-edit text-primary fa-lg salDevNoteEdit" data-userSalDevNotes="'+response.companyHrNotes[i].id+'"></i>&nbsp;&nbsp;<i class="fa fa-trash text-danger fa-lg salDevNoteDelete" data-userSalDevNotes="'+response.companyHrNotes[i].id+'"></i> </td>';
                                 html += '</tr>';
                              }
                              else
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.companyHrNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                 html += '</tr>';
                              }
                           }
                           html += '</tbody>';
                           html += '</table>'; 
                           $('#salDevNote-logs').html('');               
                           $('#salDevNote-logs').html(html);               
                        }
                     });
                  }
               }
            });
         } 
      });



// This is Salary Development Note Work End //

// This is Manager Note Work Start //

      $('#check-ManagerNotes').on('click',function(){

         $('#modalBtnManger').text("Save");

         companyHrId = $(this).attr('data-companyhr');

         var jsObj = {
            'companyHrId' : companyHrId,
            'code'        : 'manager_note'
         };

         $.post("{{ route('company.companyHrs.getHrNotes') }}",jsObj,function(response){
            if(response.hasOwnProperty("status"))
            {
               var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
               $('#managerNote-logs').html(html);
            }
            else
            {
               var html = '';
               html += '<table class="table table-striped">';
               html += '<thead>';
               html += '<th>User</th>';
               html += '<th>Notes</th>';
               html += '<th></th>';
               html += '</thead>';
               html += '<tbody>';
               for(var i = 0 ; i < response.companyHrNotes.length ; i++)
               {

                  if(user_id == response.companyHrNotes[i].user_id)
                  {
                     html += '<tr>';
                     for(var j = 0 ; j < response.users.length ; j++)
                     {
                        if( response.users[j].id == response.companyHrNotes[i].user_id )
                        {
                           html += '<td>'+response.users[j].name+'</td>';
                           break;
                        }
                        
                     }
                     html += '<td>'+response.companyHrNotes[i].note+'</td>';
                     html += '<td> <i class="fa fa-edit text-primary fa-lg managerNoteEdit" data-userManagerNotes="'+response.companyHrNotes[i].id+'"></i>&nbsp;&nbsp;<i class="fa fa-trash text-danger fa-lg managerNoteDelete" data-userManagerNotes="'+response.companyHrNotes[i].id+'"></i> </td>';
                     html += '</tr>';
                  }
                  else
                  {
                     html += '<tr>';
                     for(var j = 0 ; j < response.users.length ; j++)
                     {
                        if( response.users[j].id == response.companyHrNotes[i].user_id )
                        {
                           html += '<td>'+response.users[j].name+'</td>';
                           break;
                        }
                        
                     }
                     html += '<td>'+response.companyHrNotes[i].note+'</td>';
                     html += '</tr>';
                  }
               }
               html += '</tbody>';
               html += '</table>'; 
               $('#managerNote-logs').html('');               
               $('#managerNote-logs').html(html);               
            }
         });
      });

      var managerNote_currentOperation = 0;
      var managerNoteId;

      $(document).on('click','.managerNoteEdit',function(){

         $('#modalBtnManger').text("Update");

         managerNote_currentOperation = 1;

         managerNoteId = $(this).attr('data-userManagerNotes');

         var url = "{{ route('company.editHrNotes', array("")) }}/"+managerNoteId;

         $.ajax({
            url  : url,
            type : "GET",
            success : function(response){
               if(response.hasOwnProperty("status"))
               {
                  alert(response.msg);
               }
               else
               {
                  $('#managerNoteEditor').val(response.note);
               }
            }
         });
      });

      $(document).on('click','#modalBtnManger',function(){

         if(managerNote_currentOperation)
         {
            var textEditor = $('#managerNoteEditor').val();

            var jsObj = {
               'note'   : textEditor
            };

            var url = "{{ route('company.updateHrNotes', array("")) }}/"+managerNoteId;

            $.ajax({
               url  : url,
               type : "PUT",
               data : jsObj,
               success : function(response){
                  if(response.hasOwnProperty("status"))
                  {
                     alert(response.msg);
                  }
                  else
                  {
                     managerNote_currentOperation = 0;
                     $('#modalBtnManger').text("Save");
                     $('#managerNoteEditor').val("");

                     var jsObj = {
                        'companyHrId' : companyHrId,
                        'code'        : 'manager_note'
                     };

                     $.post("{{ route('company.companyHrs.getHrNotes') }}",jsObj,function(response){
                        if(response.hasOwnProperty("status"))
                        {
                           var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                           $('#managerNote-logs').html(html);
                        }
                        else
                        {
                           var html = '';
                           html += '<table class="table table-striped">';
                           html += '<thead>';
                           html += '<th>User</th>';
                           html += '<th>Notes</th>';
                           html += '<th></th>';
                           html += '</thead>';
                           html += '<tbody>';
                           for(var i = 0 ; i < response.companyHrNotes.length ; i++)
                           {

                              if(user_id == response.companyHrNotes[i].user_id)
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.companyHrNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                 html += '<td> <i class="fa fa-edit text-primary fa-lg managerNoteEdit" data-userManagerNotes="'+response.companyHrNotes[i].id+'"></i>&nbsp;&nbsp;<i class="fa fa-trash text-danger fa-lg managerNoteDelete" data-userManagerNotes="'+response.companyHrNotes[i].id+'"></i> </td>';
                                 html += '</tr>';
                              }
                              else
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.companyHrNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                 html += '</tr>';
                              }
                           }
                           html += '</tbody>';
                           html += '</table>'; 
                           $('#managerNote-logs').html('');               
                           $('#managerNote-logs').html(html);               
                        }
                     });
                  }
               } 
            });
         }
         else
         {
            var textEditor =  $('#managerNoteEditor').val();

            if(isEmpty(textEditor))
            {
               alert("Please provide some content");
            }
            else
            {
               var jsObj = {
                  'companyHrId' : companyHrId,
                  'note' : textEditor,
                  'code' : 'manager_note'
               };

               $.ajax({
                  url : "{{ route('company.HrNotes.createHrNote') }}",
                  type : "POST",
                  data : jsObj,
                  dataType : "json",
                  success : function(response){
                     if(response.hasOwnProperty("status"))
                     {
                        alert(response.msg);
                     }
                     else
                     {
                        $('#modalBtnManger').text("Save");
                        $('#managerNoteEditor').val("");

                        var jsObj = {
                           'companyHrId' : companyHrId,
                           'code'        : 'manager_note'
                        };

                        $.post("{{ route('company.companyHrs.getHrNotes') }}",jsObj,function(response){
                           if(response.hasOwnProperty("status"))
                           {
                              var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                              $('#managerNote-logs').html(html);
                           }
                           else
                           {
                              var html = '';
                              html += '<table class="table table-striped">';
                              html += '<thead>';
                              html += '<th>User</th>';
                              html += '<th>Notes</th>';
                              html += '<th></th>';
                              html += '</thead>';
                              html += '<tbody>';
                              for(var i = 0 ; i < response.companyHrNotes.length ; i++)
                              {

                                 if(user_id == response.companyHrNotes[i].user_id)
                                 {
                                    html += '<tr>';
                                    for(var j = 0 ; j < response.users.length ; j++)
                                    {
                                       if( response.users[j].id == response.companyHrNotes[i].user_id )
                                       {
                                          html += '<td>'+response.users[j].name+'</td>';
                                          break;
                                       }
                                       
                                    }
                                    html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                    html += '<td> <i class="fa fa-edit text-primary fa-lg managerNoteEdit" data-userManagerNotes="'+response.companyHrNotes[i].id+'"></i>&nbsp;&nbsp;<i class="fa fa-trash text-danger fa-lg managerNoteDelete" data-userManagerNotes="'+response.companyHrNotes[i].id+'"></i> </td>';
                                    html += '</tr>';
                                 }
                                 else
                                 {
                                    html += '<tr>';
                                    for(var j = 0 ; j < response.users.length ; j++)
                                    {
                                       if( response.users[j].id == response.companyHrNotes[i].user_id )
                                       {
                                          html += '<td>'+response.users[j].name+'</td>';
                                          break;
                                       }
                                       
                                    }
                                    html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                    html += '</tr>';
                                 }
                              }
                              html += '</tbody>';
                              html += '</table>'; 
                              $('#managerNote-logs').html('');               
                              $('#managerNote-logs').html(html);               
                           }

                        });
                     }
                  }
               });
            }
         }
      });

      $(document).on('click','.managerNoteDelete',function(){
         if( confirm("Are you sure you want to delete this record!") ) 
         {
            var managerNoteId = $(this).attr('data-userManagerNotes');

            var url = "{{ route('company.deleteHrNote', array("")) }}/"+managerNoteId;

            $.ajax({
               url : url,
               type : "DELETE",
               success : function(response){
                  if(response.hasOwnProperty("status"))
                  {
                     alert(response.msg);
                  }
                  else
                  {
                     var jsObj = {
                        'companyHrId' : companyHrId,
                        'code'        : 'manager_note'
                     };

                     $.post("{{ route('company.companyHrs.getHrNotes') }}",jsObj,function(response){
                        if(response.hasOwnProperty("status"))
                        {
                           var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                           $('#managerNote-logs').html(html);
                        }
                        else
                        {
                           var html = '';
                           html += '<table class="table table-striped">';
                           html += '<thead>';
                           html += '<th>User</th>';
                           html += '<th>Notes</th>';
                           html += '<th></th>';
                           html += '</thead>';
                           html += '<tbody>';
                           for(var i = 0 ; i < response.companyHrNotes.length ; i++)
                           {

                              if(user_id == response.companyHrNotes[i].user_id)
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.companyHrNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                 html += '<td> <i class="fa fa-edit text-primary fa-lg managerNoteEdit" data-userManagerNotes="'+response.companyHrNotes[i].id+'"></i>&nbsp;&nbsp;<i class="fa fa-trash text-danger fa-lg managerNoteDelete" data-userManagerNotes="'+response.companyHrNotes[i].id+'"></i> </td>';
                                 html += '</tr>';
                              }
                              else
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.companyHrNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                 html += '</tr>';
                              }
                           }
                           html += '</tbody>';
                           html += '</table>'; 
                           $('#managerNote-logs').html('');               
                           $('#managerNote-logs').html(html);               
                        }

                     });
                  }
               }
            });
         } 
      });

// This is Manager Note Work End //

//    This is HR Note Work Start //


      $('#check-HrNotes').on('click',function(){

         $('#modalBtn').text("Save");

         companyHrId = $(this).attr('data-companyhr');

         var jsObj = {
            'companyHrId' : companyHrId,
            'code'        : 'hr_note'
         };

         $.post("{{ route('company.companyHrs.getHrNotes') }}",jsObj,function(response){
            if(response.hasOwnProperty("status"))
            {
               var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
               $('#hrNotes-logs').html(html);
            }
            else
            {
               var html = '';
               html += '<table class="table table-striped">';
               html += '<thead>';
               html += '<th>User</th>';
               html += '<th>Notes</th>';
               html += '<th></th>';
               html += '</thead>';
               html += '<tbody>';
               for(var i = 0 ; i < response.companyHrNotes.length ; i++)
               {

                  if(user_id == response.companyHrNotes[i].user_id)
                  {
                     html += '<tr>';
                     for(var j = 0 ; j < response.users.length ; j++)
                     {
                        if( response.users[j].id == response.companyHrNotes[i].user_id )
                        {
                           html += '<td>'+response.users[j].name+'</td>';
                           break;
                        }
                        
                     }
                     html += '<td>'+response.companyHrNotes[i].note+'</td>';
                     html += '<td> <i class="fa fa-edit text-primary fa-lg hrNoteEdit" data-userHrNote="'+response.companyHrNotes[i].id+'"></i>&nbsp;&nbsp;<i class="fa fa-trash text-danger fa-lg hrNoteDelete" data-userHrNote="'+response.companyHrNotes[i].id+'"></i> </td>';
                     html += '</tr>';
                  }
                  else
                  {
                     html += '<tr>';
                     for(var j = 0 ; j < response.users.length ; j++)
                     {
                        if( response.users[j].id == response.companyHrNotes[i].user_id )
                        {
                           html += '<td>'+response.users[j].name+'</td>';
                           break;
                        }
                        
                     }
                     html += '<td>'+response.companyHrNotes[i].note+'</td>';
                     html += '</tr>';
                  }
               }
               html += '</tbody>';
               html += '</table>'; 
               $('#hrNotes-logs').html('');               
               $('#hrNotes-logs').html(html);               
            }

         });
      });

      var hrNote_currentOperation = 0;
      var hrNoteId;

      $(document).on('click','.hrNoteEdit',function(){

         $('#modalBtn').text("Update");

         hrNote_currentOperation = 1;

         hrNoteId = $(this).attr('data-userHrNote');

         var url = "{{ route('company.editHrNotes', array("")) }}/"+hrNoteId;

         $.ajax({
            url  : url,
            type : "GET",
            success : function(response){
               if(response.hasOwnProperty("status"))
               {
                  alert(response.msg);
               }
               else
               {
                  $('#hrNoteEditor').val(response.note);
               }
            }
         });
      });


      $(document).on('click','#modalBtn',function(){

         if(hrNote_currentOperation)
         {
            var textEditor = $('#hrNoteEditor').val();

            var jsObj = {
               'note'   : textEditor
            };

            var url = "{{ route('company.updateHrNotes', array("")) }}/"+hrNoteId;

            $.ajax({
               url  : url,
               type : "PUT",
               data : jsObj,
               success : function(response){
                  if(response.hasOwnProperty("status"))
                  {
                     alert(response.msg);
                  }
                  else
                  {
                     hrNote_currentOperation = 0;
                     $('#modalBtn').text("Save");
                     $('#hrNoteEditor').val("");

                     var jsObj = {
                        'companyHrId' : companyHrId,
                        'code'        : 'hr_note'
                     };

                     $.post("{{ route('company.companyHrs.getHrNotes') }}",jsObj,function(response){
                        if(response.hasOwnProperty("status"))
                        {
                           var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                           $('#hrNotes-logs').html(html);
                        }
                        else
                        {
                           var html = '';
                           html += '<table class="table table-striped">';
                           html += '<thead>';
                           html += '<th>User</th>';
                           html += '<th>Notes</th>';
                           html += '<th></th>';
                           html += '</thead>';
                           html += '<tbody>';
                           for(var i = 0 ; i < response.companyHrNotes.length ; i++)
                           {

                              if(user_id == response.companyHrNotes[i].user_id)
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.companyHrNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                 html += '<td> <i class="fa fa-edit text-primary fa-lg hrNoteEdit" data-userHrNote="'+response.companyHrNotes[i].id+'"></i>&nbsp;&nbsp;<i class="fa fa-trash text-danger fa-lg hrNoteDelete" data-userHrNote="'+response.companyHrNotes[i].id+'"></i> </td>';
                                 html += '</tr>';
                              }
                              else
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.companyHrNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                 html += '</tr>';
                              }
                           }
                           html += '</tbody>';
                           html += '</table>'; 
                           $('#hrNotes-logs').html('');               
                           $('#hrNotes-logs').html(html);               
                        }

                     });
                  }
               } 
            });
         }
         else
         {
            var textEditor =  $('#hrNoteEditor').val();

            if(isEmpty(textEditor))
            {
               alert("Please provide some content");
            }
            else
            {
               var jsObj = {
                  'companyHrId' : companyHrId,
                  'note' : textEditor,
                  'code' : 'hr_note'
               };

               $.ajax({
                  url : "{{ route('company.HrNotes.createHrNote') }}",
                  type : "POST",
                  data : jsObj,
                  dataType : "json",
                  success : function(response){
                     if(response.hasOwnProperty("status"))
                     {
                        alert(response.msg);
                     }
                     else
                     {
                        $('#modalBtn').text("Save");
                        $('#hrNoteEditor').val("");

                        var jsObj = {
                           'companyHrId' : companyHrId,
                           'code'        : 'hr_note'
                        };

                        $.post("{{ route('company.companyHrs.getHrNotes') }}",jsObj,function(response){
                           if(response.hasOwnProperty("status"))
                           {
                              var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                              $('#hrNotes-logs').html(html);
                           }
                           else
                           {
                              var html = '';
                              html += '<table class="table table-striped">';
                              html += '<thead>';
                              html += '<th>User</th>';
                              html += '<th>Notes</th>';
                              html += '<th></th>';
                              html += '</thead>';
                              html += '<tbody>';
                              for(var i = 0 ; i < response.companyHrNotes.length ; i++)
                              {

                                 if(user_id == response.companyHrNotes[i].user_id)
                                 {
                                    html += '<tr>';
                                    for(var j = 0 ; j < response.users.length ; j++)
                                    {
                                       if( response.users[j].id == response.companyHrNotes[i].user_id )
                                       {
                                          html += '<td>'+response.users[j].name+'</td>';
                                          break;
                                       }
                                       
                                    }
                                    html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                    html += '<td> <i class="fa fa-edit text-primary fa-lg hrNoteEdit" data-userHrNote="'+response.companyHrNotes[i].id+'"></i>&nbsp;&nbsp;<i class="fa fa-trash text-danger fa-lg hrNoteDelete" data-userHrNote="'+response.companyHrNotes[i].id+'"></i> </td>';
                                    html += '</tr>';
                                 }
                                 else
                                 {
                                    html += '<tr>';
                                    for(var j = 0 ; j < response.users.length ; j++)
                                    {
                                       if( response.users[j].id == response.companyHrNotes[i].user_id )
                                       {
                                          html += '<td>'+response.users[j].name+'</td>';
                                          break;
                                       }
                                       
                                    }
                                    html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                    html += '</tr>';
                                 }
                              }
                              html += '</tbody>';
                              html += '</table>'; 
                              $('#hrNotes-logs').html('');               
                              $('#hrNotes-logs').html(html);               
                           }

                        });
                     }
                  }
               });
            }
         }
      });


      $(document).on('click','.hrNoteDelete',function(){

         if( confirm("Are you sure you want to delete this record!") ) 
         {
            var hrNoteId = $(this).attr('data-userHrNote');

            var url = "{{ route('company.deleteHrNote', array("")) }}/"+hrNoteId;

            $.ajax({
               url : url,
               type : "DELETE",
               success : function(response){
                  if(response.hasOwnProperty("status"))
                  {
                     alert(response.msg);
                  }
                  else
                  {
                     var jsObj = {
                        'companyHrId' : companyHrId,
                        'code'        : 'hr_note'
                     };

                     $.post("{{ route('company.companyHrs.getHrNotes') }}",jsObj,function(response){
                        if(response.hasOwnProperty("status"))
                        {
                           var html =  '<span class="text-primary text-info">'+response.msg+'</span>';
                           $('#hrNotes-logs').html(html);
                        }
                        else
                        {
                           var html = '';
                           html += '<table class="table table-striped">';
                           html += '<thead>';
                           html += '<th>User</th>';
                           html += '<th>Notes</th>';
                           html += '<th></th>';
                           html += '</thead>';
                           html += '<tbody>';
                           for(var i = 0 ; i < response.companyHrNotes.length ; i++)
                           {

                              if(user_id == response.companyHrNotes[i].user_id)
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.companyHrNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                 html += '<td> <i class="fa fa-edit text-primary fa-lg hrNoteEdit" data-userHrNote="'+response.companyHrNotes[i].id+'"></i>&nbsp;&nbsp;<i class="fa fa-trash text-danger fa-lg hrNoteDelete" data-userHrNote="'+response.companyHrNotes[i].id+'"></i> </td>';
                                 html += '</tr>';
                              }
                              else
                              {
                                 html += '<tr>';
                                 for(var j = 0 ; j < response.users.length ; j++)
                                 {
                                    if( response.users[j].id == response.companyHrNotes[i].user_id )
                                    {
                                       html += '<td>'+response.users[j].name+'</td>';
                                       break;
                                    }
                                    
                                 }
                                 html += '<td>'+response.companyHrNotes[i].note+'</td>';
                                 html += '</tr>';
                              }
                           }
                           html += '</tbody>';
                           html += '</table>'; 
                           $('#hrNotes-logs').html('');               
                           $('#hrNotes-logs').html(html);               
                        }

                     });
                  }
               }
            });
         } 
      });

//    This is HR Note Work End //



      <?php
       $data = [];
       if(isset($imageFiles))
       {
         for($i = 0 ; $i < count($imageFiles) ; $i++ )
         {
           $data[$i] = $imageFiles[$i];
         }
       }
     ?>
     var images = <?php echo json_encode($data); ?>

     // console.log(images);

     $('.uploadFiles').fileuploader({
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
          allowDuplicates: false,
          files: images,
          limit: null,
          fileMaxSize:2,
          extensions: ['jpg','gif','png','jpeg','bmp','pdf','txt','docx','doc','odt','rtf'],
         onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){

             var jsObj = {
               'image' : itemEl.name
             };

             console.log(jsObj);
             
             $.ajax({
               url : "{{ route('company.companyHrs.image_remove') }}",
               type : "POST",
               data : jsObj,
               dataType : "json",
               success : function(response){
                 alert(response.msg);
               }
             });


         },
     });

   }


      $('input[name="docFiles"]').fileuploader({
           extensions: ['jpg', 'jpeg', 'png', 'gif', 'bmp'],
         changeInput: ' ',
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
       });



   $('.addEmployment').click(function(){
      var employment = '<div class="row">';
      employment += '<div class="col-sm-12 col-sm-12 m-t-2">';
      employment += '<div class="col-sm-2 col-md-2 form-group">';
      employment += '<label for="sitting_name">Organization Name</label>';
      employment += '<input type="text" name="organization_name[]" class="form-control organization_name">';
      employment += '</div>';
      employment += '<div class="col-sm-2 col-md-2 form-group">';
      employment += '<label for="sitting_number_person">Job Title</label>';
      employment += '<input type="text" name="job_title[]" class="form-control job_title">';
      employment += '</div> ';
      employment += '<div class="col-sm-4 col-md-4 form-group">';
      employment += '<label for="sitting_number_person">Learning Courses</label>';
      employment += '<input type="text" name="courses[]" class="form-control courses">';
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
              return this.optional(element) || /^[a-zA-Z0-9%-]+$/.test(value);
      }, "You must enter only alphanumeric characters or % , - "); 

      jQuery.validator.addMethod("dollarsscents", function(value, element) {
          return this.optional(element) || /^\d{0,10}(\.\d{0,2})?$/i.test(value);
      }, "You must include two decimal places");  

      $('#wizard-1').validate({
          rules: {
              'first_name': {
                required:  true,
                maxlength: 30,
              },
              'last_name': {
                required:  true,
                maxlength: 30,
              },
              'address_1': {
                required:  true,
              },
              'address_2': {
                required:  true,
              },
              'post_code': {
                required:  true,
                alphanumeric: true,
                maxlength: 10,
              },
              'city_id': {
                required:  true,
                digits: true
              },
              'state_id': {
                required:  true,
                digits: true
              },
              'country_id': {
                required:  true,
                digits: true
              },
              'telephone_job': {
                required:  true,
                digits: true,
                minlength: 11,
                maxlength: 15
              },
              'telephone_private': {
                required:  true,
                digits: true,
                minlength: 11,
                maxlength: 15
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
                digits: true
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


      $('#wizard-1').on('submit', function(e) {

            e.preventDefault();

            if( $('#wizard-1').validate().form() ) {

            } else {

            }
      });


      $('#wizard-2').validate({
          rules: {
              'employment_date': {
                required:  true
              },
              'termination_time': {
                required:  true,
                digits: true
              },
              'employeed_untill': {
                required:  true,
              },
              'personal_category': {
                required:  true,
              },
              'collective_type': {
                required:  true,
                digits: true
              },
              'employment_form': {
                required:  true,
              },
              'insurance_date': {
                required:  true
              },
              'insurance_fees': {
                required:  true,
                dollarsscents: true,
                maxlength: 10,
              },
              'department': {
                required:  true,
                digits: true,
              },
              'designation': {
                required:  true,
                digits: true,
              },
              'vacancies': {
                required:  true,
                digits: true
              }
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
      
      $('#wizard-2').on('submit', function(e) {
       
            e.preventDefault();

            if($('#wizard-2').validate().form()) {

            } else {

            }
        });



      $('#wizard-3').validate({
          rules: {
              'salary_type': {
                required:  true,
                digits: true
              },
              'salary': {
                required:  true,
                dollarsscents: true,
                maxlength: 10,
              },
              'employment_percent': {
                required:  true,
                alphanumeric: true
              },
              'cost_division': {
                required:  true,
                dollarsscents: true,
                maxlength: 10,
              },
              'project': {
                required:  true,
                digits: true
              },
              'vat_table': {
                required:  true,
                dollarsscents: true
              },
              'vacation_days': {
                required:  true,
                digits: true
              },
              'vacation_category': {
                required:  true,
                digits: true
              }
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
      
      $('#wizard-3').on('submit', function(e) {
       
            e.preventDefault();

            if( $('#wizard-3').validate().form() ) {

            } else {

            }
        });

      $('#wizard-4').validate({
          rules: {
              'languages': {
                required:  true
              },
              'skills': {
                required:  true
              },
              'name': {
                required:  true
              }
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

      $('#wizard-4').on('submit', function(e) {

         e.preventDefault();

         if( $('#wizard-4').validate().form() ) 
         {

         $('#finish-btn').attr('disabled', 'disabled');
          $('#finish-btn').text('Processing..');

            $('#createCompanyHrBtn').attr('disabled', 'disabled');
            $('#createCompanyHrBtn').text('Processing..');

            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var address_1 = $('#address_1').val();
            var address_2 = $('#address_2').val();
            var post_code = $('#post_code').val();
            var city_id = $('#city_id').val();
            var state_id = $('#state_id').val();
            var country_id = $('#country_id').val();
            var telephone_job = $('#telephone_job').val();
            var telephone_private = $('#telephone_private').val();
            var email_private = $('#email_private').val();
            var email_job = $('#email_job').val();
            var civil_status_id = $('#civil_status_id').val();
            var employment_date = $('#employment_date').val();
            var termination_time = $('#termination_time').val();
            var employeed_untill = $('#employeed_untill').val();
            var personal_category = $('#personal_category').val();
            var collective_type = $('#collective_type').val();
            var employment_form = $('#employment_form').val();
            var insurance_date = $('#insurance_date').val();
            var insurance_fees = $('#insurance_fees').val();
            var department = $('#department').val();
            var designation = $('#designation').val();
            var vacancies = $('#vacancies').val();
            var salary_type = $('#salary_type').val();
            var salary = $('#salary').val();
            var employment_percent = $('#employment_percent').val();
            var cost_division = $('#cost_division').val();
            var project = $('#project').val();
            var vat_table = $('#vat_table').val();
            var vacation_days = $('#vacation_days').val();
            var vacation_category = $('#vacation_category').val();

            var father  =   0;
            var mother  =   0;
            if($('#father').is(':checked')) { father = 1; }
            if($('#mother').is(':checked')) { mother = 1; }

            var myform = document.getElementById("wizard-4");
            var filer = new FormData(myform);

            filer.append('first_name', first_name);
            filer.append('last_name', last_name);
            filer.append('address_1', address_1);
            filer.append('address_2', address_2);
            filer.append('post_code', post_code);
            filer.append('city_id', city_id);
            filer.append('state_id', state_id);
            filer.append('country_id', country_id);
            filer.append('telephone_job', telephone_job);
            filer.append('telephone_private', telephone_private);
            filer.append('email_private', email_private);
            filer.append('email_job', email_job);
            filer.append('civil_status_id', civil_status_id);
            filer.append('employment_date', employment_date);
            filer.append('termination_time', termination_time);
            filer.append('employeed_untill', employeed_untill);
            filer.append('personal_category', personal_category);
            filer.append('collective_type', collective_type);
            filer.append('employment_form', employment_form);
            filer.append('insurance_date', insurance_date);
            filer.append('insurance_fees', insurance_fees);
            filer.append('department', department);
            filer.append('designation', designation);
            filer.append('vacancies', vacancies);
            filer.append('salary_type', salary_type);
            filer.append('salary', salary);
            filer.append('employment_percent', employment_percent);
            filer.append('cost_division', cost_division);
            filer.append('project', project);
            filer.append('vat_table', vat_table);
            filer.append('vacation_days', vacation_days);
            filer.append('vacation_category', vacation_category);
            filer.append('father', father);
            filer.append('mother', mother);
            filer.append('driving_license', driving_license);


            if (editCompanyHr != 0) 
            {
               <?php
                 if (isset($companyHr)) {
                    $updateRoute = route("company.companyHrs.update", [$companyHr->id]);
                 } else {
                   $updateRoute = '';
                 }
               ?>

               $.ajax({
                  url: '{{ $updateRoute }}',
                  type: 'POST',
                  data: filer,
                 cache: false,
                 contentType: false,
                 processData: false,
                  success: function(data){
                     // alert(data.msg);
                     if(data.status == 1)
                     {
                         location.href = "{{ route('company.companyHrs.index') }}";
                     }
                   },
                   error: function(xhr,status,error)  {

                   }

               });
            }
            else
            {
               $.ajax({
                   url: '{{ route("company.companyHrs.store") }}',
                   type: 'POST',
                   data : filer,
                  cache: false,
                    contentType: false,
                    processData: false,
                   success: function(data){

                        // alert(data.msg);
                        if(data.status == 1)
                        {
                            location.href = "{{ route('company.companyHrs.index') }}";
                        }
                   },
                   error: function(xhr,status,error)  {

                   }

               });
            }
      }
      else
      {

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


      $wizard.on('finished.px.wizard', function() {
        $('#wizard-finish').find('.ion-checkmark-round').removeClass('ion-checkmark-round').addClass('ion-checkmark-circled');
        $('#wizard-finish').find('h4').text('Thank You!');
        $('#wizard-finish').find('button').remove();
      });

    });

    //---------------- Tab 1 ------------------ //

   $(function() {
    $('#country_id').select2({
      placeholder: 'Select Country',
    });
  });

   $(function() {
    $('#state_id').select2({
      placeholder: 'Select State',
    });
  });

   $(function() {
    $('#city_id').select2({
      placeholder: 'Select City',
    });
  });

   $(function() {
    $('#civil_status_id').select2({
      placeholder: 'Select Civil Status',
    });
  });

   //---------------- Tab 1 ------------------ //

   //---------------- Tab 2 ------------------ //



   $('#employment_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'YYYY-MM-DD'
        }
   });

   $('#employeed_untill').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'Y-MM-DD'
        }
   });

   $('#insurance_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'Y-MM-DD'
        }
   });      






   $(function() {
    $('#personal_category').select2({
      placeholder: 'Select Personal Category',
    });
  });

   $(function() {
    $('#collective_type').select2({
      placeholder: 'Select Collective Type',
    });
  });

   $(function() {
    $('#employment_form').select2({
      placeholder: 'Select Employment Form',
    });
  });

   $(function() {
    $('#department').select2({
      placeholder: 'Select Department',
    });
  });

   $(function() {
    $('#designation').select2({
      placeholder: 'Select Designation',
    });
  });


   $(function() {
    $('#vacancies').select2({
      placeholder: 'Select Vacations Attest By',
    });
  });

   //---------------- Tab 2 ------------------ //

   //---------------- Tab 3 ------------------ //

   $(function() {
    $('#salary_type').select2({
      placeholder: 'Select Salary Type',
    });
  });

   $(function() {
    $('#project').select2({
      placeholder: 'Select Project',
    });
  });

   $(function() {
    $('#vacation_category').select2({
      placeholder: 'Select Vacation Category',
    });
  });


   //---------------- Tab 3 ------------------ //

   //---------------- Tab 4 ------------------ //

   $(function() {
    $('#name').select2({
      placeholder: 'Select Courses',
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

   $(document).on('click', ".addEmployment", function() {
      
      $('.employed_from').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'Y-MM-DD'
        }
      });

      $('.employed_until').daterangepicker({
         singleDatePicker: true,
         showDropdowns: true,
         startDate : moment().add('years',1),
         locale: {
               format: 'Y-MM-DD'
         }
      });

      $('.courses').tagsinput({
            maxTags: 6
      });

   });


   $('.employed_from').daterangepicker({
     singleDatePicker: true,
     showDropdowns: true,
     locale: {
         format: 'Y-MM-DD'
     }
   });

   if (editCompanyHr != 0) 
   {
      $('.employed_until').daterangepicker({
         singleDatePicker: true,
         showDropdowns: true,
         locale: {
               format: 'Y-MM-DD'
         }
      });   
   }
   else
   {
      $('.employed_until').daterangepicker({
         singleDatePicker: true,
         showDropdowns: true,
         startDate : moment().add('years',1),
         locale: {
               format: 'Y-MM-DD'
         }
      });
   }



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


   //---------------- Tab 4 ------------------ //          

















           

   
         
</script>
@endsection