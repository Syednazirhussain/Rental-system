<div class="panel">
    <div class="wizard panel-wizard" id="wizard-validation">
        <div class="wizard-wrapper">
          <ul class="wizard-steps">
            <li data-target="#wizard-1" class="active">
              <span class="wizard-step-number">1</span>
              <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
              <span class="wizard-step-caption">
                Leasing Partner
              </span>
            </li>

            <li data-target="#wizard-2">
              <span class="wizard-step-number">2</span>
              <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
              <span class="wizard-step-caption">
                 Counterpart
              </span>
            </li>

            <li data-target="#wizard-3">
              <span class="wizard-step-number">3</span>
              <span class="wizard-step-complete"><i class="fa fa-check"></i></span>
              <span class="wizard-step-caption">
                 Contract Information
              </span>
            </li>
          </ul>
        </div>


        <div class="wizard-content">
          <!-- ===========================wizard-1===================================== -->
     
            <form action="{{ route('company.leasePartners.store') }}" name="createCompanyForm" class="wizard-pane active" id="wizard-1" method="post">

                @if (isset($leasePartner))
                    <input name="_method" type="hidden" value="PATCH">
                @endif
                <h3 class="m-t-0">Leasing Partner</h3>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-6 col-md-6 form-group">
                            <label>Parent Company</label>
                            <input type="text" placeholder="ex: Nestle" name="parent_company" value="@if(isset($leasePartner)){{ $leasePartner->parent_company }}@endif" class="form-control">
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label>Sister Company</label>
                            <input type="text" placeholder="ex: Fruita_vitals" name="sister_company" value="@if(isset($leasePartner)){{ $leasePartner->sister_company }}@endif" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-6 col-md-6 form-group">
                            <label>Sales Person</label>
                            <input type="text" placeholder="ex: John_Doe" name="sales_person" value="@if(isset($leasePartner)){{ $leasePartner->sales_person }}@endif" class="form-control">
                        </div>
                        <div class="col-sm-6 col-md-6 m-t-4">
                            <label class="custom-control custom-checkbox">
                              @if(isset($leasePartner) && $leasePartner->delegated == 1)
                                <input type="checkbox" name="delegated" id="delegated" class="custom-control-input" checked="checked">
                                <span class="custom-control-indicator"></span>
                                Delegated
                              @else
                                <input type="checkbox" name="delegated" id="delegated" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                Delegated
                              @endif
                            </label>                             
                          </div>
                    </div>
                </div>

                <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                        <a href="{!! route('company.leasePartners.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                    @if (isset($leasePartner))
                        <button type="submit" class="btn btn-primary" id="updateCompanyBtn" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                    @else
                        <button type="submit" class="btn btn-primary" id="createCompanyBtn" data-wizard-action="next">NEXT<i class="fa fa-arrow-right m-l-1"></i></button>
                    @endif
                </div>
            </form>

            <!-- ============================wizard-2==================================== -->


            <form class="wizard-pane" id="wizard-2" method="POST" >
                @if (isset($leaseCounterPart))
                    <input name="_method" type="hidden" value="PATCH">
                @endif
                <h3 class="m-t-0">Counterpart</h3>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-6 col-md-6 form-group">
                            <label>Organization Number</label>
                            <input type="number" min="0" placeholder="ex: 7810" name="organization_number" value="@if(isset($leaseCounterPart)){{ $leaseCounterPart[0]->organization_number }}@endif" class="form-control">
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label>Company Name</label>
                            <input type="text" placeholder="ex: Nestle" name="company_name" value="@if(isset($leaseCounterPart)){{ $leaseCounterPart[0]->company_name }}@endif" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-6 col-md-6 form-group">
                            <label>Contact Person</label>
                            <input type="text" name="contract_person" placeholder="ex: John Doe" value="@if(isset($leaseCounterPart)){{ $leaseCounterPart[0]->contract_person }}@endif" class="form-control">
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label>Telephone</label>
                            <input type="text" name="tel" placeholder="ex: 0214564165" value="@if(isset($leaseCounterPart)){{ $leaseCounterPart[0]->tel }}@endif" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-6 col-md-6 form-group">
                            <label>Email</label>
                            <input type="text" placeholder="ex: admin@example.com" name="email" value="@if(isset($leaseCounterPart)){{ $leaseCounterPart[0]->email }}@endif" class="form-control">
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <!-- <input type="hidden" name="lease_partner_id" id="lease_partner_id" value="4" class="form-control"> -->
                        </div>
                    </div>
                </div>

                <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                  <a href="{!! route('company.leasePartners.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>&nbsp;&nbsp;
                  <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> PREVIOUS</button>
                  <button type="submit" class="btn btn-primary" id="addContactPersonBtn" data-wizard-action="next">NEXT <i class="fa fa-arrow-right m-l-1"></i></button>
                </div>
            </form>

            <!-- ============================wizard-2==================================== -->

            <form class="wizard-pane" id="wizard-3" enctype="multipart/form-data">
                  @if (isset($leaseContractInformation))
                      <input name="_method" type="hidden" value="PATCH">
                  @endif
                  <h3 class="m-t-0">Leasing Contract Information</h3>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-6 col-md-6 form-group">
                                <label>Contract Start Date</label>
                                <input type="text" name="contract_start_date" value="@if(isset($leaseContractInformation)){{ $leaseContractInformation[0]->contract_start_date }}@endif" id="contract_start_date" class="form-control">
                            </div>
                            <div class="col-sm-6 col-md-6 form-group">
                                <label>Contract Number Of Months</label>
                                <input value="@if(isset($leaseContractInformation)){{ $leaseContractInformation[0]->contract_length }}@endif" type="number" name="contract_length" placeholder="ex: 2" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-6 col-md-6 form-group">
                                <label>Contract Termination Time In Months</label>
                                <input value="@if(isset($leaseContractInformation)){{ $leaseContractInformation[0]->termination_time }}@endif" type="number" name="termination_time" min="0" placeholder="ex: 2" class="form-control">
                            </div>
                            <div class="col-sm-6 col-md-6 form-group">
                                <label>Is Contract Automatic Renewal</label>
                                <select class="form-control select2-contract_auto_renewal" id="contract_auto_renewal" name="contract_auto_renewal">
                                  <option></option>
                                  @if(isset($leaseContractInformation))
                                    @if($leaseContractInformation[0]->contract_auto_renewal == 1)
                                      <option value="1" selected="selected">Yes</option>
                                      <option value="0">No</option>
                                    @elseif($leaseContractInformation[0]->contract_auto_renewal == 0)
                                      <option value="1">Yes</option>
                                      <option value="0" selected="selected">No</option>
                                    @endif
                                  @else
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                  @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12" id="renewal">
                            <div class="col-sm-6 col-md-6 form-group">
                                <label>Contract Renewal</label>
                                <select class="form-control select2-contract_renewal" id="contract_renewal" name="contract_renewal">
                                  <option></option>
                                  @if(isset($leaseContractInformation))
                                    @if($leaseContractInformation[0]->contract_renewal == 'qty_month')
                                      <option value="unlimited">Unlimited</option>
                                      <option value="qty_month" selected="selected">Quantity In Month</option>
                                    @elseif($leaseContractInformation[0]->contract_renewal == 'unlimited')
                                      <option value="unlimited" selected="selected">Unlimited</option>
                                      <option value="qty_month">Quantity In Month</option>
                                    @endif
                                  @else
                                    <option value="unlimited">Unlimited</option>
                                    <option value="qty_month">Quantity In Month</option>
                                  @endif
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 form-group" id="renewal_qty_month">
                                <label>Contract Renewal Number Of Month</label>
                                <input type="number" placeholder="ex: 2" value="@if(isset($leaseContractInformation)){{ $leaseContractInformation[0]->renewal_number_month }}@endif" name="renewal_number_month" id=" renewal_number_month" class="form-control">
                            </div>
                        </div>                        
                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-6 col-md-6 form-group">
                                <label>Contract Type</label>
                                <select class="form-control select2-contract_type" name="contract_type">
                                  <option></option>
                                  @if(isset($leaseContractInformation))
                                    @if($leaseContractInformation[0]->contract_type  == 'permenent')
                                      <option value="permenent" selected="selected">Permenent</option>
                                      <option value="temporary">Temporary</option> 
                                    @elseif($leaseContractInformation[0]->contract_type  == 'temporary')
                                      <option value="permenent">Permenent</option>
                                      <option value="temporary" selected="selected">Temporary</option>
                                    @endif
                                  @else
                                    <option value="permenent">Permenent</option>
                                    <option value="temporary">Temporary</option>
                                  @endif

                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 form-group">
                                <label>Contract Name</label>
                                <input type="text" placeholder="ex: Lease" value="@if(isset($leaseContractInformation)){{ $leaseContractInformation[0]->contract_name }}@endif" name="contract_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-12 col-md-12">
                                <label>Contract Description</label>
                                <textarea name="contract_desc" value="@if(isset($leaseContractInformation)){{ $leaseContractInformation[0]->contract_desc }}@endif" id="contract_desc"></textarea>
                            </div>
                            @if(isset($leaseContractInformation))
                              <input type="hidden" id="edit_contract_desc" value="@if(isset($leaseContractInformation)){{ $leaseContractInformation[0]->contract_desc }}@endif">
                            @endif
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-6 col-md-6 form-group">
                                <label>Contract Number</label>
                                <input type="number" placeholder="ex: 2456" value="@if(isset($leaseContractInformation)){{ $leaseContractInformation[0]->contract_number }}@endif" min="0" name="contract_number" class="form-control">
                            </div>
                            <div class="col-sm-6 col-md-6 form-group">
                                <label>Amount Per Month</label>
                                <input type="number" min="0" placeholder="ex: 2"  value="@if(isset($leaseContractInformation)){{ $leaseContractInformation[0]->amount_per_month }}@endif" name="amount_per_month" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-6 col-md-6 form-group">
                                <label>Income Per Month</label>
                                <input type="number" min="0" placeholder="ex: 25000" value="@if(isset($leaseContractInformation)){{ $leaseContractInformation[0]->income_per_month }}@endif" name="income_per_month" class="form-control">
                            </div>
                            <div class="col-sm-6 col-md-6 form-group">
                                <label>Currency</label>
                                <select class="form-control select2-currency" name="currency_id">
                                  <option></option>
                                  @if(isset($currencies))
                                    @foreach($currencies as $currency)
                                      @if(isset($leaseContractInformation))
                                        @if($currency->id == $leaseContractInformation[0]->currency_id)
                                          <option value="{{ $currency->id }}" selected="selected">{{ $currency->code }}</option>
                                        @endif
                                      @else
                                        <option value="{{ $currency->id }}">{{ $currency->code }}</option>
                                      @endif
                                    @endforeach
                                  @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-4 col-md-4 form-group">
                                <label>Cost Reference</label>
                                <input type="text" placeholder="ex: Furniture" value="@if(isset($leaseContractInformation)){{ $leaseContractInformation[0]->cost_reference }}@endif" name="cost_reference" class="form-control">
                            </div>
                            <div class="col-sm-4 col-md-4 form-group">
                                <label>Income Reference</label>
                                <input type="text" placeholder="ex: Salary" value="@if(isset($leaseContractInformation)){{ $leaseContractInformation[0]->income_reference }}@endif" name="income_reference" class="form-control">
                            </div>
                            <div class="col-sm-4 col-md-4 form-group">
                                <label>Other Reference</label>
                                <input type="text" placeholder="ex: Equipments" value="@if(isset($leaseContractInformation)){{ $leaseContractInformation[0]->other_reference }}@endif" name="other_reference" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-12 col-md-12 form-group">
                                <label>Attach Files</label>
                                <input type="file" name="files" class="form-control uploadFiles">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <div class="col-sm-6 col-md-6 form-group">
                                <label>Building</label>
                                <select class="form-control select2-building" name="building_id">
                                  <option></option>
                                  @if(isset($buildings))
                                    @foreach($buildings as $building)
                                      @if(isset($leaseContractInformation))
                                        @if($building->id == $leaseContractInformation[0]->building_id)
                                          <option value="{{ $building->id }}" selected="selected">{{ $building->name }}</option>
                                        @endif
                                      @else
                                        <option value="{{ $building->id }}">{{ $building->name }}</option>
                                      @endif
                                    @endforeach
                                  @endif
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-6 form-group">
                                <label>Cost Number</label>
                                <input type="number" placeholder="ex: 254" value="@if(isset($leaseContractInformation)){{ $leaseContractInformation[0]->cost_number }}@endif" min="0" name="cost_number" class="form-control">
                            </div>

                        </div>
                    </div>


                    <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
                      <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> PREVIOUS</button>&nbsp;&nbsp;
                      <a href="{!! route('company.leasePartners.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
                      <button type="submit" class="btn btn-primary" id="finish-btn" data-wizard-action="next">FINISH  <i class="fa fa-arrow-right m-l-1"></i></button>
                    
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


