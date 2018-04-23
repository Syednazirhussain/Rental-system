<!-- Booking Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('booking_id', 'Booking Id:') !!}
    {!! Form::number('booking_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Entity Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entity_type', 'Entity Type:') !!}
    {!! Form::text('entity_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Entity Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entity_name', 'Entity Name:') !!}
    {!! Form::text('entity_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Entity Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entity_price', 'Entity Price:') !!}
    {!! Form::number('entity_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Entity Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entity_qty', 'Entity Qty:') !!}
    {!! Form::number('entity_qty', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('company/Conference.conferenceBookingItems.index') !!}" class="btn btn-default">Cancel</a>
</div>
