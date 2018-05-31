@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Room Equipments
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($roomEquipments, ['route' => ['company.roomEquipments.update', $roomEquipments->id], 'method' => 'patch']) !!}

                        @include('company.room_equipments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection