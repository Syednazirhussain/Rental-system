@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i><a href="{{ route('company.roomSettingArrangments.index') }}">Room Setting Arrangements</a> / </span>Add Room Sitting Arrangment</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Room Sitting Arrangment</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.roomSettingArrangments.store') }}" method="POST" id="roomSittingForm">

                            @include('company.room_setting_arrangments.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

