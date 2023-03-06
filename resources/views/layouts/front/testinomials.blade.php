<!-- Start Reviews Area -->
<div class="reviews-area bg-color area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <div class="testimonial-inner">
                            <div class="review-head">
                                <h2 style="color:#ebb861;">{{__('What our members are saying')}}</h2>
                                <p>{{__('The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy. The phrasal sequence of the Lorem Ipsum text is now so widespread and commonplace that many DTP programmes can generate dummy')}}</p>
                                <a class="reviews-btn anti-btn" href="review.html">{{__('More reviews')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-6">
                        <div class="Reviews-content">
                            <!-- start testimonial carousel -->
                            <div class="testimonial-carousel owl-carousel">
                                @foreach($tests as $test)
                                <div class="single-testi">
                                    <div class="testi-text">
                                        <div class="clients-text">
                                            <div class="testi-img ">
                                                
                                                <img src="{{asset('img/testimonials/'.$test->image)}}" alt="">
                                                <div class="guest-details">
                                                    <h4>{{$test->name}} </h4>
                                                    <span class="guest-rev">{{$test->job}}</span>
                                                </div>
                                            </div>
                                            <div class="client-rating">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6">
                                                    @php 
                                                        $rating = $test->rating;

                                                        @endphp

                                                        @include('layouts.admin.rating',['rating'=>$rating])
                                                    </div>
                                                </div>
                                            </div>
                                            <p>
                                        
                                                {{Str::limit($test->comment,100)}}
                                                
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- End single item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Reviews area -->