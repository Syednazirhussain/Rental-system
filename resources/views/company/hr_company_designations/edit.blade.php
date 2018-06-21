@extends('company.default')

@section('content')
    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i><a href="{{ route('company.hrCompanyDesignations.index')}}">Company HR / HR Company Designation</a> / </span>Edit HR Company Designation</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit HR Company Designation</div>
                    </div>
                    <div class="panel-body">
                    {!! Form::model($hrCompanyDesignation, ['route' => ['company.hrCompanyDesignations.update', $hrCompanyDesignation->id], 'method' => 'patch', 'id' => 'form']) !!}

                        @include('company.hr_company_designations.fields')

                   {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection