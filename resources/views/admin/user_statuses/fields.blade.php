<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($userStatus))
	<input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">
			<!-- Name Field -->
            <div class="col-sm-12 form-group">
			    <label for="grid-input-16">Status Name:</label>
                <input type="text" name="name" id="grid-input-16"  value="@if(isset($userStatus)){{ $userStatus->name }}@endif" class="form-control">
			</div>

			<!-- Submit Field -->
			<div class="col-sm-12">
				<button type="submit" class="btn btn-primary">@if(isset($userStatus)) <i class="fa fa-refresh"></i>  UPDATE @else <i class="fa fa-plus"></i> ADD USER STATUS @endif</button>
          <a href="{!! route('admin.userStatuses.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
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
