@extends('company.default')

@section('content')



  <div class="px-content">
    <div class="page-header">
      <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Invoices / </span></h1>
    </div>

    <div class="panel">
      <div class="panel-body">

      @if (session()->has('msg.success'))
        @include('layouts.success_msg')
      @endif

      @if (session()->has('msg.error'))
        @include('layouts.error_msg')
      @endif

        
        @if(Session::has('SendEmails'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('SendEmails') }}
        </div>
        @endif

        <div class="table-primary">
          @include('company.company_invoices.table')
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
              $('#datatables').dataTable({
                
                "order": [[ 0, "desc" ]]
              });

              $('#datatables_wrapper .table-caption').text('Inovices');
              $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
            });
        </script>
@endsection

