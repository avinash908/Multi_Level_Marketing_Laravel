@extends('layouts.front.app')
@section('content')
    <!-- Start Breadcrumb Area -->
        <div class="page-area bread-pd">
            <div class="breadcumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-title text-center">
                            <h2>{{__('Contact us')}}</h2>
                            <div class="bread-come">
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb purple lighten-4 justify-content-center">
                                        <li class="breadcrumb-items"><a class="black-text" href="#">{{__('Home')}}</a><i class="ti-angle-right"
                                            aria-hidden="true"></i></li>
                                        <li class="breadcrumb-items"><a class="black-text" href="#">{{__('Contact us')}}</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area -->
        <!-- Start contact Area -->
        <div class="contact-page bg-color area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="contact-left">
                            <div class="contact-image">
                                <img src="img/about/no-image.jpg" alt="" class="w-100">
                            </div>
                        </div>
                    </div>
                    <!-- End contact icon -->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="contact-form">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{session()->get('message')}}
                            </div>
                        @endif
                           <form id="contactForm" method="POST" action="{{route('contact.store')}}" class="contact-form">
                               @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" class="email form-control" name="email" id="email" placeholder="Email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" id="msg_subject" name="subject" class="form-control" placeholder="Subject" required data-error="Please enter your message subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone" required data-error="Please enter your message Phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <textarea id="message" rows="7" name="message" placeholder="Massage" class="form-control" required data-error="Write your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                        <button type="submit" id="submit" class="contact-btn">{{__('Submit')}}</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div> 
                                        <div class="clearfix"></div>
                                    </div>   
                                </div>   
                                
                            </form>  
                        </div>
                    </div>
                    <!-- End contact Form -->
                </div>
              
            </div>
        </div>
        <!-- End Contact Area -->
    @endsection