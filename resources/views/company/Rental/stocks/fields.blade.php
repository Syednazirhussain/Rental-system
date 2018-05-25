<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($rcustomer))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Stock</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label for="qty" class="control-label">In Stock QTY</label>
            <input class="form-control" name="qty" type="text" id="qty">
        </div>
        <div class="col-md-4 form-group">
            <label for="value" class="control-label">Stock Value</label>
            <input class="form-control" name="value" type="number" id="value">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label for="width" class="control-label">Width (Cm)</label>
            <input class="form-control" name="width" type="text" id="width">
        </div>
        <div class="col-md-4 form-group">
            <label for="height" class="control-label">Height (Cm)</label>
            <input class="form-control" name="height" type="text" id="height">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label for="depth" class="control-label">Depth (Cm)</label>
            <input class="form-control" name="depth" type="text" id="depth">
        </div>
        <div class="col-md-4 form-group">
            <label for="weight" class="control-label">Weight (KG)</label>
            <input class="form-control" name="weight" type="text" id="weight">
        </div>
    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" value="Submit">
                <a href="{{ route('company.rstock.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>