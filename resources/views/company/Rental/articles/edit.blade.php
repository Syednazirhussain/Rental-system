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

                @include('company.rental.tabs.edit_articles')

            </div>
        </div>

    </div>
    @section('js')
        @include('company.rental.articles.js')
        @include('company.rental.prices.js')
        @include('company.rental.stocks.js')
        @include('company.rental.financial.js')
    @endsection
@endsection