@extends('layouts.front.app')
@section('content')
    <!-- Start Breadcrumb Area -->
        <div class="page-area bread-pd">
            <div class="breadcumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-title text-center">
                            <h2>{{__('Privacy Policy')}}</h2>
                            <div class="bread-come">
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb purple lighten-4 justify-content-center">
                                        <li class="breadcrumb-items"><a class="black-text" href="#">{{__('Home')}}</a><i class="ti-angle-right"
                                            aria-hidden="true"></i></li>
                                        <li class="breadcrumb-items"><a class="black-text" href="#">{{__('Privacy Policy')}}</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area -->
        <!-- Start terms area -->
        <div class="terms-area bg-color area-padding">
            <div class="container">
               <div class="row">
                   <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="section-headline text-center">
                            <h2>{{__('Privacy Policy')}}</h2>
                            <p>{{__('Dummy text is also used to demonstrate the appearance of different typefaces and layouts')}}</p>
                        </div>
                    </div>
               </div>
                <div class="row">
                    <!-- Start Column Start -->
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="company-terms">
                            <div class="single-terms">
                               <h4><span class="number">1.</span> <span class="terms-text"> {{__('Follow Our Policies')}}</span></h4>
                               <p>{{__('When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection of text within a single line, the amount of words is roughly being maintained. multi-lined selection of text, the generated dummy text maintains the amount of lines.')}} </p>
                            </div>
                            <div class="single-terms">
                               <h4><span class="number">2.</span><span class="terms-text"> {{__('Clients satisfaction make company value.')}}</span></h4>
                               <p>{{__('When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection of text within a single line, the amount of words is roughly being maintained. multi-lined selection of text, the generated dummy text maintains the amount of lines.')}} </p>
                            </div>
                            <div class="single-terms">
                               <h4><span class="number">3.</span><span class="terms-text">{{__(' World class creative firm.')}}</span></h4>
                               <p>{{__('When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection of text within a single line, the amount of words is roughly being maintained. multi-lined selection of text, the generated dummy text maintains the amount of lines.')}}</p>
                            </div>
                            <div class="single-terms">
                               <h4><span class="number">4.</span><span class="terms-text">{{__(' We are the best online platform')}}</span></h4>
                               <p>{{__('When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection of text within a single line, the amount of words is roughly being maintained. multi-lined selection of text, the generated dummy text maintains the amount of lines.')}}</p>
                            </div>
                            <div class="single-terms">
                               <h4><span class="number">5.</span><span class="terms-text">{{__(' Clients satisfaction make company value.')}}</span></h4>
                               <p>{{__('When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection of text within a single line, the amount of words is roughly being maintained. multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection of text within a single line, the amount of')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="terms-right">
                            <div class="terms-single">
                                <h4>{{__('Withdraw Policy')}}</h4>
                                <p>{{__('When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection of text within a single line, the amount of words is roughly being maintained. multi-lined selection of text, the generated dummy text maintains the amount of lines.')}} </p>
                                <ul class="terms-list">
                                    <li>{{__('text maintains the amount of lines. When replacing a selection of text within a single line')}}</li>
                                    <li>{{__('text maintains the amount of lines. When replacing a selection of text within a single line')}}</li>
                                    <li>{{__('text maintains the amount of lines. When replacing a selection of text within a single line')}}</li>
                                    <li>{{__('text maintains the amount of lines. When replacing a selection of text within a single line')}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End terms area --> 
@endsection