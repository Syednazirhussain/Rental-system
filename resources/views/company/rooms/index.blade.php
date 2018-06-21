@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-building-o"></i>Buildings / </span> Rooms</h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @if (session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif

                @if (session()->has('msg.error'))
                    @include('layouts.error_msg')
                @endif

                <div class="text-right m-b-3">
                    <a href="{{ route('company.rooms.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Create
                        </a>
                </div>

                <div class="table-primary">
                    @include('company.rooms.table')
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
            $('#roomsTable').dataTable();
            $('#roomsTable_wrapper .table-caption').text('Rooms');
            $('#roomsTable_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
        });
    </script>
@endsection


