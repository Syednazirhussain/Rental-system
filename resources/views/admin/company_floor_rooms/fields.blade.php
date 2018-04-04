<!-- Building Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('building_id', 'Building Id:') !!}
    {!! Form::number('building_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Floor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('floor', 'Floor:') !!}
    {!! Form::number('floor', null, ['class' => 'form-control']) !!}
</div>

<!-- Num Rooms Field -->
<div class="form-group col-sm-6">
    {!! Form::label('num_rooms', 'Num Rooms:') !!}
    {!! Form::number('num_rooms', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.companyFloorRooms.index') !!}" class="btn btn-default">Cancel</a>
</div>
