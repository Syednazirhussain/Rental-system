<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($roomSettingArrangment))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">

    <div class="col-sm-12 form-group">
        <label for="building_id">Building</label>
        <select class="form-control select2-example" name="building_id" id="building_id" data-placeholder="Select Building">
            <option></option>
            @if(isset($buildings))
                @foreach($buildings as $building)
                    @if(isset($roomSettingArrangment) && $roomSettingArrangment->building_id == $building->id)
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
            @if(isset($roomSettingArrangment))
                <option value="{{ $roomSettingArrangment->room_id }}" selected="selected">{{ $roomSettingArrangment->room->name }}</option>
            @endif
        </select>
        <div class="col-md-2"><span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>
    </div>

    <div class="col-sm-12 form-group">
        <label for="name">Sitting Arrangment Name</label>
        <input type="text" id="name" name="name" placeholder="enter sitting arrangment name" class="form-control" value="@if(isset($roomSettingArrangment)){{ $roomSettingArrangment->name }}@endif">
    </div>

    <div class="col-sm-12 form-group" id="service_price">
        <label for="number_persons">Number Person</label>
        <input type="number" name="number_persons" id="number_persons" placeholder="enter number person" class="form-control" value="@if(isset($roomSettingArrangment)){{ $roomSettingArrangment->number_persons }}@endif">
    </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($roomSettingArrangment)) <i class="fa fa-refresh"></i>  Update  @else <i class="fa fa-plus"></i>  Add  @endif</button>
        <a href="{!! route('company.roomSettingArrangments.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>


@section('js')
    <script type="text/javascript">

        $(function() {
          $('#building_id').select2({
          });
        });

        $(function() {
          $('#room_id').select2({
            placeholder: 'Select Room',
          });
        });

        $(document).ready(function() {

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
                              $('#loader').css("visibility", "visible");
                          },
                          success:function(data) {

                              $('select[name="room_id"]').empty();

                              $.each(data, function(key, value){

                                  $('select[name="room_id"]').append('<option value="'+ key +'">' + value + '</option>');

                              });
                          },
                          complete: function(){
                              $('#loader').css("visibility", "hidden");
                          }
                      });
                  } else {
                      $('select[name="room_id"]').empty();
                  }
            });

        });
       

        // Initialize validator
        $('#roomSittingForm').pxValidate({
            focusInvalid: false,
            rules: {
                'building_id': {
                    required: true,
                },
                'room_id': {
                    required: true,
                },
                'name': {
                    required: true,
                },
                'number_persons': {
                    required: true,
                    digits : true
                },
            },

            messages: {
                'name': {
                    required: "Please enter the sitting arrangment name !",
                }
            }
        });

    </script>
@endsection
