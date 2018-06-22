<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($hRCourses))
	<input name="_method" type="hidden" value="PATCH">
@endif


<div class="col-sm-12 form-group">
    <label for="name">Name</label>
    <input type="text" id="name" placeholder="name" value="@if(isset($hRCourses)){{ $hRCourses->name }}@endif" name="name" class="form-control">
</div>

<div class="col-sm-12">
	<button type="submit" class="btn btn-primary">@if(isset($hRCourses)) <i class="fa fa-refresh"></i> UPDATE @else <i class="fa fa-plus"></i> ADD  @endif</button>
    <a href="{!! route('company.hRCourses.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
</div>


@section('js')

  <script type="text/javascript">
      
      // Initialize validator
      $('#hrCourseForm').pxValidate({
        focusInvalid: false,
        rules: {
          'name': {
            required: true,
            maxlength: 50,
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