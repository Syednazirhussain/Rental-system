@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Discount Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($discountType, ['route' => ['admin.discountTypes.update', $discountType->id], 'method' => 'patch']) !!}

                        @include('admin.discount_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection