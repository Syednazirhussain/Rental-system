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

    @yield('css')

    <link href="{{ asset('/skin-1/assets/css/custom.css') }}" rel="stylesheet">
    <!-- holder.js -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/holder/2.9.0/holder.js"></script>
    <!-- Pace.js -->
    <script src="{{ asset('/skin-1/assets/pace/pace.min.js') }}"></script>
    <script src="{{ asset('/skin-1/assets/demo/demo.js') }}"></script>
    <!-- Custom styling -->
    <style>
        .page-header-form .input-group-addon,
        .page-header-form .form-control {
            background: rgba(0, 0, 0, .05);
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
                        <a href>Settings</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.userRoles.index') }}"><i class="fa fa-users"></i>&nbsp;&nbsp;User
                                    Roles</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('admin.userStatuses.index') }}"><i
                                            class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;User Status</a></li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </li>
        </ul>
        <!-- Header -->
        <div class="navbar-header">
            <a class="navbar-brand px-demo-brand" href="{{ route('company.dashboard') }}"><span
                        class="px-demo-logo bg-primary"><span class="px-demo-logo-1"></span><span
                            class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span
                            class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span
                            class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span
                            class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span>HIGHNOX</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <img src="{{ asset('/skin-1/assets/demo/avatars/1.jpg') }}" alt="" class="px-navbar-image">
                    <span class="hidden-md">{{ ucfirst(Auth::user()->name) }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="pages-account.html">Account</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{  url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;Log
                            Out</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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







