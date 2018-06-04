@section('css')
<style type="text/css">
    .img-area {
      width: 20px;
      height: 20px
    }  
</style>

@endsection

<div class="panel-heading">
    <div class="panel-title">General Information</div>
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
                    <label for="building_id">Select Building</label>
                    <select class="form-control" id="building_id" name="building_id">
                        <option value="">Select</option>
                        @foreach ($buildings as $building)
                            <option value="{{ $building->id }}">{{$building->name }}</option>
                        @endforeach
                    </select>
                    <div class="errorTxt"></div>
                  </div>

                  <div class="form-group">
                    <label for="select_floor">Floor Name</label>
                    <select class="form-control" id="select_floor" name="floor_id">
                      <option value="">Select</option>
                    </select>
                    <div class="errorTxt"></div>
                  </div>   
                  <div class="col-md-2"><span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>
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
                      <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change
                      </span>
                        <input type="file" name="image1" id="image1">
                      </span>
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
              <label for="room_name">Room Name</label>
              <input type="text" id="room_name" name="name" placeholder="enter room name here" class="form-control" value="@if(isset($room)){{ $room->name }}@endif">
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
              <input type="text" id="address" placeholder="enter address here" name="address" class="form-control" value="@if(isset($room)){{ $room->name }}@endif">
              <div class="errorTxt"></div>
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label for="room_area">Area</label>
              <input type="number" id="room_area" placeholder="enter area here" name="area" class="form-control" value="@if(isset($room)){{ $room->area }}@endif">
              <div class="errorTxt"></div>          
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="room_price">Price</label>
              <input type="number" id="room_price" name="price" placeholder="enter price here" class="form-control" value="@if(isset($room)){{ $room->price }}@endif">
              <div class="errorTxt"></div>          
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label for="public_name">Public Name</label>
              <input type="text" id="public_name" placeholder="enter public name here" name="public_name" class="form-control">
              <div class="errorTxt"></div>         
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="sort_index">Sort Index</label>
              <input type="number" id="sort_index" placeholder="enter sort index here" name="sort_index" class="form-control">
              <div class="errorTxt"></div>          
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label for="security_code">Security Code</label>
              <input type="text" id="security_code" placeholder="enter security code here" name="security_code" class="form-control" value="@if(isset($room)){{ $room->security_code }}@endif">
              <div class="errorTxt"></div> 
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="article_number">Article Number</label>
              <input type="text" id="article_number" placeholder="enter article number here" name="article_number" class="form-control">
              <div class="errorTxt"></div>
            </div>
          </div>


          <div class="col-sm-12 col-md-12">
            <div class="col-sm-12 col-md-12 form-group">
              <label for="SQNA">SQNA</label>
              <input type="text" id="SQNA" placeholder="enter sqna here" name="SQNA" class="form-control" value="@if(isset($room)){{ $room->security_code }}@endif">
              <div class="errorTxt"></div>
            </div>
          </div>


          <div class="col-sm-12 col-md-12">
              <span class="col-sm-4 col-md-4 form-group">
                  <label for="start_date">Start Date</label>
                  <input type="text" id="start_date" name="start_date" value="" class="form-control">
                  <div class="errorTxt"></div>
              </span>
              <span class="col-sm-4 col-md-4 form-group">
                  <label for="end_date">End Date</label>
                  <input type="text" id="end_date" name="end_date" class="form-control">
                  <div class="errorTxt"></div>
              </span>
              <span class="col-sm-4 col-md-4 form-group">
                <label class="custom-control custom-checkbox m-t-4">
                  <input type="checkbox" name="end_date_continue" id="end_date_continue" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  Continue
                </label>
              </span>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-12 col-md-12 form-group">
              <label for="room_module_type">Select Room Type</label>
              <select class="form-control" id="room_module_type" name="room_module_type">
                  <option value="rental">Rental</option>
                  <option value="conference">Conference</option>
              </select>
              <div class="errorTxt"></div>
            </div>
          </div>

      </div>
  </div>
</div>

