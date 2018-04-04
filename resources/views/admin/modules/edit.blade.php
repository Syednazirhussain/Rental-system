@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Module
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($module, ['route' => ['admin.modules.update', $module->id], 'method' => 'patch']) !!}

                        @include('admin.modules.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection