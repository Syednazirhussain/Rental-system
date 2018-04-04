@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Contact Person
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.companyContactPeople.store']) !!}

                        @include('admin.company_contact_people.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
