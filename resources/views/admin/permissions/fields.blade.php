<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($permission))
	<input name="_method" type="hidden" value="PATCH">
@endif

<div class="col-sm-12 form-group">
    <label for="grid-input-16">Name</label>
    <input type="text" id="grid-input-16" placeholder="Permission Name" value="@if(isset($permission)){{ $permission->name }}@endif" name="name" class="form-control">
</div>

<div class="col-sm-12">
	<button type="submit" class="btn btn-primary">@if(isset($permission)) <i class="fa fa-refresh"></i> UPDATE @else <i class="fa fa-plus"></i> ADD Permission @endif</button>
    <a href="{!! route('admin.permissions.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
</div>


@section('js')

  <script type="text/javascript">
      
      // Initialize validator
      $('#permissionForm').pxValidate({
        focusInvalid: false,
        rules: {
          'name': {
            required: true,
            maxlength: 100
          }
        },

        messages: {
          'name': {
            required: "Please enter the name"
          }
        }

      });


  </script>


@endsection