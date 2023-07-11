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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/libs.bundle.css')}}" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/theme.bundle.css')}}" />
    <style>
        .required:before {
            display: inline-block;
            margin-right: 4px;
            color: #ff4d4f;
            font-size: 14px;
            font-family: SimSun,sans-serif;
            line-height: 1;
            content: "*";
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
    <title>@yield('title') | Quản trị Mirascan</title>

</head>
<body>

<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-light border-bottom py-0 fixed-top bg-white">
    <div class="container-fluid">
        <a class="navbar-brand d-flex justify-content-start align-items-center border-end"
           href="{{ route('admin.home') }}">
            <div class="d-flex align-items-center">
                <img src="{{asset('images/logo.png')}}" height="50"  alt="Logo"/>
            </div>    </a>
        <div class="d-flex justify-content-between align-items-center flex-grow-1 navbar-actions">

            <!-- Search Bar and Menu Toggle-->
            <div class="d-flex align-items-center">

                <!-- Menu Toggle-->
                <div class="menu-toggle cursor-pointer me-4 text-primary-hover transition-color disable-child-pointer">
                    <i class="ri-skip-back-mini-line ri-lg fold align-middle" data-bs-toggle="tooltip" data-bs-placement="right"
                       title="Close menu"></i>
                    <i class="ri-skip-forward-mini-line ri-lg unfold align-middle" data-bs-toggle="tooltip" data-bs-placement="right"
                       title="Open Menu"></i>
                </div>
                <!-- / Menu Toggle-->


            </div>
            <!-- / Search Bar and Menu Toggle-->

            <!-- Right Side Widgets-->
            <div class="d-flex align-items-center">
                <!-- Profile Menu-->
                <div class="dropdown ms-1">
                    <button class="btn btn-link p-0 position-relative" type="button" id="profileDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="mr-3">{{ auth('admin')->user()->name ?? auth('admin')->user()->email ?? '' }}</span>
                        <picture>
                            <img class="f-w-10 rounded-circle" src="{{ asset('admin/images/profile-small.jpeg')}}"
                                 alt="HTML Bootstrap Admin Template by Pixel Rocket">
                        </picture>
                    </button>
                    <ul class="dropdown-menu dropdown-md dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item d-flex align-   items-center" href="#">Account Settings</a></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="#">Logout</a></li>
                    </ul>
                </div>        <!-- / Profile Menu-->

            </div>
            <!-- / Notifications & Profile-->
        </div>
    </div>
</nav>    <!-- / Navbar-->

<!-- Page Content -->
<main id="main">

    @yield('content')

        <!-- Content-->
{{--        <section class="container-fluid">--}}

{{--            <!-- Page Title-->--}}
{{--            <h2 class="fs-3 fw-bold mb-2">Welcome back, Patricia Smith 👋</h2>--}}
{{--            <p class="text-muted mb-5">Get a quick overview of your company's current status below, or click into one of the sections for a more detailed breakdown.</p>--}}
{{--            <!-- / Page Title-->--}}

{{--            <!-- Top Row Widgets-->--}}
{{--            <!-- / Top Row Widgets-->--}}

{{--            <!-- Middle Row Widgets-->--}}
{{--            <div class="row g-4 mb-4 mt-0">--}}

{{--                <!-- Current Sales-->--}}
{{--                <div class="col-12 col-xxl-4">--}}
{{--                    <div class="card mb-4 h-100">--}}
{{--                        <div class="card-header justify-content-between align-items-center d-flex">--}}
{{--                            <h6 class="card-title m-0">Current Sales</h6>--}}
{{--                            <div class="dropdown">--}}
{{--                                <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"--}}
{{--                                        id="dropdownExpenses" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="ri-more-2-line"></i>--}}
{{--                                </button>--}}
{{--                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownExpenses">--}}
{{--                                    <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex justify-content-between align-items-start mb-4 mt-2">--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <h4 class="fs-3 fw-bold mb-0 me-3">$123,668</h4>--}}
{{--                                    <span class="badge bg-success-faded text-success d-flex align-items-center ">--}}
{{--                                            <span class="f-w-4 d-block me-2">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-100"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>--}}
{{--                                            </span>--}}
{{--                                            + 13%--}}
{{--                                        </span>            </div>--}}
{{--                                <div class="d-flex align-items-center ms-2 d-xxl-none">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <span class="f-w-2 f-h-2 bg-primary d-block rounded-circle me-2"></span>--}}
{{--                                        <span class="small text-muted">2021</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center ms-4">--}}
{{--                                        <span class="f-w-2 f-h-2 bg-secondary-faded d-block rounded-circle me-2"></span>--}}
{{--                                        <span class="small text-muted">2020</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="chart chart-md pt-2">--}}
{{--                                <canvas id="chartBar"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>                </div>--}}
{{--                <!-- / Current Sales-->--}}

{{--                <!-- Users By Country-->--}}
{{--                <div class="col-12 col-lg-6 col-xxl-4">--}}
{{--                    <div class="card mb-4 h-100">--}}
{{--                        <div class="card-header justify-content-between align-items-center d-flex">--}}
{{--                            <h6 class="card-title m-0">Visitors By Country</h6>--}}
{{--                            <div class="dropdown">--}}
{{--                                <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"--}}
{{--                                        id="dropdownExpenses" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="ri-more-2-line"></i>--}}
{{--                                </button>--}}
{{--                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownExpenses">--}}
{{--                                    <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <ul class="list-unstyled m-0">--}}
{{--                                <li class="d-flex justify-content-between py-2">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <span class="flag-icon flag-icon-gb me-2"></span>--}}
{{--                                        <span class="fw-medium">United Kingdom</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center justify-content-end">--}}
{{--                                        <span class="text-muted text-end small me-1 d-lg-none d-xxl-block">31.2%</span>--}}
{{--                                        <span class="badge bg-transparent text-success d-flex align-items-center ">--}}
{{--                                                            <span class="f-w-4 d-block">--}}
{{--                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-100"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>--}}
{{--                                                            </span>--}}
{{--                                                        </span>                        </div>--}}
{{--                                </li>--}}
{{--                                <li class="d-flex justify-content-between py-2">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <span class="flag-icon flag-icon-us me-2"></span>--}}
{{--                                        <span class="fw-medium">United States</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center justify-content-end">--}}
{{--                                        <span class="text-muted text-end small me-1 d-lg-none d-xxl-block">15.8%</span>--}}
{{--                                        <span class="badge bg-transparent text-danger d-flex align-items-center ">--}}
{{--                                                            <span class="f-w-4 d-block">--}}
{{--                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-100"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>--}}
{{--                                                            </span>--}}
{{--                                                        </span>                        </div>--}}
{{--                                </li>--}}
{{--                                <li class="d-flex justify-content-between py-2">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <span class="flag-icon flag-icon-in me-2"></span>--}}
{{--                                        <span class="fw-medium">India</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center justify-content-end">--}}
{{--                                        <span class="text-muted text-end small me-1 d-lg-none d-xxl-block">21.5%</span>--}}
{{--                                        <span class="badge bg-transparent text-success d-flex align-items-center ">--}}
{{--                                                            <span class="f-w-4 d-block">--}}
{{--                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-100"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>--}}
{{--                                                            </span>--}}
{{--                                                        </span>                        </div>--}}
{{--                                </li>--}}
{{--                                <li class="d-flex justify-content-between py-2">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <span class="flag-icon flag-icon-br me-2"></span>--}}
{{--                                        <span class="fw-medium">Brazil</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center justify-content-end">--}}
{{--                                        <span class="text-muted text-end small me-1 d-lg-none d-xxl-block">27.2%</span>--}}
{{--                                        <span class="badge bg-transparent text-danger d-flex align-items-center ">--}}
{{--                                                            <span class="f-w-4 d-block">--}}
{{--                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-100"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>--}}
{{--                                                            </span>--}}
{{--                                                        </span>                        </div>--}}
{{--                                </li>--}}
{{--                                <li class="d-flex justify-content-between py-2">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <span class="flag-icon flag-icon-au me-2"></span>--}}
{{--                                        <span class="fw-medium">Australia</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center justify-content-end">--}}
{{--                                        <span class="text-muted text-end small me-1 d-lg-none d-xxl-block">44.8%</span>--}}
{{--                                        <span class="badge bg-transparent text-success d-flex align-items-center ">--}}
{{--                                                            <span class="f-w-4 d-block">--}}
{{--                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-100"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>--}}
{{--                                                            </span>--}}
{{--                                                        </span>                        </div>--}}
{{--                                </li>--}}
{{--                                <li class="d-flex justify-content-between py-2">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <span class="flag-icon flag-icon-ch me-2"></span>--}}
{{--                                        <span class="fw-medium">China</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center justify-content-end">--}}
{{--                                        <span class="text-muted text-end small me-1 d-lg-none d-xxl-block">23.2%</span>--}}
{{--                                        <span class="badge bg-transparent text-success d-flex align-items-center ">--}}
{{--                                                            <span class="f-w-4 d-block">--}}
{{--                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-100"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>--}}
{{--                                                            </span>--}}
{{--                                                        </span>                        </div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>                </div>--}}
{{--                <!-- / Users By Country-->--}}

{{--                <!-- Users By Operating System-->--}}
{{--                <div class="col-12 col-lg-6 col-xxl-4">--}}
{{--                    <div class="card mb-4 h-100">--}}
{{--                        <div class="card-header justify-content-between align-items-center d-flex">--}}
{{--                            <h6 class="card-title m-0">Users by OS</h6>--}}
{{--                            <div class="dropdown">--}}
{{--                                <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"--}}
{{--                                        id="dropdownExpenses" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="ri-more-2-line"></i>--}}
{{--                                </button>--}}
{{--                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownExpenses">--}}
{{--                                    <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <ul class="list-unstyled m-0">--}}
{{--                                <li class="d-flex justify-content-between py-2">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                                    <span class="f-w-4 me-3 lh-1">--}}
{{--                                                        <picture>--}}
{{--                                                            <img class="img-fluid" src="{{ asset('admin/images/logos/logo-17.svg')}}" alt="">--}}
{{--                                                        </picture>--}}
{{--                                                    </span>--}}
{{--                                        <span class="fw-medium">MacOS 11 Big Sur</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center justify-content-end">--}}
{{--                                        <span class="text-muted text-end small d-lg-none d-xxl-block">144,678</span>--}}
{{--                                        <div class="progress f-w-12 m-0 ms-2 f-h-1">--}}
{{--                                            <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45"--}}
{{--                                                 aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="d-flex justify-content-between py-2">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                                    <span class="f-w-4 me-3 lh-1">--}}
{{--                                                        <picture>--}}
{{--                                                            <img class="img-fluid" src="{{ asset('admin/images/logos/logo-18.svg')}}" alt="">--}}
{{--                                                        </picture>--}}
{{--                                                    </span>--}}
{{--                                        <span class="fw-medium">Ubuntu</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center justify-content-end">--}}
{{--                                        <span class="text-muted text-end small d-lg-none d-xxl-block">132,568</span>--}}
{{--                                        <div class="progress f-w-12 m-0 ms-2 f-h-1">--}}
{{--                                            <div class="progress-bar" role="progressbar" style="width: 32%" aria-valuenow="32"--}}
{{--                                                 aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="d-flex justify-content-between py-2">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                                    <span class="f-w-4 me-3 lh-1">--}}
{{--                                                        <picture>--}}
{{--                                                            <img class="img-fluid" src="{{ asset('admin/images/logos/logo-19.svg')}}" alt="">--}}
{{--                                                        </picture>--}}
{{--                                                    </span>--}}
{{--                                        <span class="fw-medium">Windows 11</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center justify-content-end">--}}
{{--                                        <span class="text-muted text-end small d-lg-none d-xxl-block">114,345</span>--}}
{{--                                        <div class="progress f-w-12 m-0 ms-2 f-h-1">--}}
{{--                                            <div class="progress-bar" role="progressbar" style="width: 23%" aria-valuenow="23"--}}
{{--                                                 aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="d-flex justify-content-between py-2">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                                    <span class="f-w-4 me-3 lh-1">--}}
{{--                                                        <picture>--}}
{{--                                                            <img class="img-fluid" src="{{ asset('admin/images/logos/logo-17.svg')}}" alt="">--}}
{{--                                                        </picture>--}}
{{--                                                    </span>--}}
{{--                                        <span class="fw-medium">MacOS 10.14 Mojave</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center justify-content-end">--}}
{{--                                        <span class="text-muted text-end small d-lg-none d-xxl-block">98,445</span>--}}
{{--                                        <div class="progress f-w-12 m-0 ms-2 f-h-1">--}}
{{--                                            <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15"--}}
{{--                                                 aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="d-flex justify-content-between py-2">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                                    <span class="f-w-4 me-3 lh-1">--}}
{{--                                                        <picture>--}}
{{--                                                            <img class="img-fluid" src="{{ asset('admin/images/logos/logo-17.svg')}}" alt="">--}}
{{--                                                        </picture>--}}
{{--                                                    </span>--}}
{{--                                        <span class="fw-medium">MacOS 10.15 Catalina</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center justify-content-end">--}}
{{--                                        <span class="text-muted text-end small d-lg-none d-xxl-block">95,987</span>--}}
{{--                                        <div class="progress f-w-12 m-0 ms-2 f-h-1">--}}
{{--                                            <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10"--}}
{{--                                                 aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="d-flex justify-content-between py-2">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                                    <span class="f-w-4 me-3 lh-1">--}}
{{--                                                        <picture>--}}
{{--                                                            <img class="img-fluid" src="{{ asset('admin/images/logos/logo-19.svg')}}" alt="">--}}
{{--                                                        </picture>--}}
{{--                                                    </span>--}}
{{--                                        <span class="fw-medium">Windows 10</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center justify-content-end">--}}
{{--                                        <span class="text-muted text-end small d-lg-none d-xxl-block">77,562</span>--}}
{{--                                        <div class="progress f-w-12 m-0 ms-2 f-h-1">--}}
{{--                                            <div class="progress-bar" role="progressbar" style="width: 8%" aria-valuenow="8"--}}
{{--                                                 aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>                </div>--}}
{{--                <!-- / Users By Operating System-->--}}

{{--                <!-- Monthly Expenses-->--}}
{{--                <div class="col-12 col-lg-4">--}}
{{--                    <div class="card mb-4 h-100">--}}
{{--                        <div class="card-header justify-content-between align-items-center d-flex">--}}
{{--                            <h6 class="card-title m-0">Monthly expenses</h6>--}}
{{--                            <div class="dropdown">--}}
{{--                                <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"--}}
{{--                                        id="dropdownExpenses" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="ri-more-2-line"></i>--}}
{{--                                </button>--}}
{{--                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownExpenses">--}}
{{--                                    <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="chart chart-lg">--}}
{{--                                <canvas id="chartDoughnut"></canvas>--}}
{{--                            </div>--}}

{{--                            <div class="row g-1 mt-4">--}}

{{--                                <div class="col-12 col-sm-4 d-flex flex-column align-items-center">--}}
{{--                                    <p class="fw-bolder mb-1">$1,456</p>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <span class="f-w-2 f-h-2 bg-secondary-faded d-block rounded-circle me-2"></span>--}}
{{--                                        <span class="small text-muted">Rent</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-12 col-sm-4 d-flex flex-column align-items-center">--}}
{{--                                    <p class="fw-bolder mb-1">$12,325</p>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <span class="f-w-2 f-h-2 bg-primary d-block rounded-circle me-2"></span>--}}
{{--                                        <span class="small text-muted">Salaries</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-12 col-sm-4 d-flex flex-column align-items-center">--}}
{{--                                    <p class="fw-bolder mb-1">$14,899</p>--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <span class="f-w-2 f-h-2 bg-warning d-block rounded-circle me-2"></span>--}}
{{--                                        <span class="small text-muted">Marketing</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <a href="#" class="btn btn-light d-table mx-auto mt-4">View full expenses</a>--}}
{{--                        </div>--}}
{{--                    </div>                </div>--}}
{{--                <!-- /Monthly Expenses-->--}}

{{--                <!-- Yearly Income-->--}}
{{--                <div class="col-12 col-lg-8">--}}
{{--                    <div class="card mb-4 h-100">--}}
{{--                        <div class="card-header justify-content-between align-items-center d-flex">--}}
{{--                            <h6 class="card-title m-0">Yearly income</h6>--}}
{{--                            <div class="dropdown">--}}
{{--                                <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"--}}
{{--                                        id="dropdownYearly" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="ri-more-2-line"></i>--}}
{{--                                </button>--}}
{{--                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownYearly">--}}
{{--                                    <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="d-flex justify-content-between align-items-center mb-5">--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <h4 class="fs-3 fw-bold mb-0 me-3">$145,778</h4>--}}
{{--                                    <span class="badge bg-success-faded text-success d-flex align-items-center ">--}}
{{--                                            <span class="f-w-4 d-block me-2">--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-100"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>--}}
{{--                                            </span>--}}
{{--                                            + 35%--}}
{{--                                        </span>            </div>--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <span class="f-w-4 rounded f-h-1 bg-primary d-block me-2"></span>--}}
{{--                                        <span class="small text-muted">2021</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center ms-4">--}}
{{--                                        <span class="f-w-4 rounded f-h-1 bg-secondary-faded d-block me-2"></span>--}}
{{--                                        <span class="small text-muted">2020</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="chart">--}}
{{--                                <div class="chart chart-lg">--}}
{{--                                    <canvas id="chartLine"></canvas>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>                </div>--}}
{{--                <!-- Yearly Income-->--}}

{{--                <!-- Latest Orders-->--}}
{{--                <div class="col-12">--}}
{{--                    <div class="card mb-4 h-100">--}}
{{--                        <div class="card-header justify-content-between align-items-center d-flex">--}}
{{--                            <h6 class="card-title m-0">Latest orders</h6>--}}
{{--                            <a href="#" class="btn btn-outline-secondary btn-sm text-body"><i class="ri-download-2-line align-middle"></i> Export</a>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table m-0 table-striped">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>Order ID</th>--}}
{{--                                        <th>Billing Name</th>--}}
{{--                                        <th>Date</th>--}}
{{--                                        <th>Payment Method</th>--}}
{{--                                        <th>Items</th>--}}
{{--                                        <th>Amount</th>--}}
{{--                                        <th>Status</th>--}}
{{--                                        <th></th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <span class="fw-bolder">#1234-5679</span>--}}
{{--                                        </td>--}}
{{--                                        <td>Patria Nelson</td>--}}
{{--                                        <td class="text-muted">24th June, 2021</td>--}}
{{--                                        <td class="text-muted">--}}
{{--                                            <div class="d-flex align-items-center">--}}
{{--                                                <i class="ri-visa-line ri-lg me-2"></i> **** 6789--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td class="text-muted">5</td>--}}
{{--                                        <th class="text-muted">$123.99</th>--}}
{{--                                        <td><span class="badge rounded-pill bg-success-faded text-success">completed</span></td>--}}
{{--                                        <td>--}}
{{--                                            <div class="dropdown">--}}
{{--                                                <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"--}}
{{--                                                        id="dropdownOrder-0" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                                    <i class="ri-more-2-line"></i>--}}
{{--                                                </button>--}}
{{--                                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownOrder-0">--}}
{{--                                                    <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                                                    <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <span class="fw-bolder">#1235-7755</span>--}}
{{--                                        </td>--}}
{{--                                        <td>Dominic Patterson</td>--}}
{{--                                        <td class="text-muted">22nd June, 2021</td>--}}
{{--                                        <td class="text-muted">--}}
{{--                                            <div class="d-flex align-items-center">--}}
{{--                                                <i class="ri-mastercard-fill ri-lg me-2"></i> **** 1233--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td class="text-muted">5</td>--}}
{{--                                        <th class="text-muted">$123.99</th>--}}
{{--                                        <td><span class="badge rounded-pill bg-info-faded text-info">processing</span></td>--}}
{{--                                        <td>--}}
{{--                                            <div class="dropdown">--}}
{{--                                                <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"--}}
{{--                                                        id="dropdownOrder-1" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                                    <i class="ri-more-2-line"></i>--}}
{{--                                                </button>--}}
{{--                                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownOrder-1">--}}
{{--                                                    <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                                                    <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <span class="fw-bolder">#1236-6579</span>--}}
{{--                                        </td>--}}
{{--                                        <td>Steven Smith</td>--}}
{{--                                        <td class="text-muted">21st June, 2021</td>--}}
{{--                                        <td class="text-muted">--}}
{{--                                            <div class="d-flex align-items-center">--}}
{{--                                                <i class="ri-paypal-line ri-lg me-2"></i> **** 7766--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td class="text-muted">5</td>--}}
{{--                                        <th class="text-muted">$123.99</th>--}}
{{--                                        <td><span class="badge rounded-pill bg-danger-faded text-danger">cancelled</span></td>--}}
{{--                                        <td>--}}
{{--                                            <div class="dropdown">--}}
{{--                                                <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"--}}
{{--                                                        id="dropdownOrder-2" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                                    <i class="ri-more-2-line"></i>--}}
{{--                                                </button>--}}
{{--                                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownOrder-2">--}}
{{--                                                    <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                                                    <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <span class="fw-bolder">#1237-1122</span>--}}
{{--                                        </td>--}}
{{--                                        <td>Courtney Lawes</td>--}}
{{--                                        <td class="text-muted">19th June, 2021</td>--}}
{{--                                        <td class="text-muted">--}}
{{--                                            <div class="d-flex align-items-center">--}}
{{--                                                <i class="ri-mastercard-fill ri-lg me-2"></i> **** 9087--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td class="text-muted">5</td>--}}
{{--                                        <th class="text-muted">$123.99</th>--}}
{{--                                        <td><span class="badge rounded-pill bg-success-faded text-success">completed</span></td>--}}
{{--                                        <td>--}}
{{--                                            <div class="dropdown">--}}
{{--                                                <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"--}}
{{--                                                        id="dropdownOrder-3" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                                    <i class="ri-more-2-line"></i>--}}
{{--                                                </button>--}}
{{--                                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownOrder-3">--}}
{{--                                                    <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                                                    <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <span class="fw-bolder">#1238-4433</span>--}}
{{--                                        </td>--}}
{{--                                        <td>Haley Jackson</td>--}}
{{--                                        <td class="text-muted">19th June, 2021</td>--}}
{{--                                        <td class="text-muted">--}}
{{--                                            <div class="d-flex align-items-center">--}}
{{--                                                <i class="ri-visa-line ri-lg me-2"></i> **** 6789--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td class="text-muted">5</td>--}}
{{--                                        <th class="text-muted">$123.99</th>--}}
{{--                                        <td><span class="badge rounded-pill bg-success-faded text-success">completed</span></td>--}}
{{--                                        <td>--}}
{{--                                            <div class="dropdown">--}}
{{--                                                <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"--}}
{{--                                                        id="dropdownOrder-4" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                                    <i class="ri-more-2-line"></i>--}}
{{--                                                </button>--}}
{{--                                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownOrder-4">--}}
{{--                                                    <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                                                    <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <span class="fw-bolder">#1239-8865</span>--}}
{{--                                        </td>--}}
{{--                                        <td>Sairaj Tackoo</td>--}}
{{--                                        <td class="text-muted">18th June, 2021</td>--}}
{{--                                        <td class="text-muted">--}}
{{--                                            <div class="d-flex align-items-center">--}}
{{--                                                <i class="ri-mastercard-fill ri-lg me-2"></i> **** 1233--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                        <td class="text-muted">5</td>--}}
{{--                                        <th class="text-muted">$123.99</th>--}}
{{--                                        <td><span class="badge rounded-pill bg-info-faded text-info">processing</span></td>--}}
{{--                                        <td>--}}
{{--                                            <div class="dropdown">--}}
{{--                                                <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"--}}
{{--                                                        id="dropdownOrder-5" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                                    <i class="ri-more-2-line"></i>--}}
{{--                                                </button>--}}
{{--                                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownOrder-5">--}}
{{--                                                    <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                                                    <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                            <nav>--}}
{{--                                <ul class="pagination justify-content-end mt-3 mb-0">--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
{{--                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
{{--                                </ul>--}}
{{--                            </nav>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Latest Orders-->--}}

{{--            </div>--}}
{{--            <!-- / Middle Row Widgets-->--}}

{{--            <!-- Bottom Row Widgets-->--}}
{{--            <div class="row g-4 mb-5">--}}

{{--                <!-- Top Products-->--}}
{{--                <div class="col-12 col-lg-6">--}}
{{--                    <div class="card mb-4 h-100">--}}
{{--                        <div class="card-header justify-content-between align-items-center d-flex">--}}
{{--                            <h6 class="card-title m-0">Top categories</h6>--}}
{{--                            <div class="dropdown">--}}
{{--                                <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"--}}
{{--                                        id="dropdownTop" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="ri-more-2-line"></i>--}}
{{--                                </button>--}}
{{--                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownTop">--}}
{{--                                    <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <table class="table m-0">--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td class="ps-0">--}}
{{--                                        <picture>--}}
{{--                                            <img class="f-w-12 rounded" src="{{ asset('admin/images/logos/logo-13.svg')}}"--}}
{{--                                                 alt="HTML Bootstrap Admin Template by Pixel Rocket">--}}
{{--                                        </picture>--}}
{{--                                    </td>--}}
{{--                                    <td class="d-none d-xl-table-cell">--}}
{{--                                        <span class="text-muted">Nike Mens Running Shoes</span>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center justify-content-end">--}}
{{--                                            <span class="fw-bolder me-3">£834.98</span>--}}
{{--                                            <span class="badge bg-transparent text-success d-flex align-items-center ">--}}
{{--                                                        <span class="f-w-4 d-block">--}}
{{--                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-100"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>--}}
{{--                                                        </span>--}}
{{--                                                    </span>                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="text-end pe-0">--}}
{{--                                        <div class="progress f-w-20 m-0 me-0 ms-auto f-h-1">--}}
{{--                                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"--}}
{{--                                                 aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="ps-0">--}}
{{--                                        <picture>--}}
{{--                                            <img class="f-w-12 rounded" src="{{ asset('admin/images/logos/logo-15.svg')}}"--}}
{{--                                                 alt="HTML Bootstrap Admin Template by Pixel Rocket">--}}
{{--                                        </picture>--}}
{{--                                    </td>--}}
{{--                                    <td class="d-none d-xl-table-cell">--}}
{{--                                        <span class="text-muted">Adidas Womens Jackets</span>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center justify-content-end">--}}
{{--                                            <span class="fw-bolder me-3">£695.54</span>--}}
{{--                                            <span class="badge bg-transparent text-success d-flex align-items-center ">--}}
{{--                                                        <span class="f-w-4 d-block">--}}
{{--                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-100"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>--}}
{{--                                                        </span>--}}
{{--                                                    </span>                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="text-end pe-0">--}}
{{--                                        <div class="progress f-w-20 m-0 me-0 ms-auto f-h-1">--}}
{{--                                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"--}}
{{--                                                 aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="ps-0">--}}
{{--                                        <picture>--}}
{{--                                            <img class="f-w-12 rounded" src="{{ asset('admin/images/logos/logo-14.svg')}}"--}}
{{--                                                 alt="HTML Bootstrap Admin Template by Pixel Rocket">--}}
{{--                                        </picture>--}}
{{--                                    </td>--}}
{{--                                    <td class="d-none d-xl-table-cell">--}}
{{--                                        <span class="text-muted">Under Armour Golf Shorts</span>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center justify-content-end">--}}
{{--                                            <span class="fw-bolder me-3">£313.18</span>--}}
{{--                                            <span class="badge bg-transparent text-danger d-flex align-items-center ">--}}
{{--                                                        <span class="f-w-4 d-block">--}}
{{--                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-100"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>--}}
{{--                                                        </span>--}}
{{--                                                    </span>                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="text-end pe-0">--}}
{{--                                        <div class="progress f-w-20 m-0 me-0 ms-auto f-h-1">--}}
{{--                                            <div class="progress-bar" role="progressbar" style="width: 35%" aria-valuenow="35"--}}
{{--                                                 aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                            <a href="#" class="btn btn-outline-secondary btn-sm text-body me-0 ms-auto d-table mt-3 pb-2" role="button">See all &rarr;</a>--}}
{{--                        </div>--}}
{{--                    </div>                </div>--}}
{{--                <!-- Top Products-->--}}

{{--                <!-- Newsletter Stats-->--}}
{{--                <div class="col-12 col-lg-6">--}}
{{--                    <div class="card mb-4 h-100">--}}
{{--                        <div class="card-header justify-content-between align-items-center d-flex">--}}
{{--                            <h6 class="card-title m-0">Newsletter revenue</h6>--}}
{{--                            <div class="dropdown">--}}
{{--                                <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"--}}
{{--                                        id="dropdownNewsletter" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    <i class="ri-more-2-line"></i>--}}
{{--                                </button>--}}
{{--                                <ul class="dropdown-menu dropdown" aria-labelledby="dropdownNewsletter">--}}
{{--                                    <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <h4 class="fs-3 fw-bold mb-3">$123,778</h4>--}}
{{--                            <div class="progress f-h-1">--}}
{{--                                <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0"--}}
{{--                                     aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top" title="Gross sales"></div>--}}
{{--                                <div class="progress-bar opacity-75" role="progressbar" style="width: 25%" aria-valuenow="25"--}}
{{--                                     aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top"--}}
{{--                                     title="Net sales"></div>--}}
{{--                                <div class="progress-bar opacity-50" role="progressbar" style="width: 35%" aria-valuenow="35"--}}
{{--                                     aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-bs-placement="top"--}}
{{--                                     title="Total profit"></div>--}}
{{--                            </div>--}}

{{--                            <table class="table mb-0 mt-4">--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <span class="f-w-2 f-h-2 rounded-circle bg-primary d-block"></span>--}}
{{--                                            <span class="text-muted ms-2">Gross sales</span>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td><span class="fw-bolder">$3,289.99 <span class="text-muted">(54.3%)</span></span></td>--}}
{{--                                    <td class="text-end">--}}
{{--                                                <span class="badge bg-transparent text-success d-flex align-items-center justify-content-end">--}}
{{--                                                    <span class="f-w-4 d-block">--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-100"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>--}}
{{--                                                    </span>--}}
{{--                                                </span>                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <span class="f-w-2 f-h-2 rounded-circle bg-primary d-block opacity-75"></span>--}}
{{--                                            <span class="text-muted ms-2">Net sales</span>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td><span class="fw-bolder">$1,758.99 <span class="text-muted">(32.3%)</span></span></td>--}}
{{--                                    <td class="text-end">--}}
{{--                                                <span class="badge bg-transparent text-danger d-flex align-items-center justify-content-end">--}}
{{--                                                    <span class="f-w-4 d-block">--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-100"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>--}}
{{--                                                    </span>--}}
{{--                                                </span>                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <span class="f-w-2 f-h-2 rounded-circle bg-primary d-block opacity-50"></span>--}}
{{--                                            <span class="text-muted ms-2">Total profit</span>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td><span class="fw-bolder">$699.54  <span class="text-muted">(12.3%)</span></span></td>--}}
{{--                                    <td class="text-end">--}}
{{--                                                <span class="badge bg-transparent text-success d-flex align-items-center justify-content-end">--}}
{{--                                                    <span class="f-w-4 d-block">--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-100"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>--}}
{{--                                                    </span>--}}
{{--                                                </span>                    </td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Newsletter Stats-->--}}

{{--            </div>--}}
{{--            <!-- / Bottom Row Widgets-->--}}

{{--            <!-- Footer -->--}}
{{--            <footer class="footer">--}}
{{--                <p class="small text-muted m-0"><span>Cung cấp bởi <a href="https://miraway.vn" target="_blank">Miraway </a> - Công ty giải pháp công nghệ Việt Nam </span></p>--}}
{{--            </footer>--}}
{{--        </section>--}}

</main>
<!-- /Page Content -->

<!-- Page Aside-->
<aside class="aside bg-white">

    <div class="simplebar-wrapper">
        <div data-pixr-simplebar>
            <div class="pb-6">
                <!-- Mobile Logo-->
                <div class="d-flex d-xl-none justify-content-between align-items-center border-bottom aside-header">
                    <a class="navbar-brand lh-1 border-0 m-0 d-flex align-items-center" href="{{ route('admin.home') }}">
                        <div class="d-flex align-items-center">
                            <img src="{{asset('images/logo.png')}}" height="50"  alt="Logo"/>

                        </div>                    </a>
                    <i
                        class="ri-close-circle-line ri-lg close-menu text-muted transition-all text-primary-hover me-4 cursor-pointer"></i>
                </div>
                <!-- / Mobile Logo-->

                <ul class="list-unstyled mb-6">

                    <!-- Dashboard Menu Section-->
                    <li class="menu-section mt-2">Menu</li>
                    <li class="menu-item"><a class="d-flex align-items-center" href="{{ route('admin.home') }}">
                                <span class="menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-100">
                                        <rect fill-opacity=".5" fill="currentColor" x="3" y="3" width="7" height="7"></rect>
                                        <rect fill="currentColor" x="14" y="3" width="7" height="7"></rect>
                                        <rect fill-opacity=".5" fill="currentColor" x="14" y="14" width="7" height="7">
                                        </rect>
                                        <rect fill="currentColor" x="3" y="14" width="7" height="7"></rect>
                                    </svg>
                                </span>
                            <span class="menu-link">
                                    Tổng quan
                                </span></a></li>
                    <!-- / Dashboard Menu Section-->

                    <!-- Dashboard Menu Section-->
                    <li class="menu-section mt-4">Data</li>
                    <li class="menu-item"><a class="d-flex align-items-center" href="{{ route('agency.index') }}">
                                <span class="menu-icon">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                       <path fill="currentColor" opacity=".5" d="M155.327,57.142c-51.531,0-93.454,44.45-93.454,99.086c0,54.636,41.923,99.086,93.454,99.086s93.455-44.45,93.455-99.086
                                           C248.782,101.592,206.859,57.142,155.327,57.142z"/>

                                       <path fill="currentColor" d="M367.798,71.321c-0.211,0-0.425,0.001-0.636,0.002c-21.626,0.179-41.826,9.31-56.878,25.713
                                           c-14.788,16.113-22.829,37.37-22.644,59.854c0.186,22.484,8.577,43.605,23.628,59.473c15.17,15.991,35.265,24.773,56.651,24.773
                                           c0.215,0,0.43-0.001,0.646-0.002c21.626-0.179,41.826-9.311,56.878-25.713c14.788-16.113,22.829-37.37,22.644-59.855
                                           C447.702,108.972,411.747,71.321,367.798,71.321z"/>

                                       <path fill="currentColor" d="M371.74,257.358h-7.76c-36.14,0-69.12,13.74-94.02,36.26c6.23,4.78,12.16,9.99,17.78,15.61
                                           c16.58,16.58,29.6,35.9,38.7,57.42c8.2,19.38,12.88,39.8,13.97,60.83H512v-29.87C512,320.278,449.08,257.358,371.74,257.358z"/>

                                       <path fill="currentColor" opacity=".5" d="M310.35,427.478c-2.83-45.59-25.94-85.69-60.43-111.39c-25.09-18.7-56.21-29.77-89.92-29.77h-9.34
                                           C67.45,286.319,0,353.768,0,436.978v17.88h310.65v-17.88C310.65,433.788,310.55,430.618,310.35,427.478z"/>

                               </svg>
                                </span>
                            <span
                                class="menu-link">Đại lý</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="d-flex align-items-center" href="{{ route('staff.index') }}">
                                <span class="menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z" />
                                        <path opacity="0.5" d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z" />
                                      <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z" />
                                      </svg>
                                </span>
                            <span class="menu-link">Nhân viên</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</aside>    <!-- / Page Aside-->

<!-- Theme JS -->
<!-- Vendor JS -->
<script src="{{ asset('admin/js/vendor.bundle.js')}}"></script>

<!-- Theme JS -->
<script src="{{ asset('admin/js/theme.bundle.js')}}"></script>
</body>

</html>
