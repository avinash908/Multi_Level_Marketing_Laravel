@php
    $notifications = auth()->user()->unreadNotifications;
@endphp


@if(count($notifications) < 1)
<style>
    .top-nav__notify:before{
        display: none;
    }
</style>
@endif


<li class="dropdown top-nav__notifications">
    
    <a href="#" data-toggle="dropdown" class="top-nav__notify">
        <i class="fa fa-bell"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
        <div class="dropdown-header">
            Notifications

            <div class="actions">
                @if(auth()->user()->hasRole('admin'))
                <a href="{{url('notifications')}}" class="actions__item fa fa-check"></a>
                @else
                <a href="{{url('user-notifications')}}" class="actions__item fa fa-check"></a>
                @endif
            </div>
        </div>

        <div class="listview listview--hover">
            <div class="listview__scroll scrollbar-inner">
               
                @foreach($notifications as $notification)
                <a href="#" class="listview__item">
                    <img src="{{asset('')}}img/avatar.png" class="listview__img" alt="">

                    <div class="listview__content">
                        <div class="listview__heading">{{$notification->notifiable->name}}</div>
                        <p>{{$notification->data['message']}}</p>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="p-1"></div>
        </div>
    </div>
</li>