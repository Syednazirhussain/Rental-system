@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Hr Employment Form
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('company.hr_employment_forms.show_fields')
                    <a href="{!! route('company.hrEmploymentForms.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
