<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Criteria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('criteria_id', 'Criteria Id:') !!}
    {!! Form::number('criteria_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Multi Units Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_multi_units', 'Is Multi Units:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_multi_units', false) !!}
        {!! Form::checkbox('is_multi_units', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('company.conference.equipments.index') !!}" class="btn btn-default">Cancel</a>
</div>
