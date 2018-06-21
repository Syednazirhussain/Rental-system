
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
                    <label for="building_id">Buildings</label>
                    <select class="form-control" id="building_id" name="building_id">
                        <option value="">Select</option>
                        @foreach ($buildings as $building)
                          @if(isset($room) && $room->building_id == $building->id)
                            <option value="{{ $building->id }}" selected="selected">{{$building->name }}</option>
                          @else
                            <option value="{{ $building->id }}">{{$building->name }}</option>
                          @endif
                        @endforeach
                    </select>
                    <div class="errorTxt"></div>
                  </div>

                  <div class="form-group">
                    <label for="select_floor">Floors</label>
                    <select class="form-control" id="select_floor" name="floor_id">
                      @if(isset($room))
                        <option value="{{ $room->floor_id }}" selected="selected">{{ $room->floor->floor }}</option>
                      @else
                        <option value="">Select</option>
                      @endif
                    </select>
                    <div class="errorTxt"></div>
                  </div>   
                  <div class="col-md-2"><span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>
                </div>

                <div class="col-sm-4">
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                          @if (isset($room))
                              <input type="hidden" name="logo-hidden" id="logo-hidden" value="{{ $room->image1 }}">

                              <img src="{{ asset('storage/uploadedimages/'.$room->image1) }}" data-src="{{ asset('storage/uploadedimages/'.$room->image1) }}" />
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
            </div><!-- 
            <div class="col-sm-6 col-md-6 form-group">
              <label for="service_id">Services</label>
              <select class="form-control" id="service_id" name="service_id">
                  <option value="">Select</option>
                  @if(isset($services))
                    @foreach ($services as $service)
                      @if(isset($room) && $room->service_id == $service->id)
                        <option value="{{ $service->id }}" selected="selected">{{$service->name }}</option>
                      @else
                        <option value="{{ $service->id }}">{{$service->name }}</option>
                      @endif
                    @endforeach
                  @else
                      <option>No service available</option>
                  @endif
              </select>
              <div class="errorTxt"></div>            
            </div> -->
            <div class="col-sm-6 col-md-6 form-group">
              <label for="service_id">Services</label>
            <select type="text" name="services[]" id="service_id" class="form-control select2-example" multiple>
                            @if (isset($room))

                            @foreach($services as $service)
                        <option value="{{ $service->id }}" <?php foreach ($selectedService as $selct) { if($service->id == $selct->id){ echo "selected"; }}  ?> >
                          {{$service->name}}
                        </option>
                          
                      @endforeach

                      @else
                          @foreach($services as $services)
                          <option value="{{ $services->id }}">{{ ucwords($services->name) }}</option>
                     @endforeach

                     @endif

           </select>
          <label id="companyId-error" class="error" for="companyId"></label>
        </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-12 col-md-12 form-group">
              <label for="address">Address</label>
              <input type="text" id="address" placeholder="enter address here" name="address" class="form-control" value="@if(isset($room)){{ $room->address }}@endif">
              <div class="errorTxt"></div>
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label for="room_area">Area</label>
              <input type="number"  min="0" id="room_area" placeholder="enter area here" name="area" class="form-control" value="@if(isset($room)){{ $room->area }}@endif">
              <div class="errorTxt"></div>          
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="room_price">Price</label>
              <input type="number" min="0" id="room_price" name="price" placeholder="enter price here" class="form-control" value="@if(isset($room)){{ $room->price }}@endif">
              <div class="errorTxt"></div>          
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label for="public_name">Public Name</label>
              <input type="text" id="public_name" placeholder="enter public name here" name="public_name" class="form-control" value="@if(isset($room)){{ $room->public_name }}@endif">
              <div class="errorTxt"></div>         
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="sort_index">Sort Index</label>
              <input type="number"  min="0" id="sort_index" placeholder="enter sort index here" name="sort_index" class="form-control" value="@if(isset($room)){{ $room->sort_index }}@endif">
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
              <input type="text" id="article_number" placeholder="enter article number here" name="article_number" class="form-control" value="@if(isset($room)){{ $room->article_number }}@endif">
              <div class="errorTxt"></div>
            </div>
          </div>


          <div class="col-sm-12 col-md-12">
            <div class="col-sm-12 col-md-12 form-group">
              <label for="SQNA">SQNA</label>
              <input type="text" id="SQNA" placeholder="enter sqna here" name="SQNA" class="form-control" value="@if(isset($room)){{ $room->SQNA }}@endif">
              <div class="errorTxt"></div>
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
              <span class="col-sm-4 col-md-4 form-group">
                  <label for="start_date">Start Date</label>
                  <input type="text" id="start_date" name="start_date" value="@if(isset($room)){{ $room->start_date }} @endif" class="form-control" value="@if(isset($room)){{ $room->start_date }}@endif">
                  <div class="errorTxt"></div>
              </span>
              @if(isset($room))
              <span class="col-sm-4 col-md-4 form-group">
                  <label for="end_date">End Date</label>
                  <input type="text" id="end_date_edit" name="end_date" class="form-control" value="@if(isset($room)){{ $room->end_date }} @endif">
                  <div class="errorTxt"></div>
              </span>
              @else
              <span class="col-sm-4 col-md-4 form-group">
                  <label for="end_date">End Date</label>
                  <input type="text" id="end_date" name="end_date" class="form-control" value="">
                  <div class="errorTxt"></div>
              </span>
              @endif
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
                @if(isset($room))
                  @if($room->room_module_type == 'rental')
                    <option value="rental" selected="selected">Rental</option>
                    <option value="conference">Conference</option>
                  @elseif($room->room_module_type == 'conference')
                    <option value="rental">Rental</option>
                    <option value="conference" selected="selected">Conference</option>
                  @endif
                @else
                  <option value="rental">Rental</option>
                  <option value="conference">Conference</option>
                @endif
              </select>
              <div class="errorTxt"></div>
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
                <input type="number"  min="0" id="conf_day_price" name="conf_day_price" class="form-control" value="@if(isset($room)){{ $room->conf_day_price }}@endif">
                <div class="errorTxt"></div>                              
            </div>
            <div class="col-sm-6 col-md-6 form-group">
                <label for="public_name">Half Day Price</label>
                <input type="number"  min="0" id="conf_half_day_price" name="conf_half_day_price" class="form-control" value="@if(isset($room)){{ $room->conf_half_day_price }}@endif">
                <div class="errorTxt"></div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label for="conf_cost">Cost</label>
              <input type="number"  min="0" id="conf_cost" name="conf_cost" class="form-control" value="@if(isset($room)){{ $room->conf_cost }}@endif">
              <div class="errorTxt"></div>                             
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="conf_vat">VAT</label>
              <input type="number"  min="0" id="conf_vat" name="conf_vat" class="form-control" value="@if(isset($room)){{ $room->conf_vat }}@endif">
              <div class="errorTxt"></div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12">
            <div class="col-sm-3 col-md-3 form-group">
                <label for="conf_sm_price">Small Group Price</label>
                <input type="number"  min="0" id="conf_sm_price" name="conf_sm_price" class="form-control" value="@if(isset($room)){{ $room->conf_small_group_price }}@endif"> 
                <div class="errorTxt"></div> 
            </div>
            <div class="col-sm-3 col-md-3 form-group">
                <label for="conf_high_price">High</label>
                <input type="number"  min="0" id="conf_high_price" name="conf_high_price" class="form-control" value="@if(isset($room)){{ $room->conf_high_price }}@endif">
                <div class="errorTxt"></div>
            </div>
            <div class="col-sm-3 col-md-3 form-group">
                <label for="conf_medium_price">Medium</label>
                <input type="number"  min="0" id="conf_medium_price" name="conf_medium_price" class="form-control" value="@if(isset($room)){{ $room->conf_medium_price }}@endif">
                <div class="errorTxt"></div>
            </div>
            <div class="col-sm-3 col-md-3 form-group">
                <label for="conf_low_price">Low</label>
                <input type="number"  min="0" id="conf_low_price" name="conf_low_price" class="form-control" value="@if(isset($room)){{ $room->conf_low_price }}@endif">
                <div class="errorTxt"></div>
            </div>
        </div>

        <div class="col-sm-12 col-md-12">
            <div class="col-md-12 col-sm-12 form-group">
              <label for="service_id">Conference Room Type</label>
              <select class="form-control" id="conf_room_type" name="conf_room_type" value="@if(isset($room)){{ $room->conf_room_type }}@endif">
                  
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
                @if(isset($room) && $room->conf_calendar_available == 1)
                  <input type="checkbox" name="conf_calender_available"  id="conf_calender_available" class="custom-control-input" checked="checked">
                  <span class="custom-control-indicator"></span>
                  Calender Available
                @else
                  <input type="checkbox" name="conf_calender_available"  id="conf_calender_available" class="custom-control-input" >
                  <span class="custom-control-indicator"></span>
                  Calender Available
                @endif

              </label>                             
            </div>

            <div class="col-sm-6 col-md-6 form-group">
              <label class="custom-control custom-checkbox">
                @if(isset($room) && $room->conf_available_users == 1)
                  <input type="checkbox" name="conf_available_users" id="conf_available_users" class="custom-control-input" checked="checked">
                  <span class="custom-control-indicator"></span>
                  Available User
                @else
                  <input type="checkbox" name="conf_available_users" id="conf_available_users" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  Available User
                @endif
              </label>
            </div>
        </div>

        <div class="col-sm-12 col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">Sitting Arrangment</div>
            </div>
            <div class="panel-body">

              @if(isset($room))

              <div class="pull-right">
                <button class="btn btn-primary addSitting" type="button"><i class="fa fa-plus"></i> Add</button>
              </div>
              <div class="row sittingArrangments">


                @if(isset($imageFiles))

                  @for($i = 0 ; $i < count($imageFiles) ; $i++)
                    <?php $x = 0 ?>
                    @for($j = 0 ; $j < count($imageFiles[$i]) ; $j++)

                      <input type="hidden" class="image-files" data-images="{{ json_encode($imageFiles[$i][$j]) }}" data-index="{{$i}}">

                    @endfor
                    <?php $x++ ?>
                  @endfor

                @endif


                @foreach($roomSittingArrangments as $roomSittingArrangment)

                <input type="hidden" name="sittingArrangId[]" value="@if(isset($room)){{ $roomSittingArrangment->id }}@endif">

                <div class="row">

                  <div class="col-sm-12 col-sm-12">
                      <div class="col-sm-4 col-md-4 form-group">
                        <label for="sitting_name">Sitting Name</label>
                        <input type="text" name="sitting_name[]" id="sitting_name" class="form-control sittingNameField" value="@if(isset($room)){{ $roomSittingArrangment->name }}@endif">
                      </div>

                      <div class="col-sm-4 col-md-4 form-group">
                        <label for="sitting_number_person">Number of Person</label>
                        <input type="number"  min="0" name="sitting_number_person[]" id="sitting_number_person" class="form-control" value="@if(isset($room)){{ $roomSittingArrangment->number_persons }}@endif">
                      </div> 

                      <div class="col-sm-2 col-md-4 form-group">
                      </div>                     
                  </div>

                  <div class="col-sm-12 col-md-12 form-group">
                    <input type="file" name="files0" class="uploadFiles">
                  </div>

                </div>

                @endforeach


              @else
              
              <div class="pull-right">
                <button class="btn btn-primary addSitting" type="button"><i class="fa fa-plus"></i> Add</button>
              </div>
              <div class="row sittingArrangments">

                <div class="row">                  
                  <div class="col-sm-12 col-sm-12">
                      <div class="col-sm-4 col-md-4 form-group">
                        <label for="sitting_name">Sitting Name</label>
                        <input type="text" name="sitting_name[]" id="sitting_name" class="form-control sittingNameField" >
                      </div>

                      <div class="col-sm-4 col-md-4 form-group">
                        <label for="sitting_number_person">Number of Person</label>
                        <input type="number"  min="0" name="sitting_number_person[]" id="sitting_number_person" class="form-control" >
                      </div> 

                      <div class="col-sm-2 col-md-4 form-group">
                      </div>                     
                  </div>
                  <div class="col-sm-12 col-md-12 form-group">
                    <input type="file" name="files0" class="uploadFiles">
                  </div>
                </div>

                @endif



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

              @if(isset($roomEquipments) && isset($room))

              @foreach($roomEquipments as $roomEquipment)

              <input type="hidden" name="roomEquipmentId[]" value="@if(isset($room)){{ $roomEquipment->id }}@endif">

              <div class="row includedItem">
                  <div class="row col-sm-12 col-sm-12 included">
                      <div class="col-sm-3 col-md-3 form-group">
                        <label for="include_equipment_id">Item</label>
                        <select class="form-control" id="include_equipment_id" name="include_equipment_id[]">
                            <!-- <option value="">Select</option> -->
                            @foreach ($equipments as $equipment)

                              @if($roomEquipment->equipment_id == $equipment->id)
                                <option value="{{ $equipment->id }}" selected="selected">{{$equipment->title }}</option>
                              @else
                                <option value="{{ $equipment->id }}">{{$equipment->title }}</option>
                              @endif

                            @endforeach
                        </select>
                      </div>
                      <div class="col-sm-2 col-md-2 form-group">
                        <label for="include_qty">Quantity</label>
                        <input type="number"  min="0" name="include_qty[]" value="@if(isset($room)){{ $roomEquipment->qty }}@endif" id="include_qty" class="form-control" >
                      </div>
                      <div class="col-sm-2 col-md-2 form-group">
                        <label for="include_price">Price</label>
                        <input type="number"  min="0" name="include_price[]" value="@if(isset($room)){{ $roomEquipment->price }}@endif" id="include_price" class="form-control" >
                      </div>
                      <div class="col-sm-4 col-md-4 form-group">
                        <label for="include_info">Information</label>
                        <input type="text" name="include_info[]" value="@if(isset($room)){{ $roomEquipment->info }}@endif" id="include_info" class="form-control" >
                      </div>
                      <div class="col-sm-1">
                      </div>
                  </div>
              </div>

              @endforeach

              @else

              <div class="row includedItem">
                  <div class="row col-sm-12 col-sm-12 included">
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
                        <input type="number"  min="0" name="include_qty[]" id="include_qty" class="form-control" >
                      </div>
                      <div class="col-sm-2 col-md-2 form-group">
                        <label for="include_price">Price</label>
                        <input type="number"  min="0" name="include_price[]" id="include_price" class="form-control" >
                      </div>
                      <div class="col-sm-4 col-md-4 form-group">
                        <label for="include_info">Information</label>
                        <input type="text" name="include_info[]" id="include_info" class="form-control" >
                      </div>
                      <div class="col-sm-1">
                      </div>
                  </div>
              </div>

              @endif

            </div>            
          </div>
        </div>

        <input type="hidden" id="ctc" value="@if(isset($room)){{ $room->conf_termination_cond }}@endif">
        <input type="hidden" id="cii" value="@if(isset($room)){{ $room->conf_info_internal }}@endif">
        <input type="hidden" id="cics" value="@if(isset($room)){{ $room->conf_info_customer_se }}@endif">
        <input type="hidden" id="cice" value="@if(isset($room)){{ $room->conf_info_customer_en }}@endif">
        <input type="hidden" id="cits" value="@if(isset($room)){{ $room->conf_info_technical_se }}@endif">
        <input type="hidden" id="cite" value="@if(isset($room)){{ $room->conf_info_technical_en }}@endif">

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
            <textarea id="conf_info_customer_se"  name="conf_info_customer_se" required="required"></textarea>
            <div class="errorTxt" id="errorSN2"></div>
        </div>

        <div class="col-sm-12">
            <label for="conf_info_customer_en">Information Customer EN</label>
            <textarea id="conf_info_customer_en"  name="conf_info_customer_en" required="required"></textarea>
            <div class="errorTxt" id="errorSN3"></div>
        </div>

        <div class="col-sm-12">
            <label for="conf_info_technical_se">Information Technical SE</label>
            <textarea id="conf_info_technical_se"  name="conf_info_technical_se" required="required"></textarea>
            <div class="errorTxt" id="errorSN4"></div>
        </div>

        <div class="col-sm-12">
            <label for="conf_info_technical_en">Information Technical EN</label>
            <textarea id="conf_info_technical_en"  name="conf_info_technical_en" required="required"></textarea>
            <div class="errorTxt" id="errorSN5"></div>
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
              <input type="number"  min="0" id="rent_monthly_rent" name="rent_monthly_rent" class="form-control" value="@if(isset($room)){{ $room->rent_monthly_rent }}@endif">
              <div class="errorTxt"></div>          
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="number_person">Number Person</label>
              <input type="number"  min="0" id="rent_number_person" name="rent_number_person" class="form-control" value="@if(isset($room)){{ $room->rent_num_persons }}@endif">
              <div class="errorTxt"></div>
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-6 col-md-6 form-group">
              <label for="vat">VAT</label>
              <input type="number"  min="0" id="rent_vat" name="rent_vat" class="form-control" value="@if(isset($room)){{ $room->rent_vat }}@endif">
              <div class="errorTxt"></div> 
            </div>
            <div class="col-sm-6 col-md-6 form-group">
              <label for="new_price">New Price</label>
              <input type="number"  min="0" id="rent_new_price" name="rent_new_price" class="form-control" value="@if(isset($room)){{ $room->rent_new_price }}@endif">
              <div class="errorTxt"></div>
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="panel">
              <div class="panel-heading">
                <div class="panel-title">What included in this room.?</div>
              </div>
              <div class="panel-body">
                <div class="pull-right">
                  <button class="btn btn-primary addIncludedRent" type="button"><i class="fa fa-plus"></i>&nbsp;Add</button>
                </div>

                @if(isset($roomEquipments) && isset($room))

                @foreach($roomEquipments as $roomEquipment)

                <input type="hidden" name="roomEquipmentId[]" value="@if(isset($room)){{ $roomEquipment->id }}@endif">

                <div class="row includedItemRent">
                    <div class="col-sm-12 col-sm-12 included">
                        <div class="col-sm-3 col-md-3 form-group">
                          <label for="">Item</label>
                          <select class="form-control" name="include_equipment_id_rent[]">
                              <!-- <option value="">Select</option> -->
                              @foreach ($equipments as $equipment)
                              
                                @if($roomEquipment->equipment_id == $equipment->id)
                                  <option value="{{ $equipment->id }}" selected="selected">{{$equipment->title }}</option>
                                @else
                                  <option value="{{ $equipment->id }}">{{$equipment->title }}</option>
                                @endif

                              @endforeach
                          </select>
                        </div>
                        <div class="col-sm-2 col-md-2 form-group">
                          <label for="include_qty">Quantity</label>
                          <input type="number"  min="0" name="include_qty_rent[]" class="form-control" value="@if(isset($room)){{ $roomEquipment->qty }}@endif">
                        </div>
                        <div class="col-sm-2 col-md-2 form-group">
                          <label for="include_price">Price</label>
                          <input type="number"  min="0" name="include_price_rent[]" class="form-control" value="@if(isset($room)){{ $roomEquipment->price }}@endif">
                        </div>
                        <div class="col-sm-4 col-md-4 form-group">
                          <label for="include_info">Notes</label>
                          <input type="text" name="include_info_rent[]" class="form-control" value="@if(isset($room)){{ $roomEquipment->info }}@endif">
                        </div>
                        <div class="col-sm-1">
                        </div>
                    </div>
                </div>

                @endforeach

                @else

                <div class="row includedItemRent">
                    <div class="col-sm-12 col-sm-12 included">
                        <div class="col-sm-3 col-md-3 form-group">
                          <label for="">Item</label>
                          <select class="form-control" name="include_equipment_id_rent[]">
                              <!-- <option value="">Select</option> -->
                              @foreach ($equipments as $equipment)
                                  <option value="{{ $equipment->id }}">{{$equipment->title }}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="col-sm-2 col-md-2 form-group">
                          <label for="include_qty">Quantity</label>
                          <input type="number"  min="0" name="include_qty_rent[]" class="form-control" >
                        </div>
                        <div class="col-sm-2 col-md-2 form-group">
                          <label for="include_price">Price</label>
                          <input type="number"  min="0" name="include_price_rent[]" class="form-control" >
                        </div>
                        <div class="col-sm-4 col-md-4 form-group">
                          <label for="include_info">Notes</label>
                          <input type="text" name="include_info_rent[]" class="form-control" >
                        </div>
                        <div class="col-sm-1">
                        </div>
                    </div>
                </div>

                @endif
              </div>            
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
            <div class="col-sm-4 col-md-4 form-group">
              <label for="service_id">Room Type</label>
              <select class="form-control" id="rent_room_type" name="rent_room_type" value="@if(isset($room)){{ $room->rent_room_type }}@endif">
                   @if(isset($room))
                        <option value="{{ $room->rent_room_type }}" <?php echo "selected"; ?> >
                          @else
                        </option>
                  <option value="">Select</option>
                  <option value="hall">Hall</option>
                  <option value="study">Study</option>
                  <option value="meeting">Meeting</option>
                  @endif
              </select>
              <div class="errorTxt"></div>
            </div>
              <span class="col-sm-4 col-md-4 form-group">
                  <label for="rent_start_date">Start Date</label>
                  <input type="text" id="rent_start_date" name="rent_start_date" class="form-control" value="@if(isset($room)){{ $room->rent_start_date }}@endif">
                  <div class="errorTxt"></div>
                  <!-- <input type="text" id="daterange-3" value="10/24/1984" class="form-control"> -->
              </span>
              @if(isset($room))
              <span class="col-sm-4 col-md-4 form-group">
                  <label for="rent_end_date">End Date</label>
                  <input type="text" id="rent_end_date_edit" value="@if(isset($room)){{ $room->rent_end_date }}@endif" name="rent_end_date" class="form-control">
                  <div class="errorTxt"></div>
              </span>
          @else
              <span class="col-sm-4 col-md-4 form-group">
                  <label for="rent_end_date">End Date</label>
                  <input type="text" id="rent_end_date" value="@if(isset($room)){{ $room->rent_end_date }}@endif" name="rent_end_date" class="form-control">
                  <div class="errorTxt"></div>
              </span>

          @endif
          </div>


          <div class="col-sm-12 col-md-12">
              <span class="col-sm-4 col-md-4 form-group">
                <label class="custom-control custom-checkbox m-t-4">
                  <input type="checkbox" name="rent_end_date_continue" id="rent_end_date_continue" class="custom-control-input" value="@if(isset($room)){{ $room->rent_end_date }}@endif">
                  <span class="custom-control-indicator"></span>
                  Continue
                </label>  
              </span>
              <span class="col-sm-4 col-md-4 form-group">
                <label class="custom-control custom-checkbox m-t-4">
                  @if(isset($room) && $room->rent_calendar_available == 1)
                    <input type="checkbox" name="rent_calender_available" id="rent_calender_available" class="custom-control-input" checked="checked">
                    <span class="custom-control-indicator"></span>
                    Calender Available
                  @else
                    <input type="checkbox" name="rent_calender_available" id="rent_calender_available" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    Calender Available
                  @endif
                </label>                             
              </span>
              <span class="col-sm-4 col-md-4 form-group">
                <label class="custom-control custom-checkbox m-t-4">
                  @if(isset($room) && $room->rent_available_users == 1)
                    <input type="checkbox" name="rent_available_users" id="rent_available_users" class="custom-control-input" checked="checked">
                    <span class="custom-control-indicator"></span>
                    Available User
                  @else
                    <input type="checkbox" name="rent_available_users" id="rent_available_users" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    Available User
                  @endif
                </label>
              </span>
          </div>

          <div class="col-sm-12 col-md-12">
            



              
          </div>

          <input type="hidden" id="notes" value="@if(isset($roomNote)){{ $roomNote->note }}@endif">

          <div class="col-sm-12 col-md-12" id="notes">
            <div class="col-sm-12 col-md-12 form-group">
              <label for="rent_notes">Notes</label>
              <textarea type="text" id="rent_notes" name="rent_notes" class="form-control" required="required"></textarea>
              <div class="errorTxt" id="errorNotes"></div>
            </div>
          </div>

        </div>
    </div>
  </div> 
</div>

<div class="col-xs-12 col-sm-12 col-md-12 m-t-2">
    <button type="submit" class="btn btn-primary">@if(isset($room)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i>  Create @endif</button>
    <a href="{!! route('company.rooms.index') !!}" class="btn btn-default"><i class="fa fa-times"></i>&nbsp;Cancel</a>
</div>

@section('js')

<script type="text/javascript">

  var editRoom = "{{ isset($room) ? $room->id: 0 }}";

  $('#notes').hide();

  if(editRoom != 0)
  {
    $('#notes').show();

    $('#conf_termination_cond').val($('#ctc').val());
    $('#conf_info_internal').val( $('#cii').val());
    $('#conf_info_customer_se').val( $('#cics').val());
    $('#conf_info_customer_en').val( $('#cice').val());
    $('#conf_info_technical_se').val( $('#cits').val());
    $('#conf_info_technical_en').val( $('#cite').val());
    $('#rent_notes').val( $('#notes').val() );


    var room_type = $('#room_module_type').val();

    console.log(room_type);

    if(room_type == 'rental')
    {
        $('#conference').hide();
        $('#rental').show();
    }
    else if(room_type == 'conference')
    {
        $('#conference').show();
        $('#rental').hide();
    }

  }
  else
  {
      $('#conference').hide();
      $('#rental').show();
  }


    var i = 0;
    var imgList = [];
    var count = 0;
    $('.image-files').each(function(index,fields){

      if($(this).attr('data-index') == i)
      {
        // console.log(i);
        imgList[count] = $(this).attr('data-images');
        count = count + 1;
      }
      else
      {
        imgList[count] = "-";
        count = count + 1;
        imgList[count] = $(this).attr('data-images');
        count = count + 1;
        i = i + 1;        
      }

    });

    var seprators = [];
    var x = 0;
    var countItem = 0;
    for(var y = 0 ; y < imgList.length ; y++)
    {
        
        if(imgList[y] == "-")
        {
          seprators[x] = countItem;
          x++;
          countItem = 0; 
        }
        else
        {
          countItem++;
        }
    }
    seprators[x] = countItem;

    // for(var i = 0 ; i < imgList.length ; i++)
    // {        
    //     console.log( imgList[i]);
    // }

    // console.log( seprators);

    // var images = [];
    // var cursor = 0;
    
    // for(var j = 0 ; j < seprators.length ; j++)
    // {
    //   for(var k = 0 ; k < seprators[j] ; k++)
    //   {
    //     images[j][k] = imgList[cursor];
    //     cursor++;          
    //   }
    //   cursor = cursor + 2; 
    // }

    // console.log(images);




    <?php
      $data = [];
      if(isset($imageFiles))
      {
        for($i = 0 ; $i < count($imageFiles) ; $i++ )
        {
          for($j = 0 ; $j < count($imageFiles[$i]) ; $j++ )
          {
            $data[$i][$j] = $imageFiles[$i][$j];
          }
        }
      }
     ?>
     var images = <?php echo json_encode($data); ?>

     console.log(images);


/*    var data = [ 

    [ $.parseJSON(imgList[0]) , $.parseJSON(imgList[1]) , $.parseJSON(imgList[2]) ],
    [ $.parseJSON(imgList[4]) , $.parseJSON(imgList[5]) , $.parseJSON(imgList[6]) ], 
    [ $.parseJSON(imgList[8]) , $.parseJSON(imgList[9]) , $.parseJSON(imgList[10]) , $.parseJSON(imgList[11]) ]

    ];
    console.log(data);*/



    $('.uploadFiles').each(function(index,value){

      $(this).fileuploader({
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
             files: images[index],
             limit: null,
             fileMaxSize:2,
             extensions: ['jpg','gif','png','jpeg','bmp'],
            onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){

                var jsObj = {
                  'image' : itemEl.name
                };

                console.log(jsObj);

                $.ajax({
                  url : "{{ route('company.rooms.image_remove') }}",
                  type : "POST",
                  data : jsObj,
                  dataType : "json",
                  success : function(response){
                    // alert(response.msg);
                  }
                });
            },
        });
    });






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
            return this.optional(element) || /^\d{0,11}(\.\d{0,2})?$/i.test(value);
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
                    greaterThan: "#start_date" 
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
                    greaterThan: "#rent_start_date"
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

        messages: {
          'name': {
            required: "Please enter the name",
          },
          'include_equipment_id': {
            required: "Please enter the include equipment id",
          },
          'include_qty': {
            required: "Please enter the include qty",
          },
          'include_price': {
            required: "Please enter the include price",
          },
          'include_info': {
            required: "Please enter the include info",
          },
          'sitting_name': {
            required: "Please enter the sitting name",
          },
          'sitting_number_person': {
            required: "Please enter the sitting number person",
          },
          'floor_id': {
            required: "Please select floor",
          },
          'service_id': {
            required: "Please select service",
          },
          'address': {
            required: "Please enter the address",
          },
          'area': {
            required: "Please enter the area",
          },
          'price': {
            required: "Please enter the price",
          },
          'security_code': {
            required: "Please enter the security code",
          },
          'sort_index': {
            required: "Please enter the sort index",
          },
          'article_number': {
            required: "Please enter the article number",
          },
          'public_name': {
            required: "Please enter the public name",
          },
          'SQNA': {
            required: "Please enter the SQNA",
          },
          'building_id': {
            required: "Please select building",
          },
          'start_date': {
            required: "Please enter the start date",
          },
          'end_date': {
            required: "Please enter the end date",
          },
          'rent_monthly_rent': {
            required: "Please enter the monthly rent",
          },
          'rent_number_person': {
            required: "Please enter the number person",
          },
          'rent_vat': {
            required: "Please enter the vat",
          },
          'rent_new_price': {
            required: "Please enter the new price",
          },
          'rent_start_date': {
            required: "Please enter the start date",
          },
          'rent_end_date': {
            required: "Please enter the end date",
          },
          'rent_room_type': {
            required: "Please enter the room type",
          },
          'conf_day_price': {
            required: "Please enter the conf day price",
          },
          'conf_half_day_price': {
            required: "Please enter the conf half day price",
          },
          'conf_room_type': {
            required: "Please enter the conf room type",
          },
          'conf_cost': {
            required: "Please enter the conf cost",
          },
          'conf_sm_price': {
            required: "Please enter the conf sm price",
          },
          'conf_high_price': {
            required: "Please enter the conf high price",
          },
          'conf_medium_price': {
            required: "Please enter the conf medium price",
          },
          'conf_low_price': {
            required: "Please enter the conf low price",
          },
          'conf_termination_cond': {
            required: "Please enter the conf termination cond",
          },
          'conf_vat': {
            required: "Please enter the conf vat",
          },
          'conf_calender_available': {
            required: "Please enter the ",
          },
          'conf_info_internal': {
            required: "Please enter the conf calender available",
          },
          'conf_info_customer_se': {
            required: "Please enter the conf info customer se",
          },
          'conf_info_customer_en': {
            required: "Please enter the conf info customer en",
          },
          'conf_info_technical_se': {
            required: "Please enter the conf info technical se",
          },
          'conf_info_technical_en': {
            required: "Please enter the conf info technical en",
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


        //  Sitting Arrangment Start
        var sittingCount = 0;
        $('.addSitting').click(function(){
          sittingCount++;
          var sitting = '<div class="row">';
          sitting += '<div class="col-sm-12 col-sm-12">';
          sitting += '<div class="col-sm-4 col-md-4 form-group">';
          sitting += '<label for="sitting_name">Sitting Name</label>';
          sitting += '<input type="text" name="sitting_name[]" id="sitting_name" class="form-control sittingNameField" >';
          sitting += '</div>';
          sitting += '<div class="col-sm-4 col-md-4 form-group">';
          sitting += '<label for="sitting_number_person">Number of Person</label>';
          sitting += '<input type="number"  min="0" name="sitting_number_person[]" id="sitting_number_person" class="form-control" >';
          sitting += '</div>'; 
          sitting += '<div class="col-sm-2 col-md-4 form-group">';
          sitting += '<i class="fa fa-times fa-lg remove-sitting cursor-p m-t-4 pull-right"></i>';
          sitting += '</div>';                     
          sitting += '</div>';
          sitting += '<div class="col-sm-12 col-md-12 form-group">';
          sitting += '<input type="file" name="files'+sittingCount+'" class="uploadFiles">';
          sitting += '</div>';
          sitting += '</div>';
          $('.sittingArrangments').prepend(sitting);
          fileUploader(sittingCount);
        });

        $(document).on('click', '.remove-sitting', function(){
          $(this).parent().parent().parent().remove();
        });

        // Sitting Arrangment For Rent 
        $('.addIncludedRent').click(function(){
          var included = '';
          $.ajax({
            url : "{{ route('company.room.equipments') }}",
            type : "GET",
            dataType : "json",
            success : function(response){
                included += '<div class="col-sm-12 col-sm-12 included">';
                included += '<div class="col-sm-3 col-md-3 form-group">';
                included += '<label for="">Item</label>';
                included += '<select class="form-control" name="include_equipment_id_rent[]">';
                // included += '<option value="">Select</option>';
                for(var i = 0 ; i<response.length ; i++)
                {
                  included += '<option value="'+response[i].id+'">'+response[i].title+'</option>';
                }
                included += '</select>';
                included += '</div>';
                included += '<div class="col-sm-2 col-md-2 form-group">';
                included += '<label for="">Quantity</label>';
                included += '<input type="number"  min="0" name="include_qty_rent[]" class="form-control" >';
                included += '</div>';
                included += '<div class="col-sm-2 col-md-2 form-group">';
                included += '<label for="">Price</label>';
                included += '<input type="number"  min="0" name="include_price_rent[]" class="form-control" >';
                included += '</div>';
                included += '<div class="col-sm-4 col-md-4 form-group">';
                included += '<label for="">Notes</label>';
                included += '<input type="text" name="include_info_rent[]" class="form-control" >';
                included += '</div>';
                included += '<div class="col-sm-1">';
                included += '<i class="fa fa-times fa-lg remove-included-rent cursor-p m-t-4"></i>';
                included += '</div>';
                included += '</div>';
            }
          }).done(function(){
              $('.includedItemRent').prepend(included);
          });
        });

        $(document).on('click','.remove-included-rent',function(){
          $(this).parent().parent().remove();
        });


        // Sitting Arrangment For Conference
        $('.addIncluded').click(function(){
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
                included += '<input type="number"  min="0" name="include_qty[]" id="include_qty" class="form-control" >';
                included += '</div>';
                included += '<div class="col-sm-2 col-md-2 form-group">';
                included += '<label for="">Price</label>';
                included += '<input type="number"  min="0" name="include_price[]" class="form-control" >';
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
                      $('.select2-example').select2({
                        placeholder: 'Select Services',
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
          if (editRoom == 0) {
          $('#room_area').val('0.00');            
          $('#room_price').val('0.00');            
          $('#sort_index').val('0.00');            
          $('#rent_monthly_rent').val('0.00');            
          $('#rent_number_person').val('0.00');            
          $('#rent_vat').val('0.00');            
          $('#include_qty').val('0.00');            
          $('#include_price').val('0.00');            
          $('#conf_high_price').val('0.00');
          }

          fileUploader();

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
            format: 'Y-MM-DD'
        }
      });

      $('#end_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        startDate : moment().add('years',1),
        locale: {
            format: 'Y-MM-DD'
        }
      });

      $('#end_date_edit').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'Y-MM-DD'
        }
      });


      $('#rent_start_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'Y-MM-DD'
        }
      });

      $('#rent_end_date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        startDate : moment().add('years',1),
        locale: {
            format: 'Y-MM-DD'
        }
      });

      $('#rent_end_date_edit').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        locale: {
            format: 'Y-MM-DD'
        }
      });

    // Initialize Summernote
    $(function() {
      $('#rent_notes').summernote({
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