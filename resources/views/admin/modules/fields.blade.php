<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($module))
	<input name="_method" type="hidden" value="PATCH">
@endif

<div class="col-sm-12 form-group">
    <label for="grid-input-16">Name</label>
    <input type="text" id="grid-input-16" placeholder="Module Name" value="@if(isset($module)){{ $module->name }}@endif" name="name" class="form-control">
</div>
<div class="col-sm-12 form-group">
    <label for="grid-input-17">Code</label>
    <input type="text" id="grid-input-17" placeholder="newsletter_module" value="@if(isset($module)){{ $module->code }}@endif" name="code" class="form-control">
</div>
<div class="col-sm-12 form-group">
    <label for="grid-input-18">Price</label>
    <input type="number" id="grid-input-18" name="price" placeholder="Module Price" value="@if(isset($module)){{ $module->price }}@endif" class="form-control">
</div>
<div class="col-sm-12">
	<button type="submit" class="btn btn-primary">@if(isset($module)) <i class="fa fa-refresh"></i> UPDATE @else <i class="fa fa-plus"></i> ADD MODULE @endif</button>
    <a href="{!! route('admin.modules.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
</div>


@section('js')

  <script type="text/javascript">
      
      // Initialize validator
      $('#moduleForm').pxValidate({
        focusInvalid: false,
        rules: {
          'name': {
            required: true,
            maxlength: 100,
          },
          'code': {
            required: true,
            maxlength: 50,
          },
          'price': {
            required: true
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