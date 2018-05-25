@extends('company.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1>
                <span class="text-muted font-weight-light">
                    <i class="page-header-icon ion-ios-keypad"></i>
                    <a href="{{ route('company.rcustomer.index') }}">Articles</a>
                </span>
            </h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @include('company.rental.master')

                <div class="well bs-component">
                    <form method="POST" action="{{ route('company.rarticle.store') }}" accept-charset="UTF-8">
                        @include('company.rental.articles.fields')
                    </form>
                </div>

            </div>
        </div>

        @endsection


        @section('js')
            <script type="text/javascript">

            </script>
@endsection