
<input name="_token" type="hidden" value="{{ csrf_token() }}">

<!-- Code Field -->


<div class="col-sm-12 form-group">
    <label for="">Code</label>
    <input type="text" id="code" placeholder="booking" value="@if(isset($equipmentCriteria)){{ $equipmentCriteria->code }}@endif" name="code" class="form-control">
</div>

<!-- Title Field -->


<div class="col-sm-12 form-group">
    <label for="">Title</label>
    <input type="text" id="title" placeholder="Booking" value="@if(isset($equipmentCriteria)){{ $equipmentCriteria->title }}@endif" name="title" class="form-control">
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" class="btn btn-primary">@if(isset($equipmentCriteria)) <i class="fa fa-refresh"></i>  Update Equipment Criteria @else <i class="fa fa-plus"></i>  Add Equipment Criteria @endif</button>
    <a href="{!! route('company.conference.equipmentCriterias.index') !!}" class="btn btn-default"><i class="fa fa-times"></i>  Cancel</a>
</div>
