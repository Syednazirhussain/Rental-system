@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Room Equipments / </span>Add Room Equipments</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Add Room Equipments</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.roomEquipments.store') }}" method="POST" id="roomEquipmentsForm" enctype="multipart/form-data">

                            @include('company.room_equipments.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
