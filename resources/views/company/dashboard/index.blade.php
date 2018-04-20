@extends('company.default')

@section('content')









<div class="px-content">
            <ol class="breadcrumb page-breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Company Dashboard</li>
            </ol>
            <div class="page-header">
                <div class="row">
                    <div class="col-md-4 text-xs-center text-md-left text-nowrap">
                        <h1><i class="page-header-icon ion-ios-pulse-strong"></i>Company Dashboard</h1>
                    </div>
                    <hr class="page-wide-block visible-xs visible-sm">
                    
                    <!-- Spacer -->
                    <div class="m-b-2 visible-xs visible-sm clearfix"></div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <!-- Stats -->
                    <a href="#" class="box bg-warning">
                        <div class="box-cell p-a-3 valign-middle">
                            <i class="box-bg-icon middle right ion-arrow-graph-up-right"></i>
                            <span class="font-size-24">$<strong>145</strong></span><br>
                            <span class="font-size-15">Bookings</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <!-- Stats -->
                    <a href="#" class="box bg-info">
                        <div class="box-cell p-a-3 valign-middle">
                            <i class="box-bg-icon middle right ion-arrow-graph-up-right"></i>
                            <span class="font-size-24">$<strong>145</strong></span><br>
                            <span class="font-size-15">Users</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <!-- Stats -->
                    <a href="#" class="box bg-primary">
                        <div class="box-cell p-a-3 valign-middle">
                            <i class="box-bg-icon middle right ion-arrow-graph-up-right"></i>
                            <span class="font-size-24">$<strong>145</strong></span><br>
                            <span class="font-size-15">Available Rooms</span>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <!-- Stats -->
                    <a href="#" class="box bg-danger">
                        <div class="box-cell p-a-3 valign-middle">
                            <i class="box-bg-icon middle right ion-arrow-graph-up-right"></i>
                            <span class="font-size-24">$<strong>145</strong></span><br>
                            <span class="font-size-15">Booked Rooms</span>
                        </div>
                    </a>
                </div>
            </div>
            <hr class="page-block m-t-0">
            
            <hr class="page-block m-t-0">
            <div class="row">
                <div class="col-md-6">
                    <!-- New users -->
                    <div class="panel panel-warning panel-dark">
                        <div class="panel-heading">
                            <span class="panel-title">New Bookings</span>
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
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- / New users -->
                </div>
                <div class="col-md-6">
                    <!-- Recent tasks -->
                    <div class="panel panel-info panel-dark">
                        <div class="panel-heading">
                            <span class="panel-title">New users</span>
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
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /Recent tasks -->
                </div>
            </div>
        </div>












@endsection