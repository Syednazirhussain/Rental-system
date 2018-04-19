@extends('company.default')

@section('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Settings / CompanyBuilding / </span>{!! $companyBuilding->name !!}
            </h1>
        </div>

        <div class="panel">
            <div class="panel-body">
                @include('company.company_buildings.show_fields')

                <a href="{!! route('company.companyBuildings.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>

@endsection
