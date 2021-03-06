<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel Base App') }}</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('theme/admin-template/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('theme/admin-template/css/all.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('theme/admin-template/js/plugins/loaders/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('theme/admin-template/js/core/libraries/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('theme/admin-template/js/core/libraries/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('theme/admin-template/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('theme/admin-template/js/core/app.js')}}"></script>
    <!-- /theme JS files -->
    <script type="text/javascript" src="{{ asset('theme/admin-template/js/plugins/forms/styling/uniform.min.js')}}"></script>
    {{--include rechaptcha js--}}
    {!! Recaptcha::getRecaptchaJs() !!}
    <style>
        @media screen and (max-height: 800px){
            #rc-imageselect, .g-recaptcha {
                transform:scale(0.90);
                -webkit-transform:scale(0.90);transform-origin:0 0;
                -webkit-transform-origin:0 0;
            }
        }
    </style>

</head>

<body class="login-container">

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        {{--<a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a>--}}
                <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav navbar-right">
        </ul>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                @yield('content')
                <div class="footer text-muted text-center">
                    @include('layouts.admin.footer')
                </div>
            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
@yield('initial-js')
</body>
</html>
