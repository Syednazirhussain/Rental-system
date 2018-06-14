@extends('admin.default')

@section('content')
    <section class="content-header">
        <h1>
            Hr Company Employment
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'company.hrCompanyEmployments.store']) !!}

                        @include('company.hr_company_employments.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
