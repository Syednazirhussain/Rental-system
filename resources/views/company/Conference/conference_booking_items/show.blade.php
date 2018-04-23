@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Conference Booking Item
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('company.Conference.conference_booking_items.show_fields')
                    <a href="{!! route('company/Conference.conferenceBookingItems.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
