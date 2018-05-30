<div class="panel-heading">
    <div class="panel-title"><span class="label label-primary">General Info</span></div>
</div>
<div class="panel-body">
  <div class="col-xs-12 col-sm-12 col-md-12">
      {{ csrf_field() }}
      @if(isset($room))
          <input name="_method" type="hidden" value="PATCH">
      @endif
      <div class="row">

          <div class="col-sm-12 col-md-12 m-t-4">
            <div class="row">
              <div class="col-sm-12 col-md-12">
                <div class="col-sm-8">

                  <div class="form-group">
                      <label for="company_id">Company Name</label>
                      <input type="text" id="company_id" class="form-control" value="@if(isset($company)){{ $company->name }}@endif" disabled>
                  </div>

                  <div class="form-group">
                      <label for="room_name">Room Name</label>
                      <input type="text" id="room_name" name="name" class="form-control" value="@if(isset($room)){{ $room->name }}@endif">
                      <div class="errorTxt"></div>
                  </div>   
                                
                </div>

                <div class="col-sm-4">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                          @if (isset($room))
                              <input type="hidden" name="logo-hidden" id="logo-hidden" value="{{ $room->logo }}">

                              <img src="{{ asset('storage/company_logos/'.$room->logo) }}" data-src="{{ asset('storage/company_logos/'.$room->logo) }}" alt="" />
                          @endif
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                      <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                      <input type="file" name="logo" id="logo"></span>
                      <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                  </div>
                  <div class="errorTxt"></div>
                </div>

              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label for="select_floor">Floor Name</label>
              <select class="form-control" id="select_floor" name="floor_id">
                  @if(isset($room))
                  <option value="{{ $room->floor_id }}">{{ $floor_name }}</option>
                  @endif
                  @foreach ($companyFloors as $floor)
                      <option value="{{ $floor->id }}"><span>{{ $companyBuildings[$floor->building_id] }}</span> Floor {{$floor->floor }}</option>
                  @endforeach
              </select>
              <div class="errorTxt"></div>
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="service_id">Select Service</label>
              <select class="form-control" id="service_id" name="service_id">
                  <option value="">Select</option>
                  @if(isset($room))
                  <option value="{{ $room->service_id }}">{{ $service_name }}</option>
                  @endif
                  @foreach ($services as $service)
                      <option value="{{ $service->id }}">{{$service->name }}</option>
                  @endforeach
              </select>
              <div class="errorTxt"></div>            
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-12 col-md-12 form-group">
              <label for="address">Address</label>
              <input type="text" id="address" name="address" class="form-control" value="@if(isset($room)){{ $room->name }}@endif">
              <div class="errorTxt"></div>
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label for="room_area">Area</label>
              <input type="number" id="room_area" name="area" class="form-control" value="@if(isset($room)){{ $room->area }}@endif">
              <div class="errorTxt"></div>          
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="room_price">Price</label>
              <input type="number" id="room_price" name="price" class="form-control" value="@if(isset($room)){{ $room->price }}@endif">
              <div class="errorTxt"></div>          
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label for="security_code">Security Code</label>
              <input type="text" id="security_code" name="security_code" class="form-control" value="@if(isset($room)){{ $room->security_code }}@endif">
              <div class="errorTxt"></div>          
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="sort_index">Sort Index</label>
              <input type="text" id="sort_index" name="sort_index" class="form-control">
              <div class="errorTxt"></div>          
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label for="article_number">Article Number</label>
              <input type="text" id="article_number" name="article_number" class="form-control">
              <div class="errorTxt"></div>
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="public_name">Public Name</label>
              <input type="text" id="public_name" name="public_name" class="form-control">
              <div class="errorTxt"></div>
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label for="SQNA">SQNA</label>
              <input type="text" id="SQNA" name="SQNA" class="form-control" value="@if(isset($room)){{ $room->security_code }}@endif">
              <div class="errorTxt"></div>
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="building_id">Building</label>
              <select class="form-control" id="building_id" name="building_id">
                  @foreach ($buildings as $building)
                      <option value="{{ $building->id }}">{{$building->name }}</option>
                  @endforeach
              </select>
              <div class="errorTxt"></div>
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
              <span class="col-sm-6 form-group">
                  <label for="start_date">Start Date</label>
                  <input type="text" id="start_date" name="start_date" value="" class="form-control">
                  <div class="errorTxt"></div>
              </span>
              <span class="col-sm-6 form-group">
                  <label for="end_date">End Date</label>
                  <input type="text" id="end_date" name="end_date" class="form-control">
                  <div class="errorTxt"></div>
              </span>
          </div>

          <div class="col-sm-12 col-md-12">
              <span class="col-sm-6 form-group">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" name="end_date_continue" id="end_date_continue" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  End Date Continue
                </label>
              </span>
              <span class="col-sm-6 form-group">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" name="room_module_type" id="room_module_type" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  Is it conference room
                </label>
              </span>
          </div>

          <div class="col-sm-12 col-md-12">
              <span class="col-sm-3 col-md-3 form-group">
                <label for="image1">Image 1</label>
                <input type="file" id="image1" name="image1" style="@if(isset($room)) @if($room->image1 !== '') display:none  @endif @endif">
                @if(isset($room))
                    @if($room->image1 !== '')
                        <div class="col-sm-12" id="div_image1">
                            <img src="{{ asset('uploadedimages/'.$room->image1) }}" style="width:200px">
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-link" id="edit_image1" onclick="editImage(1)">Edit</button>
                            <button class="btn btn-link" id="cancel_image1" onclick="cancelImage(1)" style="display:none">Cancel</button>
                        </div>
                    @endif
                @endif
              </span>
              <span class="col-sm-3 col-md-3 form-group">
                <label for="image2">Image 2</label>
                <input type="file" id="image2" name="image2" style="@if(isset($room)) @if($room->image2 !== '') display:none  @endif @endif">
                @if(isset($room))
                    @if($room->image2 !== '')
                        <div class="col-sm-12" id="div_image2">
                            <img src="{{ asset('uploadedimages/'.$room->image2) }}" style="width:200px">
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-link" id="edit_image2" onclick="editImage(2)">Edit</button>
                            <button class="btn btn-link" id="cancel_image2" onclick="cancelImage(2)" style="display:none">Cancel</button>
                        </div>
                    @endif
                @endif
              </span>
              <span class="col-sm-3 col-md-3 form-group">
                <label for="image3">Image 3</label>
                <input type="file" id="image3" name="image3" style="@if(isset($room)) @if($room->image3 !== '') display:none  @endif @endif">
                @if(isset($room))
                    @if($room->image3 !== '')
                        <div class="col-sm-12" id="div_image3">
                            <img src="{{ asset('uploadedimages/'.$room->image3) }}" style="width:200px">
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-link" id="edit_image3" onclick="editImage(3)">Edit</button>
                            <button class="btn btn-link" id="cancel_image3" onclick="cancelImage(3)" style="display:none">Cancel</button>
                        </div>
                    @endif
                @endif
              </span>
              <span class="col-sm-3 col-md-3 form-group">
                <label for="image4">Image 4</label>
                <input type="file" id="image4" name="image4" style="@if(isset($room)) @if($room->image4 !== '') display:none  @endif @endif">
                @if(isset($room))
                    @if($room->image4 !== '')
                        <div class="col-sm-12" id="div_image4">
                            <img src="{{ asset('uploadedimages/'.$room->image4) }}" style="width:200px">
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-link" id="edit_image4" onclick="editImage(4)">Edit</button>
                            <button class="btn btn-link" id="cancel_image4" onclick="cancelImage(4)" style="display:none">Cancel</button>
                        </div>
                    @endif
                @endif              
              </span>
          </div>


          <div class="col-sm-12 col-md-12 form-group">
              <label for="image5">Image 5</label>
              <input type="file" id="image5" name="image5" style="@if(isset($room)) @if($room->image5 !== '') display:none  @endif @endif">
              @if(isset($room))
                  @if($room->image5 !== '')
                      <div class="col-sm-12" id="div_image5">
                          <img src="{{ asset('uploadedimages/'.$room->image5) }}" style="width:200px">
                      </div>
                      <div class="col-sm-12">
                          <button class="btn btn-link" id="edit_image5" onclick="editImage(5)">Edit</button>
                          <button class="btn btn-link" id="cancel_image5" onclick="cancelImage(5)" style="display:none">Cancel</button>
                      </div>
                  @endif
              @endif
          </div>
      </div>
  </div>
</div>

<div id="rental">
  <div class="panel-heading">
      <div class="panel-title"><span class="label label-primary">Rent</span></div>
  </div>
  <div class="panel-body">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="row">
          
          <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label for="monthly_rent">Montly Rent</label>
              <input type="number" id="rent_monthly_rent" name="rent_monthly_rent" class="form-control">
              <div class="errorTxt"></div>          
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="number_person">Number Person</label>
              <input type="number" id="rent_number_person" name="rent_number_person" class="form-control">
              <div class="errorTxt"></div>
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label for="vat">VAT</label>
              <input type="number" id="rent_vat" name="rent_vat" class="form-control">
              <div class="errorTxt"></div> 
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="new_price">New Price</label>
              <input type="number" id="rent_new_price" name="rent_new_price" class="form-control">
              <div class="errorTxt"></div>
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-12 col-md-12 form-group">
              <label for="service_id">Room Type</label>
              <select class="form-control" id="rent_room_type" name="rent_room_type">
                  <option value="">Select</option>
                  <option value="hall">Hall</option>
                  <option value="study">Study</option>
                  <option value="meeting">Meeting</option>
              </select>
              <div class="errorTxt"></div>
            </div>
          </div>


          <div class="col-sm-12 col-md-12">
              <span class="col-sm-6 col-md-6 form-group">
                  <label for="rent_start_date">Start Date</label>
                  <input type="text" id="rent_start_date" name="rent_start_date" value="" class="form-control">
                  <div class="errorTxt"></div>
                  <!-- <input type="text" id="daterange-3" value="10/24/1984" class="form-control"> -->
              </span>
              <span class="col-sm-6 col-md-6 form-group">
                  <label for="rent_end_date">End Date</label>
                  <input type="text" id="rent_end_date" name="rent_end_date" class="form-control">
                  <div class="errorTxt"></div>
              </span>
          </div>

          <div class="col-sm-12 col-md-12">

              <div class="col-sm-4 col-md-4">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" name="rent_end_date_continue" id="rent_end_date_continue" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  End Date Continue
                </label>                          
              </div>

              <div class="col-sm-4 col-md-4">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" name="rent_calender_available" id="rent_calender_available" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  Calender Available
                </label>                             
              </div>

              <div class="col-sm-4 col-md-4">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" name="rent_available_users" id="rent_available_users" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  Available User
                </label>
              </div>
          </div>
        </div>
    </div>
  </div> 
