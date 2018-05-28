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

                @include('company.rental.tabs.edit_articles')

            </div>
        </div>

        @endsection


        @section('js')
            <script type="text/javascript">

            </script>
@endsection