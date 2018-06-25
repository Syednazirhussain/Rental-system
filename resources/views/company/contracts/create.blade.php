@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Settings / </span>Add Contract</h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                <ul  class="nav nav-tabs m-b-2">
                    <li class="active">
                        <a  href="#rental" data-toggle="tab">Rental Agreement</a>
                    </li>
                    <li>
                        <a href="#termination" data-toggle="tab">Termination</a>
                    </li>
                    <li>
                        <a href="#control_room" data-toggle="tab">Room Control After Termination</a>
                    </li>
                </ul>

                <div class="tab-content clearfix">
                    <div class="tab-pane active" id="rental">
                        @include('company.contracts.tabs.rental_fields')
                    </div>
                    <div class="tab-pane" id="termination">
                        @include('company.contracts.tabs.termination_fields')
                    </div>
                    <div class="tab-pane" id="control_room">
                        @include('company.contracts.tabs.control_fields')
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')

    <!-- js start -->
    @include('company.contracts.tabs.js')
    <!-- js end -->

@endsection
