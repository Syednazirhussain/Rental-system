@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-plus"></i><a href="{{ route('company.hrSalaryTypes.index')}}">Company HR / Salary Type</a> / </span>Create Salary Type</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Create HR Salary Type</div>
                    </div>
                    <div class="panel-body">
                    {!! Form::open(['route' => 'company.hrSalaryTypes.store', 'id' => 'form']) !!}

                        @include('company.hr_salary_types.fields')

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
