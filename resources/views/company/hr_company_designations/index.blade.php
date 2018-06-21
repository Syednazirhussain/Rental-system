@extends('company.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i><a href="{{ route('company.hrCompanyDesignations.index') }}">Company HR</a> / </span>HR Company Designations</h1>
        </div>

        <div class="panel">
            <div class="panel-body">

        <div class="clearfix"></div>





                @if (session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif

                @if (session()->has('msg.error'))
                    @include('layouts.error_msg')
                @endif
                

                <div class="text-right m-b-3">
                    <a href="{{ route('company.hrCompanyDesignations.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Create</a> 
                </div>

                <div class="table-primary">
                    @include('company.hr_company_designations.table')
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
              $('#datatables').dataTable();
              $('#datatables_wrapper .table-caption').text('HR Company Designations');
              $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
            });
        </script>
@endsection


