@extends('admin.default')

@section('content')



  <div class="px-content">
    <div class="page-header">
      <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Modules / </span></h1>
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

        <div class="table-primary">

          <table class="table table-striped">
            <tr>
              <td>
                <h3 class="heading">{{ $company_details['company_info']->name }}</h3>
              </td>
              <td>
                <img class="img img-circle pull-right" src="{{ $company_details['company_info']->logo }}" alt="Logo">
              </td>
            </tr>
            <tr>
              <div class="well">
                {{ $company_details['company_info']->description }}
              </div>
            </tr>
          </table>

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
              $('#datatables_wrapper .table-caption').text('Modules');
              $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
            });
        </script>
@endsection

