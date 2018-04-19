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
                    <div class="panel-heading">
                        <div class="panel-title">@if(isset($room)){{ "Edit" }}@else{{ "Add" }}@endif Room</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.rooms.update', [$room->id]) }}" method="POST" id="roomForm" enctype="multipart/form-data">

                            @include('company.rooms.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection