@extends('company.default')

@section('content')
    <div class="px-content">
        <h1>
            Hr Personal Cat
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($hrPersonalCat, ['route' => ['company.hrPersonalCats.update', $hrPersonalCat->id], 'method' => 'patch']) !!}

                        @include('company.hr_personal_cats.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection