@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Invoice
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($companyInvoice, ['route' => ['admin.companyInvoices.update', $companyInvoice->id], 'method' => 'patch']) !!}

                        @include('admin.company_invoices.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection