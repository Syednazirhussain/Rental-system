@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lease Partner
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($leasePartner, ['route' => ['company.leasePartners.update', $leasePartner->id], 'method' => 'patch']) !!}

                        @include('company.lease_partners.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection