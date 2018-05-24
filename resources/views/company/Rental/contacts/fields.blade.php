<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($rcustomer))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Contact</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="name" class="control-label">Name</label>
            <input class="form-control" name="name" type="text" id="name">
        </div>
        <div class="col-md-6 form-group">
            <label for="position_title" class="control-label">Position Title</label>
            <input class="form-control" name="position_title" type="text" id="position_title">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="tel_number" class="control-label">Tel Number</label>
            <input class="form-control" name="tel_number" type="text" id="tel_number">
        </div>
        <div class="col-md-6 form-group">
            <label for="mobile" class="control-label">Mobile </label>
            <input class="form-control" name="mobile" type="text" id="mobile">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="email" class="control-label">Email</label>
            <input class="form-control" name="email" type="text" id="email">
        </div>
        <div class="col-md-6 form-group">
            <label for="cost_no" class="control-label">Cost Number</label>
            <input class="form-control" name="cost_no" type="text" id="cost_no">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="purchase_order" class="control-label">Purchase Order</label>
            <input class="form-control" name="purchase_order" type="text" id="purchase_order">
        </div>
        <div class="col-md-6 form-group">
            <label for="order_status" class="control-label">Order Status</label>
            <input class="form-control" name="order_status" type="text" id="order_status">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="login_code" class="control-label">Login Code</label>
            <input class="form-control" name="login_code" type="text" id="login_code">
        </div>
        <div class="col-md-3 form-group">
            <label for="busin_levage" class="control-label">Busin Levage</label>
            <input class="form-control" name="busin_levage" type="text" id="busin_levage">
        </div>
        <div class="col-md-6 form-group">
            <label for="group" class="control-label">Group</label>
            <input class="form-control" name="group" type="text" id="group">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-12 form-group">
            <label for="note" class="control-label">Notes</label>
            <textarea rows="5" class="form-control" name="note" type="text" id="note"></textarea>
        </div>
    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" value="Submit">
                <a href="{{ route('company.supports.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>