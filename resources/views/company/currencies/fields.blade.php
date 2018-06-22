<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($currency))
	<input name="_method" type="hidden" value="PATCH">
@endif

<div class="col-sm-12 form-group">
    <label for="code">Code</label>
    <input type="text" id="code" placeholder="ex: USD" value="@if(isset($currency)){{ $currency->code }}@endif" name="code" class="form-control">
</div>


<div class="col-sm-12 form-group">
    <label for="name">Name</label>
    <input type="text" id="name" placeholder="name" value="@if(isset($currency)){{ $currency->name }}@endif" name="name" class="form-control">
</div>

<div class="col-sm-12">
	<button type="submit" class="btn btn-primary">@if(isset($currency)) <i class="fa fa-refresh"></i> UPDATE @else <i class="fa fa-plus"></i> ADD  @endif</button>
    <a href="{!! route('company.currencies.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
</div>


@section('js')

  <script type="text/javascript">
      
      // Initialize validator
      $('#currencyForm').pxValidate({
        focusInvalid: false,
        rules: {
          'name': {
            required: true,
            maxlength: 50,
          },
          'code': {
            required: true,
            maxlength: 50,
          }
        },

        messages: {
          'name': {
            required: "Please enter the name",
          },
          'code': {
            required: "Please enter the code",
          }
        }

      });


  </script>


@endsection