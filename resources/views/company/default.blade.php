<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>HighNox</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin"
          rel="stylesheet" type="text/css">
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{ asset('/skin-1/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/skin-1/assets/css/pixeladmin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/skin-1/assets/css/widgets.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/skin-1/assets/css/themes/candy-green.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/skin-1/assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css') }}" rel="stylesheet">

    @yield('css')

    <link href="{{ asset('/skin-1/assets/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <!-- holder.js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.0/holder.js"></script>
    <!-- Pace.js -->
    <script src="{{ asset('/skin-1/assets/pace/pace.min.js') }}"></script>
    <script src="{{ asset('/skin-1/assets/demo/demo.js') }}"></script>
    <!-- Custom styling -->
    <style>
        .page-header-form .input-group-addon,
        .page-header-form .form-control {
            background: rgba(0, 0, 0, .05);
        }

        .form-label {
            font-size: 14px;
            margin-top: 3px;
            font-weight: 400;
        }
    </style>
    <!-- / Custom styling -->

</head>
<body>
<nav class="navbar px-navbar">
    <!-- Navbar togglers -->
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#px-demo-navbar-collapse"
            aria-expanded="false"><i class="navbar-toggle-icon"></i></button>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="px-demo-navbar-collapse">
        <ul class="nav navbar-nav bg-green">
            <li class="dropdown" id="admin-menu-button">
                <a href class="dropdown-toggle color-white" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false"><i class="fa fa-bars fa-2x m-r-1 vertical-a-mid"></i><span class="">Menu</span></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-toggle">
                        <a href="{{ route('company.users.index') }}">Company Admin</a>
                        <ul class="dropdown-menu">
                            {{--<li><a href="{{ route('company.users.create') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add
                                    User</a></li>--}}
                            <li><a href="{{ route('company.users.index') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Company
                                    Admin Users</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-toggle">
                        <a href="{{ route('company.rcustomer.index') }}">Customers</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('company.rcustomer.create') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add
                                    Customer</a></li>
                            <li><a href="{{ route('company.rcustomer.index') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Customers</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-toggle">
                        <a href="{{ route('company.rarticle.index') }}">Articles</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('company.rarticle.create') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add
                                    Article</a></li>
                            <li><a href="{{ route('company.rarticle.index') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Articles</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-toggle">
                        <a href="{{ route('company.rarticle.index') }}">Survey System</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('company.answer_types.index') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Answer Types</a>
                            </li>
                            <li>
                                <a href="{{ route('company.survey_categories.index') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Survey Categories</a>
                            </li>
                            <li class="dropdown-toggle">
                                <a href="{{ route('company.survey.index') }}">Survey</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('company.survey.create') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add
                                            Survey</a></li>
                                    <li><a href="{{ route('company.survey.index') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Survey</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-toggle">
                                <a href="{{ route('company.survey_question.index') }}">Survey Questions</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('company.survey_question.create') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add
                                            Survey Question</a></li>
                                    <li><a href="{{ route('company.survey_question.index') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Survey Questions</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('company.feedback.index') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Feedback</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown-toggle">
                        <a href="{{ route('company.companyBuildings.index') }}">Buildings</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('company.companyBuildings.index') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Buildings</a>
                            </li>
                            <li class="dropdown-toggle">

                            <?php
                            use App\Models\CompanyModule;
                            $companyID = Auth::guard('company')->user()->companyUser()->first()->company_id;
                            $companyModules = CompanyModule::join('modules', 'module_id', '=', 'modules.id')
                                ->where('company_modules.company_id', $companyID)->get();
                            ?>

                            @foreach($companyModules as $module)

                                <li class="dropdown-toggle">
                                    <a href>{{$module->module->name}}</a>
                                    <ul class="dropdown-menu">

                                        @if($module->module->code == 'signage_module')
                                            <li><a href="{{ route('company.rsignage.index') }}">Signage System</a></li>
                                        @elseif($module->module->code == 'conference_module')
                                            <li class="dropdown-toggle">
                                                <a href>Bookings</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{ route('company.conference.conferenceBookings.create') }}"><i
                                                                    class="fa fa-plus"></i>&nbsp;&nbsp;Add Booking</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('company.conference.conferenceBookings.index') }}"><i
                                                                    class="fa fa-wpforms"></i>&nbsp;&nbsp;Bookings</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-toggle">
                                                <a href>Rooms Layouts</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{ route('company.conference.roomLayouts.create') }}"><i
                                                                    class="fa fa-plus"></i>&nbsp;&nbsp;Add Rooms Layout</a>
                                                    </li>
                                                    <li><a href="{{ route('company.conference.roomLayouts.index') }}"><i
                                                                    class="fa fa-braille"></i>&nbsp;&nbsp;Rooms Layouts</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-toggle">
                                                <a href>Equipments</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('company.conference.equipments.create') }}"><i
                                                                    class="fa fa-plus"></i>&nbsp;&nbsp;Add Equipment</a>
                                                    </li>
                                                    <li><a href="{{ route('company.conference.equipments.index') }}"><i
                                                                    class="fa fa-wrench"></i>&nbsp;&nbsp;Equipments</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-toggle">
                                                <a href>Equipments Criteria</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="{{ route('company.conference.equipmentCriterias.create') }}"><i
                                                                    class="fa fa-plus"></i>&nbsp;&nbsp;Add Equipment
                                                            Criteria</a></li>
                                                    <li>
                                                        <a href="{{ route('company.conference.equipmentCriterias.index') }}"><i
                                                                    class="fa fa-wrench"></i>&nbsp;&nbsp;Equipments
                                                            Criteria</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-toggle">
                                                <a href>Food &amp; Drinks</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('company.conference.foods.create') }}"><i
                                                                    class="fa fa-plus"></i>&nbsp;&nbsp;Add Food &amp;
                                                            Drink</a></li>
                                                    <li><a href="{{ route('company.conference.foods.index') }}"><i
                                                                    class="fa fa-cutlery"></i>&nbsp;&nbsp;Food &amp;
                                                            Drinks</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-toggle">
                                                <a href>Packages</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('company.conference.packages.create') }}"><i
                                                                    class="fa fa-plus"></i>&nbsp;&nbsp;Add Package</a>
                                                    </li>
                                                    <li><a href="{{ route('company.conference.packages.index') }}"><i
                                                                    class="fa fa-cube"></i>&nbsp;&nbsp;Packages</a></li>
                                                </ul>
                                            </li>



                                        @elseif($module->module->code == 'newsletter_module')

                                            <li><a href="{{ route('company.newsletter.dashboard') }}"><i
                                                            class="fa fa-trello"></i>&nbsp;&nbsp;Dashboard</a>
                                            </li>
                                            <li><a href="{{ route('company.newsletterGroups.sendmail') }}"><i
                                                            class="fa fa-paper-plane"></i>&nbsp;&nbsp;Send Mail</a>
                                            </li>
                                            <li class="dropdown-toggle">
                                                <a href>Group</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('company.newsletterGroups.create') }}"><i
                                                                    class="fa fa-plus"></i>&nbsp;&nbsp;Add Group</a>
                                                    </li>
                                                    <li><a href="{{ route('company.newsletterGroups.index') }}"><i
                                                                    class="fa fa-users"></i>&nbsp;&nbsp;Groups</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-toggle">
                                                <a href>Customers</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('company.newsletterCustomers.create') }}"><i
                                                                    class="fa fa-plus"></i>&nbsp;&nbsp;Add Customers</a>
                                                    </li>
                                                    <li><a href="{{ route('company.newsletterCustomers.list') }}"><i
                                                                    class="fa fa-user"></i>&nbsp;&nbsp;Customers</a>
                                                    </li>
                                                </ul>
                                            </li>



                                        @elseif($module->module->code == 'rental_module')

                                            <li class="dropdown-toggle">
                                                <a href="{{ route('company.companyBuildings.index') }}">Buildings</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('company.companyBuildings.index') }}"><i
                                                                    class="fa fa-building"></i>&nbsp;&nbsp;Buildings</a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="dropdown-toggle">
                                                <a href="{{ route('company.companyFloorRooms.index') }}">Floors</a>
                                                <ul class="dropdown-menu">
                                                    {{--<li><a href="{{ route('company.companyFloorRooms.create') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add
                                                            Floor</a></li>--}}
                                                    <li><a href="{{ route('company.companyFloorRooms.index') }}"><i
                                                                    class="fa fa-ellipsis-v"></i>&nbsp;&nbsp;Floors</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-toggle">
                                                <a href="{{ route('company.services.index') }}">Services</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('company.services.create') }}"><i
                                                                    class="fa fa-plus"></i>&nbsp;&nbsp;Add
                                                            Service</a></li>
                                                    <li><a href="{{ route('company.services.index') }}"><i
                                                                    class="fa fa-list"></i>&nbsp;&nbsp;Services</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-toggle">
                                                <a href="{{ route('company.rooms.index') }}">Rooms</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('company.rooms.create') }}"><i
                                                                    class="fa fa-plus"></i>&nbsp;&nbsp;Add
                                                            Room</a></li>
                                                    <li><a href="{{ route('company.rooms.index') }}"><i
                                                                    class="fa fa-th-large"></i>&nbsp;&nbsp;Rooms</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-toggle">
                                                <a href="{{ route('company.contracts.index') }}">Contracts</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('company.contracts.create') }}"><i
                                                                    class="fa fa-plus"></i>&nbsp;&nbsp;Add
                                                            Contract</a></li>
                                                    <li><a href="{{ route('company.contracts.index') }}"><i
                                                                    class="fa fa-file-text"></i>&nbsp;&nbsp;Contracts</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-toggle">
                                                <a href="{{ route('company.companyInvoices.index') }}">Invoices</a>
                                                <ul class="dropdown-menu">

                                                    <li><a href="{{ route('company.companyInvoices.index') }}"><i
                                                                    class="fa fa-file-text"></i>&nbsp;&nbsp;Invoices</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endforeach

                            <li><a href="{{ route('company.companyInvoices.index') }}"><i class="fa fa-building-o"></i>&nbsp;&nbsp;Invoices</a>
                            </li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ route('company.contracts.status') }}">Contract Calendar</a></li>
                    <li class="dropdown-toggle">
                        <a href="{{ route('company.supports.index') }}">Support</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Header -->
        <div class="navbar-header">
            <a class="navbar-brand px-demo-brand" href="{{ route('company.dashboard') }}">
                <span class="px-demo-logo bg-primary">
                    <span class="px-demo-logo-1"></span>
                    <span class="px-demo-logo-2"></span>
                    <span class="px-demo-logo-3"></span>
                    <span class="px-demo-logo-4"></span>
                    <span class="px-demo-logo-5"></span>
                    <span class="px-demo-logo-6"></span>
                    <span class="px-demo-logo-7"></span>
                    <span class="px-demo-logo-8"></span>
                    <span class="px-demo-logo-9"></span>
                </span>HIGHNOX</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <img src="{{ asset('/skin-1/assets/demo/avatars/1.jpg') }}" alt="" class="px-navbar-image">
                    <span class="hidden-md">{{ ucfirst(Auth::guard('company')->user()->name) }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('company.dashboard.profile') }}">Account</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('company.logout') }}"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log
                            Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>

@yield('content')

<div class="m-t-4 p-b-4" id="empty-space"></div>
<footer class="px-footer px-footer-bottom text-center m-t-4 ">
    <span class="">Copyright © 2018 HighNox. All rights reserved.</span>
</footer>


<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ asset('/skin-1/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/skin-1/assets/js/pixeladmin.min.js') }}"></script>
<script src="{{ asset('/skin-1/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('/skin-1/assets/js/custom.js') }}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('js')

</body>
</html>        







