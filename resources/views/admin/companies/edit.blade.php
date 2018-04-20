@extends('admin.default')




@section('css')

        <!-- styles -->


@endsection


@section('content')


        <div class="px-content">
            <div class="page-header">
                <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-android-checkbox-outline"></i>Companies / </span>{{ ucfirst($company->name) }}</h1>
            </div>

            @include('admin.companies.fields')

        </div>




@endsection







@section('js')

<!-- js start -->

            @include('admin.companies.js')


<!-- js end -->

@endsection

