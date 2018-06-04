<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($stock))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Stock</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label for="qty" class="col-md-5 form-label">In Stock QTY</label>
            <div class="col-md-7">
                <input class="form-control" name="qty" type="number" id="qty" value="@if(isset($stock)){{ $article->number }}@endif">
            </div>
        </div>
        <div class="col-md-4 form-group">
            <label for="value" class="col-md-5 form-label">Stock Value</label>
            <div class="col-md-7">
                <input class="form-control" name="value" type="text" id="value" value="@if(isset($stock)){{ $article->number }}@endif">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label for="width" class="col-md-5 form-label">Width (Cm)</label>
            <div class="col-md-7">
                <input class="form-control" name="width" type="text" id="width" value="@if(isset($stock)){{ $article->number }}@endif">
            </div>
        </div>
        <div class="col-md-4 form-group">
            <label for="height" class="col-md-5 form-label">Height (Cm)</label>
            <div class="col-md-7">
                <input class="form-control" name="height" type="text" id="height" value="@if(isset($stock)){{ $article->number }}@endif">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label for="depth" class="col-md-5 form-label">Depth (Cm)</label>
            <div class="col-md-7">
                <input class="form-control" name="depth" type="text" id="depth" value="@if(isset($stock)){{ $article->number }}@endif">
            </div>
        </div>
        <div class="col-md-4 form-group">
            <label for="weight" class="col-md-5 form-label">Weight (KG)</label>
            <div class="col-md-7">
                <input class="form-control" name="weight" type="text" id="weight" value="@if(isset($stock)){{ $article->number }}@endif">
            </div>
        </div>
    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" id="stock_submit" value="Save">
                <a href="{{ route('company.rstock.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>