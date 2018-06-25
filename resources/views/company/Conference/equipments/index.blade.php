@extends('company.default')

@section('content')


  <div class="px-content">
    <div class="page-header">
      <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-building-o"></i>Buildings / Rooms / Room Equipments / </span>Equipments</h1>
    </div>

    <div class="panel">
      <div class="panel-body">


          
        @if(Session::has('successMessage'))
        <div class="alert alert-success alert-dismissable" style="text-align: center;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4 class="m-t-0 m-b-0"><strong><i class="fa fa-check-circle fa-lg"></i>&nbsp;&nbsp;{{Session::get('successMessage')}}</strong></h4>
        </div>
        @elseif(Session::has('deleteMessage'))
        <div class="alert alert-danger alert-dismissable" style="text-align: center;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4 class="m-t-0 m-b-0"><strong><i class="fa fa-trash fa-lg"></i>&nbsp;&nbsp;{{Session::get('deleteMessage')}}</strong></h4>
        </div>
        @endif



        <div class="text-right m-b-3">
            <a href="{!! route('company.conference.equipments.create') !!}" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp;Create</a>
        </div>


        <div class="table-primary">
          @include('company.Conference.equipments.table')
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
      $('#datatables_wrapper .table-caption').text('Equipments');
      $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });
  </script>
@endsection
