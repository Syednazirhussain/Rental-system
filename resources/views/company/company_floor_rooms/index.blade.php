@extends('company.default')

@section('content')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon fa fa-building-o"></i>Buildings /</span> Floor</h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                <!-- @if (session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif

                @if (session()->has('msg.error'))
                    @include('layouts.error_msg')
                @endif -->
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
                    {{--<a href="{{ route('company.companyFloorRooms.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add
                        Floor Room</a>--}}
                </div>

                <div class="table-primary">
                    @include('company.company_floor_rooms.table')
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
            $('#floorRoomTable').dataTable();
            $('#floorRoomTable_wrapper .table-caption').text('Floor Rooms');
            $('#floorRoomTable_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
        });
    </script>
@endsection


