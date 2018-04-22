<input type="hidden" name="_token" value="{{ csrf_token() }}">
 
<!-- Title Field -->

<div class="col-sm-12 form-group">
    <label for="">Title</label>
    <input type="text" id="title" placeholder="Commercial Package" value="@if(isset($packages)){{$packages->title}}@endif" name="title" class="form-control">
</div>

<!-- Items Field -->


<div class="col-sm-12 form-group">
    <label for="">Items</label>
    <select name="items[]" class="form-control select2-example" multiple style="width: 100%">
        
        <optgroup label="Food Items">
            @foreach($getFoodItems as $items)
              <option value="{{ $items->id }}">{{ $items->title }}</option>
            @endforeach
        </optgroup>
      </select>
</div>                                  


<!-- Price Field -->
<div class="col-sm-6 form-group">
    <label for="">Price</label>
    <input type="number" id="price" placeholder="30.00" value="@if(isset($packages)){{$packages->price}}@endif" name="price" class="form-control">
</div>


<!-- Status Field -->

<div class="col-sm-6 form-group">
    <label>Status</label>
     <select name="status" class="form-control select2-example"  style="width: 100%">
        
        <option <?php if(isset($packages) && $packages->status == 'active') echo "selected='selected'"?>  value="active">Active</option>        
        <option <?php if(isset($packages) && $packages->status == 'inactive') echo "selected='selected'"?>   value="inactive">Inactive</option>
    </select>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" class="btn btn-primary">@if(isset($packages)) <i class="fa fa-refresh"></i>  Update Package @else<i class="fa fa-plus"></i>  Add Package @endif</button>
    <a href="{!! route('company.conference.packages.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
</div>
