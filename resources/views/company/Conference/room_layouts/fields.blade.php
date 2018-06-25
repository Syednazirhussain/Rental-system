<!-- Title Field -->

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="col-sm-12 form-group">
    <label for="">Title</label>
    <input type="text" id="title" placeholder="Round Shape" value="@if(isset($roomLayout)){{$roomLayout->title}}@endif" name="title" class="form-control">
    <div class="errorTxt"></div>
</div>


<div class="col-sm-4">
	<div class="fileinput fileinput-new" data-provides="fileinput">
          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">

                @if( isset($roomLayout) && $roomLayout->image != "default.png")
                    <img src="{{ asset('storage/room_layouts_images/'.$roomLayout->image) }}" >
                @else
                    <img src="{{ asset('/skin-1/assets/images/default.png') }}" >
                @endif

          </div>
          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
          <div>
                <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                <input type="file" name="image" id="image"></span>
                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
          </div>
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12 m-t-1">
    <button type="submit" class="btn btn-primary">@if(isset($roomLayout)) <i class="fa fa-refresh"></i>  Update @else  <i class="fa fa-plus"></i>  Create  @endif </button>
    <a href="{!! route('company.conference.roomLayouts.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
</div>










    @section('js')


<script type="text/javascript">
    

              // Initialize validator
              $('#roomlayoutForm').validate({
                    
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

