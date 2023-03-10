<header class="header">
    <div class="navigation-trigger hidden-xl-up" data-sa-action="aside-open" data-sa-target=".sidebar">
        <i class="fa fa-list"></i>
    </div>

    <div class="logo hidden-sm-down">
        <h1><a href="{{url('/home')}}">Dashboard</a></h1>
    </div>


    <ul class="top-nav">

        <!-- <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="top-nav__notify"><i class="fa fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                <div class="dropdown-header">
                    Messages

                    <div class="actions">
                        <a href="messages.html" class="actions__item fa fa-plus"></a>
                    </div>
                </div>

                <div class="listview listview--hover">
                    <a href="#" class="listview__item">
                        <img src="demo/img/profile-pics/1.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">
                                David Belle <small>12:01 PM</small>
                            </div>
                            <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                        </div>
                    </a>

                    <a href="#" class="listview__item">
                        <img src="demo/img/profile-pics/2.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">
                                Jonathan Morris
                                <small>02:45 PM</small>
                            </div>
                            <p>Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</p>
                        </div>
                    </a>

                    <a href="#" class="listview__item">
                        <img src="demo/img/profile-pics/3.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">
                                Fredric Mitchell Jr.
                                <small>08:21 PM</small>
                            </div>
                            <p>Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</p>
                        </div>
                    </a>

                    <a href="#" class="listview__item">
                        <img src="demo/img/profile-pics/4.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">
                                Glenn Jecobs
                                <small>08:43 PM</small>
                            </div>
                            <p>Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</p>
                        </div>
                    </a>

                    <a href="#" class="listview__item">
                        <img src="demo/img/profile-pics/5.jpg" class="listview__img" alt="">

                        <div class="listview__content">
                            <div class="listview__heading">
                                Bill Phillips
                                <small>11:32 PM</small>
                            </div>
                            <p>Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</p>
                        </div>
                    </a>

                    <a href="#" class="view-more">View all messages</a>
                </div>
            </div>
        </li> -->

        
        @include('layouts.notifications.index')



        <li class="dropdown hidden-xs-down">
            <a href="#" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item" data-sa-action="fullscreen">Fullscreen</a>
                <a href="javascript:void(0)"  onclick="document.getElementById('logout-form').submit()" class="dropdown-item">Logout</a>
            </div>
        </li>

     
    </ul>

    <div class="clock hidden-md-down">
        <div class="time">
            <span class="time__hours"></span>
            <span class="time__min"></span>
            <span class="time__sec"></span>
        </div>
    </div>
</header>
