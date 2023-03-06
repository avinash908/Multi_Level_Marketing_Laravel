<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}} {{@$title}}</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('/')}}/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="{{asset('/')}}vendors/bower_components/animate.css/animate.min.css">
    <link rel="stylesheet" href="{{asset('/')}}vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css">
    <link rel="stylesheet" href="{{asset('/')}}vendors/bower_components/fullcalendar/dist/fullcalendar.min.css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('/')}}css/app.min.css">
    <link rel="stylesheet" href="{{asset('')}}css/jquery.ccpicker.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css">

</head>

<body data-sa-theme="3">
    <!-- header -->
    <header class="site-header" id="header">
        <nav class="navbar navbar-expand-lg transparent-bg static-nav">
            <div class="container">
                <a class="navbar-brand" href="">
                    <img src="{{asset('frontend')}}/images/logo.png" alt="logo" class="logo-default">
                    <img src="{{asset('frontend')}}/images/logo.png" alt="logo" class="logo-scrolled">
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Our Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/register')}}">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--side menu open button-->
            <a href="javascript:void(0)" class="d-inline-block sidemenu_btn" id="sidemenu_toggle">
                <span></span> <span></span> <span></span>
            </a>
        </nav>
        <!-- side menu -->
        <div class="side-menu opacity-0 gradient-bg">
            <div class="overlay"></div>
            <div class="inner-wrapper">
                <span class="btn-close btn-close-no-padding" id="btn_sideNavClose"><i></i><i></i></span>
                <nav class="side-nav w-100">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Our Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/register')}}">Register</a>
                        </li>
                    </ul>
                </nav>
                <div class="side-footer w-100">
                    <ul class="social-icons-simple white top40">
                        <li><a href="{{$app_info->facebook}}"><i class="fab fa-facebook-f"></i> </a> </li>
                        <li><a href="https://wa.me/{{$app_info->whatsapp}}"><i class="fab fa-whatsapp"></i> </a> </li>
                        <li><a href="{{$app_info->instagram}}"><i class="fab fa-instagram"></i> </a> </li>
                        <li><a href="mailto:{{$app_info->email}}"><i class="fa fa-envelope"></i> </a> </li>
                    </ul>
                    <p class="whitecolor">&copy; <span id="year"></span> Deflyz.com</p>
                </div>
            </div>
        </div>
        <div id="close_side_menu" class="tooltip"></div>
        <!-- End side menu -->
    </header>
    <!-- header -->


    @yield('content')

    <script src="{{asset('/')}}vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>

    <script src="{{asset('/')}}vendors/bower_components/salvattore/dist/salvattore.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/flot/jquery.flot.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/flot/jquery.flot.resize.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/peity/jquery.peity.min.js"></script>
    <script src="{{asset('/')}}vendors/bower_components/moment/min/moment.min.js"></script>
    <script src="{{asset('js/main.js')}}"></script>

    <!-- App functions and actions -->
    <script src="{{asset('/')}}js/app.min.js"></script>
    <script src="{{asset('')}}js/jquery.ccpicker.js"></script>
    <script src="{{asset('frontend')}}/js/functions.js"></script>

    <script>
        $("#phone").CcPicker({
            dataUrl: "<?= asset('json/data.json') ?>",
            "countryCode": "PK",
        });

        $(".btn-refresh").click(function() {
            $.ajax({
                type: 'GET',
                url: '/reload-captcha',
                success: function(data) {
                    $(".captchabox").html(data.captcha);
                }
            });
        });
    </script>
</body>

</html>