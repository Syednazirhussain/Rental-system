@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Hr Pre Employment
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($companyHrPreEmployment, ['route' => ['company.companyHrPreEmployments.update', $companyHrPreEmployment->id], 'method' => 'patch']) !!}

                        @include('company.company_hr_pre_employments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection