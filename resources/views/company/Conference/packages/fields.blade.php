<input type="hidden" name="_token" value="{{ csrf_token() }}">
 
<!-- Title Field -->

<div class="col-sm-12 form-group">
    <label for="">Title</label>
    <input type="text" id="title" placeholder="Commercial Package" value="@if(isset($packages)){{$packages->title}}@endif" name="title" class="form-control">
    <div class="errorTxt"></div>
</div>

<!-- Items Field -->


<div class="col-sm-12 form-group">
    <label for="">Items</label>
    <select name="items[]" class="form-control select2-example" multiple style="width: 100%">
        
        <optgroup label="Food Items">

            @if(isset($packages))

                @foreach($getFoodItems as $items)
                    <option <?php if((in_array($items->id, $pieces))) echo "selected=selected"; ?> value="{{$items->id}}">{{ $items->title }}</option>
                @endforeach

            @else

                @foreach($getFoodItems as $items)
                    <option value="{{$items->id}}">{{ $items->title }}</option>
                @endforeach

            @endif

        </optgroup>
      </select>
      <div class="errorTxt"></div>
</div>                                  


<!-- Price Field -->
<!-- <div class="col-sm-6 form-group">
    <label for="">Price</label>
    <input type="number" id="price" placeholder="30.00" value="@if(isset($packages)){{$packages->price}}@endif" name="price" class="form-control">
    <div class="errorTxt"></div>
</div> -->
<div class="col-sm-6 form-group">
    <label for="">Price</label>
                <div class="input-group">
                    <span class="input-group-addon">SEK</span>
                    <input type="number" id="price" min="1" placeholder="30.00" value="@if(isset($packages)){{$packages->price}}@endif" name="price" class="form-control">
                   <div class="errorTxt"></div> 
                </div>
            </div>


<!-- Status Field -->

<div class="col-sm-6 form-group">
    <label>Status</label>
     <select name="status" class="form-control select2-example"  style="width: 100%">
        
        <option <?php if(isset($packages) && $packages->status == 'active') echo "selected='selected'"?>  value="active">Active</option>        
        <option <?php if(isset($packages) && $packages->status == 'inactive') echo "selected='selected'"?>   value="inactive">Inactive</option>
    </select>
    <div class="errorTxt"></div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" class="btn btn-primary">@if(isset($packages)) <i class="fa fa-refresh"></i>  Update  @else<i class="fa fa-plus"></i>  Create  @endif</button>
    <a href="{!! route('company.conference.packages.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
</div>




    @section('js')


    <script>


                // -------------------------------------------------------------------------
                // Initialize Select2

                $(function() {
                  $('.select2-example').select2({
                    placeholder: 'Select value',
                  });
                });
                $(function() {
                  $('.select2-example').select2({
                    placeholder: 'Select value',
                  });
                });


              // Initialize validator 
              $('#packageForm').validate({
                    
                    rules: {

                          'title': {
                            required: true,
                            maxlength: 100,
                          },
                          'price': {
                            required: true,
                          },
                          'items[]': {
                            required: true,
                          }

                    },

                    messages: {
                          'title': {
                            required: "Please enter title",
                          },
                          'price': {
                            required: "Please enter price",
                          },
                          'items[]': {
                            required: "Please select items",
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
