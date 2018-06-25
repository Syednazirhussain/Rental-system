@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Hr Other Info
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($companyHrOtherInfo, ['route' => ['company.companyHrOtherInfos.update', $companyHrOtherInfo->id], 'method' => 'patch']) !!}

                        @include('company.company_hr_other_infos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection