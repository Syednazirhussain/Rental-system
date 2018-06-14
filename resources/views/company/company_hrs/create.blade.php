@extends('company.default')

@section('content')

    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Company Hr / </span>Add Company Hr</h1>
        </div>

        @include('company.company_hrs.fields')

    </div>


@endsection
