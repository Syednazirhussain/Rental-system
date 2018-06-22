<input type="hidden" name="_token" value="{{ csrf_token() }}">


<!-- Title Field -->


<div class="col-sm-12 form-group">
    <label for="">Title</label>
    <input type="text" id="title" placeholder="Mineral water" value="@if(isset($food)){{$food->title}}@endif" name="title" class="form-control">
    <div class="errorTxt"></div>
</div>



<!-- Price Per Attendee Field -->
<!-- 
<div class="col-sm-12 form-group">
    <label for="">Price Per Attendee</label>
    <input type="number" id="price_per_attendee" placeholder="30.00" value="@if(isset($food)){{$food->price_per_attendee}}@endif" name="price_per_attendee" class="form-control" min="1.00">
    <div class="errorTxt"></div>
</div> -->
          <div class="col-sm-12 form-group">
              <label for="">Price Per Attendee</label>
                <div class="input-group">
                    <span class="input-group-addon">SEK</span>
                    <input type="number" id="price_per_attendee" placeholder="30.00" value="@if(isset($food)){{$food->price_per_attendee}}@endif" name="price_per_attendee" class="form-control" min="1.00">
                   <div class="errorTxt"></div> 
                </div>
            </div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" class="btn btn-primary">@if(isset($food)) <i class="fa fa-refresh"></i>  Update  @else <i class="fa fa-plus"></i>  Create  @endif  </button>
    <a href="{!! route('company.conference.foods.index') !!}" class="btn btn-default"> <i class="fa fa-times"></i> Cancel</a>
</div>







    @section('js')


<script type="text/javascript">
    

              // Initialize validator 
              $('#foodForm').validate({
                    
                    rules: {

                          'title': {
                            required: true,
                            maxlength: 100,
                          },
                          'price_per_attendee': {
                            required: true,
                          }

                    },

                    messages: {
                          'title': {
                            required: "Please enter title",
                          },
                          'price_per_attendee': {
                            required: "Please enter price",
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

