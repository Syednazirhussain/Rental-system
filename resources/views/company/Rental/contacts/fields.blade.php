<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($rcustomer))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Contact</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="name" class="col-md-5 form-label">Name</label>
            <div class="col-md-7">
                <input class="form-control" name="name" type="text" id="name">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="position_title" class="col-md-5 form-label">Position Title</label>
            <div class="col-md-7">
                <input class="form-control" name="position_title" type="text" id="position_title">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="tel_number" class="col-md-5 form-label">Tel Number</label>
            <div class="col-md-7">
                <input class="form-control" name="tel_number" type="text" id="tel_number">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="mobile" class="col-md-5 form-label">Mobile </label>
            <div class="col-md-7">
                <input class="form-control" name="mobile" type="text" id="mobile">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="email" class="col-md-5 form-label">Email</label>
            <div class="col-md-7">
                <input class="form-control" name="email" type="text" id="email">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="cost_no" class="col-md-5 form-label">Cost Number</label>
            <div class="col-md-7">
                <input class="form-control" name="cost_no" type="text" id="cost_no">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="purchase_order" class="col-md-5 form-label">Purchase Order</label>
            <div class="col-md-7">
                <input class="form-control" name="purchase_order" type="text" id="purchase_order">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="order_status" class="col-md-5 form-label">Order Status</label>
            <div class="col-md-7">
                <input class="form-control" name="order_status" type="text" id="order_status">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="login_code" class="col-md-5 form-label">Login Code</label>
            <div class="col-md-7">
                <input class="form-control" name="login_code" type="text" id="login_code">
            </div>
        </div>
        <div class="col-md-3 form-group">
            <label for="busin_levage" class="col-md-5 form-label">Busin Levage</label>
            <div class="col-md-7">
                <input class="form-control" name="busin_levage" type="text" id="busin_levage">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="group" class="col-md-5 form-label">Group</label>
            <div class="col-md-7">
                <input class="form-control" name="group" type="text" id="group">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-12 form-group">
            <label for="note" class="col-md-2 form-label">Notes</label>
            <div class="col-md-10">
                <textarea rows="5" class="form-control" name="note" type="text" id="note"></textarea>
            </div>
        </div>
    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" id="contact_submit" value="Save">
                <a href="{{ route('company.rcontact.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>