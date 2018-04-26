



@extends('company.default')


@section('content')


     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Conference Bookings / </span>Edit Booking # {{$conferenceBooking->id}}</h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit Booking # {{$conferenceBooking->id}}</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.conference.conferenceBookings.update', $conferenceBooking->id) }}" method="POST" id="">
                          <input type="hidden" name="_method" value="PATCH">

                            @include('company.Conference.conference_bookings.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection