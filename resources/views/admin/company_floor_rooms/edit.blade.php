@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Floor Room
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($companyFloorRoom, ['route' => ['admin.companyFloorRooms.update', $companyFloorRoom->id], 'method' => 'patch']) !!}

                        @include('admin.company_floor_rooms.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection