<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $leaseAttachment->id !!}</p>
</div>

<!-- File Name Field -->
<div class="form-group">
    {!! Form::label('file_name', 'File Name:') !!}
    <p>{!! $leaseAttachment->file_name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $leaseAttachment->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $leaseAttachment->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $leaseAttachment->deleted_at !!}</p>
</div>

