<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($invoice))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Invoice</legend>
<div class="row">
    <div class="col-md-6 col-md-offset-6">
        <div class="col-md-12 form-group">
            <label class="custom-control custom-checkbox" style="font-size: 14px;">
                <input type="checkbox" id="copy_information" data-toggle="switch" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                &nbsp;&nbsp;Copy Information from Customer Tab
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-12 form-group">
            <label for="company_name" class="col-md-5 form-label">Company Name</label>
            <div class="col-md-7">
                <input class="form-control" name="company_name" type="text" id="company_name" value="@if(isset($invoice)){{ $invoice->company_name }}@endif">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label for="address_1" class="col-md-5 form-label">Address 1</label>
            <div class="col-md-7">
                <input class="form-control" name="address_1" type="text" id="invoice_address_1" value="@if(isset($invoice)){{ $invoice->address_1 }}@endif">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label for="address_2" class="col-md-5 form-label">Address 2</label>
            <div class="col-md-7">
                <input class="form-control" name="address_2" type="text" id="invoice_address_2" value="@if(isset($invoice)){{ $invoice->address_2 }}@endif">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label for="zipcode" class="col-md-5 form-label">Zipcode</label>
            <div class="col-md-7">
                <input class="form-control" name="zipcode" type="text" id="invoice_zipcode" value="@if(isset($invoice)){{ $invoice->zipcode }}@endif">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label for="city" class="col-md-5 form-label">City</label>
            <div class="col-md-7">
                <input class="form-control" name="city" type="text" id="invoice_city" value="@if(isset($invoice)){{ $invoice->city }}@endif">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label for="country" class="col-md-5 form-label">Country</label>
            <div class="col-md-7">
                <input class="form-control" name="country" type="text" id="invoice_country" value="@if(isset($invoice)){{ $invoice->country }}@endif">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label for="reference_person" class="col-md-5 form-label">Reference Person</label>
            <div class="col-md-7">
                <input class="form-control" name="reference_person" type="text" id="reference_person" value="@if(isset($invoice)){{ $invoice->reference_person }}@endif">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label for="cost_number" class="col-md-5 form-label">Cost Number</label>
            <div class="col-md-7">
                <input class="form-control" name="cost_number" type="text" id="cost_number" value="@if(isset($invoice)){{ $invoice->cost_number }}@endif">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label for="sale_discount" class="col-md-5 form-label">Sale Discount</label>
            <div class="col-md-7">
                <input class="form-control" name="sale_discount" type="text" id="sale_discount" value="@if(isset($invoice)){{ $invoice->sale_discount }}@endif">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label for="interest_rate" class="col-md-5 form-label">Interest Rate in %</label>
            <div class="col-md-7">
                <input class="form-control" name="interest_rate" type="text" id="interest_rate" value="@if(isset($invoice)){{ $invoice->interest_rate }}@endif">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label for="language" class="col-md-5 form-label">Language</label>
            <div class="col-md-7">
                <input class="form-control" name="language" type="text" id="language" value="@if(isset($invoice)){{ $invoice->language }}@endif">
            </div>
        </div>
    </div>

    <div class="col-md-6 form-group">
        <div class="col-md-12 form-group">
            <label for="invoice_delivery" class="col-md-5 form-label">Invoice Delivery (PDF, Paper, Email)</label>
            <div class="col-md-7">
                <input class="form-control" name="invoice_delivery" type="text" id="invoice_delivery" value="@if(isset($invoice)){{ $invoice->invoice_delivery }}@endif">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label for="email_invoicing" class="col-md-5 form-label">Email for Invoicing</label>
            <div class="col-md-7">
                <input class="form-control" name="email_invoicing" type="text" id="email_invoicing" value="@if(isset($invoice)){{ $invoice->email_invoicing }}@endif">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <label for="payment_condition" class="col-md-5 form-label">Payment Conditions</label>
            <div class="col-md-7">
                <input class="form-control" name="payment_condition" type="text" id="payment_condition" value="@if(isset($invoice)){{ $invoice->payment_condition }}@endif">
            </div>
        </div>
        <div class="col-md-12 form-group">
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
        <div class="col-md-12 form-group">
            <label for="free_text_1" class="col-md-5 form-label">Free Text</label>
            <div class="col-md-7">
                <textarea class="form-control" rows="3" name="free_text_1" type="text" id="free_text_1">{{ isset($invoice) ? $invoice->free_text_1 : '' }}</textarea>
            </div>
        </div>
        <div class="col-md-12 form-group">
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
        <div class="col-md-12 form-group">
            <label for="free_text_2" class="col-md-5 form-label">Free Text</label>
            <div class="col-md-7">
                <textarea class="form-control" rows="3" name="free_text_2" type="text" id="free_text_2">{{ isset($invoice) ? $invoice->free_text_2 : '' }}</textarea>
            </div>
        </div>
        <div class="col-md-12 form-group">
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
        <div class="col-md-12 form-group">
            <label for="free_text_3" class="col-md-5 form-label">Free Text</label>
            <div class="col-md-7">
                <textarea class="form-control" rows="3" name="free_text_3" type="text" id="free_text_3">{{ isset($invoice) ? $invoice->free_text_3 : '' }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <label for="note" class="col-md-2 form-label">Notes</label>
            <div class="col-md-10">
                <textarea rows="5" class="form-control" name="note" type="text" id="note">{{ (isset($invoice))? $invoice->note : '' }}</textarea>
            </div>
        </div>
    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" id="invoice_submit" value="@if(isset($invoice)) Update @else Save @endif">
                <a href="{{ route('company.rcontact.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>