<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->

<div class="form-group col-sm-12">
  <button type="submit" class="btn btn-primary">@if(isset($hrCompanyCollective)) <i class="fa fa-refresh"></i> UPDATE @else <i class="fa fa-plus"></i> CREATE  @endif</button>
    <a href="{!! route('company.hrCompanyCollectives.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> CANCEL</a>
</div>
@section('js')

  <script type="text/javascript">
      
      // Initialize validator
      $('#form').pxValidate({
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