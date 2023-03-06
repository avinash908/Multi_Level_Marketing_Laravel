@extends('layouts.front.app')
@section('content')
    <!-- Start Breadcrumb Area -->
        <div class="page-area bread-pd">
            <div class="breadcumb-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-title text-center">
                            <h2>{{__('News Details')}}</h2>
                            <div class="bread-come">
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb purple lighten-4 justify-content-center">
                                        <li class="breadcrumb-items"><a class="black-text" href="#">{{__('Home')}}</a><i class="ti-angle-right"
                                            aria-hidden="true"></i></li>
                                        <li class="breadcrumb-items"><a class="black-text" href="#">{{__('News Details')}}</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area -->
        <!--Blog Area Start-->
        <div class="blog-area blog-details bg-color blog-sidebar-right fix area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <!-- single-blog start -->
                        <article class="blog-post-wrapper">
                            <div class="blog-banner">
                                <a href="#" class="blog-images">
                                    <img src="{{asset('img/posts/'.$post->image)}}" alt="">
                                </a>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <span class="date-type">
                                           <i class="fa fa-calendar"></i>
                                           {{$post->created_at}}
                                        </span>
                                    </div>
                                    <div class="pt-2">
                                    <h2>{{$post->title}}</h2>
                                    </div>
                                    <div class="pt-3">
                                    <p>{!!$post->description!!}</p>
                                    </div>							
                                </div>
                            </div>
                        </article>
                        <div class="clear"></div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="left-head-blog right-side">
                            <div class="left-blog-page">
                                <!-- recent start -->
                                <div class="left-blog">
                                    <h4>{{__('recent post')}}</h4>
                                    <div class="recent-post">
                                        <!-- start single post -->
                                        @foreach($news as $new)
                                        <div class="recent-single-post">
                                            <div class="post-img">
                                                <a href="{{ url('single-news/'.$new->id) }}">
                                                    <img src="{{asset('img/posts/'.$new->image)}}" alt="">
                                                </a>
                                            </div>
                                            <div class="pst-content">
                                                <p><a href="#">{{$new->title}}</a></p>
                                                <span class="date-type">
                                                    {{$new->created_at}}
                                                </span>
                                            </div>
                                        </div>
                                        <!-- End single post -->
                                        @endforeach
                                    </div>
                                </div>
                                <!-- recent end -->
                            </div>
                        </div>
                    </div>
                    <!-- End Right Sidebar -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!--End of Blog Area-->
    @endsection