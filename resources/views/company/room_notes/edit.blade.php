@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Room Notes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($roomNotes, ['route' => ['company.roomNotes.update', $roomNotes->id], 'method' => 'patch']) !!}

                        @include('company.room_notes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection