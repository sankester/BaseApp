<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!--Load meta -->
    {!! $page->generateMeta() !!}
    <!-- End load meta -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--set title--}}
    <title>{{ $page->generateTitle() }}</title>
    <!-- Default stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    {!! $page->generateCss() !!}
    <!-- End default stylesheets -->
    <!-- Default Js-->
    {!! $page->generateJs()  !!}
    <!--End default Js-->
</head>
<body class="navbar-top">
{{--include navigation bar --}}
@include('layouts.admin.top-nav')
<!-- PageLib container -->
<div class="page-container">
    <!-- PageLib content -->
    <div class="page-content">
        @include('layouts.admin.main-nav')
        <!-- Main content -->
        <div class="content-wrapper">
            @yield('page-header')
            <!-- Content area -->
            <div class="content">
                @yield('content')
                <!-- Footer -->
                <div class="footer text-muted">
                    @include('layouts.admin.footer')
                </div>
                <!-- /footer -->
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</div>
<!-- /page container -->
@yield('costum-js')
</body>
</html>
