
    <header class="header-one">
        <!-- Start top bar -->
        <div class="topbar-area">
            <div class="container">
                <div class="row">
                    <div class=" col-md-8 col-sm-8 col-xs-12">
                        <div class="topbar-left">
                            <ul>
                                <li><a href="mailto:{{$app_info->email}}"><i class="fa fa-envelope"></i>{{$app_info->email}}</a></li>
                                <li><a href="tel:{{$app_info->telephone}}"><i class="fa fa-clock-o"></i>Live support</a></li>
                            </ul>  
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="topbar-right">
                            <select class="select d-inline-block" id="multi_lang">
                                <option value="en" {{ (session()->has('locale') && session()->get('locale') == 'en' ) ? 'selected' : '' }}>English</option>
                                <option value="ar" {{ (session()->has('locale') && session()->get('locale') == 'ar' ) ? 'selected' : '' }} >Arabic</option>
                            </select>
                            <ul>
                                <li><a href="{{url('login')}}"><img src="img/icon/login.png" alt="">{{__('Login')}}</a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End top bar -->
        <!-- Start Header Menu -->
        <div id="sticker" class="header-menu-area header-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 d-flex align-items-center">
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    
                    <div class="col-xl-10 col-lg-10 col-md-9">
                        <div class="header-right">
                            <a href="{{url('register')}}" class="hd-btn">{{__('Signup')}}</a>
                        </div>
                        <div class="header_menu f-right">
                            <nav id="mobile-menu">
                                <ul class="main-menu">
                                    <li><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                    <li><a href="{{url('how-it-works')}}">{{__('How It Works')}}</a></li>
                                    <li><a href="{{url('about')}}">{{__('About Us')}}</a></li>
                                    <li><a href="{{url('news')}}">{{__('News')}}</a></li>
                                    <li class="contact"><a href="{{url('contact')}}">{{__('Contact Us')}}</a>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Menu -->
    </header>
    <!-- End header area -->