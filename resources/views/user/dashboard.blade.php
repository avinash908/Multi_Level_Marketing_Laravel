@extends('layouts.user.app')



@section('css')

<link rel="stylesheet" href="{{asset('/plugins/slick/')}}/slick.css">
<link rel="stylesheet" href="{{asset('/plugins/slick/')}}/slick-theme.css">


@endsection
@section('content')
<header class="content__title">
    <h1>Dashboard</h1>
    <small>Welcome to the {{config('app.name')}}</small>

    <div class="actions">
        <a href="#" class="actions__item zmdi zmdi-trending-up"></a>
        <a href="#" class="actions__item zmdi zmdi-check-all"></a>

        <div class="dropdown actions__item">
            <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item">Refresh</a>
                <a href="#" class="dropdown-item">Manage Widgets</a>
                <a href="#" class="dropdown-item">Settings</a>
            </div>
        </div>
    </div>
</header>

<div class="row quick-stats">

    @if(count($annoucements) > 0)
    <div class="col-12">
        <!-- announcement here -->
        <div class="top-slider">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @php
                    $sn = 0;
                    @endphp
                    @foreach($annoucements as $i)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$sn}}" class="{{($sn == 0 ? 'active' : '' )}}"></li>
                    @php
                    $sn = $sn + 1;
                    @endphp
                    @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @php
                    $ac = 0;
                    @endphp
                    @foreach($annoucements as $n)
                    <div class="carousel-item {{($ac == 0 ? 'active' : '' )}}">
                        <div class="news-block">
                            <div class="news-media"></div>
                            <div class="news-title">
                                <h2 class=" title-large">{{$n->title}}</h2>
                            </div>
                            <div class="news-des">{!! $n->description !!}</div>
                            <div class="time-text"><strong>{{$n->created_at->diffForHumans()}}</strong></div>
                            <div></div>
                        </div>
                    </div>
                    @php
                    $ac = $ac + 1;
                    @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="col-sm-6 col-md-4">

        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Referral Incentive</h3>
            </div>
            <div class="card-body">
                <h2><sup>Rs</sup> {{auth()->user()->level_1_amount ?? 0}}</h2>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4">

        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Performance Incentive</h3>
            </div>
            <div class="card-body">
                <h2><sup>Rs</sup> {{auth()->user()->level_2_amount ?? 0}}</h2>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4">
        @php
        $other_level_amount = auth()->user()->level_3_amount + auth()->user()->level_4_amount + auth()->user()->level_5_amount + auth()->user()->level_6_amount;
        $other_level_users = auth()->user()->level_3_users_count + auth()->user()->level_4_users_count + auth()->user()->level_5_users_count + auth()->user()->level_6_users_count;
        @endphp
        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Generation Incentive</h3>
            </div>
            <div class="card-body">
                <h2><sup>Rs</sup> {{$other_level_amount ?? 0 }}</h2>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4">

        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Manager Earning</h3>
            </div>
            <div class="card-body">
                <h2><sup>Rs</sup> {{auth()->user()->manager_amount ?? 0}}</h2>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4">

        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Total Withdrawal</h3>
            </div>
            <div class="card-body">
                <h2><sup>Rs</sup> {{$completed_withdraws->sum('amount')}}</h2>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4">

        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Pending Withdrawal</h3>
            </div>
            <div class="card-body">
                <h2><sup>Rs</sup> {{$pending_withdraws->sum('amount')}}</h2>
            </div>
        </div>

    </div>
    <div class="col-sm-6 col-md-4">

        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Status</h3>
            </div>
            <div class="card-body">
                <h2> @if(auth()->user()->status != 1)
                    Unactivated
                    @else
                    Activated <i class="fa fa-check"></i>
                    @endif</h2>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-4">
        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Cash Wallet Balance</h3>
            </div>
            <div class="card-body">
                <h2><sup>Rs</sup> {{auth()->user()->wallet}}</h2>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Current Rank</h3>
            </div>
            <div class="card-body">
                <h2>{{ucwords(str_replace('_',' ',auth()->user()->current_rank))}}</h2>
            </div>
        </div>
    </div>


    <div class="col-12">
        @if(auth()->user()->status == 1)

        <div class="form-group">
            <label for="referral_code">Referral Link</label>
            <div class="input-group">
                <input type="text" id="referral_link" class="form-control" name="referral_link" value="{{ config('app.url') .'?ref='.auth()->user()->referral_link}}" required>
                <div class="input-group-append">
                    <button class="btn btn-success m-0" onclick="myFunction()">Copy</button>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-danger">
            <p class="p-0 m-0">Please purchase plan to activate referral feature and start earning money</p>
        </div>
        @endif
    </div>
    <div class="col-sm-6 col-md-6 card">
        <div class="card-header text-center">
            <h4>Members</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4  col-md-4 col-sm-4 col-6">
                <div class="card text-center">
                    <div class="card-header">
                        <h3 class="card-title">Level I</h3>
                    </div>
                    <div class="card-body py-1">
                        <h5>{{auth()->user()->level_1_users_count ?? 0}}</h5>
                    </div>
                </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-6">

                    <div class="card text-center">
                        <div class="card-header">
                            <h3 class="card-title">Level II</h3>
                        </div>
                        <div class="card-body py-1">
                            <h5>{{auth()->user()->level_2_users_count ?? 0 }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-6">

                    <div class="card text-center">
                        <div class="card-header">
                            <h3 class="card-title">Level III</h3>
                        </div>
                        <div class="card-body py-1">
                            <h5>{{auth()->user()->level_3_users_count ?? 0 }}</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3 class="card-title">Level IV</h3>
                        </div>
                        <div class="card-body py-1">
                            <h5>{{auth()->user()->level_4_users_count ?? 0 }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3 class="card-title">Level V</h3>
                        </div>
                        <div class="card-body py-1">
                            <h5>{{auth()->user()->level_5_users_count ?? 0 }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                    <div class="card text-center">
                        <div class="card-header">
                            <h3 class="card-title">Level VI</h3>
                        </div>
                        <div class="card-body py-1">
                            <h5>{{auth()->user()->level_6_users_count ?? 0}}</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card widget-profile">
            <div class="card-body">

                <div class="actions actions--inverse">
                    <div class="actions__item">
                        <i id="view_ranking_chart" class="fa fa-eye"></i>
                    </div>
                </div>

                <div class="text-center">
                    <img src="{{asset('img/ranking/trophy.png')}}" class="widget-profile__img" alt="">
                    <h2 class="card-title">Ranking</h2>
                </div>
            </div>

            <div class="widget-profile__list">
                @if(auth()->user()->current_rank == 'normal_user' && auth()->user()->level_1_users_count < 10)
                <div class="media">
                    <div class="avatar-char"><i class="fa fa-star"></i></div>
                    <div class="media-body">
                        <strong> {{auth()->user()->level_1_users_count ?? 0}}/10 </strong>
                        <small>Rising Star</small>
                    </div>
                    <div class="avatar-char" style="width: auto; height:auto; padding: 0px 0.5rem">
                        <span style="margin:0px">10</span>
                        Required
                    </div>
                    <div class="avatar-char" style="width: auto; height:auto; padding: 0px 0.5rem">
                        <span style="margin:0px">{{auth()->user()->level_1_users_count ?? 0}}</span>
                        Achieved
                    </div>
                </div>


                @elseif(auth()->user()->current_rank == 'rising_star' && count($rising_stars) < 10)
                <div class="media">
                    <div class="avatar-char"><i class="fa fa-star"></i></div>
                    <div class="media-body">
                        <strong> {{count($rising_stars) ?? 0}}/10 </strong>
                        <small>Player</small>
                    </div>
                    <div class="avatar-char" style="width: auto; height:auto; padding: 0px 0.5rem">
                        <span style="margin:0px">10</span>
                        Required
                    </div>
                    <div class="avatar-char" style="width: auto; height:auto; padding: 0px 0.5rem">
                        <span style="margin:0px">{{count($rising_stars) ?? 0}}</span>
                        Achieved
                    </div>
                </div>

                @elseif(auth()->user()->current_rank == 'player' && count($players) < 10)
                <div class="media">
                    <div class="avatar-char"><i class="fa fa-star"></i></div>
                    <div class="media-body">
                        <strong> {{count($players) ?? 0}}/10 </strong>
                        <small>Professional</small>
                    </div>
                    <div class="avatar-char" style="width: auto; height:auto; padding: 0px 0.5rem">
                        <span style="margin:0px">10</span>
                        Required
                    </div>
                    <div class="avatar-char" style="width: auto; height:auto; padding: 0px 0.5rem">
                        <span style="margin:0px">{{count($players) ?? 0}}</span>
                        Achieved
                    </div>
                </div>

                @elseif(auth()->user()->current_rank == 'professional' && count($professionals) < 10)
                <div class="media">
                    <div class="avatar-char"><i class="fa fa-star"></i></div>
                    <div class="media-body">
                        <strong> {{count($professionals) ?? 0}}/10 </strong>
                        <small>Executive</small>
                    </div>
                    <div class="avatar-char" style="width: auto; height:auto; padding: 0px 0.5rem">
                        <span style="margin:0px">10</span>
                        Required
                    </div>
                    <div class="avatar-char" style="width: auto; height:auto; padding: 0px 0.5rem">
                        <span style="margin:0px">{{count($professionals) ?? 0}}</span>
                        Achieved
                    </div>
                </div>

                @elseif(auth()->user()->current_rank == 'executive' && count($executives) < 10)
                <div class="media">
                    <div class="avatar-char"><i class="fa fa-star"></i></div>
                    <div class="media-body">
                        <strong> {{count($executives) ?? 0}}/10 </strong>
                        <small>Ambassador</small>
                    </div>
                    <div class="avatar-char" style="width: auto; height:auto; padding: 0px 0.5rem">
                        <span style="margin:0px">10</span>
                        Required
                    </div>
                    <div class="avatar-char" style="width: auto; height:auto; padding: 0px 0.5rem">
                        <span style="margin:0px">{{count($executives) ?? 0}}</span>
                        Achieved
                    </div>
                </div>

                @elseif(auth()->user()->current_rank == 'ambassador' && count($ambassadors) < 10)
                <div class="media">
                    <div class="avatar-char"><i class="fa fa-star"></i></div>
                    <div class="media-body">
                        <strong> {{count($ambassador) ?? 0}}/10 </strong>
                        <small>Crown Ambassadors</small>
                    </div>
                    <div class="avatar-char" style="width: auto; height:auto; padding: 0px 0.5rem">
                        <span style="margin:0px">10</span>
                        Required
                    </div>
                    <div class="avatar-char" style="width: auto; height:auto; padding: 0px 0.5rem">
                        <span style="margin:0px">{{count($ambassador) ?? 0}}</span>
                        Achieved
                    </div>
                </div>
                
                
                @endif

                
            </div>
        </div>
    </div>

</div>
<div class="modal" tabindex="-1" role="dialog" id="ranking_chart_modal" class="">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title"> {{__('Ranking Chart')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{asset('img/ranking/chart.jpg')}}" style="width: 100%;" alt="">
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')


<!-- <script src="{{asset('/plugins/slick/')}}/jquery.min.js"></script> -->
<!-- <script src="{{asset('/plugins/slick/')}}/slick.js"></script> -->

<script>
    function myFunction() {
        /* Get the text field */
        var ref_link = document.getElementById("referral_link");

        /* Select the text field */
        ref_link.select();
        ref_link.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(ref_link.value);

        /* Alert the copied text */
        alert("Link Copied ");

    }

    // $(".vertical-center-4").slick({
    //     dots: true,
    //     vertical: true,
    //     centerMode: true,
    //     slidesToShow: 4,
    //     slidesToScroll: 2
    // });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#view_ranking_chart', function() {
            $("#ranking_chart_modal").modal("show");
        })
    });
</script>
@endsection