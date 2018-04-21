@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Equipments
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($equipments, ['route' => ['company.conference.equipments.update', $equipments->id], 'method' => 'patch']) !!}

                        @include('company.Conference.equipments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection