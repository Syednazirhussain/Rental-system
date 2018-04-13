@extends('admin.default')

@section('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Settings / User / </span>{!! $user->id !!}
            </h1>
        </div>

        <div class="panel">
            <div class="panel-body">
                @include('admin.users.show_fields')

                <a href="{!! route('admin.users.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>

@endsection
