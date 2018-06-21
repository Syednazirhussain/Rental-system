@extends('company.default')

@section('content')
    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i><a href="{{ route('company.hrEmploymentForms.index')}}">Company HR / HR Employment From</a> / </span>Edit HR Employment From</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit HR Employment From</div>
                    </div>
                    <div class="panel-body">
                   {!! Form::model($hrEmploymentForm, ['route' => ['company.hrEmploymentForms.update', $hrEmploymentForm->id], 'method' => 'patch', 'id' => 'form']) !!}

                        @include('company.hr_employment_forms.fields')

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection