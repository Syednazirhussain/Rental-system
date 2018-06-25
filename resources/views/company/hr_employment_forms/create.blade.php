@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-plus"></i><a href="{{ route('company.hrEmploymentForms.index')}}">Company HR / Employment From</a> / </span>Create Employment From</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Create HR Employment From</div>
                    </div>
                    <div class="panel-body">
                    {!! Form::open(['route' => 'company.hrEmploymentForms.store', 'id' => 'form']) !!}

                        @include('company.hr_employment_forms.fields')

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection