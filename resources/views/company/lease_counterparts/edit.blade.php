@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lease Counterpart
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($leaseCounterpart, ['route' => ['company.leaseCounterparts.update', $leaseCounterpart->id], 'method' => 'patch']) !!}

                        @include('company.lease_counterparts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection