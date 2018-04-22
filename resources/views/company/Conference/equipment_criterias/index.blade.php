


@extends('company.default')

@section('content')


  <div class="px-content">
    <div class="page-header">
      <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i></span>Equipment Criteria</h1>
    </div>

    <div class="panel">
      <div class="panel-body">



        <div class="text-right m-b-3">
            <a href="{!! route('company.conference.equipmentCriterias.create') !!}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Equipment Criteria</a>
        </div>

        <div class="table-primary">
          @include('company.Conference.equipment_criterias.table')
        </div>

      </div>
    </div>
  </div>


@endsection



@section('js')
  <script>
    // -------------------------------------------------------------------------
    // Initialize DataTables

    $(function() {
      $('#datatables').dataTable();
      $('#datatables_wrapper .table-caption').text('Equipment Criteria');
      $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });
  </script>
@endsection

