@extends('layouts.user.app')

@section('content')

<header class="content__title">
    <h1>Create Withdraw</h1>
</header>
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{__('Cash Wallet')}}</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="">
                    <form method="POST" action="{{ route('user_withdraws.store') }}" class="log-form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="Amount">{{__('Amount')}}</label>
                                        <input type="number" min="0" id="Amount" class="form-control" placeholder="Amount" value="{{auth()->user()->wallet}}" required name="price">
                                        @error('price')
                                        <div>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="account_name">{{__('Account Name')}}</label>
                                        <select name="account_name" id="account_name" class="form-control" required>
                                            <option value="bank">Bank</option>
                                            <option value="easypaisa">EasyPaisa</option>
                                            <option value="jazzcash">JazzCash</option>
                                        </select>
                                        @error('account_name')
                                        <div>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="account_holder_name">{{__('Account Holder Name')}}</label>
                                        <input type="text" class="form-control" id="account_holder_name" name="account_holder_name" required>
                                        @error('account_holder_name')
                                        <div>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="account_number">{{__('Account Number')}}</label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" required>
                                        @error('account_number')
                                        <div>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 text-right">
                                <button type="submit" id="submit" class="btn btn-primary btn-block mt-3">{{__('Submit')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">

                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{__('Levels Wallet')}}</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="">
                    <form method="POST" action="{{ route('user-level-withdraw') }}" class="log-form" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            @if(session()->has('danger'))
                            <div class="col-lg-12 col-sm-12">
                                <div class="alert alert-danger">
                                    {{session()->get('danger')}}
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-12">
                                <h3 class="p-2 my-2" style="border:1px solid white;">Withdaw income into Cash Wallet</h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="Amount">{{__('Amount')}}</label>
                                        <input type="number" min="0" id="level_Amount" class="form-control" placeholder="Amount" required name="amount">
                                        @error('price')
                                        <div>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="levels">{{__('Cash Wallet')}}</label>
                                        <select name="level" id="levels" class="form-control" required>
                                            <option value="1" data-amount="{{auth()->user()->level_1_amount ?? 0}}" >Level 1</option>
                                            @if(auth()->user()->current_level >= 2)
                                            <option value="2" data-amount="{{auth()->user()->level_2_amount ?? 0}}">Level 2</option>
                                            @endif

                                            @php
                                            $rising_stars = App\Models\User::where('referral_by',auth()->user()->referral_link)->where('current_rank','=','rising_star')->get();
                                            @endphp

                                            @if(auth()->user()->current_level >= 3 && count($rising_stars) >= 5)
                                            <option value="3" data-amount="{{auth()->user()->level_3_amount ?? 0}}">Level 3</option>
                                            <option value="4" data-amount="{{auth()->user()->level_4_amount ?? 0}}">Level 4</option>
                                            <option value="5" data-amount="{{auth()->user()->level_5_amount ?? 0}}">Level 5</option>
                                            <option value="6" data-amount="{{auth()->user()->level_6_amount ?? 0}}">Level 6</option>
                                            @endif
                                            @if(auth()->user()->is_manager == 1)
                                            {{-- <option value="10" data-amount="{{auth()->user()->manager_amount ?? 0}}">Manager</option> --}}
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 text-right">
                                <button type="submit" id="submit" class="btn btn-primary  btn-block mt-3">{{__('Submit')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">

                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () { 
    
        $('#level_Amount').val($('#levels option:selected').attr('data-amount'));

        $(document).on('change','#levels',function () { 
            $('#level_Amount').val($('#levels option:selected').attr('data-amount'));
        })
    })
</script>
@endsection