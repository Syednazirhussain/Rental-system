@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Company Floor Room
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.companyFloorRooms.store']) !!}

                        @include('admin.company_floor_rooms.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
