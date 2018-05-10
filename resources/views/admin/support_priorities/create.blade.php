@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Support Priorities
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.supportPriorities.store']) !!}

                        @include('admin.support_priorities.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
