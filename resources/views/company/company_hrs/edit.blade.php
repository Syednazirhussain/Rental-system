@extends('company.default')

@section('content')





   <div class="px-content">
    <div class="panel">
          <div class="panel-heading">
            <span class="panel-title">Company Hr</span>
          </div>
          <div class="wizard panel-wizard" id="wizard-validation">
            <div class="wizard-wrapper">
              <ul class="wizard-steps">
                <li data-target="#wizard-account" class="active">
                  <span class="wizard-step-number">1</span>
                  <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
                  <span class="wizard-step-caption">
                    Account
                    <span class="wizard-step-description">Setup Company HR</span>
                  </span>
                </li>
                <li data-target="#wizard-profile">
                  <span class="wizard-step-number">2</span>
                  <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
                  <span class="wizard-step-caption">
                    Profile
                    <span class="wizard-step-description">Configure profile</span>
                  </span>
                </li>
                <li data-target="#wizard-credit-card">
                  <span class="wizard-step-number">3</span>
                  <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
                  <span class="wizard-step-caption">
                    Credit card
                    <span class="wizard-step-description">Credit card info</span>
                  </span>
                </li>
                <li data-target="#wizard-finish">
                  <span class="wizard-step-number">4</span>
                  <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
                  <span class="wizard-step-caption">
                    Finish
                  </span>
                </li>
              </ul>
            </div>
            <div class="wizard-content">

            @include('adminlte-templates::common.errors')
             {!! Form::model($companyHr, ['route' => ['company.companyHrs.update', $companyHr->id], 'method' => 'patch']) !!}
                                    
                            @include('company.company_hrs.fields')

                        </form>

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

@endsection