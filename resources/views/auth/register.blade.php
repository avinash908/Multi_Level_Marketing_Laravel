@extends('layouts.auth.app', ['class' => 'register-page', 'page' => __('Register Page'), 'contentClass' => 'register-page'])

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-register card-white" style="margin-top: 80px;">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Register') }}</h4>
                    @if(session()->has('referral_by'))
                        @php
                            $referral_by = App\Models\User::where('referral_link','=',session()->get('referral_by'))->first();
                         
                            @endphp
                            
                             <h4>Sponsered By: {{$referral_by ? ucwords($referral_by->name) : ''}}</h4>

                        @endif
                </div>
                <form class="form" method="post" action="{{ route('register') }}">
                    @csrf

                    <div class="card-body">
                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-single-02"></i>
                                </div>
                            </div>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control py-2 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}">
                        </div>
                        <p class="invalid text-white">
                            @error('name')
                                {{$message}}
                            @enderror
                        </p>
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="email" name="email"     class="form-control py-2 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                        </div>
                        <p class="invalid text-white">
                            @error('email')
                                {{$message}}
                            @enderror
                        </p>
                        <div class="input-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="number" name="phone" value="{{old('phone')}}" id="phone" class="form-control py-2 form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('phone') }}">
                        </div>
                        <p class="invalid text-white">
                            @error('phone')
                                {{$message}}
                            @enderror
                        </p>
                        <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control py-2 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}">
                        </div>
                        <p class="invalid text-white">
                            @error('password')
                                {{$message}}
                            @enderror
                        </p>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control py-2 form-control" placeholder="{{ __('Confirm Password') }}">
                        </div>

                        <div class="form-group my-3" style="display: flex;justify-content:space-between">
                                <div class="captchabox">
                                    {!! Captcha::img() !!}
                                </div>
                                <button type="button" id="reload-captcha" class="btn btn-sm btn-white btn-refresh">Refresh</button>
                        </div>

                        <div class="form-group">
                            <input type="text" name="captcha" class="form-control py-2 form-control" placeholder="{{ __('Enter captcha code') }}" required>
                        </div>
                        
                        <div class="form-check text-left my-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox">
                                <span class="form-check-sign"></span>
                                {{ __('I agree to the') }}
                                <a href="#">{{ __('terms and conditions') }}</a>.
                            </label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-round btn-block btn-lg mb-3">{{ __('Register') }}</button>

                        <div class="pull-left">
                        <h6>
                            <a href="{{ route('login') }}" class="link footer-link">{{ __('Login') }}</a>
                        </h6>
                    </div>
                    <div class="pull-right">
                        <h6>
                            <a href="{{ route('password.request') }}" class="link footer-link">{{ __('Forgot password?') }}</a>
                        </h6>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection