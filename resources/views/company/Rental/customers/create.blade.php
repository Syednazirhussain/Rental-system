@extends('company.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon ion-ios-keypad"></i>
                    <a href="{{ route('company.rcustomer.index') }}">Customers</a>
                </span>
            </h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @include('company.rental.tabs.create_customers')

            </div>
        </div>
    </div>



        @section('js')
            @include('company.rental.customers.js')
            @include('company.rental.contacts.js')
        @endsection
@endsection