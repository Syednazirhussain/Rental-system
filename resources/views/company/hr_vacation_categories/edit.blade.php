@extends('company.default')

@section('content')
    <div class="px-content">

        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon ion-ios-keypad"></i>
                    <a href="{{ route('company.hrVacationCategories.index') }}">Hr Vacation Category</a>
                </span>
            </h1>
        </div>

        <div class="panel">
            <div class="panel-body">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::model($hrVacationCategory, ['route' => ['company.hrVacationCategories.update', $hrVacationCategory->id], 'method' => 'patch']) !!}

                        @include('company.hr_vacation_categories.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection