@extends('admin.default')

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

        <div class="text-right m-b-3">
<!--             <a href="{{ route('admin.modules.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Module</a> -->
        </div>
        
        @if(Session::has('SendEmails'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('SendEmails') }}
        </div>
        @endif

        <div class="table-primary">
          @include('admin.company_invoices.table')
        </div>


      </div>
    </div>
  </div>


@endsection



@section('js')
        <script type="text/javascript">
            // -------------------------------------------------------------------------
            // Initialize DataTables
      $('document').ready(function(){
            $(function() {
              $('#datatables').dataTable({
                
                "order": [[ 0, "desc" ]]
              });
              $('#datatables_wrapper .btn btn-default dropdown-toggle button').attr('name', 'status').attr('id','status');
              $('#datatables_wrapper .table-caption').text('Inovices');
              $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
            });

            
            $('#statusFrom').on('submit', function(e) {

                var checkboxArr = "";

                $('.invoice-checkbox').each(function() {
                    if ($(this).is(":checked")) {
                        checkboxArr += $(this).val()+"|";
                    }
                });

                $('#checkboxes_hidden').val(checkboxArr);

                if ($('#status-dropdown').val() == 0) {
                   alert('Please select the invoice status');
                   return false;
                }

                if ($('#checkboxes_hidden').val() == "") {
                   alert('Please select atleast one item');
                   return false;
                }

                return true;
              
            });

            
      });

        </script>
@endsection

