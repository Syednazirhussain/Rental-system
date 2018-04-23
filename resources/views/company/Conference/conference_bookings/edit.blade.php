@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Conference Booking
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($conferenceBooking, ['route' => ['company.conference.conferenceBookings.update', $conferenceBooking->id], 'method' => 'patch']) !!}

                        @include('company.Conference.conference_bookings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection