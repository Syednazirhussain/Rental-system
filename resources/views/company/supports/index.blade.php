@extends('company.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-life-ring"></i><a href="{{ route('company.supports.index') }}">Support</a></span></h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @if (session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif

                @if (session()->has('msg.error'))
                    @include('layouts.error_msg')
                @endif
                
                @include('company.support_company.master')

                <div class="text-right m-b-3">
                    <a href="{{ route('company.supports.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Create Ticket</a> 
                </div>

                <div class="table-primary">
                    @include('company.supports.table')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        // -------------------------------------------------------------------------

        var url = window.location.href; 

        urlArray = url.split("/");

        var lastUrlString = urlArray[urlArray.length-1];

        if(lastUrlString == 'supports')
        {
            $('ul li:nth-child(2)').removeClass('active');
            $('ul li:nth-child(1)').addClass('active');
        }
        else if(lastUrlString == 'completed')
        {
            $('ul li:nth-child(1)').removeClass('active');
            $('ul li:nth-child(2)').addClass('active');
        }

        // $('ul > li').hover(function () {
        //     $(this).toggleClass('active').siblings().removeClass('active');
        // });

        // Initialize DataTables
        $(function () {
            $('#datatables').dataTable();
            $('#datatables_wrapper .table-caption').text('My Tickets');
            $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
        });
    </script>
@endsection

