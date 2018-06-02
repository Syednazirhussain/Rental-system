<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($roomNotes))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">

    <div class="col-sm-12 form-group">
        <label for="building_id">Building</label>
        <select class="form-control select2-example" name="building_id" id="building_id" data-placeholder="Select Building">
            <option></option>
            @if(isset($buildings))
                @foreach($buildings as $building)
                    @if(isset($roomNotes) && $roomNotes->building_id == $building->id)
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
            @if(isset($roomNotes))
                <option value="{{ $roomNotes->room_id }}" selected="selected">{{ $roomNotes->room->name }}</option>
            @endif
        </select>
        <div class="col-md-2"  id="loader_room"><span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>
    </div>


    <div class="col-sm-12 form-group">
        <label for="user_id">User</label>
        <select class="form-control select2-example" name="user_id" id="user_id" data-placeholder="Select User">
            <option></option>
            @if(isset($users))
                @foreach($users as $user)
                    @if(isset($roomNotes) && $roomNotes->user_id == $user->id)
                        <option value="{{ $user->id }}" selected="selected">{{ $user->name }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            @endif
        </select>
    </div>

    <div class="col-sm-12 form-group" id="service_price">
        <label for="note">Notes</label>
        <input type="text" name="note" id="note" placeholder="enter quantity here" class="form-control" value="@if(isset($roomNotes)){{ $roomNotes->note }}@endif">
    </div>

    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($roomNotes)) <i class="fa fa-refresh"></i>  Update  @else <i class="fa fa-plus"></i>  Add  @endif</button>
        <a href="{!! route('company.roomNotes.index') !!}" class="btn btn-default"><i class="fa fa-times"></i>&nbsp;Cancel</a>
    </div>
</div>


@section('js')
    <script type="text/javascript">

        // Initialize validator
        $('#roomNotesForm').pxValidate({
            focusInvalid: false,
            rules: {
                'building_id': {
                    required: true,
                },
                'room_id': {
                    required: true,
                },
                'user_id': {
                    required: true,
                },
                'note': {
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
          $('#user_id').select2({
            placeholder: 'Select User',
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
