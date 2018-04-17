@extends('company.default')

@section('content')









<div class="px-content">
            <ol class="breadcrumb page-breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
            <div class="page-header">
                <div class="row">
                    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
                        <h1><i class="page-header-icon ion-ios-pulse-strong"></i>Dashboard</h1>
                    </div>
                    <hr class="page-wide-block visible-xs visible-sm">
                    <div class="col-xs-12 width-md-auto width-lg-auto width-xl-auto pull-md-right">
                        <a href="#" class="btn btn-primary btn-block"><span class="btn-label-icon left ion-plus-round"></span>Create project</a>
                    </div>
                    <!-- Spacer -->
                    <div class="m-b-2 visible-xs visible-sm clearfix"></div>
                    <form action="" class="page-header-form col-xs-12 col-md-4 pull-md-right">
                        <div class="input-group">
                            <span class="input-group-addon b-a-0 font-size-16"><i class="ion-search"></i></span>
                            <input type="text" placeholder="Search..." class="form-control p-l-0 b-a-0">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <!-- Uploads -->
                    <div class="panel box">
                        <div class="box-row">
                            <div class="box-cell col-md-4 p-a-3 valign-top">
                                <h4 class="m-y-1 font-weight-normal"><i class="fa fa-cloud-upload text-primary"></i>&nbsp;&nbsp;Uploads</h4>
                                <ul class="list-group m-x-0 m-t-3 m-b-0">
                                    <li class="list-group-item p-x-1 b-x-0 b-t-0">
                                        <span class="label label-primary pull-right">34</span>
                                        Documents
                                    </li>
                                    <li class="list-group-item p-x-1 b-x-0">
                                        <span class="label label-danger pull-right">128</span>
                                        Audio
                                    </li>
                                    <li class="list-group-item p-x-1 b-x-0 b-b-0">
                                        <span class="label label-info pull-right">12</span>
                                        Videos
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    <!-- / Uploads -->

                    <div class="row">
                    	<div class="col-md-4">
                    		<!-- Stats -->
		                    <a href="#" class="box bg-primary">
		                        <div class="box-cell p-a-3 valign-middle">
		                            <i class="box-bg-icon middle right ion-arrow-graph-up-right"></i>
		                            <span class="font-size-24">$<strong>145</strong></span><br>
		                            <span class="font-size-15">Earned today</span>
		                        </div>
		                    </a>
                    	</div>
                    	<div class="col-md-4">
                    		<!-- Stats -->
		                    <a href="#" class="box bg-info">
		                        <div class="box-cell p-a-3 valign-middle">
		                            <i class="box-bg-icon middle right ion-arrow-graph-up-right"></i>
		                            <span class="font-size-24">$<strong>145</strong></span><br>
		                            <span class="font-size-15">Earned today</span>
		                        </div>
		                    </a>
                    	</div>
                    	<div class="col-md-4">
                    		<!-- Stats -->
		                    <a href="#" class="box bg-warning">
		                        <div class="box-cell p-a-3 valign-middle">
		                            <i class="box-bg-icon middle right ion-arrow-graph-up-right"></i>
		                            <span class="font-size-24">$<strong>145</strong></span><br>
		                            <span class="font-size-15">Earned today</span>
		                        </div>
		                    </a>
                    	</div>
                    </div>
                    
                </div>
                <div class="col-md-4">
                    <!-- Stats -->
                    <a href="#" class="box bg-danger">
                        <div class="box-cell p-a-3 valign-middle">
                            <i class="box-bg-icon middle right ion-arrow-graph-up-right"></i>
                            <span class="font-size-24">$<strong>145</strong></span><br>
                            <span class="font-size-15">Earned today</span>
                        </div>
                    </a>
                    <div class="panel box">
                        <div class="box-row">
                            <div class="box-container">
                                <div class="box-cell p-a-1 bg-info">
                                    <div class="m-b-1 font-size-11">RETWEETS GRAPH</div>
                                    <div id="sparkline-1"></div>
                                </div>
                            </div>
                            <!-- / .box-container -->
                        </div>
                        <div class="box-row">
                            <div class="box-container valign-middle text-xs-center">
                                <div class="box-cell p-y-1 b-r-1">
                                    <div class="font-size-17"><strong>312</strong></div>
                                    <div class="font-size-11">TWEETS</div>
                                </div>
                                <div class="box-cell p-y-1 b-r-1">
                                    <div class="font-size-17"><strong>1000</strong></div>
                                    <div class="font-size-11">FOLLOWERS</div>
                                </div>
                                <div class="box-cell p-y-1">
                                    <div class="font-size-17"><strong>523</strong></div>
                                    <div class="font-size-11">FOLLOWING</div>
                                </div>
                            </div>
                            <!-- / .box-container -->
                        </div>
                    </div>
                    <div class="box bg-warning">
                        <div class="box-row">
                            <div class="box-cell p-a-2">
                                <div class="font-weight-semibold font-size-17">15% more</div>
                                <div class="font-size-12">Monthly visitor statistics</div>
                            </div>
                        </div>
                        <div class="box-row">
                            <div class="box-cell p-x-2 p-b-1 valign-bottom text-xs-center">
                                <span id="sparkline-2"></span>
                            </div>
                        </div>
                    </div>
                    <!-- / Stats -->
                </div>
            </div>
            <hr class="page-block m-t-0">
            
            <hr class="page-block m-t-0">
            <div class="row">
                <div class="col-md-7">
                    <!-- New users -->
                    <div class="panel panel-danger panel-dark">
                        <div class="panel-heading">
                            <span class="panel-title"><i class="panel-title-icon fa fa-smile-o"></i>New users</span>
                            <div class="panel-heading-controls">
                                <ul class="pagination pagination-xs">
                                    <li><a href="#">«</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>E-mail</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="valign-middle">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <img src="assets/demo/avatars/2.jpg" alt="" style="width:26px;height:26px;" class="border-round">&nbsp;&nbsp;<a href="#" title="">@rjang</a>
                                        </td>
                                        <td>Robert Jang</td>
                                        <td>rjang@example.com</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <img src="assets/demo/avatars/3.jpg" alt="" style="width:26px;height:26px;" class="border-round">&nbsp;&nbsp;<a href="#" title="">@mbortz</a>
                                        </td>
                                        <td>Michelle Bortz</td>
                                        <td>mbortz@example.com</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <img src="assets/demo/avatars/4.jpg" alt="" style="width:26px;height:26px;" class="border-round">&nbsp;&nbsp;<a href="#" title="">@towens</a>
                                        </td>
                                        <td>Timothy Owens</td>
                                        <td>towens@example.com</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <img src="assets/demo/avatars/5.jpg" alt="" style="width:26px;height:26px;" class="border-round">&nbsp;&nbsp;<a href="#" title="">@dsteiner</a>
                                        </td>
                                        <td>Denise Steiner</td>
                                        <td>dsteiner@example.com</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <img src="assets/demo/avatars/2.jpg" alt="" style="width:26px;height:26px;" class="border-round">&nbsp;&nbsp;<a href="#" title="">@rjang</a>
                                        </td>
                                        <td>Robert Jang</td>
                                        <td>rjang@example.com</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>
                                            <img src="assets/demo/avatars/3.jpg" alt="" style="width:26px;height:26px;" class="border-round">&nbsp;&nbsp;<a href="#" title="">@mbortz</a>
                                        </td>
                                        <td>Michelle Bortz</td>
                                        <td>mbortz@example.com</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>
                                            <img src="assets/demo/avatars/4.jpg" alt="" style="width:26px;height:26px;" class="border-round">&nbsp;&nbsp;<a href="#" title="">@towens</a>
                                        </td>
                                        <td>Timothy Owens</td>
                                        <td>towens@example.com</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- / New users -->
                </div>
                <div class="col-md-5">
                    <!-- Recent tasks -->
                    <div class="panel panel-primary panel-dark">
                        <div class="panel-heading">
                            <span class="panel-title"><i class="panel-title-icon fa fa-tasks"></i>Recent tasks</span>
                        </div>
                        <div class="widget-tasks-item">
                            <span class="label label-warning pull-right">High</span>
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="widget-tasks-title">A very important task</span>&nbsp;&nbsp;
                            <span class="widget-tasks-timer">1 hour left</span>
                            </label>
                        </div>
                        <div class="widget-tasks-item">
                            <span class="label label-warning pull-right">High</span>
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" checked="">
                            <span class="custom-control-indicator"></span>
                            <span class="widget-tasks-title">A very important task</span>&nbsp;&nbsp;
                            <span class="widget-tasks-timer">58 minutes left</span>
                            </label>
                        </div>
                        <div class="widget-tasks-item">
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" checked="">
                            <span class="custom-control-indicator"></span>
                            <span class="widget-tasks-title">A regular task</span>
                            </label>
                        </div>
                        <div class="widget-tasks-item">
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="widget-tasks-title">A regular task</span>
                            </label>
                        </div>
                        <div class="widget-tasks-item">
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="widget-tasks-title">A regular task</span>
                            </label>
                        </div>
                        <div class="widget-tasks-item">
                            <span class="label pull-right">Low</span>
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="widget-tasks-title">A regular task</span>
                            </label>
                        </div>
                        <div class="widget-tasks-item">
                            <span class="label pull-right">Low</span>
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="widget-tasks-title">An unimportant task</span>
                            </label>
                        </div>
                        <div class="widget-tasks-item">
                            <span class="label pull-right">Low</span>
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="widget-tasks-title">An unimportant task</span>
                            </label>
                        </div>
                        <div class="widget-tasks-item">
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="widget-tasks-title">An unimportant task</span>
                            </label>
                        </div>
                    </div>
                    <!-- /Recent tasks -->
                </div>
            </div>
        </div>












@endsection