@extends('company.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i><a href="{{ route('company.hrCivilStatuses.index') }}">Hr Civil Statuses</a></span></h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @if (session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif

                @if (session()->has('msg.error'))
                    @include('layouts.error_msg')
                @endif
                

                <div class="text-right m-b-3">
                    <a href="{{ route('company.hrCivilStatuses.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Create Status</a> 
                </div>

                <div class="table-primary">
                    @include('company.hr_civil_statuses.table')
                </div>
            </div>
        </div>
    </div>
@endsection

