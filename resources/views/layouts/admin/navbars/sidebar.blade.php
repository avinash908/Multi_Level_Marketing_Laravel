<aside class="sidebar">
    <div class="scrollbar-inner">

        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <img class="user__img" src="{{asset('')}}img/avatar.png" alt="">
                <div>
                    <div class="user__name">{{auth()->user()->name}}</div>
                </div>
            </div>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{url('/profile')}}">View Profile</a>
                <a class="dropdown-item" href="javascript:void(0)" onclick="document.getElementById('logout-form').submit()">Logout</a>
            </div>
        </div>

        <ul class="navigation">
            <li class=""><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="navigation__sub @@variantsactive">
                <a href="#"><i class="fa fa-list-alt"></i> Plans Management</a>

                <ul>
                    <li class=""><a href="{{url('/packages')}}"> Plan Packages </a></li>
                    <li class=""><a href="{{url('/purchase_plans')}}"> Plan Purchase Request </a></li>
                </ul>
            </li>
            <li class=""><a href="{{url('/users')}}"><i class="fa fa-user"></i >Users Management </a></li>
            <!-- <li class=""><a href="{{url('/home')}}"><i class="fa fa-briefcase"></i> Cash Wallet </a></li> -->
            <li class="navigation__sub @@variantsactive">
                <a href="#"><i class="fa fa-briefcase"></i> Withdrawal</a>

                <ul>
                    <li class=""><a href="{{url('/withdraws?withdraw_type=pending')}}"> Pending Withdraws</a></li>
                    <li class=""><a href="{{url('/withdraws?withdraw_type=completed')}}"> Completed Withdraws</a></li>
                    <li class=""><a href="{{url('/withdraws?withdraw_type=rejected')}}"> Declined Withdraws</a></li>
                </ul>
            </li>
            <li class=""><a href="{{url('/annoucements')}}"><i class="fa fa-bullhorn"></i> Announcement</a></li>
            <li class=""><a href="{{url('/tansfer_money')}}"><i class="fa fa-paper-plane "></i> Transfer Money</a></li>
            <li class=""><a href="{{url('/transactions')}}"><i class="fa fa-money"></i> Transactions</a></li>
            <li class=""><a href="{{url('/payment_accounts')}}"><i class="fa fa-id-card "></i> Payment Accounts</a></li>
            <li class=""><a href="{{url('/contact_messages')}}"><i class="fa fa-envelope"></i> Messages</a></li>
            <li class=""><a href="{{url('/site/info')}}"><i class="fa fa-cog"></i> Website Setting</a></li>
        </ul>
    </div>
</aside>