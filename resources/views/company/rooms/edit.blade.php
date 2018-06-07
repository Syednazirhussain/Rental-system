@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon ion-android-checkbox-outline"></i>
                    Settings /
                </span>
                Edit Room
            </h1>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">

                    <form action="{{ route('company.rooms.update',[$room->id]) }}" method="POST" id="roomForm" enctype="multipart/form-data">
                            @include('company.rooms.field')
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection