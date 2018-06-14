<!-- Employment Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employment_date', 'Employment Date:') !!}
    {!! Form::date('employment_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Termination Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('termination_time', 'Termination Time:') !!}
    {!! Form::number('termination_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Employeed Untill Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employeed_untill', 'Employeed Untill:') !!}
    {!! Form::date('employeed_untill', null, ['class' => 'form-control']) !!}
</div>

<!-- Personal Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personal_category', 'Personal Category:') !!}
    {!! Form::number('personal_category', null, ['class' => 'form-control']) !!}
</div>

<!-- Collective Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('collective_type', 'Collective Type:') !!}
    {!! Form::number('collective_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Employment Form Field -->
<div class="form-group col-sm-6">
    {!! Form::label('employment_form', 'Employment Form:') !!}
    {!! Form::number('employment_form', null, ['class' => 'form-control']) !!}
</div>

<!-- Insurance Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('insurance_date', 'Insurance Date:') !!}
    {!! Form::date('insurance_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Insurance Fees Field -->
<div class="form-group col-sm-6">
    {!! Form::label('insurance_fees', 'Insurance Fees:') !!}
    {!! Form::number('insurance_fees', null, ['class' => 'form-control']) !!}
</div>

<!-- Department Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department', 'Department:') !!}
    {!! Form::number('department', null, ['class' => 'form-control']) !!}
</div>

<!-- Designation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('designation', 'Designation:') !!}
    {!! Form::number('designation', null, ['class' => 'form-control']) !!}
</div>

<!-- Vacancies Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vacancies', 'Vacancies:') !!}
    {!! Form::number('vacancies', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('company.hrCompanyEmployments.index') !!}" class="btn btn-default">Cancel</a>
</div>
