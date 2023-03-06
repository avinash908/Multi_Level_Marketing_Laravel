@extends('layouts.front.app')
@section('content')
    <!-- Start Breadcrumb Area -->
        <div class="page-area bread-pd">
            <div class="breadcumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-title text-center">
                            <h2>{{__('About Us')}}</h2>
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

            <!-- Start About Area -->
            <div class="about-page-area bg-color fix area-padding">
                <div class="container">
                    <div class="row">
                       <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="section-headline text-center">
                                <h2>{{__('Our Story')}}</h2>
                                <p>{{__('Dummy text is also used to demonstrate the appearance of different typefaces and layouts')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg- col-md-12">
                            <div class="about-page-image">
                                <img src="img/about/no-image.jpg" style="width: 100%" alt="">
                            </div>
                        </div>
                        <!-- Start services -->
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="about-wraper">
                                <div class="about-page-text">
                                    <h2>{{__('About our company')}}</h2>
                                    <p>{{__('The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy. The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy')}}</p>
                                    <p>{{__('The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy. The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy')}}</p>
                                    <p>{{__('The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy. The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy')}}</p>
                                </div>
                            </div>
                        </div>
                         <!-- Start services -->
                     </div>
                </div>
            </div>
            <!-- End About Area -->

        <!-- Start How to area -->
        <div class="how-to-area bg-color-2 area-padding">
            <div class="container">
                <div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="section-headline text-center">
                            <h2>{{__('How we works')}}</h2>
                            <p>{{__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore eius deleniti corrupti recusandae fuga ipsam, iste vitae dolore.')}}</p>
						</div>
					</div>
				</div>
                <div class="row">
                    <!-- single-well end-->
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="single-how first-item">
                            <div class="how-img">
                                <span class="h-number">01</span>
                                <a class="big-icon" href="#"><img src="img/about/h1.png" alt=""></a>
                            </div>
                            <div class="how-wel">
                                <div class="how-content">
                                    <h4>{{__('Get Registered')}}</h4>
                                    <p>{{__('Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu. Agencies to define their new business objectives and then create')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single-well end-->
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="single-how ">
                            <div class="how-img">
                                <span class="h-number">02</span>
                                <a class="big-icon" href="#"><img src="img/about/h2.png" style="width: 50%;" alt=""></a>
                            </div>
                            <div class="how-wel">
                                <div class="how-content">
                                    <h4>{{__('Complete Surveys')}}</h4>
                                    <p>{{__('Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu. Agencies to define their new business objectives and then create')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single-well end-->
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="single-how thired-item">
                            <div class="how-img">
                               <span class="h-number">03</span>
                                <a class="big-icon" href="#"><img src="img/about/h3.png" alt=""></a>
                            </div>
                            <div class="how-wel">
                                <div class="how-content">
                                    <h4>{{__('Get Profit')}}</h4>
                                    <p>{{__('Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu. Agencies to define their new business objectives and then create')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End How to area -->
        <!-- Start About Area -->
        <div class="about-page-area bg-color fix area-padding">
            <div class="container">
                <div class="row">
                   <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="section-headline text-center">
                            <h2>{{__('Our Mission')}}</h2>
                            <p>{{__('Dummy text is also used to demonstrate the appearance of different typefaces and layouts')}}</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    
                    <!-- Start services -->
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <div class="about-wraper">
                            <div class="about-page-text">
                                <h2>{{__('About our company')}}</h2>
                                <p>{{__('The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy. The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy')}}</p>
                                <p>{{__('The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy. The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy')}}</p>
                                <p>{{__('The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy. The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg- col-md-12">
                        <div class="about-page-image">
                            <img src="img/about/no-image.jpg" style="width:100%" alt="">
                        </div>
                    </div>
                     <!-- Start services -->
                 </div>
            </div>
        </div>
        <!-- End About Area -->  

          <!-- Start Reviews Area -->
          <div class="reviews-area bg-color area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <div class="testimonial-inner">
                            <div class="review-head">
                                <h2>{{__('What our members are saying')}}</h2>
                                <p>{{__('The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy. The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy')}}</p>
                                <a class="reviews-btn anti-btn" href="review.html">{{__('More reviews')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-6">
                        <div class="Reviews-content">
                            <!-- start testimonial carousel -->
                            <div class="testimonial-carousel owl-carousel">
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <div class="clients-text">
                                            <div class="testi-img ">
                                                <img src="img/review/1.jpg" alt="">
                                                <div class="guest-details">
                                                    <h4>{{__('Edward')}}</h4>
                                                    <span class="guest-rev">{{__('Genarel customer')}}</span>
                                                </div>
                                            </div>
                                            <div class="client-rating">
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                            </div>
                                            <p>{{__('When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection. help agencies.')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End single item -->
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <div class="clients-text">
                                            <div class="testi-img ">
                                                <img src="img/review/2.jpg" alt="">
                                                <div class="guest-details">
                                                    <h4>{{__('Charlotte')}}</h4>
                                                    <span class="guest-rev">{{__('Genarel customer')}}</span>
                                                </div>
                                            </div>
                                            <div class="client-rating">
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                            </div>
                                            <p>{{__('When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection. help agencies.')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End single item -->
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <div class="clients-text">
                                            <div class="testi-img ">
                                                <img src="img/review/3.jpg" alt="">
                                                <div class="guest-details">
                                                    <h4>{{__('Daniel')}}</h4>
                                                    <span class="guest-rev">{{__('Genarel customer')}}</span>
                                                </div>
                                            </div>
                                            <div class="client-rating">
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                            </div>
                                            <p>{{__('When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection. help agencies.')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End single item -->
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <div class="clients-text">
                                            <div class="testi-img ">
                                                <img src="img/review/4.jpg" alt="">
                                                <div class="guest-details">
                                                    <h4>{{__('Graham')}}</h4>
                                                    <span class="guest-rev">{{__('Genarel customer')}}</span>
                                                </div>
                                            </div>
                                            <div class="client-rating">
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                                <a href="#"><i class="ti-star"></i></a>
                                            </div>
                                            <p>{{__('When replacing a multi-lined selection of text, the generated dummy text maintains the amount of lines. When replacing a selection. help agencies.')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End single item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Reviews area -->
        
        <!-- Start Subscribe area -->
        <div class="subscribe-area bg-color">
            <div class="container">
                <div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="subscribe-inner">
						    <div class="subdcribe-content">
                                <div class="section-headline text-center">
                                    <h2>{{__('Our Partners')}}</h2>
                                    <p>{{__('Help agencies to define their new business objectives and then create professional software.')}}</p>
                                </div>
                                <div class="brand-content">
                                    <div class="brand-carousel owl-carousel">
                                        <div class="single-brand-item">
                                            <a href="#"><img src="img/brand/1.png" alt=""></a>
                                        </div>
                                        <div class="single-brand-item">
                                            <a href="#"><img src="img/brand/2.png" alt=""></a>
                                        </div>
                                        <div class="single-brand-item">
                                            <a href="#"><img src="img/brand/3.png" alt=""></a>
                                        </div>
                                        <div class="single-brand-item">
                                            <a href="#"><img src="img/brand/4.png" alt=""></a>
                                        </div>
                                        <div class="single-brand-item">
                                            <a href="#"><img src="img/brand/5.png" alt=""></a>
                                        </div>
                                        <div class="single-brand-item">
                                            <a href="#"><img src="img/brand/6.png" alt=""></a>
                                        </div>
                                        <div class="single-brand-item">
                                            <a href="#"><img src="img/brand/7.png" alt=""></a>
                                        </div>
                                        <div class="single-brand-item">
                                            <a href="#"><img src="img/brand/8.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
						    </div>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Subscribe area -->   
@endsection