@extends('company.default')

@section('content')
    <div class="px-content">

        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon ion-ios-keypad"></i>
                    <a href="{{ route('company.supports.index') }}">Hr Salary Type</a>
                </span>
            </h1>
        </div>

        <div class="panel">
            <div class="panel-body">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'company.hrSalaryTypes.store']) !!}

                        @include('company.hr_salary_types.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
