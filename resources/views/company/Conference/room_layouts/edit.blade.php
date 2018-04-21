@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Room Layout
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($roomLayout, ['route' => ['company/Conference.roomLayouts.update', $roomLayout->id], 'method' => 'patch']) !!}

                        @include('company.Conference.room_layouts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection