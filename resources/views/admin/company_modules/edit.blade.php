@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Module
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($companyModule, ['route' => ['admin.companyModules.update', $companyModule->id], 'method' => 'patch']) !!}

                        @include('admin.company_modules.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection