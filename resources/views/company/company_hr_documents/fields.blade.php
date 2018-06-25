<!-- Company Hr Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_hr_id', 'Company Hr Id:') !!}
    {!! Form::number('company_hr_id', null, ['class' => 'form-control']) !!}
</div>

<!-- File Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file_name', 'File Name:') !!}
    {!! Form::text('file_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('company.companyHrDocuments.index') !!}" class="btn btn-default">Cancel</a>
</div>
