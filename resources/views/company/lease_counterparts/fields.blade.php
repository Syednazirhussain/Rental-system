<!-- Organization Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('organization_number', 'Organization Number:') !!}
    {!! Form::number('organization_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_name', 'Company Name:') !!}
    {!! Form::text('company_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Contract Person Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contract_person', 'Contract Person:') !!}
    {!! Form::text('contract_person', null, ['class' => 'form-control']) !!}
</div>

<!-- Tel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tel', 'Tel:') !!}
    {!! Form::text('tel', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Lease Partner Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lease_partner_id', 'Lease Partner Id:') !!}
    {!! Form::number('lease_partner_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('company.leaseCounterparts.index') !!}" class="btn btn-default">Cancel</a>
</div>
