@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-plus"></i><a href="{{ route('company.hrCompanyCollectives.index')}}">Company HR / HR Company Collective</a> / </span>Add HR Company Collective</h1>
        </div>
        <div class="panel">

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add HR Company Collective</div>
                    </div>
                    <div class="panel-body">
                    {!! Form::open(['route' => 'company.hrCompanyCollectives.store', 'id' => 'form']) !!}

                        @include('company.hr_company_collectives.fields')

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
