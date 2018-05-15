@extends('admin.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i><a href="{{ route('admin.supports.index') }}">Support</a></span></h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @if (session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif

                @if (session()->has('msg.error'))
                    @include('layouts.error_msg')
                @endif
                
                @include('admin.support_admin.master')

                <div class="text-right m-b-3">
<!--<a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Add Priority</a> -->
                </div>

                <div class="table-primary">
                    @include('admin.supports.table')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        // -------------------------------------------------------------------------
        // Initialize DataTables
        $(function () {
            $('#datatables').dataTable();
            $('#datatables_wrapper .table-caption').text('Tickets');
            $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
        });
    </script>
@endsection

