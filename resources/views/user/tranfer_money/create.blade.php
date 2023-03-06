@extends('layouts.user.app')

@section('content')
<header class="content__title">
    <h1> {{__('Transfer Money')}}</h1>
</header>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{__('Transfer Money To Any User')}}</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(session()->has('danger'))
                <div class="col-lg-12 col-sm-12">
                    <div class="alert alert-danger">
                        {{session()->get('danger')}}
                    </div>
                </div>
                @endif
                <div class="">
                    <form method="POST" action="{{ route('user_tansfer_money.store') }}" class="log-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="email">User </label>
                                        <input type="email" class="form-control" name="email"  required>

                                        @error('email')
                                        <div>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="amount">Amount</label>
                                        <input type="number" id="amount" class="form-control" min="0" placeholder="eg:50" required name="amount">
                                        @error('amount')
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
                                <button type="submit" id="submit" class="btn mt-3">Send</button>
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