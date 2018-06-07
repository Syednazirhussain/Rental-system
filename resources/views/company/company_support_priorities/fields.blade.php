<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($supportPriorities))
	<input name="_method" type="hidden" value="PATCH">
@endif

<div class="col-sm-12 form-group">
    <label for="grid-input-16">Name</label>
    <input type="text" id="grid-input-16" placeholder="Priority name" value="@if(isset($supportPriorities)){{ $supportPriorities->name }}@endif" name="name" class="form-control">
</div>

<div class="col-sm-12">
	<button type="submit" class="btn btn-primary">@if(isset($supportPriorities)) <i class="fa fa-refresh"></i> UPDATE @else <i class="fa fa-plus"></i> ADD Priority @endif</button>
    <a href="{!! route('company.supportPriorities.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
</div>


@section('js')

  <script type="text/javascript">
      
      // Initialize validator
      $('#supportPriorityForm').pxValidate({
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