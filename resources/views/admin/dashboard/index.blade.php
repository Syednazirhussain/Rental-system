@extends('admin.default')

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
                    
                    <!-- Spacer -->
                    <div class="m-b-2 visible-xs visible-sm clearfix"></div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    

                    <div class="row">
                        
                        <div class="col-md-3">
                            <!-- Stats -->
                            <a href="#" class="box bg-info">
                                <div class="box-cell p-a-3 valign-middle">
                                    <i class="box-bg-icon middle right ion-ios-briefcase"></i>
                                    <span class="font-size-24"><strong>{{$companyCount}}</strong></span><br>
                                    <span class="font-size-15">Companies</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <!-- Stats -->
                            <a href="#" class="box bg-warning">
                                <div class="box-cell p-a-3 valign-middle">
                                    <i class="box-bg-icon middle right  ion-android-film"></i>
                                    <span class="font-size-24"><strong>{{$companyBuildingCount}}</strong></span><br>
                                    <span class="font-size-15">Buildings</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <!-- Stats -->
                            <a href="#" class="box bg-primary">
                                <div class="box-cell p-a-3 valign-middle">
                                    <i class="box-bg-icon middle right ion-ios-checkmark-outline"></i>
                                    <span class="font-size-24"><strong>145</strong></span><br>
                                    <span class="font-size-15">Paid Invoices</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <!-- Stats -->
                            <a href="#" class="box bg-danger">
                                <div class="box-cell p-a-3 valign-middle">
                                    <i class="box-bg-icon middle right ion-ios-close-outline"></i>
                                    <span class="font-size-24"><strong>145</strong></span><br>
                                    <span class="font-size-15">Unpaid Invoices</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
            <hr class="page-block m-t-0">
            
            <hr class="page-block m-t-0">
            



            


            <div class="row">
                <div class="col-md-12">
                    <!-- New users -->
                    <div class="panel panel-primary panel-dark">
                        <div class="panel-heading">
                            <span class="panel-title">Recent Companies</span>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>PHONE</th>
                                        <th>ADDRESS</th>
                                        <th>ZIPCODE</th>
                                        <th>DATE</th>
                                    </tr>
                                </thead>
                                <tbody class="valign-middle">
                                    @foreach($companyRecent as $company)
                                    <tr>
                                        <td>{{$company->id}}</td>
                                        <td>{{$company->name}}</td>
                                        <td>{{$company->phone}}</td>
                                        <td>{{$company->address}}</td>
                                        <td>{{$company->zipcode}}</td>
                                        <td>{{ date('F d, Y', strtotime($company->created_at)) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- / New users -->
                </div>
                
            </div>
        </div>

@endsection