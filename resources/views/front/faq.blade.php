@extends('layouts.front.app')
@section('content')
    <!-- Start Breadcrumb Area -->
        <div class="page-area bread-pd">
            <div class="breadcumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-title text-center">
                            <h2>{{__('FAQ')}}</h2>
                            <div class="bread-come">
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb purple lighten-4 justify-content-center">
                                        <li class="breadcrumb-items"><a class="black-text" href="#">{{__('Home')}}</a><i class="ti-angle-right"
                                            aria-hidden="true"></i></li>
                                        <li class="breadcrumb-items"><a class="black-text" href="#">{{__('About us')}}</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area -->
         <!-- Start FAQ area -->
        <div class="faq-area bg-color area-padding">
            <div class="container">
                <div class="row">
                   <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="section-headline text-center">
                            <h2>{{__('Important Faq')}}</h2>
                            <p>{{__('Dummy text is also used to demonstrate the appearance of different typefaces and layouts')}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start Column Start -->
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="company-faq-left">
                            <div class="faq_inner">
                                <div id="accordion">
                                  @foreach($faqs as $faq)
                                    <div class="card">
                                      <div class="card-header white-bg" id="headingOne{{$faq->id}}">
                                        <h4 class="faq-top-text">
                                          <button class="faq-accordion-btn" data-toggle="collapse" data-target="#collapseOne{{$faq->id}}" aria-expanded="true" aria-controls="collapseOne{{$faq->id}}">
                                           {{$faq->title}}
                                          </button>
                                        </h4>
                                      </div>

                                      <div id="collapseOne{{$faq->id}}" class="collapse  " aria-labelledby="headingOne{{$faq->id}}" data-parent="#accordion">
                                        <div class="card-body">
                                          {{$faq->description}}
                                        </div>
                                      </div>
                                    </div>
                                  @endforeach
                                </div>
                            </div>
                            <!-- End FAQ -->
                        </div>
                    </div>
                

                </div>
            </div>
        </div>
        <!-- End FAQ area -->
@endsection