<div id="rental">
  <div class="panel-heading">
      <div class="panel-title">Rent</div>
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
              <span class="col-sm-4 col-md-4 form-group">
                  <label for="rent_start_date">Start Date</label>
                  <input type="text" id="rent_start_date" name="rent_start_date" value="" class="form-control">
                  <div class="errorTxt"></div>
                  <!-- <input type="text" id="daterange-3" value="10/24/1984" class="form-control"> -->
              </span>
              <span class="col-sm-4 col-md-4 form-group">
                  <label for="rent_end_date">End Date</label>
                  <input type="text" id="rent_end_date" name="rent_end_date" class="form-control">
                  <div class="errorTxt"></div>
              </span>
              <span class="col-sm-4 col-md-4 form-group">
                <label class="custom-control custom-checkbox m-t-4">
                  <input type="checkbox" name="rent_end_date_continue" id="rent_end_date_continue" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  Continue
                </label>  
              </span>
          </div>

          <div class="col-sm-12 col-md-12">
              <div class="col-sm-6 col-md-6">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" name="rent_calender_available" id="rent_calender_available" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  Calender Available
                </label>                             
              </div>
              <div class="col-sm-6 col-md-6">
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
      <div class="panel-title">Conference</div>
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
            <div class="col-md-12 col-sm-12 form-group">
              <label for="service_id">Conference Room Type</label>
              <select class="form-control" id="conf_room_type" name="conf_room_type">
                  <option value="">Select</option>
                  <option value="hall">Hall</option>
                  <option value="study">Study</option>
                  <option value="meeting">Meeting</option>
              </select>
              <div class="errorTxt"></div>                            
            </div>
        </div>

        <div class="col-sm-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" name="conf_calender_available" id="conf_calender_available" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Calender Available
              </label>                             
            </div>

            <div class="col-sm-6 col-md-6 form-group">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" name="conf_available_users" id="conf_available_users" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Available User
              </label>
            </div>
        </div>

        <div class="col-sm-12 col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">Sitting Arrangment</div>
            </div>
            <div class="panel-body">
              <div class="pull-right">
                <button class="btn btn-primary addSitting" type="button"><i class="fa fa-plus"></i> Add</button>
              </div>
              <div class="row sittingArrangments">
                  <div class="col-sm-12 col-sm-12">
                      <div class="col-sm-3 col-md-3 form-group">
                        <label for="sitting_name">Sitting Name</label>
                        <input type="text" name="sitting_name[]" id="sitting_name" class="form-control sittingNameField" >
                      </div>
                      <div class="col-sm-3 col-md-3 form-group">
                        <label for="sitting_number_person">Number of Person</label>
                        <input type="number" name="sitting_number_person[]" id="sitting_number_person" class="form-control" >
                      </div>
                      <div class="col-sm-3 col-md-3 form-group">
                        <label for="images">Images</label>
                        <input type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple/>
                      </div>
                      <div class="col-sm-3">
                        <!-- <i class="fa fa-times fa-lg remove-sitting cursor-p m-t-4"></i> -->
                      </div>
                  </div>
                  <div class="col-sm-12 col-sm-12">
                      <div class="row" id="image_preview"></div>                    
                  </div>
              </div>
            </div>            
          </div>
        </div>

        <div class="col-sm-12 col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">What included in this room.?</div>
            </div>
            <div class="panel-body">
              <div class="pull-right">
                <button class="btn btn-primary addIncluded" type="button"><i class="fa fa-plus"></i>&nbsp;Add</button>
              </div>
              <div class="row includedItem">
                  <div class="col-sm-12 col-sm-12 included">
                      <div class="col-sm-3 col-md-3 form-group">
                        <label for="include_equipment_id">Item</label>
                        <select class="form-control" id="include_equipment_id" name="include_equipment_id[]">
                            <!-- <option value="">Select</option> -->
                            @foreach ($equipments as $equipment)
                                <option value="{{ $equipment->id }}">{{$equipment->title }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="col-sm-2 col-md-2 form-group">
                        <label for="include_qty">Quantity</label>
                        <input type="number" name="include_qty[]" id="include_qty" class="form-control" >
                      </div>
                      <div class="col-sm-2 col-md-2 form-group">
                        <label for="include_price">Price</label>
                        <input type="number" name="include_price[]" id="include_price" class="form-control" >
                      </div>
                      <div class="col-sm-4 col-md-4 form-group">
                        <label for="include_info">Information</label>
                        <input type="text" name="include_info[]" id="include_info" class="form-control" >
                      </div>
                      <div class="col-sm-1">
<!--                         <i class="fa fa-times fa-lg remove-sitting cursor-p m-t-4"></i> -->
                      </div>
                  </div>
              </div>
            </div>            
          </div>
        </div>

        <div class="col-sm-12 col-md-12">
          <div class="col-sm-12 col-md-12 form-group">
            <label for="conf_termination_cond">Termination Condition</label>
            <textarea type="text" id="conf_termination_cond" name="conf_termination_cond" class="form-control" required="required"></textarea>
            <div class="errorTxt" id="errorSN6"></div>
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

<script>

  function preview_images() 
  {
   var total_file = document.getElementById("images").files.length;
   for(var i=0;i<total_file;i++)
   {
    $('#image_preview').append("<div class='col-md-2'><i class='fa fa-times text-danger fa-sm cursor-p remove-img'></i><img class='img-responsive fileinput-new thumbnail' style='width: 105px; height: 70px;' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
   }
  }

  $(document).on('click','.remove-img',function(e){
     $(this).parent().remove();
   
  });

</script>

<script type="text/javascript">

        $.validator.addMethod("stringValue", function(value, element) {
            return this.optional(element) || /^[a-zA-Z0-9\s]+$/i.test(value);
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

        $.validator.addMethod("dollarsscents", function (value, element) {
            return this.optional(element) || /^\d{0,4}(\.\d{0,2})?$/i.test(value);
        }, "You must include two decimal places");

        // Initialize validator
      $('#roomForm').validate({
            ignore:":not(:visible)",
            rules: {
                'include_equipment_id': {
                    required: true,
                },
                'include_qty': {
                    required: true,
                },
                'include_price': {
                    required: true,
                },
                'include_info': {
                    required: true,
                },
                'sitting_name': {
                    required: true,
                },
                'sitting_number_person': {
                    required: true,
                },
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
                    digits: true,
                    maxlength : 11 
                },
                'price': {
                    required: true,
                    dollarsscents: true,
                    maxlength : 11
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
                    stringValue: true
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
                    dollarsscents: true
                },
                
                'rent_number_person': {
                    required: true,
                    digits: true
                },
                
                'rent_vat': {
                    required: true,
                    dollarsscents: true,
                    maxlength : 11
                },
                
                'rent_new_price': {
                    required: true,
                    dollarsscents: true,
                    maxlength : 11
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
                    dollarsscents: true
                },
                'conf_half_day_price': {
                    required: true,
                    dollarsscents: true,
                    maxlength : 11
                },
                'conf_room_type': {
                    required: true
                },
                'conf_cost': {
                    required: true,
                    dollarsscents: true,
                    maxlength : 11
                },
                'conf_sm_price': {
                    required: true,
                    dollarsscents: true,
                    maxlength : 11
                },
                'conf_high_price': {
                    required: true,
                    dollarsscents: true,
                    maxlength : 11
                },
                'conf_medium_price': {
                    required: true,
                    dollarsscents: true,
                    maxlength : 11
                },
                'conf_low_price': {
                    required: true,
                    dollarsscents : true,
                    maxlength : 11
                },
                'conf_termination_cond': {
                    required: true
                },
                'conf_vat': {
                    required: true,
                    dollarsscents: true,
                    maxlength : 11
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


        //  Sitting Arrangment Start
        var sittingCount = 0;
        
        $('.addSitting').click(function(){
          sittingCount++;
          var sitting = '<div class="col-sm-12 col-sm-12 sitting">';
          sitting += '<div class="col-sm-3 col-md-3 form-group">';
          sitting += '<label for="">Sitting Name</label>';
          sitting += '<input type="text" name="sitting_name[]" class="form-control sittingNameField" >';
          sitting += '</div>';
          sitting += '<div class="col-sm-3 col-md-3 form-group">';
          sitting += '<label for="">Number of Person</label>';
          sitting += '<input type="number" name="sitting_number_person[]" class="form-control" >';
          sitting += '</div>';
          sitting += '<div class="col-sm-3 col-md-3 form-group">';


          sitting += '<label for="images">Images</label>';
          sitting += '<input type="file" class="form-control" id="images" name="images[]" onchange="preview_images();" multiple/>';


          sitting += '</div>';
          sitting += '<div class="col-sm-3">';
          sitting += '<i class="fa fa-times fa-lg remove-sitting cursor-p m-t-4"></i>';
          sitting += '</div>';
          sitting += '</div>';
          sitting += '<div class="col-sm-12 col-sm-12">';
          sitting += '<div class="row" id="image_preview"></div>';                    
          sitting += '</div>';

          $('.sittingArrangments').prepend(sitting);

        });

        $(document).on('click', '.remove-sitting', function(){
          sittingCount--;
          $(this).parent().parent().remove();
        });


        var includedCount = 0;
        // Sitting Arrangment End
        $('.addIncluded').click(function(){
          includedCount++;
          var included = '';
          $.ajax({
            url : "{{ route('company.room.equipments') }}",
            type : "GET",
            dataType : "json",
            success : function(response){
                included += '<div class="col-sm-12 col-sm-12 included">';
                included += '<div class="col-sm-3 col-md-3 form-group">';
                included += '<label for="">Item</label>';
                included += '<select class="form-control" id="equipment_id" name="include_equipment_id[]">';
                // included += '<option value="">Select</option>';
                for(var i = 0 ; i<response.length ; i++)
                {
                  included += '<option value="'+response[i].id+'">'+response[i].title+'</option>';
                }
                included += '</select>';
                included += '</div>';
                included += '<div class="col-sm-2 col-md-2 form-group">';
                included += '<label for="">Quantity</label>';
                included += '<input type="number" name="include_qty[]" class="form-control" >';
                included += '</div>';
                included += '<div class="col-sm-2 col-md-2 form-group">';
                included += '<label for="">Price</label>';
                included += '<input type="number" name="include_price[]" class="form-control" >';
                included += '</div>';
                included += '<div class="col-sm-4 col-md-4 form-group">';
                included += '<label for="">Information</label>';
                included += '<input type="text" name="include_info[]" class="form-control" >';
                included += '</div>';
                included += '<div class="col-sm-1">';
                included += '<i class="fa fa-times fa-lg remove-included cursor-p m-t-4"></i>';
                included += '</div>';
                included += '</div>';
            }
          }).done(function(){
              $('.includedItem').prepend(included);
          });
        });

        $(document).on('click','.remove-included',function(){
          includedCount--;
          $(this).parent().parent().remove();
        });

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
            placeholder: 'Select Building',
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

            $('#loader').css("visibility", "hidden");

            $('select[name="building_id"]').on('change', function(){

                  var buildingId = $(this).val();
                  
                  var route = "{{ url('/') }}/company/floor/"+buildingId;
                  
                  if(buildingId) {
                      $.ajax({
                          url: route,
                          type:"GET",
                          dataType:"json",
                          beforeSend: function(){
                              $('#loader').css("visibility", "visible");
                          },
                          success:function(data) {

                              $('select[name="floor_id"]').empty();

                              $.each(data, function(key, value){

                                  $('select[name="floor_id"]').append('<option value="'+ key +'">' + value + '</option>');

                              });
                          },
                          complete: function(){
                              $('#loader').css("visibility", "hidden");
                          }
                      });
                  } else {
                      $('select[name="floor_id"]').empty();
                  }
            });
          
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
                // For dropdown
                if ($(this).val() == 'conference') 
                {
                    $('#conference').show();
                    $('#rental').hide();
                    flag = 1;
                }
                else if($(this).val() == 'rental')
                {
                    $('#conference').hide();
                    $('#rental').show();
                    flag = 0;
                }
                // For checkbox
                // if ($(this).is(":checked")) 
                // {
                //     $('#conference').show();
                //     $('#rental').hide();
                //     flag = 1;
                // }
                // else
                // {
                //     $('#conference').hide();
                //     $('#rental').show();
                //     flag = 0;
                // } 
            });

  
            // if we want to submit form via ajax
            $('#roomForm').on('submit', function(e) {



/*              var input_sitting =  jQuery('<input type="hidden" name="num_sitting" value="'+sittingCount+'">');

              var input_included = jQuery('<input type="hidden" name="num_included" value="'+includedCount+'">');

              jQuery('#roomForm').append(input_sitting);

              jQuery('#roomForm').append(input_included);*/

              // $(this).validate();

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

                    if($('#conf_termination_cond').summernote('isEmpty'))
                    {
                        errorCount++;
                        $('#errorSN6').text('This field is required.');
                    }

                }
                else
                {
                    $('#errorSN1').text('');
                    $('#errorSN2').text('');
                    $('#errorSN3').text('');
                    $('#errorSN4').text('');
                    $('#errorSN5').text('');
                    $('#errorSN6').text('');
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

                    // /cancel submit
                    // e.preventDefault();
                }
            });

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
        startDate : moment().add('years',1),
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
        startDate : moment().add('years',1),
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

    $(function() {
      $('#conf_termination_cond').summernote({
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