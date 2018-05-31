<!-- Room Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_id', 'Room Id:') !!}
    {!! Form::number('room_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Sitting Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sitting_id', 'Sitting Id:') !!}
    {!! Form::number('sitting_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Entity Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entity_type', 'Entity Type:') !!}
    {!! Form::text('entity_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Image File Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_file', 'Image File:') !!}
    {!! Form::text('image_file', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('company.roomImages.index') !!}" class="btn btn-default">Cancel</a>
</div>
