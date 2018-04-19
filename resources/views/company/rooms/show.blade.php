@extends('company.default')

@section('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Settings / Rooms / </span>{!! $room->id !!}
            </h1>
        </div>

        <div class="panel">
            <div class="panel-body">
                @include('company.rooms.show_fields')

                <a href="{!! route('company.rooms.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>

@endsection
