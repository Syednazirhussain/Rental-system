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
        <div class="col-md-2"  id="loader_room"><span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>
    </div>

    <div class="col-sm-12 form-group">
        <label for="sitting_id">Room Sitting Arrangement</label>
        <select class="form-control select2-example" name="sitting_id" id="sitting_id">
            <option value="">Select</option>
            @if(isset($roomSettingArrangment))
                <option value="{{ $roomSettingArrangment->room_id }}" selected="selected">{{ $roomSettingArrangment->room->name }}</option>
            @endif
        </select>
        <div class="col-md-2"  id="loader_sitting"><span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>
    </div>


    <div class="col-sm-12 form-group">
      <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">

                    @if( isset($roomLayout) && $roomLayout->image != "default.png")
                        <img src="{{ asset('storage/room_layouts_images/'.$roomLayout->image) }}" >
                    @else
                        <img src="{{ asset('/skin-1/assets/images/default.png') }}" >
                    @endif

              </div>
              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
              <div>
                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                    <input type="file" name="image_file" id="image_file"></span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
              </div>
        </div>
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

                      }).done(function(data){

                        var arr = Object.keys(data);

                        getRoomSittingArrangment( arr[0] );

                      });
                  } else {
                      $('select[name="room_id"]').empty();
                  }
            });




        });


        function getRoomSittingArrangment(roomId)
        {
            if(roomId) {
              var route = "{{ url('/') }}/company/roomSittingArrangment/"+roomId;
                $.ajax({
                    url: route,
                    type:"GET",
                    dataType:"json",
                    beforeSend: function(){
                        $('#loader_sitting').show();
                        $('#loader').css("visibility", "visible");
                        
                    },
                    success:function(data) {

                        $('select[name="sitting_id"]').empty();

                        $.each(data, function(key, value){

                            $('select[name="sitting_id"]').append('<option value="'+ key +'">' + value + '</option>');

                        });
                    },
                    complete: function(){

                        $('#loader_sitting').hide();
                        $('#loader').css("visibility", "visible");
                        
                    },

                });
            } else {
                $('select[name="sitting_id"]').empty();
            }
        }
       

        // Initialize validator
        $('#roomImagesForm').pxValidate({
            focusInvalid: false,
            rules: {
                'building_id': {
                    required: true,
                },
                'room_id': {
                    required: true,
                },
                'sitting_id': {
                    required: true,
                },
                'image_file': {
                    required: true,
                }
            }
        });

    </script>
@endsection
