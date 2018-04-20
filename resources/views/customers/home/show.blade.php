@extends('company.default')

@section('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Settings / Rooms / </span>{!! $room->id !!}
            </h1>
        </div>

        <div class="panel">
            <div class="panel-body">
                @include('customers.home.show_fields')
            </div>
        </div>
    </div>

@endsection
