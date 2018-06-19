@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Hr Notes
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'company.companyHrNotes.store']) !!}

                        @include('company.company_hr_notes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
