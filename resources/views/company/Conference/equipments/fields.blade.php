
<input type="hidden" name="_token" value="{{ csrf_token() }}">


<!-- Title Field -->


<div class="col-sm-12 form-group">
    <label for="">Title</label>
    <input type="text" id="title" placeholder="Projector" value="@if(isset($equipments)){{$equipments->title}}@endif" name="title" class="form-control">
    <div class="errorTxt"></div>
</div>

<!-- Price Field -->

<!-- <div class="col-sm-6 form-group">
    <label for="">Price</label>
    <input type="number" id="price" placeholder="30.00" value="@if(isset($equipments)){{$equipments->price}}@endif" name="price" class="form-control" min="1.00">
    <div class="errorTxt"></div>
</div> -->
<div class="col-sm-6 form-group">
    <label for="">Price</label>
    <div class="input-group">
      <span class="input-group-addon">SEK</span>
      <input type="number" id="price" placeholder="30.00" value="@if(isset($equipments)){{$equipments->price}}@endif" name="price" class="form-control" min="1.00">
     <div class="errorTxt"></div> 
    </div>
</div>

<!-- Criteria Id Field -->


<div class="col-sm-4 form-group">
    <label>Criteria Per</label>
    <select class="form-control select2-example" name="criteria_id"  style="width: 100%">
        @foreach($equipCriteria as $criteria)
            @if (isset($equipments) && $equipments->criteria_id == $criteria->id)
                <option value="{{$criteria->id}}" selected="selected">{{$criteria->title}}</option>
            @else
                <option  value="{{$criteria->id}}">{{$criteria->title}}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- Is Multi Units Field -->


<div class="col-sm-12 form-group">
    <label for=""></label>
    <label class="custom-control custom-checkbox">
        <input type="checkbox" name="is_multi_units" class="custom-control-input"  <?php if((isset($equipments)) && $equipments->is_multi_units != "") { ?>  checked="checked"   <?php } ?> >                               
        <span class="custom-control-indicator"></span>
        Book multi units
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" class="btn btn-primary">@if(isset($equipments)) <i class="fa fa-refresh"></i>  Update  @else <i class="fa fa-plus"></i>  Create   @endif</button>
    <a href="{!! route('company.conference.equipments.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
</div>





    @section('js')


<script type="text/javascript">
    

              // Initialize validator
              $('#equipmentForm').validate({
                    
                    rules: {

                          'title': {
                            required: true,
                            maxlength: 100,
                          },
                          'price': {
                            required: true,
                          },

                    },

                    messages: {
                          'title': {
                            required: "Please enter title",
                          },
                          'price': {
                            required: "Please enter price",
                          },
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
