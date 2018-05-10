@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Support
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($support, ['route' => ['admin.supports.update', $support->id], 'method' => 'patch']) !!}

                        @include('admin.supports.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection