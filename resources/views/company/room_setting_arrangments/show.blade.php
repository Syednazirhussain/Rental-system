@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Room Setting Arrangment
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('company.room_setting_arrangments.show_fields')
                    <a href="{!! route('company.roomSettingArrangments.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
