@extends('company.default')

@section('content')



  <div class="px-content">
    <div class="page-header">
      <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i></span>Room Layout</h1>
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
            <a href="{!! route('company.conference.roomLayouts.create') !!}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Room Layout</a>
        </div>

        <div class="table-primary">
          @include('company.Conference.room_layouts.table')

          

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

