<!-- Start Footer Area -->
    <footer class="footer1">
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="footer-content logo-footer">
                            <div class="footer-head">
                                <h4 style="color: #f1aa31;">{{__('Brief Intro')}}</h4>
                                <p>
                                    {{$app_info->intro}}
                                </p>
                                <div class="footer-icons">
                                    <ul>
                                        <li>
                                            <a href="{{$app_info->facebook}}">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{$app_info->instagram}}">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="mailto:{{$app_info->email}}">
                                                <i class="fa fa-envelope"></i>
                                            </a>
                                        </li>
                                     
                                        <li>
                                            <a href="https://wa.me/{{$app_info->whatsapp}}">
                                                <i class="fa fa-whatsapp"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-content rs-mar-0">
                            <div class="footer-head">
                                <h4 style="color: #f1aa31;">{{__('Accounts')}}</h4>
                                <ul class="footer-list">
                                    <li><a href="{{url('login')}}">{{__('Login')}}</a></li>
                                    <li><a href="{{url('register')}}">{{__('Signup')}}</a></li>
                                    <li><a href="{{url('my-account')}}">{{__('My Account')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-content last-content rs-mar-0">
                            <div class="footer-head">
                                <h4 style="color: #f1aa31;">{{__('Useful Links')}}</h4>
                                <ul class="footer-list">
                                    <li><a href="{{url('about')}}">{{__('About Us')}}</a></li>
                                    <li><a href="{{url('contact')}}">{{__('Contact Us')}}</a></li>
                                    <li><a href="{{url('faq')}}">{{__('Faq')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom Area -->
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="copyright">
                            <p>
                                {{date('Y')}}
                                <a href="#">{{config('app.name')}}</a> 
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{url('about')}}">{{__('About')}}</a></li>
                                <li><a href="{{url('terms_condition')}}">{{__('Terms & Condition')}}</a></li>
                                <li><a href="{{url('privacy_policy')}}">{{__('Privacy')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom Area -->
    </footer>
    <!-- End Footer Area -->