@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Room Notes
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('company.room_notes.show_fields')
                    <a href="{!! route('company.roomNotes.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
