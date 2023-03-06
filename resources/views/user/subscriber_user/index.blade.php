@extends('layouts.user.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-chart">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <h2 class="card-title">{{__('Get Registered')}}</h2>
                    </div>
                    
                </div>
            </div>
            <div class="card-body">
               
            </div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Details to verify') }}</h5>
                </div>
                <div class="card-body">
                    <ul>
                        <li>{{__('Registeration Fee is')}} $50</li>
                        <li>{{__('This subscription is lifetime')}}</li>
                        <li>{{__('You have to wait for approvel from admin')}}</li>
                        <li>{{__('If your account not get approved in 24 hours you can request for it')}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Deposit') }}</h5>
                </div>
                <form method="post" action="{{url('subscriber_user_store')}}" autocomplete="off">
                    <div class="card-body">
                            @csrf

                            @include('alerts.success')

                            <div class="form-group{{ $errors->has('wallet_address') ? ' has-danger' : '' }}">
                                <label>{{ __('Wallet address') }}</label>
                                <input type="text" name="wallet_address" class="form-control{{ $errors->has('wallet_address') ? ' is-invalid' : '' }}" placeholder="{{ __('wallet address') }}" min="50" value="">
                                @include('alerts.feedback', ['field' => 'wallet_address'])
                            </div> 
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>

           
        </div>
    </div>
@endsection
