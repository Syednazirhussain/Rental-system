<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $companyInvoice->id !!}</p>
</div>

<!-- Company Id Field -->
<div class="form-group">
    {!! Form::label('company_id', 'Company Id:') !!}
    <p>{!! $companyInvoice->company_id !!}</p>
</div>

<!-- Payment Cycle Id Field -->
<div class="form-group">
    {!! Form::label('payment_cycle_id', 'Payment Cycle Id:') !!}
    <p>{!! $companyInvoice->payment_cycle_id !!}</p>
</div>

<!-- Discount Field -->
<div class="form-group">
    {!! Form::label('discount', 'Discount:') !!}
    <p>{!! $companyInvoice->discount !!}</p>
</div>

<!-- Tax Field -->
<div class="form-group">
    {!! Form::label('tax', 'Tax:') !!}
    <p>{!! $companyInvoice->tax !!}</p>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    <p>{!! $companyInvoice->total !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $companyInvoice->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $companyInvoice->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $companyInvoice->deleted_at !!}</p>
</div>