</div>

<div id="conference">
  <div class="panel-heading">
      <div class="panel-title"><span class="label label-primary">Conference</span></div>
  </div>
  <div class="panel-body">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="row">
        
        <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
                <label for="conf_day_price">Day Price</label>
                <input type="number" id="conf_day_price" name="conf_day_price" class="form-control">
                <div class="errorTxt"></div>                              
            </div>
            <div class="col-sm-6 col-md-6 form-group">
                <label for="public_name">Half Day Price</label>
                <input type="number" id="conf_half_day_price" name="conf_half_day_price" class="form-control">
                <div class="errorTxt"></div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label for="conf_cost">Cost</label>
              <input type="number" id="conf_cost" name="conf_cost" class="form-control">
              <div class="errorTxt"></div>                             
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="conf_vat">VAT</label>
              <input type="number" id="conf_vat" name="conf_vat" class="form-control">
              <div class="errorTxt"></div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12">
            <div class="col-sm-3 col-md-3 form-group">
                <label for="conf_sm_price">Small Group Price</label>
                <input type="number" id="conf_sm_price" name="conf_sm_price" class="form-control"> 
                <div class="errorTxt"></div> 
            </div>
            <div class="col-sm-3 col-md-3 form-group">
                <label for="conf_high_price">High</label>
                <input type="number" id="conf_high_price" name="conf_high_price" class="form-control">
                <div class="errorTxt"></div>
            </div>
            <div class="col-sm-3 col-md-3 form-group">
                <label for="conf_medium_price">Medium</label>
                <input type="number" id="conf_medium_price" name="conf_medium_price" class="form-control">
                <div class="errorTxt"></div>
            </div>
            <div class="col-sm-3 col-md-3 form-group">
                <label for="conf_low_price">Low</label>
                <input type="number" id="conf_low_price" name="conf_low_price" class="form-control">
                <div class="errorTxt"></div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12">
          <div class="col-sm-12 col-md-12 form-group">
            <label for="conf_termination_cond">Termination Condition</label>
            <textarea type="text" id="conf_termination_cond" name="conf_termination_cond" class="form-control"></textarea>
            <div class="errorTxt"></div>
          </div>
        </div>

        <div class="col-sm-12">

            <div class="col-md-4">
              <label for="service_id">Conference Room Type</label>
              <select class="form-control" id="conf_room_type" name="conf_room_type">
                  <option value="">Select</option>
                  <option value="hall">Hall</option>
                  <option value="study">Study</option>
                  <option value="meeting">Meeting</option>
              </select>
              <div class="errorTxt"></div>                            
            </div>

            <div class="col-md-4">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" name="conf_calender_available" id="conf_calender_available" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Calender Available
              </label>                             
            </div>

            <div class="col-md-4">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" name="conf_available_users" id="conf_available_users" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Available User
              </label>
            </div>

        </div>

        <div class="col-sm-12">
            <label for="conf_info_internal">Infomation Internal</label>
            <textarea id="conf_info_internal" name="conf_info_internal" required="required"></textarea>
            <div class="errorTxt" id="errorSN1"></div>
        </div>

        <div class="col-sm-12">
            <label for="conf_info_customer_se">Information Customer SE</label>
            <textarea id="conf_info_customer_se" name="conf_info_customer_se" required="required"></textarea>
            <div class="errorTxt" id="errorSN2"></div>
        </div>

        <div class="col-sm-12">
            <label for="conf_info_customer_en">Information Customer EN</label>
            <textarea id="conf_info_customer_en" name="conf_info_customer_en" required="required"></textarea>
            <div class="errorTxt" id="errorSN3"></div>
        </div>

        <div class="col-sm-12">
            <label for="conf_info_technical_se">Information Technical SE</label>
            <textarea id="conf_info_technical_se" name="conf_info_technical_se" required="required"></textarea>
            <div class="errorTxt" id="errorSN4"></div>
        </div>

        <div class="col-sm-12">
            <label for="conf_info_technical_en">Information Technical EN</label>
            <textarea id="conf_info_technical_en" name="conf_info_technical_en" required="required"></textarea>
            <div class="errorTxt" id="errorSN5"></div>
        </div>

      </div>
    </div>
  </div>  
