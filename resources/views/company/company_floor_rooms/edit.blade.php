@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon fa fa-edit"></i>
                    Floor /
                </span>
                Edit "{!! $companyFloorRoom->floor !!}"
            </h1>
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">@if(isset($companyFloorRoom)){{ "Edit" }}@else{{ "Add" }}@endif "{!! $companyFloorRoom->floor !!}"</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.companyFloorRooms.update', [$companyFloorRoom->id]) }}" method="POST" id="floorRoomForm">

                            @include('company.company_floor_rooms.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection