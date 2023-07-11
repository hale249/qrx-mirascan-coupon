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
    <link rel="stylesheet" href="{{ asset('admin/css/libs.bundle.css') }}" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/theme.bundle.css') }}" />

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
    <title>Đăng nhập | Quản trị mirascan</title>

</head>
<body class="">

<!-- Main Section-->
<section class="d-flex justify-content-center align-items-start vh-100 py-5 px-3 px-md-0">

    <!-- Login Form-->
    <div class="d-flex flex-column w-100 align-items-center mt-5">
        <div class="shadow-lg rounded p-4 p-sm-5 bg-white form">
            <div class="d-flex justify-content-center">
                <img src="{{asset('images/logo.png')}}" height="80"  alt="Logo"/>
            </div>
            <h3 class="fw-bold text-center">Đăng nhập quản trị đại lý</h3>
            <!-- Login Form-->
            <form class="mt-4" method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="login-email">Email</label>
                    <input type="text" name="email" class="form-control  @error('email') is-invalid @enderror" id="login-email" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="login-password" class="form-label d-flex justify-content-between align-items-center">
                        Mật khẩu
                    </label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="login-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary d-block w-100 my-4">Đăng nhập</button>
            </form>
        </div>
    </div>
    <!-- / Login Form-->

</section>
<!-- / Main Section-->

<!-- Theme JS -->
<!-- Vendor JS -->
<script src="{{ asset('admin/js/vendor.bundle.js') }}"></script>

<!-- Theme JS -->
<script src="{{ asset('admin/js/theme.bundle.js') }}"></script>
</body>

</html>
