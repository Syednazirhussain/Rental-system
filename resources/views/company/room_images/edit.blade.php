@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Room Images
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($roomImages, ['route' => ['company.roomImages.update', $roomImages->id], 'method' => 'patch']) !!}

                        @include('company.room_images.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection