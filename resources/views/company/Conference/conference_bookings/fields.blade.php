<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($conferenceBooking))
    <input name="_method" type="hidden" value="PATCH">
@endif

<!-- Booking Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('booking_date', 'Booking Date:') !!}
    {!! Form::date('booking_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Dateime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_dateime', 'Start Dateime:') !!}
    {!! Form::date('start_dateime', null, ['class' => 'form-control']) !!}
</div>

<!-- End Datetime Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_datetime', 'End Datetime:') !!}
    {!! Form::date('end_datetime', null, ['class' => 'form-control']) !!}
</div>

<!-- Attendees Field -->
<div class="form-group col-sm-6">
    {!! Form::label('attendees', 'Attendees:') !!}
    {!! Form::number('attendees', null, ['class' => 'form-control']) !!}
</div>

<!-- Room Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_id', 'Room Id:') !!}
    {!! Form::number('room_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Room Layout Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_layout_id', 'Room Layout Id:') !!}
    {!! Form::number('room_layout_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Duration Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duration_code', 'Duration Code:') !!}
    {!! Form::text('duration_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Booking Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('booking_status', 'Booking Status:') !!}
    {!! Form::text('booking_status', null, ['class' => 'form-control']) !!}
</div>

<!-- Payment Method Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payment_method_code', 'Payment Method Code:') !!}
    {!! Form::text('payment_method_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Room Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_price', 'Room Price:') !!}
    {!! Form::number('room_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Equipment Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('equipment_price', 'Equipment Price:') !!}
    {!! Form::number('equipment_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Food Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('food_price', 'Food Price:') !!}
    {!! Form::number('food_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Tax Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax', 'Tax:') !!}
    {!! Form::number('tax', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_price', 'Total Price:') !!}
    {!! Form::number('total_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Deposit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deposit', 'Deposit:') !!}
    {!! Form::number('deposit', null, ['class' => 'form-control']) !!}
</div>

<!-- Remarks Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('remarks', 'Remarks:') !!}
    {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('company.conference.conferenceBookings.index') !!}" class="btn btn-default">Cancel</a>
</div>
