@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Support
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($companySupport, ['route' => ['company.companySupports.update', $companySupport->id], 'method' => 'patch']) !!}

                        @include('company.company_supports.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection