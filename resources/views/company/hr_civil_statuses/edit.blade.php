@extends('company.default')

@section('content')
    <div class="px-content">

        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon  fa fa-edit"></i>
                    <a href="{{ route('company.hrCivilStatuses.index') }}">Company HR / Civil Status</a> / 
                </span>Edit " {{ucfirst($hrCivilStatus->name)}} "
            </h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit " {{ucfirst($hrCivilStatus->name)}} "</div>
                    </div>
                    <div class="panel-body">
                    {!! Form::model($hrCivilStatus, ['route' => ['company.hrCivilStatuses.update', $hrCivilStatus->id], 'method' => 'patch', 'id' => 'form']) !!}

                        @include('company.hr_civil_statuses.fields')

                   {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection