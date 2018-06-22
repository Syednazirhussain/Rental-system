@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Hr Documents
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($companyHrDocuments, ['route' => ['company.companyHrDocuments.update', $companyHrDocuments->id], 'method' => 'patch']) !!}

                        @include('company.company_hr_documents.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection