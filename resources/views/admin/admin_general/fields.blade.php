

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
          <label for="grid-input-16">City</label>
                <input type="text" name="city" id="grid-input-16" class="form-control">
      </div>
      <div class="col-sm-12 form-group">
          <label for="grid-input-16">State</label>
                <input type="text" name="state" id="grid-input-16" class="form-control">
      </div>
      <div class="col-sm-12 form-group">
          <label for="grid-input-16">Country</label>
                <input type="text" name="country" id="grid-input-16" class="form-control">
      </div>

			<!-- Submit Field -->
			<div class="col-sm-12">
				<button type="submit" class="btn btn-primary">@if(isset($userStatus)) <i class="fa fa-refresh"></i>  Update Settings @else <i class="fa fa-plus"></i>  Add Status @endif</button>
			</div>
</div>								


@section('js')

  <script type="text/javascript">
      
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
