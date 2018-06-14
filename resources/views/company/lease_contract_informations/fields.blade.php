<!-- Contract Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contract_start_date', 'Contract Start Date:') !!}
    {!! Form::date('contract_start_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Contract Length Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contract_length', 'Contract Length:') !!}
    {!! Form::number('contract_length', null, ['class' => 'form-control']) !!}
</div>

<!-- Termination Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('termination_time', 'Termination Time:') !!}
    {!! Form::number('termination_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Contract Auto Renewal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contract_auto_renewal', 'Contract Auto Renewal:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('contract_auto_renewal', false) !!}
        {!! Form::checkbox('contract_auto_renewal', '1', null) !!} 1
    </label>
</div>

<!-- Contract Renewal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contract_renewal', 'Contract Renewal:') !!}
    {!! Form::text('contract_renewal', null, ['class' => 'form-control']) !!}
</div>

<!-- Renewal Number Month Field -->
<div class="form-group col-sm-6">
    {!! Form::label('renewal_number_month', 'Renewal Number Month:') !!}
    {!! Form::number('renewal_number_month', null, ['class' => 'form-control']) !!}
</div>

<!-- Contract Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contract_type', 'Contract Type:') !!}
    {!! Form::text('contract_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Contract Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contract_number', 'Contract Number:') !!}
    {!! Form::text('contract_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Contract Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contract_name', 'Contract Name:') !!}
    {!! Form::text('contract_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Contract Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('contract_desc', 'Contract Desc:') !!}
    {!! Form::textarea('contract_desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Per Month Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount_per_month', 'Amount Per Month:') !!}
    {!! Form::number('amount_per_month', null, ['class' => 'form-control']) !!}
</div>

<!-- Income Per Month Field -->
<div class="form-group col-sm-6">
    {!! Form::label('income_per_month', 'Income Per Month:') !!}
    {!! Form::number('income_per_month', null, ['class' => 'form-control']) !!}
</div>

<!-- Currency Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency_id', 'Currency Id:') !!}
    {!! Form::number('currency_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cost Reference Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost_reference', 'Cost Reference:') !!}
    {!! Form::text('cost_reference', null, ['class' => 'form-control']) !!}
</div>

<!-- Income Reference Field -->
<div class="form-group col-sm-6">
    {!! Form::label('income_reference', 'Income Reference:') !!}
    {!! Form::text('income_reference', null, ['class' => 'form-control']) !!}
</div>

<!-- Other Reference Field -->
<div class="form-group col-sm-6">
    {!! Form::label('other_reference', 'Other Reference:') !!}
    {!! Form::text('other_reference', null, ['class' => 'form-control']) !!}
</div>

<!-- Lease Attachment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lease_attachment_id', 'Lease Attachment Id:') !!}
    {!! Form::number('lease_attachment_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Building Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('building_id', 'Building Id:') !!}
    {!! Form::number('building_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cost Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost_number', 'Cost Number:') !!}
    {!! Form::number('cost_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Lease Partner Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lease_partner_id', 'Lease Partner Id:') !!}
    {!! Form::number('lease_partner_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('company.leaseContractInformations.index') !!}" class="btn btn-default">Cancel</a>
</div>
