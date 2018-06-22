<!-- Company Hr Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_hr_id', 'Company Hr Id:') !!}
    {!! Form::number('company_hr_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Languages Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('languages', 'Languages:') !!}
    {!! Form::textarea('languages', null, ['class' => 'form-control']) !!}
</div>

<!-- Driving License Field -->
<div class="form-group col-sm-6">
    {!! Form::label('driving_license', 'Driving License:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('driving_license', false) !!}
        {!! Form::checkbox('driving_license', '1', null) !!} 1
    </label>
</div>

<!-- Skills Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('skills', 'Skills:') !!}
    {!! Form::textarea('skills', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('company.companyHrOtherInfos.index') !!}" class="btn btn-default">Cancel</a>
</div>
