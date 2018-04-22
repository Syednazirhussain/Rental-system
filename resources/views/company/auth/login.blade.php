<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>Log In </title>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&subset=latin"
          rel="stylesheet" type="text/css">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="{{ asset('/skin-1/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/skin-1/assets/css/pixeladmin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/skin-1/assets/css/widgets.min.css') }}" rel="stylesheet">

    <link href="{{ asset('/skin-1/assets/css/themes/candy-green.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/skin-1/assets/css/custom.css') }}" rel="stylesheet">

    <!-- Pace.js -->
    <script src="{{ asset('/skin-1/assets/pace/pace.min.js') }}"></script>

    <script src="{{ asset('/skin-1/assets/demo/demo.js') }}"></script>

    <!-- Custom styling -->
    <style>
        .page-signin-header {
            box-shadow: 0 2px 2px rgba(0, 0, 0, .05), 0 1px 0 rgba(0, 0, 0, .05);
        }

        .page-signin-header .btn {
            position: absolute;
            top: 12px;
            right: 15px;
        }

        html[dir="rtl"] .page-signin-header .btn {
            right: auto;
            left: 15px;
        }

        .page-signin-container {
            width: auto;
            margin: 30px 10px;
        }

        .page-signin-container form {
            border: 0;
            box-shadow: 0 2px 2px rgba(0, 0, 0, .05), 0 1px 0 rgba(0, 0, 0, .05);
        }

        @media (min-width: 544px) {
            .page-signin-container {
                width: 350px;
                margin: 60px auto;
            }
        }

        .page-signin-social-btn {
            width: 40px;
            padding: 0;
            line-height: 40px;
            text-align: center;
            border: none !important;
        }

        #page-signin-forgot-form {
            display: none;
        }
    </style>
    <!-- / Custom styling -->
</head>
<body style="background-image: url({{ asset('/skin-1/assets/demo/bgs/3.jpg') }}); background-position: center; background-size: cover;">

<section>
    <!-- Log In form -->
    <div class="page-signin-container" id="page-signin-form">

        <h1 class="m-t-5 m-b-4 text-xs-center font-weight-semibold font-size-30 color-white">HIGHNOX</h1>
        <h3 class="m-t-0 m-b-4 text-xs-center font-size-20 color-white">Company Login Here!</h3>

        <form method="post" action="{{ route('company.users.authenticate') }}" class="panel p-a-4"
              id="admin-login-form">
            {!! csrf_field() !!}
            <span class="left">Username</span>
            <fieldset class=" form-group form-group-lg">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            </fieldset>

            @if ($errors->has('email'))
                <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif

            <span class="left">Password</span>
            <fieldset class=" form-group form-group-lg">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </fieldset>

            @if ($errors->has('password'))
                <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif

            <button type="submit" class="btn btn-block btn-lg btn-primary m-t-3">Log In</button>
        </form>
    </div>

    <!-- / Log In form -->

</section>


<!-- ==============================================================================
|
|  SCRIPTS
|
=============================================================================== -->

<!-- jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="{{ asset('/skin-1/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/skin-1/assets/js/pixeladmin.min.js') }}"></script>

<script type="text/javascript">

    // Initialize validator
    $('#admin-login-form').pxValidate({
        ignore: '.ignore, .select2-input',
        focusInvalid: false,
        rules: {
            'email': {
                required: true,
                email: true
            },
            'password': {
                required: true,
                minlength: 6,
                maxlength: 20
            }
        },

        messages: {
            'email': {
                required: "please enter email",
            },
            'password': {
                required: "please enter password",
            }
        }
    });

</script>

</body>
</html>
