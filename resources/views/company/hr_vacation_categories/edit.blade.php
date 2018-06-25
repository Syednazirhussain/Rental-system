@extends('company.default')

@section('content')
    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon  fa fa-edit"></i><a href="{{ route('company.hrVacationCategories.index')}}">Company HR / Vacation Category</a> / </span>Edit Vacation Category</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit HR Vacation Category</div>
                    </div>
                    <div class="panel-body">
                    {!! Form::model($hrVacationCategory, ['route' => ['company.hrVacationCategories.update', $hrVacationCategory->id], 'method' => 'patch', 'id' => 'form']) !!}

                        @include('company.hr_vacation_categories.fields')

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection