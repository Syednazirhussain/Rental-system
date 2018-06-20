@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-plus"></i><a href="{{ route('company.hrCompanyDesignations.index')}}">Company HR / HR Company Designation</a> / </span>Add HR Company Designation</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add HR Company Designation</div>
                    </div>
                    <div class="panel-body">
                     {!! Form::open(['route' => 'company.hrCompanyDesignations.store', 'id' => 'form']) !!}

                        @include('company.hr_company_designations.fields')

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
