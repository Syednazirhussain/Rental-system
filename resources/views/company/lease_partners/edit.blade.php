@extends('company.default')

@section('content')

     <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Leasings / </span>{{ $leasePartner->parent_company }}</h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @include('company.lease_partners.fields')

            </div>
        </div>
    </div>
@endsection