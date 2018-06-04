<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($rcustomer))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Invoice</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="company_name" class="col-md-5 form-label">Company Name</label>
            <div class="col-md-7">
                <input class="form-control" name="company_name" type="text" id="company_name">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="invoice_delivery" class="col-md-5 form-label">Invoice Delivery (PDF, Paper, Email)</label>
            <div class="col-md-7">
                <input class="form-control" name="invoice_delivery" type="text" id="invoice_delivery">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="address_1" class="col-md-5 form-label">Address 1</label>
            <div class="col-md-7">
                <input class="form-control" name="address_1" type="text" id="address_1">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="email_invoicing" class="col-md-5 form-label">Email for Invoicing</label>
            <div class="col-md-7">
                <input class="form-control" name="email_invoicing" type="text" id="email_invoicing">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="address_2" class="col-md-5 form-label">Address 2</label>
            <div class="col-md-7">
                <input class="form-control" name="address_2" type="text" id="address_2">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="payment_condition" class="col-md-5 form-label">Payment Conditions</label>
            <div class="col-md-7">
                <input class="form-control" name="payment_condition" type="text" id="payment_condition">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="zipcode" class="col-md-5 form-label">Zipcode</label>
            <div class="col-md-7">
                <input class="form-control" name="zipcode" type="text" id="zipcode">
            </div>
        </div>
        <div class="col-md-3 form-group">
            <label for="city" class="col-md-5 form-label">City</label>
            <div class="col-md-7">
                <input class="form-control" name="city" type="text" id="city">
            </div>
        </div>
        <div class="col-md-3 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="radio" name="interest_invoice" class="custom-control-input" value="1">
                <span class="custom-control-indicator"></span>
                Yes
            </label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="radio" name="interest_invoice" class="custom-control-input" value="0" checked>
                <span class="custom-control-indicator"></span>
                No
            </label>
            &nbsp;&nbsp;
            <label>Interest Invoice</label>
        </div>
        <div class="col-md-3 form-group">
            <label for="free_text" class="col-md-5 form-label">Free Text</label>
            <div class="col-md-7">
                <input class="form-control" name="free_text" type="text" id="free_text">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="country" class="col-md-5 form-label">Country</label>
            <div class="col-md-7">
                <input class="form-control" name="country" type="text" id="country">
            </div>
        </div>
        <div class="col-md-3 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="radio" name="reminder" class="custom-control-input" value="1">
                <span class="custom-control-indicator"></span>
                Yes
            </label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="radio" name="reminder" class="custom-control-input" value="0" checked>
                <span class="custom-control-indicator"></span>
                No
            </label>
            &nbsp;&nbsp;
            <label>Reminder</label>
        </div>
        <div class="col-md-3 form-group">
            <label for="free_text" class="col-md-5 form-label">Free Text</label>
            <div class="col-md-7">
                <input class="form-control" name="free_text" type="text" id="free_text">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="reference_person" class="col-md-5 form-label">Reference Person</label>
            <div class="col-md-7">
                <input class="form-control" name="reference_person" type="text" id="reference_person">
            </div>
        </div>
        <div class="col-md-3 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="radio" name="inkasso" class="custom-control-input" value="1">
                <span class="custom-control-indicator"></span>
                Yes
            </label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="radio" name="inkasso" class="custom-control-input" value="0" checked>
                <span class="custom-control-indicator"></span>
                No
            </label>
            &nbsp;&nbsp;
            <label>Inkasso</label>
        </div>
        <div class="col-md-3 form-group">
            <label for="free_text" class="col-md-5 form-label">Free Text</label>
            <div class="col-md-7">
                <input class="form-control" name="free_text" type="text" id="free_text">
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="col-md-12 form-group">
            <label for="cost_number" class="col-md-5 form-label">Cost Number</label>
            <div class="col-md-7">
                <input class="form-control" name="cost_number" type="text" id="cost_number">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label for="sale_discount" class="col-md-5 form-label">Sale Discount</label>
            <div class="col-md-7">
                <input class="form-control" name="sale_discount" type="text" id="sale_discount">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label for="interest_rate" class="col-md-5 form-label">Interest Rate in %</label>
            <div class="col-md-7">
                <input class="form-control" name="interest_rate" type="text" id="interest_rate">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label for="language" class="col-md-5 form-label">Language</label>
            <div class="col-md-7">
                <input class="form-control" name="language" type="text" id="language">
            </div>
        </div>
    </div>

    <div class="col-md-6 form-group">
        <label for="note" class="col-md-2 form-label">Notes</label>
        <div class="col-md-10">
            <textarea rows="5" class="form-control" name="note" type="text" id="note"></textarea>
        </div>
    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" id="invoice_submit" value="Save">
                <a href="{{ route('company.rcontact.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>