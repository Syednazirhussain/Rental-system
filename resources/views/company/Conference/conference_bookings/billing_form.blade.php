<div class="row">

	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">Invoice Send as</label>
                <select class="form-control select2-invoice_send" id="invoice_send" name="invoice_send">
                    <option></option>
                    <option <?php if(isset($companyCustomerInfo) && $companyCustomerInfo->invoice_send_as == "email" ) { echo "selected"; } ?> value="email">Email</option>
                    <option <?php if(isset($companyCustomerInfo) && $companyCustomerInfo->invoice_send_as == "print" ) { echo "selected"; } ?> value="print">Print</option>
                </select>
                <div class="errorTxt"></div>
            </div>
	</div>

	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">Reference</label>
                <input class="form-control" id="reference" name="reference" value="@if(isset($companyCustomerInfo)){{$companyCustomerInfo->reference}}@endif">
                <div class="errorTxt"></div>
            </div>
	</div>

</div>
<div class="row">

	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">Contact Person</label>
                <input class="form-control" id="contact_person" name="contact_person" value="" placeholder="Contact Person">
                <div class="errorTxt"></div>
            </div>
	</div>


	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">Payment Conditions</label>
                <select class="form-control select2-payment_conditions" id="payment_conditions" name="payment_conditions">
                    <option></option>
                    <option <?php if(isset($companyCustomerInfo) && $companyCustomerInfo->payment_condition == "qwe" ) { echo "selected"; } ?> value="qwe">qwe</option>
                    <option <?php if(isset($companyCustomerInfo) && $companyCustomerInfo->payment_condition == "asd" ) { echo "selected"; } ?>  value="asd">asd</option>
                    <option <?php if(isset($companyCustomerInfo) && $companyCustomerInfo->payment_condition == "zxc" ) { echo "selected"; } ?>  value="zxc">zxc</option>
                </select>
                <div class="errorTxt"></div>
            </div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">Interest Fees</label>
                <select class="form-control select2-interest_fees" id="interest_fees" name="interest_fees">
                    <option value=""></option>
                    <option <?php if(isset($companyCustomerInfo) && $companyCustomerInfo->interest_fees == "yes" ) { echo "selected"; } ?>  value="yes">Yes</option>
                    <option <?php if(isset($companyCustomerInfo) && $companyCustomerInfo->interest_fees == "no" ) { echo "selected"; } ?>  value="no">No</option>
                </select>
                <div class="errorTxt"></div>
            </div>
	</div>

	<div class="col-md-6">
            <div class="form-group m-t-2">
                <label for="customer">Payment Reminder</label>
                <select class="form-control select2-payment_reminder" id="payment_reminder" name="payment_reminder">
                    <option value=""></option>
                    <option <?php if(isset($companyCustomerInfo) && $companyCustomerInfo->peyment_reminder == "yes" ) { echo "selected"; } ?>  value="yes">Yes</option>
                    <option <?php if(isset($companyCustomerInfo) && $companyCustomerInfo->peyment_reminder == "no" ) { echo "selected"; } ?>  value="no">No</option>
                </select>
                <div class="errorTxt"></div>
            </div>
	</div>
</div>
