<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.meta')

    <title>@yield('title') | Dinas Kesehatan Kabupaten Bantul</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" type="image/x-icon" href="">

    @stack('before-style')
    <!-- style -->
    <!-- loginv8 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginv8/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('loginv8/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginv8/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginv8/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginv8/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginv8/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginv8/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginv8/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('loginv8/css/main.css') }}">
    @stack('after-style')

</head>

<body>
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <!-- <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> -->
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        <!-- </div> -->
        <!-- ./wrapper -->

        <!-- Site wrapper -->
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form p-l-55 p-r-55 p-t-225" method="POST"
                        action="{{ route('login') }}">
                        <!-- <form method="POST" action="{{ route('login') }}"> -->
                        @csrf
                        <span class="login100-form-title">
                            Agenda Kegiatan<br>
                            Dinas Kesehatan <br> Kabupaten Bantul
                        </span>

                        <div class="wrap-input100 validate-input m-b-16" data-validate="Silakan isi alamat email">
                            <input class="input100" type="email" name="email" placeholder="Email">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 input-group validate-input" id="show_hide_password"
                            data-validate="Silakan isi password">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                            <div class="input-group-addon bg-transparent border-0">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                           
                        </div>

                        <div class="text-right p-t-13 p-b-23">
                            <span class="txt1">
                                Lupa
                            </span>

                            <a href="#" class="txt2" onclick="return confirm('Silakan hubungi Admin')">
                                Email / Password?
                            </a>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Sign in
                            </button>
                        </div>
                        <div class="flex-col-c p-t-90 p-b-20">
                            <span class="txt1 p-b-9">
                                Tidak punya akun?
                            </span>

                            <a href="/register" class="txt3">
                                Daftar sekarang
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        @stack('before-script')
        <!-- script -->
        <!-- login -->

        <!--===============================================================================================-->
        <script src="{{ asset('loginv8/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('loginv8/vendor/animsition/js/animsition.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('loginv8/vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{ asset('loginv8/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('loginv8/vendor/select2/select2.min.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('loginv8/vendor/daterangepicker/moment.min.js') }}"></script>
        <script src="{{ asset('loginv8/vendor/daterangepicker/daterangepicker.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('loginv8/vendor/countdowntime/countdowntime.js') }}"></script>
        <!--===============================================================================================-->
        <script src="{{ asset('loginv8/js/main.js') }}"></script>
        <script>
            $(document).ready(function () {
                $("#show_hide_password a").on('click', function (event) {
                    event.preventDefault();
                    if ($('#show_hide_password input').attr("type") == "text") {
                        $('#show_hide_password input').attr('type', 'password');
                        $('#show_hide_password i').addClass("fa-eye-slash");
                        $('#show_hide_password i').removeClass("fa-eye");
                    } else if ($('#show_hide_password input').attr("type") == "password") {
                        $('#show_hide_password input').attr('type', 'text');
                        $('#show_hide_password i').removeClass("fa-eye-slash");
                        $('#show_hide_password i').addClass("fa-eye");
                    }
                });
            });

        </script>
        @stack('after-script')

        </body> 
        </html>
