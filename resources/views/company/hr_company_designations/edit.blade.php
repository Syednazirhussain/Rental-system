@extends('company.default')

@section('content')
    <div class="px-content">

        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon ion-ios-keypad"></i>
                    <a href="{{ route('company.hrCompanyDesignations.index') }}">Hr Company Designation</a>
                </span>
            </h1>
        </div>

        <div class="panel">
            <div class="panel-body">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    {!! Form::model($hrCompanyDesignation, ['route' => ['company.hrCompanyDesignations.update', $hrCompanyDesignation->id], 'method' => 'patch']) !!}

                        @include('company.hr_company_designations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection