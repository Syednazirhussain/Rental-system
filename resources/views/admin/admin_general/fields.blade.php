

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input name="_method" type="hidden" value="PATCH">


<div class="row">
      <!-- Name Field -->
      @if(isset($data['general_setting']))
      <div class="col-sm-12 form-group">
          <label for="grid-input-16">Title:</label>
          <input type="text" name="title" value="{{ $data['general_setting']->title }}" id="grid-input-16" class="form-control">
      </div>
      <div class="col-sm-12 form-group">
          <label for="grid-input-16">Zip Code</label>
          <input type="text" name="zip_code" id="grid-input-16" class="form-control">
      </div>
      <div class="col-sm-12 form-group">
          <label for="grid-input-16">Address</label>
                <input type="text" name="address" id="grid-input-16" class="form-control">
      </div>
      <div class="col-sm-12 form-group">
        <label for="Country">Country</label>
        <select class="form-control" name="Country" id="Country">
          @forelse($data['country'] as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
          @empty
            <option value="0">empty</option>
          @endforelse
        </select>
      </div>
      
      <div class="col-sm-12 form-group">
        <label for="State">State</label>
        <select class="form-control" name="State" id="State">
          @forelse($data['state'] as $state)
            <option value="{{ $state->id }}">{{ $state->name }}</option>
          @empty
            <option value="0">empty</option>
          @endforelse
        </select>
      </div>

      <div class="col-sm-12 form-group">
        <label for="City">City</label>
        <select class="form-control" name="city_id" id="city_id">
          <option></option>
        </select>
      </div>
      @endif
      <!-- Submit Field -->
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($userStatus)) <i class="fa fa-refresh"></i>  Update Settings @else <i class="fa fa-plus"></i>  Add Status @endif</button>
      </div>
</div>                


@section('js')

  <script type="text/javascript">
    
      $('#State').on('change', function() {

          var getStateId = $('#State').val();

          $.ajax({
              url: '{{ route("cities.list") }}',
              data: { state_id: getStateId },
              dataType: 'json',
              cache: false,
              type: 'POST',
              success: function(data){
                  if (data.success == 1) {
                    var option = "";
                    $.each(data.cities, function(i, item) {
                        option += '<option data-state="'+item.state_id+'" value="'+item.id+'">'+item.name+'</option>';
                    });
                    $('#city_id').html(option);
                  }
              },
              error: function(xhr,status,error)  {

              }
          });
      }); 

      
      // Initialize validator
      $('#userStatusForm').pxValidate({
        focusInvalid: false,
        rules: {
          'name': {
            required: true,
            maxlength: 50,
          },
        },

        messages: {
          'name': {
            required: "Please enter the name",
          }
        }

      });


  </script>


@endsection
