<!-- Company Hr Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_hr_id', 'Company Hr Id:') !!}
    {!! Form::number('company_hr_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Organization Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('organization_name', 'Organization Name:') !!}
    {!! Form::text('organization_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Job Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('job_title', 'Job Title:') !!}
    {!! Form::text('job_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Courses Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('courses', 'Courses:') !!}
    {!! Form::textarea('courses', null, ['class' => 'form-control']) !!}
</div>

<!-- Employed From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employed_from', 'Employed From:') !!}
    {!! Form::date('employed_from', null, ['class' => 'form-control']) !!}
</div>

<!-- Employed Until Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employed_until', 'Employed Until:') !!}
    {!! Form::date('employed_until', null, ['class' => 'form-control']) !!}
</div>

<!-- Create At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('create_at', 'Create At:') !!}
    {!! Form::date('create_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('company.companyHrPreEmployments.index') !!}" class="btn btn-default">Cancel</a>
</div>
