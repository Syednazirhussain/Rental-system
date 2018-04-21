

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input name="_method" type="hidden" value="PATCH">


<div class="row">
      <!-- Name Field -->
      
      @if(isset($data['general_setting']))
      <div class="col-sm-12 form-group">
          <label for="grid-input-16">Tax</label>
          <input type="text" name="tax" value="{{ $data['general_setting']->tax }}" id="grid-input-16" class="form-control">
      </div>
      <div class="col-sm-12 form-group">
          <label for="grid-input-16">Set Due Days</label>
          <input type="text" name="due_day" value="{{ $data['general_setting']->due_day }}" id="grid-input-16" class="form-control">
      </div>
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(!isset($userStatus)) <i class="fa fa-refresh"></i>  Update Settings @else <i class="fa fa-plus"></i>  Add Status @endif</button>
      </div>
      @endif
</div>                


@section('js')

  <script type="text/javascript">


    $('document').ready(function() {
        var cityId = $('.city').attr('id');
        var stateId = $('.state').attr('id');
        
          $.ajax({
              url: "{{ route('admin.userStatuses.general') }}",
              type: 'GET',
              success: function(response){
                console.log($data);
              }
          });
    });
    
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
