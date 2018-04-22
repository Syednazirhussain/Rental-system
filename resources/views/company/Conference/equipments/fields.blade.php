
<input type="hidden" name="_token" value="{{ csrf_token() }}">


<!-- Title Field -->


<div class="col-sm-12 form-group">
    <label for="">Title</label>
    <input type="text" id="title" placeholder="Projector" value="@if(isset($equipments)) {{$equipments->price}} @endif" name="title" class="form-control">
</div>

<!-- Price Field -->

<div class="col-sm-6 form-group">
    <label for="">Price</label>
    <input type="number" id="price" placeholder="30.00" value="@if(isset($equipments)) {{$equipments->price}} @endif" name="price" class="form-control">
</div>

<!-- Criteria Id Field -->


<div class="col-sm-4 form-group">
    <label>Criteria Per</label>
    <select class="form-control select2-example" name="criteria_id"  style="width: 100%">
        @foreach($equipCriteria as $criteria)
            <option value="{{$criteria->id}}">{{$criteria->title}}</option>
        @endforeach
    </select>
</div>

<!-- Is Multi Units Field -->


<div class="col-sm-6 form-group">
    <label for=""></label>
    <label class="custom-control custom-checkbox">
        <input type="checkbox" name="is_multi_units" class="custom-control-input">
        <span class="custom-control-indicator"></span>
        Book multi units
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" class="btn btn-primary">@if(isset($equipments)) <i class="fa fa-refresh"></i>  Update Equipment @else <i class="fa fa-plus"></i>  Add Equipment  @endif</button>
    <a href="{!! route('company.conference.equipments.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
</div>
