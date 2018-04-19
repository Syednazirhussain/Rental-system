@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Settings / </span>Edit Building</h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Edit Building</div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('company.companyBuildings.update', [$companyBuilding->id]) }}" method="POST" id="buildingForm">

                            @include('company.company_buildings.fields')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection