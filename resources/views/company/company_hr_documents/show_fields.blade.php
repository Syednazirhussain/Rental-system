<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $companyHrDocuments->id !!}</p>
</div>

<!-- Company Hr Id Field -->
<div class="form-group">
    {!! Form::label('company_hr_id', 'Company Hr Id:') !!}
    <p>{!! $companyHrDocuments->company_hr_id !!}</p>
</div>

<!-- File Name Field -->
<div class="form-group">
    {!! Form::label('file_name', 'File Name:') !!}
    <p>{!! $companyHrDocuments->file_name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $companyHrDocuments->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $companyHrDocuments->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $companyHrDocuments->deleted_at !!}</p>
</div>

