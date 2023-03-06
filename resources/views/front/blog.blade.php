@extends('layouts.front.app')
@section('content')
    <!-- Start Breadcrumb Area -->
        <div class="page-area bread-pd">
            <div class="breadcumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-title text-center">
                            <h2>{{__('Latest News')}}</h2>
                            <div class="bread-come">
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb purple lighten-4 justify-content-center">
                                        <li class="breadcrumb-items"><a class="black-text" href="#">{{__('Home')}}</a><i class="ti-angle-right"
                                            aria-hidden="true"></i></li>
                                        <li class="breadcrumb-items"><a class="black-text" href="#">{{__('Latest blog')}}</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area -->
        <!-- Start Blog area -->
        <div class="blog-area bg-color area-padding-2">
            <div class="container">
                <div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="section-headline text-center">
                            <p>{{__('Dummy text is also used to demonstrate the appearance of different typefaces and layouts')}}</p>
                        </div>
                    </div>
				</div>
                <div class="row">
                    @foreach($news as $new)
                    <!-- Start single blog -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a class="image-scale" href="{{ url('single-news/'.$new->id) }}">
                                    
                                    <img src="{{asset('img/posts/'.$new->image)}}" style="width:100%" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="admin-type">
                                        <i class="fa fa-user"></i>
                                        {{__('Admin')}}
                                    </span>
                                    <span class="date-type">
                                       <i class="fa fa-calendar"></i>
                                        {{$new->created_at}}
                                    </span>
                                </div>
                                <div class="blog-title">   
                                    <a href="{{ url('single-news/'.$new->id) }}">
                                        <h4>{{$new->title}}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End single blog -->
                </div>
                <!-- End row -->
            </div>

            <div class="container">
                {{$news->links()}}
            </div>
        </div>
        <!-- End Blog area -->
        
    </main>
@endsection