

@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon ion-android-checkbox-outline"></i>
                    Booking Agencies /
                </span>
                Edit
            </h1>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">@if(isset($bookingAgency)){{ "Edit" }}@else{{ "Add" }}@endif Booking Agencies</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.bookingAgencies.update', [$bookingAgency->id]) }}" method="POST" id="bookingForm">

                            @include('company.booking_agencies.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection