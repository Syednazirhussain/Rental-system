@extends('company.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon ion-ios-keypad"></i>
                    <a href="{{ route('company.rarticle.index') }}">Articles</a>
                </span>
            </h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @include('company.Rental.tabs.create_articles')

            </div>
        </div>
    </div>

    @section('js')
        @include('company.Rental.articles.js')
        @include('company.Rental.prices.js')
        @include('company.Rental.stocks.js')
        @include('company.Rental.financial.js')
    @endsection
@endsection