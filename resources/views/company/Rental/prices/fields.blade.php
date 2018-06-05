<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($price))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Price</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="new_in_price" class="col-md-5 form-label">New In Price</label>
            <div class="col-md-7">
                <input class="form-control" name="new_in_price" type="text" id="new_in_price" value="@if(isset($price)){{ $price->new_in_price }}@endif">
            </div>
        </div>
        <div class="col-md-3 form-group">
            <label for="new_from" class="col-md-5 form-label">From</label>
            <div class="col-md-7">
                <input class="form-control" name="new_from" type="date" id="new_from" value="@if(isset($price)){{ $price->new_from }}@endif">
            </div>
        </div>
        <div class="col-md-3 form-group">
            <label for="new_until" class="col-md-5 form-label">Until</label>
            <div class="col-md-7">
                <input class="form-control" name="new_until" type="date" id="new_until" value="@if(isset($price)){{ $price->new_until }}@endif">
            </div>
        </div>
        <div class="col-md-3 form-group">
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Continues
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="sales_price" class="col-md-5 form-label">Sales Price</label>
            <div class="col-md-7">
                <input class="form-control" name="sales_price" type="text" id="sales_price" value="@if(isset($price)){{ $price->sales_price }}@endif">
            </div>
        </div>
        <div class="col-md-3 form-group">
            <label for="sales_from" class="col-md-5 form-label">From</label>
            <div class="col-md-7">
                <input class="form-control" name="sales_from" type="date" id="sales_from" value="@if(isset($price)){{ $price->sales_from }}@endif">
            </div>
        </div>
        <div class="col-md-3 form-group">
            <label for="sales_until" class="col-md-5 form-label">Until</label>
            <div class="col-md-7">
                <input class="form-control" name="sales_until" type="date" id="sales_until" value="@if(isset($price)){{ $price->sales_until }}@endif">
            </div>
        </div>
        <div class="col-md-3 form-group">
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Continues
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="note_internal_use" class="col-md-4 form-label">Note Internal Use</label>
            <div class="col-md-8">
                <textarea rows="3" class="form-control" name="note_internal_use" type="text" id="note_internal_use">{{ isset($price) ? $price->note_internal_use: '' }}</textarea>
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="note_customers_swedish" class="col-md-4 form-label">Note to Customers Swedish</label>
            <div class="col-md-8">
                <textarea rows="3" class="form-control" name="note_customers_swedish" type="text" id="note_customers_swedish">{{ isset($price) ? $price->note_customers_swedish: '' }}</textarea>
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="note_customers_english" class="col-md-4 form-label">Note to Customers English</label>
            <div class="col-md-8">
                <textarea rows="3" class="form-control" name="note_customers_english" type="text" id="note_customers_english">{{ isset($price) ? $price->note_customers_english: '' }}</textarea>
            </div>
        </div>
    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" id="price_submit"  value="@if(isset($price)) Update @else Save @endif">
                <a href="{{ route('company.rprice.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>