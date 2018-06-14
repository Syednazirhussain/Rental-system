@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lease Contract Information
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($leaseContractInformation, ['route' => ['company.leaseContractInformations.update', $leaseContractInformation->id], 'method' => 'patch']) !!}

                        @include('company.lease_contract_informations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection