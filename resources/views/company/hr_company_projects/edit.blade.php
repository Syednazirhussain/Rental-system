@extends('company.default')

@section('content')
    <div class="px-content">

        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon ion-ios-keypad"></i>
                    <a href="{{ route('company.hrCompanyProjects.index') }}">Hr Company Project</a>
                </span>
            </h1>
        </div>

        <div class="panel">
            <div class="panel-body">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::model($hrCompanyProject, ['route' => ['company.hrCompanyProjects.update', $hrCompanyProject->id], 'method' => 'patch']) !!}

                        @include('company.hr_company_projects.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection