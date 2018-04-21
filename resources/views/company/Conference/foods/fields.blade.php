<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Per Attendee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price_per_attendee', 'Price Per Attendee:') !!}
    {!! Form::number('price_per_attendee', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('company.conference.foods.index') !!}" class="btn btn-default">Cancel</a>
</div>
