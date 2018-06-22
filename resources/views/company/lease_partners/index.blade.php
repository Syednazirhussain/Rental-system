@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-file-text"></i>Leasings </span></h1>
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

                    <a href="{{ route('company.leasePartners.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>

                </div>

                <div class="table-primary">
                    @include('company.lease_partners.table')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
        <script type="text/javascript">
            // -------------------------------------------------------------------------
            // Initialize DataTables

            $(function() {
              $('#leasePartner').dataTable();
              $('#datatables_wrapper .table-caption').text('Leasings');
              $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
            });
        </script>
@endsection



