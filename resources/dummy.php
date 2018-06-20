@extends('admin.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i><a href="{{ route('admin.supports.index') }}">Support</a></span></h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @if (session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif

                @if (session()->has('msg.error'))
                    @include('layouts.error_msg')
                @endif
                
                @include('admin.support_admin.master')

                <div class="text-right m-b-3">
<!--<a href="" class="btn btn-primary"><i class="fa fa-plus"></i> Add Priority</a> -->
                </div>
	                <div class="row">
			            <div class="col-md-3">
			                <a href="#" class="box bg-primary">
					          <div class="box-cell p-a-3 valign-middle">
					            <i class="box-bg-icon middle right ion-ios-keypad"></i>
					            <span class="font-size-24"><strong>145</strong></span><br>
					            <span class="font-size-15">Total Tickets</span>
					          </div>
					        </a>
			            </div>
			            <div class="col-md-3">
			                <a href="#" class="box bg-danger">
					          <div class="box-cell p-a-3 valign-middle">
					            <i class="box-bg-icon middle right ion-wrench"></i>
					            <span class="font-size-24"><strong>145</strong></span><br>
					            <span class="font-size-15">Earned today</span>
					          </div>
					        </a>
			            </div>
			            <div class="col-md-3">
			                <a href="#" class="box bg-warning">
					          <div class="box-cell p-a-3 valign-middle">
					            <i class="box-bg-icon middle right ion-thumbsup"></i>
					            <span class="font-size-24"><strong>145</strong></span><br>
					            <span class="font-size-15">Earned today</span>
					          </div>
					        </a>
			            </div>
	        		</div>

	        		<div class="row">
					   <div class="col-sm-8">
					      <div class="panel-body">
					         <div id="chartist-graph" style="height: 250px"></div>
					      </div>
					   </div>
					   <div class="col-md-4">
					      <ul class="nav nav-tabs nav-justified">
					         <li class="active">
					            <a data-toggle="pill" href="#information-panel-categories">
					            <i class="glyphicon glyphicon-folder-close"></i>
					            <small>Categories</small>
					            </a>
					         </li>
					         <li class="">
					            <a data-toggle="pill" href="#information-panel-agents">
					            <i class="glyphicon glyphicon-user"></i>
					            <small>Agents</small>
					            </a>
					         </li>
					         <li class="">
					            <a data-toggle="pill" href="#information-panel-users">
					            <i class="glyphicon glyphicon-user"></i>
					            <small>Users</small>
					            </a>
					         </li>
					      </ul>
					      <br>
					      <div class="tab-content">
					         <div id="information-panel-categories" class="list-group tab-pane fade in active">
					            <a href="#" class="list-group-item disabled">
					            <span>Category
					            <span class="badge">Total</span>
					            </span>
					            <span class="pull-right text-muted small">
					            <em>
					            Open /
					            Closed
					            </em>
					            </span>
					            </a>
					            <a href="#" class="list-group-item">
					            <span style="color: #0014f4">
					            Technical <span class="badge">29</span>
					            </span>
					            <span class="pull-right text-muted small">
					            <em>
					            0 /
					            29
					            </em>
					            </span>
					            </a>
					         </div>
					         <div id="information-panel-agents" class="list-group tab-pane fade ">
					            <a href="#" class="list-group-item disabled">
					            <span>Agent
					            <span class="badge">Total</span>
					            </span>
					            <span class="pull-right text-muted small">
					            <em>
					            Open /
					            Closed
					            </em>
					            </span>
					            </a>
					            <a href="#" class="list-group-item">
					            <span>
					            George Hand
					            <span class="badge">
					            12
					            </span>
					            </span>
					            <span class="pull-right text-muted small">
					            <em>
					            0 /
					            12
					            </em>
					            </span>
					            </a>
					         </div>
					         <div id="information-panel-users" class="list-group tab-pane fade ">
					            <a href="#" class="list-group-item disabled">
					            <span>User
					            <span class="badge">Total</span>
					            </span>
					            <span class="pull-right text-muted small">
					            <em>
					            Open /
					            Closed
					            </em>
					            </span>
					            </a>
					            <a href="#" class="list-group-item">
					            <span>
					            Master Admin
					            <span class="badge">
					            0
					            </span>
					            </span>
					            <span class="pull-right text-muted small">
					            <em>
					            0 /
					            0
					            </em>
					            </span>
					            </a>
					            <ul class="pagination"></ul>
					         </div>
					      </div>
					   </div>
					</div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        // -------------------------------------------------------------------------
        // Initialize DataTables

        var url = window.location.href; 

        urlArray = url.split("/");

        var lastUrlString = urlArray[urlArray.length-1];

        if(lastUrlString == 'supports')
        {
            $('ul#main_nav li:nth-child(2)').removeClass('active');
            $('ul#main_nav li:nth-child(1)').addClass('active');
        }
        else if(lastUrlString == 'completed')
        {
            $('ul#main_nav li:nth-child(1)').removeClass('active');
            $('ul#main_nav li:nth-child(2)').addClass('active');
        }

        $('ul#dropdown > li').hover(function () {
            $(this).toggleClass('active').siblings().removeClass('active');
        });

        // {aaSorting : [[8, 'desc']]}

        $(function () {
            $('#datatables').dataTable();
            $('#datatables_wrapper .table-caption').text('Tickets');
            $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Search...');
        });



         // -------------------------------------------------------------------------
    // Initialize line chart

    $(function() {
      var data = {
        labels: ['March','April', 'May'],
        series: [
          [pxDemo.getRandomData(1, 15), pxDemo.getRandomData(1, 15), pxDemo.getRandomData(1, 15)],
          [pxDemo.getRandomData(1, 15), pxDemo.getRandomData(1, 15), pxDemo.getRandomData(1, 15)],
          [pxDemo.getRandomData(1, 15), pxDemo.getRandomData(1, 15), pxDemo.getRandomData(1, 15)],
        ],
      };

      new Chartist.Line('#chartist-graph', data, {
        fullWidth: true,
        chartPadding: {
          right: 40
        }
      });
    });





    </script>
@endsection

