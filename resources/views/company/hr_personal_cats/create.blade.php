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
                    {!! Form::open(['route' => 'company.hrPersonalCats.store']) !!}

                        @include('company.hr_personal_cats.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
