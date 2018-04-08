@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Building
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($companyBuilding, ['route' => ['admin.companyBuildings.update', $companyBuilding->id], 'method' => 'patch']) !!}

                        @include('admin.company_buildings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection