<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($rcustomer))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Customer</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="new_in_price" class="control-label">New In Price</label>
            <input class="form-control" name="new_in_price" type="text" id="new_in_price">
        </div>
        <div class="col-md-3 form-group">
            <label for="new_from" class="control-label">From</label>
            <input class="form-control" name="new_from" type="text" id="new_from">
        </div>
        <div class="col-md-3 form-group">
            <label for="new_until" class="control-label">Until</label>
            <input class="form-control" name="new_until" type="text" id="new_until">
        </div>
        <div class="col-md-3 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" name="new_continues" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Continues
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="sales_price" class="control-label">Sales Price</label>
            <input class="form-control" name="sales_price" type="text" id="sales_price">
        </div>
        <div class="col-md-3 form-group">
            <label for="sales_from" class="control-label">From</label>
            <input class="form-control" name="sales_from" type="text" id="sales_from">
        </div>
        <div class="col-md-3 form-group">
            <label for="sales_until" class="control-label">Until</label>
            <input class="form-control" name="sales_until" type="text" id="sales_until">
        </div>
        <div class="col-md-3 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" name="sales_continues" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Continues
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label for="note_internal_use" class="control-label">Note Internal Use</label>
            <textarea rows="5" class="form-control" name="note_internal_use" type="text" id="note_internal_use"></textarea>
        </div>
        <div class="col-md-4 form-group">
            <label for="note_customers_swedish" class="control-label">Note to Customers Swedish</label>
            <textarea rows="5" class="form-control" name="note_customers_swedish" type="text" id="note_customers_swedish"></textarea>
        </div>
        <div class="col-md-4 form-group">
            <label for="note_customers_english" class="control-label">Note to Customers English</label>
            <textarea rows="5" class="form-control" name="note_customers_english" type="text" id="note_customers_english"></textarea>
        </div>

    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" value="Save">
                <a href="{{ route('company.rprice.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>