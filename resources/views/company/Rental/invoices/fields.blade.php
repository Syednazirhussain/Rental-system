<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($rcustomer))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Invoice</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="name" class="control-label">Company Name</label>
            <input class="form-control" name="name" type="text" id="name">
        </div>
        <div class="col-md-6 form-group">
            <label for="invoice_delivery" class="control-label">Invoice Delivery (PDF, Paper, Email)</label>
            <input class="form-control" name="invoice_delivery" type="text" id="invoice_delivery">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="address_1" class="control-label">Address 1</label>
            <input class="form-control" name="address_1" type="text" id="address_1">
        </div>
        <div class="col-md-6 form-group">
            <label for="email_invoicing" class="control-label">Email for Invoicing</label>
            <input class="form-control" name="email_invoicing" type="text" id="email_invoicing">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="address_2" class="control-label">Address 2</label>
            <input class="form-control" name="address_2" type="text" id="address_2">
        </div>
        <div class="col-md-6 form-group">
            <label for="payment_conditions" class="control-label">Payment Conditions</label>
            <input class="form-control" name="payment_conditions" type="text" id="payment_conditions">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="zipcode" class="control-label">Zipcode</label>
            <input class="form-control" name="zipcode" type="text" id="zipcode">
        </div>
        <div class="col-md-3 form-group">
            <label for="city" class="control-label">City</label>
            <input class="form-control" name="city" type="text" id="city">
        </div>
        <div class="col-md-3 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="checkbox" name="interest_invoice" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Yes
            </label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="checkbox" name="interest_invoice" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                No
            </label>
            &nbsp;&nbsp;
            <label>Interest Invoice</label>
        </div>
        <div class="col-md-3 form-group">
            <label for="free_text" class="control-label">Free Text</label>
            <input class="form-control" name="free_text" type="text" id="free_text">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="country" class="control-label">Country</label>
            <input class="form-control" name="country" type="text" id="country">
        </div>
        <div class="col-md-3 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="checkbox" name="reminder" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Yes
            </label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="checkbox" name="reminder" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                No
            </label>
            &nbsp;&nbsp;
            <label>Reminder</label>
        </div>
        <div class="col-md-3 form-group">
            <label for="free_text" class="control-label">Free Text</label>
            <input class="form-control" name="free_text" type="text" id="free_text">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="reference_person" class="control-label">Reference Person</label>
            <input class="form-control" name="reference_person" type="text" id="reference_person">
        </div>
        <div class="col-md-3 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="checkbox" name="inkasso" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Yes
            </label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="checkbox" name="inkasso" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                No
            </label>
            &nbsp;&nbsp;
            <label>Inkasso</label>
        </div>
        <div class="col-md-3 form-group">
            <label for="free_text" class="control-label">Free Text</label>
            <input class="form-control" name="free_text" type="text" id="free_text">
        </div>
    </div>

    <div class="col-md-6">
        <div class="col-md-12 form-group">
            <label for="cost_number" class="control-label">Cost Number</label>
            <input class="form-control" name="cost_number" type="text" id="cost_number">
        </div>
        <div class="col-md-12 form-group">
            <label for="sale_discount" class="control-label">Sale Discount</label>
            <input class="form-control" name="sale_discount" type="text" id="sale_discount">
        </div>
        <div class="col-md-12 form-group">
            <label for="interest_rate" class="control-label">Interest Rate in %</label>
            <input class="form-control" name="interest_rate" type="text" id="interest_rate">
        </div>
        <div class="col-md-12 form-group">
            <label for="language" class="control-label">Language</label>
            <input class="form-control" name="language" type="text" id="language">
        </div>
    </div>

    <div class="col-md-6 form-group">
        <label for="note" class="control-label">Notes</label>
        <textarea rows="5" class="form-control" name="note" type="text" id="note"></textarea>
    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" value="Save">
                <a href="{{ route('company.rcontact.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>