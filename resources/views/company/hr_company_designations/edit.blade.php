@extends('company.default')

@section('content')
    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon  fa fa-edit"></i><a href="{{ route('company.hrCompanyDesignations.index')}}">Company HR / Company Designation</a> / </span>Edit Company Designation</h1>
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