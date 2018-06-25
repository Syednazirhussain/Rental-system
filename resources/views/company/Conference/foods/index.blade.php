@extends('company.default')

@section('content')


  <div class="px-content">
    <div class="page-header">
      <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Conference / Food &amp; Drinks / </span>Food &amp; Drinks</h1>
    </div>

    <div class="panel">
      <div class="panel-body">

      @if(Session::has('successMessage'))
      <div class="alert alert-success alert-dismissable" style="text-align: center;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <h4 class="m-t-0 m-b-0"><strong><i class="fa fa-check-circle fa-lg"></i>&nbsp;&nbsp;{{Session::get('successMessage')}}</strong></h4>
      </div>
      @elseif(Session::has('deleteMessage'))
      <div class="alert alert-success alert-dismissable" style="text-align: center;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <h4 class="m-t-0 m-b-0"><strong><i class="fa fa-trash fa-lg"></i>&nbsp;&nbsp;{{Session::get('deleteMessage')}}</strong></h4>
      </div>
      @endif



        <div class="text-right m-b-3">
            <a href="{!! route('company.conference.foods.create') !!}" class="btn btn-primary"><i class="fa fa-plus"></i> Create</a>
        </div>

        <div class="table-primary">
          @include('company.Conference.foods.table')
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
      $('#datatables_wrapper .table-caption').text('Food & Drinks');
      $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
    });
  </script>
@endsection
