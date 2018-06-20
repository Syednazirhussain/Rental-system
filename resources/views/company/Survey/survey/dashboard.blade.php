@extends('company.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon ion-ios-keypad"></i>
                    <a href="{{ route('company.survey.index') }}">Surveys Dashboard</a>
                </span>
            </h1>
        </div>

        <div class="panel">
            <div class="panel-body">
                <ul  class="nav nav-tabs m-b-2">
                    <li class="active">
                        <a href="#list" data-toggle="tab">All Data</a>
                    </li>
                    <li>
                        <a href="#graph" data-toggle="tab">Show in Graph</a>
                    </li>
                </ul>

                <div class="tab-content clearfix">
                    <div class="tab-pane active" id="list">
                        @include('company.Survey.survey.list_field')
                    </div>
                    <div class="tab-pane" id="graph">
                        @include('company.Survey.survey.graph_field')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection