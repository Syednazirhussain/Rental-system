<input type="hidden" name="_token" value="{{ csrf_token() }}">


<!-- Title Field -->


<div class="col-sm-12 form-group">
    <label for="">Title</label>
    <input type="text" id="title" placeholder="Mineral water" value="@if(isset($food)){{$food->title}}@endif" name="title" class="form-control">
</div>



<!-- Price Per Attendee Field -->

<div class="col-sm-12 form-group">
    <label for="">Price Per Attendee</label>
    <input type="number" id="price_per_attendee" placeholder="300" value="@if(isset($food)){{$food->price_per_attendee}}@endif" name="price_per_attendee" class="form-control">
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" class="btn btn-primary">@if(isset($food)) <i class="fa fa-refresh"></i>  Update Food &amp; Drink @else <i class="fa fa-plus"></i>  Add Food &amp; Drink  @endif  </button>
    <a href="{!! route('company.conference.foods.index') !!}" class="btn btn-default"> <i class="fa fa-times"></i> Cancel</a>
</div>
