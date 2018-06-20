@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lease Attachment
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($leaseAttachment, ['route' => ['company.leaseAttachments.update', $leaseAttachment->id], 'method' => 'patch']) !!}

                        @include('company.lease_attachments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection