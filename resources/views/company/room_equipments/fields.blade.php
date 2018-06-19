<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($roomEquipments))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">

    <div class="col-sm-12 form-group">
        <label for="building_id">Building</label>
        <select class="form-control select2-example" name="building_id" id="building_id" data-placeholder="Select Building">
            <option></option>
            @if(isset($buildings))
                @foreach($buildings as $building)
                    @if(isset($roomEquipments) && $roomEquipments->building_id == $building->id)
                        <option value="{{ $building->id }}" selected="selected">{{ $building->name }}</option>
                    @else
                        <option value="{{ $building->id }}">{{ $building->name }}</option>
                    @endif
                @endforeach
            @endif
        </select>
    </div>

    <div class="col-sm-12 form-group">
        <label for="room_id">Room</label>
        <select class="form-control select2-example" name="room_id" id="room_id">
            <option value="">Select</option>
            @if(isset($roomEquipments))
                <option value="{{ $roomEquipments->room_id }}" selected="selected">{{ $roomEquipments->room->name }}</option>
            @endif
        </select>
        <div class="col-md-2"  id="loader_room"><span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>
    </div>

    <div class="col-sm-12 form-group">
        <label for="room_id">Room Type</label>
        <select class="form-control select2-example" name="room_type" id="room_type">
            <option value="">Select</option>
            @if(isset($roomEquipments))
              @if($roomEquipments->room_type == 'rental')
                <option value="rental" selected="selected">Rental</option>
                <option value="conference">Conference</option>
              @elseif($roomEquipments->room_type == 'conference')
                <option value="rental">Rental</option>
                <option value="conference" selected="selected">Conference</option>
              @endif
            @else
              <option value="rental">Rental</option>
              <option value="conference">Conference</option>
            @endif
        </select>
    </div>

    <div class="col-sm-12 form-group">
        <label for="equipment_id">Equipments</label>
        <select class="form-control select2-example" name="equipment_id" id="equipment_id" data-placeholder="Select Equipments">
            <option></option>
            @if(isset($equipments))
                @foreach($equipments as $equipment)
                    @if(isset($roomEquipments) && $roomEquipments->equipment_id == $equipment->id)
                        <option value="{{ $equipment->id }}" selected="selected">{{ $equipment->title }}</option>
                    @else
                        <option value="{{ $equipment->id }}">{{ $equipment->title }}</option>
                    @endif
                @endforeach
            @endif
        </select>
    </div>

    <div class="col-sm-12 form-group" id="service_price">
        <label for="qty">Quantity</label>
        <input type="number" name="qty" id="qty" placeholder="enter quantity here" class="form-control" value="@if(isset($roomEquipments)){{ $roomEquipments->qty }}@endif">
    </div>

    <div class="col-sm-12 form-group" id="service_price">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" placeholder="enter price here" class="form-control" value="@if(isset($roomEquipments)){{ $roomEquipments->price }}@endif">
    </div>

    <div class="col-sm-12 form-group" id="service_price">
        <label for="info">Information</label>
        <input type="text" name="info" id="info" placeholder="enter info here" class="form-control" value="@if(isset($roomEquipments)){{ $roomEquipments->info }}@endif">
    </div>

    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($roomEquipments)) <i class="fa fa-refresh"></i>  Update  @else <i class="fa fa-plus"></i>  Add  @endif</button>
        <a href="{!! route('company.roomEquipments.index') !!}" class="btn btn-default"><i class="fa fa-times"></i>&nbsp;Cancel</a>
    </div>
</div>


@section('js')
    <script type="text/javascript">

        // Initialize validator
        $('#roomEquipmentsForm').pxValidate({
            focusInvalid: false,
            rules: {
                'building_id': {
                    required: true,
                },
                'room_id': {
                    required: true,
                },
                'room_type': {
                    required: true,
                },
                'equipment_id': {
                    required: true,
                },
                'qty': {
                    required: true,
                },
                'price': {
                    required: true,
                },
                'info': {
                    required: true,
                }
            }
        });

        $(function() {
          $('#building_id').select2({
          });
        });

        $(function() {
          $('#room_id').select2({
            placeholder: 'Select Room',
          });
        });

      
        $(function() {
          $('#room_type').select2({
            placeholder: 'Select Room Type',
          });
        });

        $(function() {
          $('#equipment_id').select2({
            placeholder: 'Select Equipments',
          });
        });

        $(document).ready(function() {

            $('#loader_room').hide();
            $('#loader_sitting').hide();

            $('#loader').css("visibility", "hidden");

            $('#building_id').on('change', function(){


                  var buildingId = $(this).val();
                  
                  var route = "{{ url('/') }}/company/room/"+buildingId;
                  
                  if(buildingId) {
                      $.ajax({
                          url: route,
                          type:"GET",
                          dataType:"json",
                          beforeSend: function(){
                              $('#loader_room').show();
                              $('#loader').css("visibility", "visible");
                              
                          },
                          success:function(data) {

                              $('select[name="room_id"]').empty();

                              $.each(data, function(key, value){

                                  $('select[name="room_id"]').append('<option value="'+ key +'">' + value + '</option>');

                              });
                          },
                          complete: function(){

                              $('#loader_room').hide();
                              $('#loader').css("visibility", "visible");
                              
                          },

                      });

                  } else {
                      $('select[name="room_id"]').empty();
                  }
            });
        });

    </script>
@endsection
