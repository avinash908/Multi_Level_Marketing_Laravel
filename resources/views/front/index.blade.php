<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Deflyz</title>
    <link href="images/favicon.ico" rel="icon">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/all.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/tooltipster.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/revolution/navigation.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/revolution/settings.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/style.css">
    <style>
        .tp-bullets {
            display: none
        }

        .banner_top {
            height: 70vh;
            width: 100%;
            background-color: #26313c;
            box-sizing: border-box;
            /* padding: 5rem 2rem; */
            padding: 8rem 0rem 0rem 0rem;
        }

        .banner_top p {
            font-size: 1.2rem;
        }

        .banner_top h1 {
            font-size: 2rem;
        }
    </style>
</head>

<body>
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="cssload-loader"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
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
                            <a class="nav-link" href="">Home</a>
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
    <!--Main Slider-->
    <section id="main-banner-area" class="position-relative">
        <div class="banner_top">
            <div class="container">


                <h1 class="text-capitalize font-bold whitecolor my-3">Show your personal style</h1>
                <p class="whitecolor ">Everyone can join and pruchase great products,<br> recommend them to others and also grow their own community. </p>
                <p class="whitecolor">It only takes few minutes to get going with you business</p>
            </div>
        </div>
    </section>
    <!--Main Slider ends -->
    <!--Some Services-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="services-slider" class="owl-carousel">

                    <div class="item">
                        <div class="service-box">
                            <span class="bottom25"><i class="fa fa-money-check"></i></span>
                            <h4 class="bottom10"><a href="{{url('login')}}">FINANCIAL PLAN</a></h4>
                            <p>E-commerce learning with smart chain Earning program <br>
                                Dream big achieve big
                                <br>
                                <br>
                            </p>
                        </div>
                    </div>

                    <div class="item">
                        <div class="service-box">
                            <span class="bottom25"><i class="fa fa-globe"></i></span>
                            <h4 class="bottom10"><a href="javascript:void(0)">ASSET MANAGEMENT PROGRAM</a></h4>
                            <p>Easy investment opportunity
                                <br>
                                You should invest for non stop passive income
                                <br>
                                Invest for better tomorrow, Invest for yourself you can afford it.
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="service-box">
                            <span class="bottom25"><i class="fa fa-shopping-cart"></i></span>
                            <h4 class="bottom10"><a href="javascript:void(0)">SHOP NOW</a></h4>
                            <p>Shopping should let you earn
                                <br>
                                Shop with us and reffer to ohters get 10% cashback
                                <strong>UPTO</strong> 50% discount also
                                <br>
                                <br>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--Some Services ends-->
    <!--Some Feature -->
    <section id="our-feature" class="single-feature padding_bottom padding_top_half mt-1 mt-lg-n4 mt-md-n3">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-7 col-sm-7 text-sm-start text-center wow fadeInLeft" data-wow-delay="300ms">
                    <div class="heading-title mb-4">
                        <h2 class="darkcolor font-normal bottom30"> Get your <span class="defaultcolor">business </span> to Next Level</h2>
                    </div>
                    <p class="bottom35">Leveraging the latest technologies. and maintain consumer relationships, make better decision, plan ahead for the future and must using multi level marketing </p>
                    <!-- <a href="#our-team" class="button btnsecondary gradient-btn pagescroll mb-sm-0 mb-4">Learn More</a> -->
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-5 col-sm-5 wow fadeInRight" data-wow-delay="300ms">
                    <div class="image"><img alt="SEO" src="{{asset('frontend')}}/images/aboutus.png"></div>
                </div>
            </div>
        </div>
    </section>
    <!--Some Feature ends-->
    <!-- WOrk Process-->
    <section id="our-process" class="padding bgdark">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <div class="heading-title whitecolor wow fadeInUp" data-wow-delay="300ms">
                        <h2 class="fw-normal">Our Work Process </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <ul class="process-wrapp">
                    <li class="whitecolor wow fadeIn" data-wow-delay="300ms">
                        <span class="pro-step bottom20">01</span>
                        <p class="fontbold bottom25">Create account</p>
                        <p class="mt-n2 mt-sm-0">Go to signup and enter your details to create your account</p>
                    </li>
                    <li class="whitecolor wow fadeIn" data-wow-delay="400ms">
                        <span class="pro-step bottom20">02</span>
                        <p class="fontbold bottom25">Choose Package</p>
                        <p class="mt-n2 mt-sm-0">We have various packages for you. choose the package plan which suits you</p>
                    </li>
                    <li class="whitecolor wow fadeIn active" data-wow-delay="500ms">
                        <span class="pro-step bottom20">03</span>
                        <p class="fontbold bottom25">Get Benefits</p>
                        <p class="mt-n2 mt-sm-0">Start yuor benefits according package plan</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--WOrk Process ends-->
    <!-- Contact US -->
    <section id="stayconnect" class="bglight position-relative">
        <div class="container">
            <div class="contactus-wrapp">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="heading-title wow fadeInUp text-center text-md-start" data-wow-delay="300ms">
                            <h3 class="darkcolor bottom20">Stay Connected</h3>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <form class="getin_form wow fadeInUp" data-wow-delay="400ms" onsubmit="return false;">
                            <div class="row">
                                <div class="col-md-12 col-sm-12" id="result"></div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="userName" class="d-none"></label>
                                        <input class="form-control" type="text" placeholder="Name" required id="userName" name="userName">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="companyName" class="d-none"></label>
                                        <input class="form-control" type="text" placeholder="Company" id="companyName" name="companyName">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label for="email" class="d-none"></label>
                                        <input class="form-control" type="email" placeholder="Email" required id="email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <button type="submit" class="button gradient-btn w-100" id="submit_btn">contact</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact US ends -->
    <!--Site Footer Here-->
    <footer id="site-footer" class=" bgdark padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer_panel padding_bottom_half bottom20">
                        <a href="" class="footer_logo bottom25"></a>
                        <p class="whitecolor bottom25">{{$app_info->intro}}</p>
                        <div class="d-table w-100 address-item whitecolor bottom25">
                            <span class="d-table-cell align-middle"><i class="fas fa-mobile-alt"></i></span>
                            <p class="d-table-cell align-middle bottom0">
                                {{$app_info->telephone}} <a class="d-block" href="mailto:{{$app_info->email}}">{{$app_info->email}}</a>
                            </p>
                        </div>
                        <ul class="social-icons white wow fadeInUp" data-wow-delay="300ms">
                            <li><a href="{{$app_info->facebook}}"><i class="fab fa-facebook-f"></i> </a> </li>
                            <li><a href="https://wa.me/{{$app_info->whatsapp}}"><i class="fab fa-whatsapp"></i> </a> </li>
                            <li><a href="{{$app_info->instagram}}"><i class="fab fa-instagram"></i> </a> </li>
                            <li><a href="mailto:{{$app_info->email}}"><i class="fa fa-envelope"></i> </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- <div class="footer_panel padding_bottom_half bottom20 ps-0 ps-lg-5">
                    <h3 class="whitecolor bottom25">Our Services</h3>
                    <ul class="links">
                        <li><a href="">Home</a></li>
                        <li><a href="">About Us</a></li>
                        <li><a href="">Latest News</a></li>
                        <li><a href="">Business Planning</a></li>
                        <li><a href="">Contact Us</a></li>
                        <li><a href="">Faq's</a></li>
                    </ul>
                </div> -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer_panel padding_bottom_half bottom20">
                        <h3 class="whitecolor bottom25">Support</h3>
                        <p class="whitecolor bottom25">Our support available to help you 24 hours a day, seven days week</p>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!--Footer ends-->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('frontend')}}/js/jquery-3.6.0.min.js"></script>
    <!--Bootstrap Core-->
    <script src="{{asset('frontend')}}/js/propper.min.js"></script>
    <script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
    <!--to view items on reach-->
    <script src="{{asset('frontend')}}/js/jquery.appear.js"></script>
    <!--Owl Slider-->
    <script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
    <!--number counters-->
    <script src="{{asset('frontend')}}/js/jquery-countTo.js"></script>
    <!--Parallax Background-->
    <script src="{{asset('frontend')}}/js/parallaxie.js"></script>
    <!--Cubefolio Gallery-->
    <script src="{{asset('frontend')}}/js/jquery.cubeportfolio.min.js"></script>
    <!--Fancybox js-->
    <script src="{{asset('frontend')}}/js/jquery.fancybox.min.js"></script>
    <!--tooltip js-->
    <script src="{{asset('frontend')}}/js/tooltipster.min.js"></script>
    <!--wow js-->
    <script src="{{asset('frontend')}}/js/wow.js"></script>
    <!--Revolution SLider-->
    <script src="{{asset('frontend')}}/js/revolution/jquery.themepunch.tools.min.js"></script>
    <script src="{{asset('frontend')}}/js/revolution/jquery.themepunch.revolution.min.js"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    <script src="{{asset('frontend')}}/js/revolution/extensions/revolution.extension.actions.min.js"></script>
    <script src="{{asset('frontend')}}/js/revolution/extensions/revolution.extension.carousel.min.js"></script>
    <script src="{{asset('frontend')}}/js/revolution/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="{{asset('frontend')}}/js/revolution/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="{{asset('frontend')}}/js/revolution/extensions/revolution.extension.migration.min.js"></script>
    <script src="{{asset('frontend')}}/js/revolution/extensions/revolution.extension.navigation.min.js"></script>
    <script src="{{asset('frontend')}}/js/revolution/extensions/revolution.extension.parallax.min.js"></script>
    <script src="{{asset('frontend')}}/js/revolution/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="{{asset('frontend')}}/js/revolution/extensions/revolution.extension.video.min.js"></script>
    <!--custom functions and script-->
    <script src="{{asset('frontend')}}/js/functions.js"></script>
</body>

</html>