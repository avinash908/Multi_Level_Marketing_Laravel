<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{config('app.name')}} {{@$title}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap 4.0 css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <!-- Animate css -->
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <!-- magnific css -->
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">
    <!-- Icon font css -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
</head>
<body>
    <!-- preloader  -->
    <div id="preloader"></div>

    @include('layouts.front.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.front.footer')

    <!-- All JS here -->

    <!-- modernizr JS -->
    <script src="{{asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- jquery latest version -->
    <script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- Poper js -->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- owl.carousel js -->
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <!-- meanmenu js -->
    <script src="{{asset('js/jquery.meanmenu.js')}}"></script>
    <!-- Counter js -->
    <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
    <!-- waypoint js -->
    <script src="{{asset('js/waypoints.js')}}"></script>
    <!-- magnific js -->
    <script src="{{asset('js/magnific.min.js')}}"></script>
    <!-- wow js -->
    <script src="{{asset('js/wow.min.js')}}"></script>
    <!-- plugins js -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('js/main.js')}}"></script>

    <script type="text/javascript">
        $('#reload').click(function() {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });

        $(document).on('change','#multi_lang',function () {
            window.location.href = '{{url("language")}}/' + $(this).val();
        })
    </script>
</body>
</html>
