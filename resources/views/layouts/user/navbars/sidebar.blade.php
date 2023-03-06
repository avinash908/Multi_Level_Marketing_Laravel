<aside class="sidebar">
    <div class="scrollbar-inner">

        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <img class="user__img" src="{{asset('/')}}img/avatar.png" alt="">
                <div>
                    <div class="user__name">{{auth()->user()->name}}</div>
                </div>
            </div>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('user/profile')}}">View Profile</a>
                <a class="dropdown-item" href="javascript:void(0)" onclick="document.getElementById('logout-form').submit()">Logout</a>
            </div>
        </div>

        <ul class="navigation">
            <li class=""><a href="{{url('/home')}}"><i class="fa fa-home"></i> Dashboard</a></li>
            <!-- <li class=""><a href="{{url('/home')}}"><i class="fa fa-briefcase"></i> Cash Wallet </a></li> -->
            <li class=""><a href="{{url('/user_packages')}}"><i class="fa fa-list-alt"></i>Buy Package</a></li>
            <li class=""><a href="{{url('/user_referrals')}}"><i class="fa fa-sitemap"></i> Geneology</a></li>
            <li class="navigation__sub @@variantsactive">
                <a href="#"><i class="fa fa-briefcase"></i> Transactions</a>

                <ul>
                    <li class=""><a href="{{url('/user_transactions')}}"> All Transactions</a></li>
                    <li class=""><a href="{{url('/user_tansfer_money/create')}}"> Transfer Money</a></li>
                    <li class=""><a href="{{url('/user_tansfer_money')}}"> Transfer History</a></li>
                </ul>
            </li>
            <li class=""><a href="{{url('/user_withdraws')}}"><i class="fa fa-briefcase"></i >Withdrawal  </a></li>
            <li class=""><a href=""><i class="fa fa-cube"></i> Products</a></li>
            <li class=""><a href=""><i class="fa fa-file-powerpoint-o"></i> Courses</a></li>
            <li class=""><a href="{{url('/user/support')}}"><i class="fa fa-envelope"></i> Support</a></li>
               
            <li> <a href="javascript:void(0)"  onclick="document.getElementById('logout-form').submit()" class="dropdown-item"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
    </div>
</aside>
