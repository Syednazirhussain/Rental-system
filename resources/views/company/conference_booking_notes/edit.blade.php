@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Conference Booking Notes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($conferenceBookingNotes, ['route' => ['company.conferenceBookingNotes.update', $conferenceBookingNotes->id], 'method' => 'patch']) !!}

                        @include('company.conference_booking_notes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection