@extends('company.default')

@section('content')
    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i><a href="{{ route('company.hrCompanyCollectives.index')}}">Company HR / HR Company Collective</a> / </span>Edit HR Company Collective</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add HR Company Collective</div>
                    </div>
                    <div class="panel-body">
                    {!! Form::model($hrCompanyCollective, ['route' => ['company.hrCompanyCollectives.update', $hrCompanyCollective->id], 'method' => 'patch', 'id' => 'form']) !!}

                        @include('company.hr_company_collectives.fields')

                   {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection