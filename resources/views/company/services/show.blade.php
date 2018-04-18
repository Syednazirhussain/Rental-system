@extends('company.default')

@section('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Settings / Services / </span>{!! $service->id !!}
            </h1>
        </div>

        <div class="panel">
            <div class="panel-body">
                @include('company.services.show_fields')

                <a href="{!! route('company.services.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>

@endsection
