@extends('company.default')

@section('content')

   <div class="px-content">
    <div class="panel">
          <div class="panel-heading">
            <span class="panel-title">Company Hr</span>
          </div>
         
            
                                    
                            @include('company.company_hrs.fields')

                        

              <div class="wizard-pane" id="wizard-finish">
                <div class="text-xs-center m-y-4">
                  <i class="ion-checkmark-round text-success font-size-52 line-height-1"></i>
                  <h4 class="font-weight-semibold font-size-20 m-x-0 m-t-1 m-b-0">We're almost done</h4>
                  <button type="button" class="btn btn-primary m-t-4" data-wizard-action="finish">Finish</button>
                </div>
              </div>
        </div>
    </div>

@endsection

