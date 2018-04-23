



	@if(Session::has('errorMessage'))
      <div class="alert alert-danger alert-dismissable" style="text-align: center;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong><i class="fa fa-times-circle fa-lg"></i>&nbsp;&nbsp;{{Session::get('errorMessage')}}</strong>
      </div>
    @endif


<input name="_token" type="hidden" value="{{ csrf_token() }}">

<!-- Title Field -->


<div class="col-sm-12 form-group">
    <label for="">Title</label>
    <input type="text" id="title" placeholder="Booking" value="@if(isset($equipmentCriteria)){{ $equipmentCriteria->title }}@endif" name="title" class="form-control">
    <div class="errorTxt"></div>
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" class="btn btn-primary">@if(isset($equipmentCriteria)) <i class="fa fa-refresh"></i>  Update  @else <i class="fa fa-plus"></i>  Add  @endif</button>
    <a href="{!! route('company.conference.equipmentCriterias.index') !!}" class="btn btn-default"><i class="fa fa-times"></i>  Cancel</a>
</div>





    @section('js')


<script type="text/javascript">
    

              // Initialize validator
              $('#equipCriteriaForm').validate({
                    
                    rules: {

                          'title': {
                            required: true,
                            maxlength: 100,
                          }

                    },

                    messages: {
                          'title': {
                            required: "Please enter title",
                          }
                    },

                    errorPlacement: function(error, element) {
                        var placement = $(element).parent().find('.errorTxt');
                        if (placement) {
                          $(placement).append(error)
                        } else {
                          error.insertAfter(element);
                        }
                    }

              });

</script>



    @endsection
