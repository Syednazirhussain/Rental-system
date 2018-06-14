@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Hr Employment Form
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'company.hrEmploymentForms.store']) !!}

                        @include('company.hr_employment_forms.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
