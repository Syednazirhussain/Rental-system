<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($supportCategory))
	<input name="_method" type="hidden" value="PATCH">
@endif

<div class="col-sm-12 form-group">
    <label for="grid-input-16">Name</label>
    <input type="text" id="grid-input-16" placeholder="Category name" value="@if(isset($supportCategory)){{ $supportCategory->name }}@endif" name="name" class="form-control">
</div>

<div class="col-sm-12">
	<button type="submit" class="btn btn-primary">@if(isset($supportCategory)) <i class="fa fa-refresh"></i> UPDATE @else <i class="fa fa-plus"></i> ADD Category @endif</button>
    <a href="{!! route('admin.supportCategories.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
</div>


@section('js')

  <script type="text/javascript">
      
      // Initialize validator
      $('#supportCategoryForm').pxValidate({
        focusInvalid: false,
        rules: {
          'name': {
            required: true,
            maxlength: 100,
          }
        },

        messages: {
          'name': {
            required: "Please enter the name",
          }
        }

      });


  </script>


@endsection