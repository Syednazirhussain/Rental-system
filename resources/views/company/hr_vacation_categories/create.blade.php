@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-plus"></i><a href="{{ route('company.hrVacationCategories.index')}}">Company HR / HR Vacation Categories</a> / </span>Add HR Vacation Categories</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add HR Vacation Categories</div>
                    </div>
                    <div class="panel-body">
                    {!! Form::open(['route' => 'company.hrVacationCategories.store', 'id' => 'form']) !!}

                        @include('company.hr_vacation_categories.fields')

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
