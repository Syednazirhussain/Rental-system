<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>HighNox</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin"
          rel="stylesheet" type="text/css">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{ asset('/skin-1/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/skin-1/assets/css/pixeladmin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/skin-1/assets/css/widgets.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/skin-1/assets/css/themes/candy-green.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/skin-1/assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css') }}" rel="stylesheet">
    @yield('css')
    <link href="{{ asset('/skin-1/assets/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <!-- holder.js -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/holder/2.9.0/holder.js"></script>
    <!-- Pace.js -->
    <script src="{{ asset('/skin-1/assets/pace/pace.min.js') }}"></script>
    <script src="{{ asset('/skin-1/assets/dateformat/dateformat.js') }}"></script>
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

        #horizontal_nav {
            margin-top: 50px;
            margin-bottom: 0px;
        }

        #horizontal_nav a{
            font-size: 14px;
        }

        .px-content {
            margin-top: -10px !important;
        }
    </style>
    <!-- / Custom styling -->
    <?php
    $companyID      = Auth::guard('company')->user()->companyUser()->first()->company_id;
    $companyModules = \App\Models\CompanyModule::where('company_id',$companyID)->get();

    ?>
    <link href="{{ asset('/skin-1/assets/fileuploader/src/jquery.fileuploader.css') }}" media="all" rel="stylesheet">
    <link href="{{ asset('/skin-1/assets/fileuploader/css/jquery.fileuploader-theme-thumbnails.css') }}" media="all" rel="stylesheet">
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
                    <li>
                        <a href="{{ route('company.users.index') }}">Users</a>
                    </li>
                <!-- <li class="dropdown-toggle">
                        <a href="{{ route('company.users.index') }}">Users</a>
                        <ul class="dropdown-menu">
                            {{--<li><a href="{{ route('company.users.create') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add User</a></li>--}}
                        <li><a href="{{ route('company.users.index') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Company Admin Users</a>
                            </li>
                        </ul>
                        </li> -->
                    <li class="divider"></li>
                    <li class="dropdown-toggle">
                        <a href="{{ route('company.rcustomer.index') }}">Customers</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('company.rcustomer.create') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add
                                    Customer</a>
                            </li>
                            <li><a href="{{ route('company.rcustomer.index') }}"><i class="fa fa-users"></i>&nbsp;&nbsp;Customers</a>
                            </li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown-toggle">
                        <a href="{{ route('company.rarticle.index') }}">Articles</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('company.rarticle.create') }}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add
                                    Article</a>
                            </li>
                            <li><a href="{{ route('company.rarticle.index') }}"><i class="ionicons ion-ios-paper-outline"></i>&nbsp;&nbsp;Articles</a>
                            </li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown-toggle">
                        <a href="{{ route('company.companyBuildings.index') }}">Buildings</a>
                        <ul class="dropdown-menu">
                           <li><a href="{{ route('company.companyBuildings.index') }}"><i class="fa fa-building-o"></i>&nbsp;&nbsp;Buildings</a></li>
                           <li><a href="{{ route('company.companyFloorRooms.index') }}"><i class="fa fa-ellipsis-v"></i>&nbsp;&nbsp;Floor</a></li>
                           <li class="dropdown-toggle">
                              <a href="{{ route('company.rooms.index') }}">Rooms</a>
                              <ul class="dropdown-menu">
                                 <li>
                                    <a href="{{ route('company.rooms.index') }}"><i class="fa fa-th-large"></i>&nbsp;&nbsp;Rooms</a>
                                 </li>
                                 <li class="dropdown-toggle">
                                    <a href="{{ route('company.conference.equipments.create') }}">Room Equipments</a>
                                    <ul class="dropdown-menu">
                                       <li>
                                       <li><a href="{{ route('company.conference.equipments.index') }}"><i class="fa fa-wrench"></i>&nbsp;&nbsp;Equipments</a></li>
                                       </li>
                                       <li>
                                          <a href="{{ route('company.conference.equipmentCriterias.index') }}"><i class="fa fa-wrench"></i>&nbsp;&nbsp;Equipments Criteria</a>
                                       </li>
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     @foreach($companyModules as $module)
                     @if($module->module->code == 'rental_module')
                     <li class="divider"></li>
                     <li class="dropdown-toggle">
                        <a href="">Rental</a>
                        <ul class="dropdown-menu">
                           <li><a href="{{ route('company.services.index') }}"><i class="fa fa-file-text"></i> &nbsp;&nbsp;Service</a></li>
                           <li class="dropdown-toggle">
                              <a href="{{ route('company.contracts.index') }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contracts</a>
                              <ul class="dropdown-menu">
                                 <li><a href="{{ route('company.contracts.status') }}"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Contract Calendar</a></li>
                                 <li class="divider"></li>
                                 <li><a href="{{ route('company.contracts.index') }}"><i class="fa fa-file-text"></i>&nbsp;&nbsp;New Contracts</a></li>
                              </ul>
                           </li>
                           <li><a href="{{ route('company.companyInvoices.index') }}"><i class="fa fa-file-text"></i>&nbsp;&nbsp;&nbsp;Invoices</a></li>

                        </ul>
                    </li>
                    @elseif($module->module->code == 'hr_module')
                     <li class="divider"></li>
                     <li class="dropdown-toggle">
                        <a href="">Company HR</a>
                        <ul class="dropdown-menu">
                           <li><a href="{{ route('company.companyHrs.index') }}"><i class="ionicons ion-person-stalker"></i>&nbsp;&nbsp;HR</a></li>
                           <li><a href="{{ route('company.hrCivilStatuses.index') }}"><i class="ionicons ion-person-stalker"></i>&nbsp;&nbsp;Civil Status</a></li>
                           <li><a href="{{ route('company.hrPersonalCats.index') }}"><i class="ionicons ion-person-stalker"></i>&nbsp;&nbsp;Personal Category</a></li>
                           <li><a href="{{ route('company.hrCompanyCollectives.index') }}"><i class="ionicons ion-person-stalker"></i>&nbsp;&nbsp;Collectives</a></li>
                           <li><a href="{{ route('company.hrCompanyDesignations.index') }}"><i class="ionicons ion-person-stalker"></i>&nbsp;&nbsp;Designations</a></li>
                           <li><a href="{{ route('company.hrEmploymentForms.index') }}"><i class="ionicons ion-person-stalker"></i>&nbsp;&nbsp;Employment From</a></li>
                           <li><a href="{{ route('company.hrSalaryTypes.index') }}"><i class="ionicons ion-person-stalker"></i>&nbsp;&nbsp;Salary Types</a></li>
                           <li><a href="{{ route('company.hrCompanyProjects.index') }}"><i class="ionicons ion-person-stalker"></i>&nbsp;&nbsp;Projects</a></li>
                           <li><a href="{{ route('company.hrVacationCategories.index') }}"><i class="ionicons ion-person-stalker"></i>&nbsp;&nbsp;Vacations</a></li>
                           <li><a href="{{ route('company.hRCourses.index') }}"><i class="ionicons ion-person-stalker"></i>&nbsp;&nbsp;Courses</a></li>
                        </ul>
                     </li>


                        @elseif($module->module->code == 'lease_module')

                            <li class="divider"></li>
                            <li><a href="{{ route('company.leasePartners.index') }}">Leasings</a></li>



                     @elseif($module->module->code == 'conference_module')
                     <li class="divider"></li>
                     <li class="dropdown-toggle">
                        <a href="">Conference</a>
                        <ul class="dropdown-menu">
                           <li><a href="{{ route('company.conference.roomLayouts.index') }}"><i class="fa fa-braille"></i>&nbsp;&nbsp;Rooms Layouts</a></li>
                           <li class="dropdown-toggle">
                              <a href="{{ route('company.conference.foods.index') }}"><i class="fa fa-cutlery"></i>&nbsp;&nbsp;Food &amp; Drinks</a>
                              <ul class="dropdown-menu">
                                 <li><a href="{{ route('company.conference.foods.index') }}"><i class="fa fa-cutlery"></i>&nbsp;&nbsp;Food &amp; Drinks</a></li>
                                 <li><a href="{{ route('company.conference.packages.index') }}"><i class="fa fa-cube"></i>&nbsp;&nbsp;Packages</a></li>
                              </ul>
                           </li>
                           <li><a href="{{ route('company.conference.conferenceBookings.index') }}"><i class="fa fa-wpforms"></i>&nbsp;&nbsp;Bookings</a></li>
                           <li><a href="{{ route('company.bookingAgencies.index') }}"><i class="fa fa-clipboard"></i>&nbsp;&nbsp;Booking Agencies</a></li>
                           <li><a href="{{ route('company.conference.calender.view') }}"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Calender</a></li>
                        </ul>
                     </li>
                     @elseif($module->module->code == 'newsletter_module')
                     <li class="divider"></li>
                     <li class="dropdown-toggle">
                        <a href="">Newsletter</a>
                        <ul class="dropdown-menu">
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
                        </ul>
                     </li>


                        
                        @elseif($module->module->code == 'signage_module')
                            <li class="divider"></li>
                            <li><a href="{{ route('company.rsignage.index') }}">Signage System</a></li>
                        
                        @elseif($module->module->code == 'survey_module')
                        <li class="divider"></li>
                        <li class="dropdown-toggle">
                            <a href="">Survey & Feedback</a>
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
                                <li class="dropdown-toggle">
                                    <a href="{{ route('company.survey_answers.list') }}">Survey Answers</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('company.survey_answers.list') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Survey Answers</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('company.feedback.index') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Feedback</a>
                                </li>
                                <li>
                                    <a href="{{ route('company.send_feedback.index') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Send Feedback</a>
                                </li>
                            </ul>
                        </li>
           



                     @elseif($module->module->code == 'support_module')
                     <li class="divider"></li>
                     <li><a href="{{ route('company.supports.index') }}">Support Center</a></li>
                     <li class="divider"></li>
                     <li><a href="{{ route('company.companySupports.index') }}">Tickets</a></li>
                     @endif
                     @endforeach
                     <li class="divider"></li>
                     <li><a href="{{ route('company.companyInvoices.index') }}">Invoices</a> </li>
                     <li class="divider"></li>
                     <li><a href="{{ route('company.currencies.index') }}">Currency</a></li>
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
                            Out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
<nav class="navbar navbar-default" id="horizontal_nav">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('company.dashboard') }}">Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('company.rcustomer.index') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Customer</a></li>
                <li><a href="{{ route('company.rarticle.index') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Article</a></li>
                <li><a href="{{ route('company.companyBuildings.index') }}"><i class="fa fa-cubes"></i>&nbsp;&nbsp;Buildings</a></li>
                @foreach($companyModules as $module)
                    @if($module->module->code == 'rental_module')
                        <li><a href="{{ route('company.contracts.index') }}"><i class="fa fa-file-text"></i>&nbsp;&nbsp;Rental</a></li>
                    @elseif($module->module->code == 'hr_module')
                        <li><a href="{{ route('company.companyHrs.index') }}"><i class="fa fa-trello"></i>&nbsp;&nbsp;HR</a></li>
                    @elseif($module->module->code == 'lease_module')
                        <li><a href="{{ route('company.leasePartners.index') }}">Leasings</a></li>
                    @elseif($module->module->code == 'conference_module')
                        <li><a href="{{ route('company.conference.conferenceBookings.index') }}"><i class="fa fa-wpforms"></i>&nbsp;&nbsp;Conference</a></li>
                    @elseif($module->module->code == 'signage_module')
                        <li><a href="{{ route('company.rsignage.index') }}">Signage System</a></li>
                    @elseif($module->module->code == 'newsletter_module')
                        <li><a href="{{ route('company.newsletterGroups.index') }}"><i
                                        class="fa fa-trello"></i>&nbsp;&nbsp;Newsletter</a>
                        </li>
                    @elseif($module->module->code == 'survey_module')
                        <li><a href="{{ route('company.survey.index') }}">Survey</a></li>
                    @elseif($module->module->code == 'support_module')
                        <li><a href="{{ route('company.supports.index') }}">Support Center</a></li>
                    @endif
                @endforeach
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>
@yield('content')
<div class="m-t-4 p-b-4" id="empty-space"></div>
<footer class="px-footer px-footer-bottom text-center m-t-4 ">
    <span class="">Copyright © 2018 HighNox. All rights reserved.</span>
</footer>
<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
<script src="{{ asset('/skin-1/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/skin-1/assets/js/pixeladmin.min.js') }}"></script>
<script src="{{ asset('/skin-1/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('/skin-1/assets/js/custom.js') }}"></script>
<script src="{{ asset('/skin-1/assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
<script src="{{ asset('/skin-1/assets/fileuploader/src/jquery.fileuploader.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/skin-1/assets/fileuploader/js/custom.js') }}" type="text/javascript"></script>
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