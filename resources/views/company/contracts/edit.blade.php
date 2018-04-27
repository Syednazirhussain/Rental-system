@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Settings / </span>Edit Contract</h1>
        </div>

        @include('company.contracts.fields')
    </div>
@endsection

@section('js')

    <!-- js start -->
    @include('company.contracts.js')
    <!-- js end -->

@endsection
