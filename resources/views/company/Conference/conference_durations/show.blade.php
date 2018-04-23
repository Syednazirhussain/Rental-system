@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Conference Duration
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('company.Conference.conference_durations.show_fields')
                    <a href="{!! route('company/Conference.conferenceDurations.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
