

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input name="_method" type="hidden" value="PATCH">


<div class="row">
      <!-- Name Field -->
      <div class="col-sm-12 form-group">
          <label for="grid-input-16">Title:</label>
          <input type="text" name="title" id="grid-input-16" class="form-control">
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
        <select class="form-control" name="City" id="City">
          @forelse($data['city'] as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
          @empty
            <option value="0">empty</option>
          @endforelse
        </select>
      </div>

      <!-- Submit Field -->
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(isset($userStatus)) <i class="fa fa-refresh"></i>  Update Settings @else <i class="fa fa-plus"></i>  Add Status @endif</button>
      </div>
</div>                


@section('js')

  <script type="text/javascript">
    
    $('document').ready(function(){

      var state_id;

      $('#State').change(function(){
        state_id = $(this).val();

        $.ajax({
          url : "city/"+state_id,
          type : "GET",
          success : function(response){
            console.log(response);
          }
        });
        
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