@section('js')

<script type="text/javascript">


    // -------------------------------------------------------------------------
    
    var lease_partner_id;

    var editLease = "{{ isset($leasePartner) ? $leasePartner->id: 0 }}";

    if(editLease != 0)
    {
        $('#contract_desc').val( $('#edit_contract_desc').val() );

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

        console.log(images);

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
                  url : "{{ route('company.leaseContractInformations.image_remove') }}",
                  type : "POST",
                  data : jsObj,
                  dataType : "json",
                  success : function(response){
                    alert(response.msg);
                  }
                });


            },
        });


        var contract_auto_renewal =  $('#contract_auto_renewal').val();
        var contract_renewal = $('#contract_renewal').val();

        console.log(contract_auto_renewal+"  "+contract_renewal);

        if(contract_auto_renewal == 1)
        {
          $('#contract_auto_renewal').show();
          if(contract_renewal == 'qty_month')
          {
            $('#renewal_qty_month').show();
          }
          else
          {
            $('#renewal_qty_month').hide();
          }
        }
        else
        {
          $('#renewal').hide();
        }

    }
    else
    {
      $('#renewal').hide();
      $('#renewal_qty_month').hide();      
    }



    $('#contract_auto_renewal').on('change', function() {
      if(this.value == 1)
      {
        $('#renewal').show();
      }
      else
      {
        $('#renewal').hide();
      }  
    });



    $('#contract_renewal').on('change', function() {
      if(this.value == 'qty_month')
      {
        $('#renewal_qty_month').show();
      }
      else
      {
        $('#renewal_qty_month').hide();
      }  
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


    $('#contract_desc').summernote({
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
 
    
      $('#contract_start_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        startDate: new Date(),
      });
    

      // -------------------------------------------------------------------------
      // Initialize Select2
      
      $(function() {
        $('.select2-contract_auto_renewal').select2({
          placeholder: 'Select',
        });
      });

      $(function() {
        $('.select2-contract_renewal').select2({
          placeholder: 'Select',
        });
      });
         
      $(function() {
        $('.select2-contract_type').select2({
          placeholder: 'Select',
        });
      });

      $(function() {
        $('.select2-currency').select2({
          placeholder: 'Select',
        });
      });

      $(function() {
        $('.select2-building').select2({
          placeholder: 'Select',
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
      jQuery.validator.addMethod("alphanumeric", function(value, element) {
          return this.optional(element) || /^[-\w.]+$/i.test(value);
      }, "Letters, numbers, and underscores only please");



      $('#wizard-1').validate({

          rules: {
              'parent_company': {
                required:  true,
                alphanumeric: true
              },
              'sister_company': {
                required:  true,
                alphanumeric: true
              },
              'sales_person': {
                required:  true,
                alphanumeric: true
              }
            },

        messages: {
          'parent_company': {
            required: "Please enter the parent company",
          },
          'sister_company': {
            required: "Please enter the sister company",
          },
          'sales_person': {
            required: "Please enter the sales person",
          }
        }
      });

      var leasePartnersCreated = 0;

      $('#wizard-1').on('submit', function(e) {
            e.preventDefault();
            // test if form is valid 
            if( $('#wizard-1').validate().form() ) {
              if (editLease == 0 && leasePartnersCreated == 0) {
                  var myform = document.getElementById("wizard-1");
                  var data = new FormData(myform);
                  $.ajax({
                      url: '{{ route("company.leasePartners.store") }}',
                      data: data,
                      cache: false,
                      contentType: false,
                      processData: false,
                      type: 'POST', // For jQuery < 1.9
                      success: function(data){
                          // myform.pxWizard('goTo', 2);

                          lease_partner_id = data.id;
                          leasePartnersCreated = data.id;
                          $('#lease_partner_id').val(lease_partner_id);
                          // console.log(lease_partner_id);
                      },
                      error: function(xhr,status,error)  {
                      }
                  });
              } else {
                  var myform = document.getElementById("wizard-1");
                  var data = new FormData(myform);
                  data.append('company_id', editLease);
                  
                  <?php
                    if (isset($leasePartner)) {
                       $updateRoute = route("company.leasePartners.update", [$leasePartner->id]);
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
     


      $('#wizard-2').validate({

          rules: {
              'organization_number': {
                required:  true,
                digits : true,
                maxlength: 100
              },
              'company_name': {
                required:  true,
                minlength: 3,
                maxlength: 100,
              },
              'contract_person': {
                required:  true,
                maxlength: 100,
              },
              'tel': {
                required:  true,
                number: true,
                maxlength: 20,
              },
              'email': {
                required:  true,
                email: true,
                maxlength: 50
              }
            },

        messages: {
          'organization_number': {
            required: "Please enter the organization number",
          },
          'company_name': {
            required: "Please enter the company name",
          },
          'contract_person': {
            required: "Please enter the contract person",
          },
          'tel': {
            required: "Please enter the telephone",
          },
          'email': {
            required: "Please enter the email",
          }
        }
      });

      var leaseCounterpartsCreated = 0;

      $('#wizard-2').on('submit', function(e) {

            e.preventDefault();
            // test if form is valid 
            if($('#wizard-2').validate().form()) {
              if (editLease == 0 && leaseCounterpartsCreated == 0) {
                    var myform = document.getElementById("wizard-2");
                    var data = new FormData(myform );
                    data.append('lease_partner_id', lease_partner_id);
                    $.ajax({
                        url: '{{ route("company.leaseCounterparts.store") }}',
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'POST', // For jQuery < 1.9
                        success: function(data){
                            // contactPersonCreated = data.success;
                            // console.log(data);

                            console.log(data);
                            leaseCounterpartsCreated = data.id;
                        },
                        error: function(xhr,status,error)  {
                        }
                    });
                } else {

                    var myform = document.getElementById("wizard-2");
                    var data = new FormData(myform );
                    data.append('lease_partner_id', editLease);

                    var editLeaseCounterPart = "{{ isset($leaseCounterPart) ? $leaseCounterPart[0]->id: 0 }}";

                    if(editLeaseCounterPart != 0)
                    {
                      <?php
                        if (isset($leaseCounterPart)) {
                           $updateRoute = route("company.leaseCounterparts.update", [$leaseCounterPart[0]->id]);
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
                          success: function(data) {

                              // console.log(data);

                          },
                          error: function(xhr,status,error)  {

                          }
                      });
                    }
                    else
                    {
                      $.ajax({
                          url: '{{ route("company.leaseCounterparts.store") }}',
                          data: data,
                          cache: false,
                          contentType: false,
                          processData: false,
                          type: 'POST', // For jQuery < 1.9
                          success: function(data){
                              // contactPersonCreated = data.success;
                              // console.log(data);

                              console.log(data);
                              leaseCounterpartsCreated = data.id;
                          },
                          error: function(xhr,status,error)  {
                          }
                      });
                    }


                }
            } else {
                // console.log("does not validate");
            }
        });

      jQuery.validator.addMethod("dollarsscents", function(value, element) {
          return this.optional(element) || /^\d{0,4}(\.\d{0,2})?$/i.test(value);
      }, "You must include two decimal places");

      $('#wizard-3').validate({
          ignore: ":hidden:not(#contract_desc),.note-editable.panel-body",
          rules: {
              'contract_start_date': {
                required:  true
              },
              'contract_length': {
                required:  true,
                minlength: 1
              },
              'termination_time': {
                required:  true,
                number: true
              },
              'contract_auto_renewal': {
                required:  true
              },
              'contract_type': {
                required:  true,
              },
              'contract_name': {
                required:  true,
                maxlength: 50
              },
              'contract_desc': {
                required:  true,
              },
              'contract_number': {
                required:  true,
                digits : true
              },
              'amount_per_month': {
                required:  true,
                dollarsscents: true
              },
              'income_per_month': {
                required:  true,
              },
              'currency_id': {
                required:  true,
              },
              'cost_reference': {
                required:  true,
              },
              'income_reference': {
                required:  true,
              },
              'other_reference': {
                required:  true,
              },
              'building_id': {
                required:  true,
              },
              'cost_number':{
                required: true
              }
            },

        messages: {
          'contract_start_date': {
            required: "Please enter the contract start date",
          },
          'contract_length': {
            required: "Please enter the contract length",
          },
          'termination_time': {
            required: "Please enter the termination time",
          },
          'contract_auto_renewal': {
            required: "Please enter the contract auto renewal",
          },
          'contract_type': {
            required: "Please enter the contract type",
          },
          'contract_name': {
            required: "Please enter the contract name",
          },
          'contract_desc': {
            required: "Please enter the contract desc",
          },
          'contract_number': {
            required: "Please enter the contract number",
          },
          'amount_per_month': {
            required: "Please enter the amount per month",
          },
          'income_per_month': {
            required: "Please enter the income per month",
          },
          'currency_id': {
            required: "Please enter the currency id",
          },
          'cost_reference': {
            required: "Please enter the cost reference",
          },
          'income_reference': {
            required: "Please enter the income reference",
          },
          'other_reference': {
            required: "Please enter the other reference",
          },
          'building_id': {
            required: "Please select the building",
          },
          'cost_number': {
            required: "Please enter the cost number",
          }
        }
      });
        
      var leaseContractInformationsCreated = 0;

      $('#wizard-3').on('submit', function(e) {

        

       
            e.preventDefault();

            // test if form is valid 
            if( $('#wizard-3').validate().form() ) {

                $('#finish-btn').attr('disabled', 'disabled');
                $('#finish-btn').text('Processing..');

              if (editLease == 0 && leaseContractInformationsCreated == 0) {
                    var myform = document.getElementById("wizard-3");
                    var data = new FormData(myform);
                    data.append('lease_partner_id', lease_partner_id);

                    $.ajax({
                        url: '{{ route("company.leaseContractInformations.store") }}',
                        data: data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        type: 'POST', // For jQuery < 1.9
                        success: function(data){
                            // myform.pxWizard('goTo', 2);
                            // console.log(data);
                            alert(data.msg);
                            if(data.status == 'success')
                            {
                                location.href = "{{ route('company.leasePartners.index') }}";
                            }
                        },
                        error: function(xhr,status,error)  {

                        }
                    });

                } else {

                    var myform = document.getElementById("wizard-3");
                    var data = new FormData(myform );

                    data.append('lease_partner_id', editLease);



                    var editLeaseContractInformation = "{{ isset($leaseContractInformation) ? $leaseContractInformation[0]->id: 0 }}";

                    if(editLeaseContractInformation != 0)
                    {
                      <?php
                        if (isset($leaseContractInformation)) {
                           $updateRoute = route("company.leaseContractInformations.update", [$leaseContractInformation[0]->id]);
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
                          success: function(data) {
                              // console.log(data);
                              alert(data.msg);
                              if(data.status == 'success')
                              {
                                  location.href = "{{ route('company.leasePartners.index') }}";
                              }
                          },
                          error: function(xhr,status,error)  {

                          }
                      });
                    }
                    else
                    {
                      $.ajax({
                          url: '{{ route("company.leaseContractInformations.store") }}',
                          data: data,
                          cache: false,
                          contentType: false,
                          processData: false,
                          type: 'POST', // For jQuery < 1.9
                          success: function(data){
                              // myform.pxWizard('goTo', 2);
                              // console.log(data);
                              alert(data.msg);
                              if(data.status == 'success')
                              {
                                  location.href = "{{ route('company.leasePartners.index') }}";
                              }
                          },
                          error: function(xhr,status,error)  {

                          }
                      });
                    }
                    

                }

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


</script>

@endsection