</div>

<div class="col-xs-12 col-sm-12 col-md-12 m-t-2">
    <button type="submit" class="btn btn-primary">@if(isset($room)) <i class="fa fa-refresh"></i>  Update Room @else <i class="fa fa-plus"></i>  Add Room @endif</button>
    <a href="{!! route('company.rooms.index') !!}" class="btn btn-default"><i class="fa fa-times"></i>&nbsp;Cancel</a>
</div>

@section('js')

<script type="text/javascript">

          // Initialize Select2
        
        $(function() {
          $('#select_floor').select2({
            placeholder: 'Select Floor',
          });
        });

        $(function() {
          $('#service_id').select2({
            placeholder: 'Select Service',
          });
        });

        $(function() {
          $('#building_id').select2({
            placeholder: 'Select Service',
          });
        });

        $(function() {
          $('#rent_room_type').select2({
            placeholder: 'Select Room Type',
          });
        });

        $(function() {
          $('#conf_room_type').select2({
            placeholder: 'Select Room Type',
          });
        });

        function editImage(id) {
            event.preventDefault();
            document.getElementById('image' + id).style = 'display: block';
            document.getElementById('div_image' + id).style = 'display: none';
            document.getElementById('edit_image' + id).style = 'display: none';
            document.getElementById('cancel_image' + id).style = 'display: block';
        }

        function cancelImage(id) {
            event.preventDefault();
            document.getElementById('image' + id).style = 'display: none';
            document.getElementById('div_image' + id).style = 'display: block';
            document.getElementById('edit_image' + id).style = 'display: block';
            document.getElementById('cancel_image' + id).style = 'display: none';
        }

        $(document).ready(function() {
          
            $('#conference').hide();
            $('#rental').show();

            var flag = 0;

            $('#end_date_continue').change(function() {
                if ($(this).is(":checked")) 
                {
                    $( "#end_date" ).prop( "disabled", true );
                }
                else
                {
                    $( "#end_date" ).prop( "disabled", false );
                } 
            });

            $('#rent_end_date_continue').change(function() {
                if ($(this).is(":checked")) 
                {
                    $( "#rent_end_date" ).prop( "disabled", true );
                }
                else
                {
                    $( "#rent_end_date" ).prop( "disabled", false );
                } 
            });

            $('#room_module_type').change(function() {
                if ($(this).is(":checked")) 
                {
                    $('#conference').show();
                    $('#rental').hide();
                    flag = 1;
                }
                else
                {
                    $('#conference').hide();
                    $('#rental').show();
                    flag = 0;
                } 
            });

  
            // if we want to submit form via ajax
            $('#roomForm').on('submit', function(e) {

                var errorCount = 0;

                if($('#room_module_type').is(':checked'))
                {
                    $('#room_module_type').prop('checked', true);
                }
                else
                {
                    $('#room_module_type').prop('checked', false);                    
                }

                if(flag == 1)
                {
                    if($('#conf_info_internal').summernote('isEmpty'))
                    {
                        errorCount++;
                        $('#errorSN1').text('This field is required.');
                    }

                    if($('#conf_info_customer_se').summernote('isEmpty'))
                    {
                        errorCount++;
                        $('#errorSN2').text('This field is required.');
                    }

                    if($('#conf_info_customer_en').summernote('isEmpty'))
                    {
                        errorCount++;
                        $('#errorSN3').text('This field is required.');
                    }

                    if($('#conf_info_technical_se').summernote('isEmpty'))
                    {
                        errorCount++;
                        $('#errorSN4').text('This field is required.');
                    }

                    if($('#conf_info_technical_en').summernote('isEmpty'))
                    {
                        errorCount++;
                        $('#errorSN5').text('This field is required.');
                    }

                }
                else
                {
                    $('#errorSN1').text('');
                    $('#errorSN2').text('');
                    $('#errorSN3').text('');
                    $('#errorSN4').text('');
                    $('#errorSN5').text('');
                }

                if(errorCount > 0)
                {
                    console.log(errorCount);
                    // cancel submit
                    e.preventDefault();
                }
                else
                {
                    var data = $(this).serializeArray();
                    var jsObj = {};

                    $.each(data,function(index,field){
                        jsObj[field.name] = field.value;
                    });

                    console.log(jsObj);
                }
            });

        });

        $.validator.addMethod("stringValue", function(value, element) {
            return this.optional(element) || /^[a-z\-\s\d]+$/i.test(value);
        }, "Field must contain string only.");

        $.validator.addMethod("securityCode", function(value, element) {
            return this.optional(element) || /^[a-z\-\s\d]+$/i.test(value);
        }, "Field must contain only letters or dashes.");


        $.validator.addMethod("greaterThan", function(value, element, params) {
            if (!/Invalid|NaN/.test(new Date(value))) {
                return new Date(value) > new Date($(params).val());
            }
            return isNaN(value) && isNaN($(params).val()) || (Number(value) > Number($(params).val())); 
        },'Must be greater than {0}.');

      // Initialize validator
      $('#roomForm').validate({
            ignore:":not(:visible)",
            rules: {
                'floor_id': {
                    required: true,
                },
                'service_id': {
                    required: true,
                },
                'name': {
                    required: true,
                    stringValue: true,
                },
                 'address': {
                    required: true,
                },
                'area': {
                    required: true,
                    digits: true
                },
                'price': {
                    required: true,
                    digits: true
                },
                'security_code': {
                    required: true,
                    securityCode: true
                },
                'sort_index': {
                    required: true,
                    digits: true
                },
                'article_number': {
                    required: true,
                    digits: true
                },
                
                'public_name': {
                    required: true,
                    stringValue: true
                },
                
                'SQNA': {
                    required: true,
                    stringValue: true
                },
                
                'building_id': {
                    required: true,
                },
                
                'start_date': {
                    required: true,
                },
                
                'end_date': {
                    required: true,
                    greaterThan: "start_date" 
                },
                
                'rent_monthly_rent': {
                    required: true,
                    digits: true
                },
                
                'rent_number_person': {
                    required: true,
                    digits: true
                },
                
                'rent_vat': {
                    required: true,
                    digits: true
                },
                
                'rent_new_price': {
                    required: true,
                    digits: true
                },
                
                'rent_start_date': {
                    required: true,
                },
                'rent_end_date': {
                    required: true,
                    greaterThan: "rent_end_date"
                },
                'rent_room_type': {
                    required: true,
                    stringValue: true
                },
                'conf_day_price': {
                    required: true,
                    digits: true
                },
                'conf_half_day_price': {
                    required: true,
                    digits: true
                },
                'conf_room_type': {
                    required: true
                },
                'conf_cost': {
                    required: true,
                    digits: true
                },
                'conf_sm_price': {
                    required: true,
                    digits: true
                },
                'conf_high_price': {
                    required: true,
                    digits: true
                },
                'conf_medium_price': {
                    required: true,
                    digits: true
                },
                'conf_low_price': {
                    required: true,
                },
                'conf_termination_cond': {
                    required: true
                },
                'conf_vat': {
                    required: true,
                    digits: true
                },
                'conf_calender_available': {
                    required: true,
                },
                'conf_info_internal': {
                    required: true,
                },
                'conf_info_customer_se': {
                    required: true,
                },
                'conf_info_customer_en': {
                    required: true,
                },
                'conf_info_technical_se': {
                    required: true,
                },
                'conf_info_technical_en': {
                    required: true,
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


      $('#start_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD-MM-Y'
        }
      });

      $('#end_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD-MM-Y'
        }
      });

      $('#rent_start_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD-MM-Y'
        }
      });

      $('#rent_end_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'DD-MM-Y'
        }
      });

    // Initialize Summernote
    $(function() {
      $('#conf_info_internal').summernote({
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
    });

    $(function() {
      $('#conf_info_customer_se').summernote({
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
    });

    $(function() {
      $('#conf_info_customer_en').summernote({
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
    });

    $(function() {
      $('#conf_info_technical_se').summernote({
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
    });

    $(function() {
      $('#conf_info_technical_en').summernote({
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
    });

</script>

@endsection