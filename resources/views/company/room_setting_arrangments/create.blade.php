@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Room Setting Arrangment
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'company.roomSettingArrangments.store']) !!}

                        @include('company.room_setting_arrangments.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
