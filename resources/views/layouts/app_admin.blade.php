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
                <img src="{{asset('images/logo.png')}}" height="50" alt="Logo"/>
            </div>
        </a>

        <div class="d-flex justify-content-between align-items-center flex-grow-1 navbar-actions">

            <!-- Search Bar and Menu Toggle-->
            <div class="d-flex align-items-center">

                <!-- Menu Toggle-->
                <div class="menu-toggle cursor-pointer me-4 text-primary-hover transition-color disable-child-pointer">
                    <i class="ri-skip-back-mini-line ri-lg fold align-middle" data-bs-toggle="tooltip"
                       data-bs-placement="right"
                       title="Close menu"></i>
                    <i class="ri-skip-forward-mini-line ri-lg unfold align-middle" data-bs-toggle="tooltip"
                       data-bs-placement="right"
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
                        <span
                            class="mr-3">{{ auth('admin')->user()->name ?? auth('admin')->user()->email ?? '' }}</span>
                        <picture>
                            <img class="f-w-10 rounded-circle" src="{{ asset('admin/images/profile-small.jpeg')}}"
                                 alt="HTML Bootstrap Admin Template by Pixel Rocket">
                        </picture>
                    </button>
                    <ul class="dropdown-menu dropdown-md dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.show-form-password') }}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                Đổi mật khẩu
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                Đăng xuất
                            </a>
                        </li>
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
</main>
<!-- /Page Content -->

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.logout') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Đăng xuất</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn đăng xuất không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                    <button type="submit" class="btn btn-primary">Đăng xuất</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Page Aside-->
<aside class="aside bg-white">

    <div class="simplebar-wrapper">
        <div data-pixr-simplebar>
            <div class="pb-6">
                <!-- Mobile Logo-->
                <div class="d-flex d-xl-none justify-content-between align-items-center border-bottom aside-header">
                    <a class="navbar-brand lh-1 border-0 m-0 d-flex align-items-center"
                       href="{{ route('admin.home') }}">
                        <div class="d-flex align-items-center">
                            <img src="{{asset('images/logo.png')}}" height="50" alt="Logo"/>

                        </div>
                    </a>
                    <i
                        class="ri-close-circle-line ri-lg close-menu text-muted transition-all text-primary-hover me-4 cursor-pointer"></i>
                </div>
                <!-- / Mobile Logo-->

                <ul class="list-unstyled mb-6">

                    <!-- Dashboard Menu Section-->
                    <li class="menu-section mt-2">Menu</li>
                    <li class="menu-item"><a class="d-flex align-items-center" href="{{ route('admin.home') }}">
                                <span class="menu-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                         class="w-100">
                                        <rect fill-opacity=".5" fill="currentColor" x="3" y="3" width="7"
                                              height="7"></rect>
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
                    <li class="menu-item"><a class="d-flex align-items-center" href="{{ route('qrcode.index') }}">
                                <span class="menu-icon">
                                    <svg enable-background="new 0 0 520 520" viewBox="0 0 520 520" xmlns="http://www.w3.org/2000/svg"><g><path fill="currentColor" d="m481.734 100.063h-158.331l-43.111-70.397c-2.727-4.452-7.571-7.166-12.792-7.166h-119.235c-21.099 0-38.265 17.166-38.265 38.266v65.51 229.184c0 21.1 17.166 38.266 38.265 38.266h261.735 71.734c21.1 0 38.266-17.166 38.266-38.266v-217.13c0-21.101-17.166-38.267-38.266-38.267z"></path><path fill="currentColor" opacity=".5" d="m80 355.459v-229.184h-41.734c-21.1 0-38.266 17.166-38.266 38.266v294.693c0 21.1 17.166 38.266 38.266 38.266h333.469c21.1 0 38.266-17.166 38.266-38.266v-35.51h-261.736c-37.641.001-68.265-30.623-68.265-68.265z"></path></g></svg>
                                </span>
                            <span
                                class="menu-link">QR Coupon</span>
                        </a>
                    </li>
                    <li class="menu-item"><a class="d-flex align-items-center" href="{{ route('agency.index') }}">
                                <span class="menu-icon">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                         xml:space="preserve">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path
                                            d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z"/>
                                        <path opacity="0.5"
                                              d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z"/>
                                      <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z"/>
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
