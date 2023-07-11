<!doctype html>
<html lang="en">

<!-- Head -->
<head>
    <!-- Page Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon.ico') }}">
    <link rel="mask-icon" href="{{ asset('favicon.ico')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/libs.bundle.css')}}"/>

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/theme.bundle.css')}}"/>
    <style>
        .required:before {
            display: inline-block;
            margin-right: 4px;
            color: #ff4d4f;
            font-size: 14px;
            font-family: SimSun, sans-serif;
            line-height: 1;
            content: "*";
        }

        footer {
            position: fixed;
            bottom: 0;
            padding-bottom: 5px;
            font-size: 12px;
            width: 100%;
        }
    </style>

    <!-- Fix for custom scrollbar if JS is disabled-->
    <noscript>
        <style>
            /**
            * Reinstate scrolling for non-JS clients
            */
            .simplebar-content-wrapper {
                overflow: auto;
            }
        </style>
    </noscript>

    <!-- Page Title -->
    <title>Xác thực coupon | Mirascan</title>

</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{asset('images/logo.png')}}" height="60" alt="Logo"/>
        </a>

        <div class="navbar-toggler" style="border: none; font-size: 14px; cursor: pointer">
            @if(Auth::user())
                @include('layouts.includes.profile')
            @endif
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>
            <!-- Right Side Of Navbar -->

            @if(Auth::user())
                @include('layouts.includes.profile')
            @endif
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

@include('layouts.includes.footer')
@include('layouts.includes.logout');
<script src="{{ asset('admin/js/vendor.bundle.js')}}"></script>

<!-- Theme JS -->
<script src="{{ asset('admin/js/theme.bundle.js')}}"></script>
</body>

</html>
