@extends('layouts.admin.app')

@section('content')
<header class="content__title">
    <h1>Payment Accounts</h1>
</header>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Add New Payment Account</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <form method="POST" action="{{ route('payment_accounts.update',$payment_account->id) }}" class="log-form" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="_method" value="put">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="account_name">Account Name</label>
                                        <input type="text" id="account_name" class="form-control" placeholder="Account Name" value="{{$payment_account->account_name}}" required name="account_name">
                                        @error('account_name')
                                        <div>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="account_holder_name">Account Holder Name</label>
                                        <input type="text" id="account_holder_name" class="form-control" placeholder="Account Holder Name" value="{{$payment_account->account_holder_name}}" required name="account_holder_name">
                                        @error('account_holder_name')
                                        <div>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="account_number">Account Number</label>
                                        <input type="text" id="account_number" class="form-control" placeholder="Account Number" value="{{$payment_account->account_number}}" required name="account_number">
                                        @error('account_number')
                                        <div>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="status">Status</label>
                                        <select id="status" name="status" id="status" class="form-control">
                                            <option value="1" {{$payment_account->status == 1 ? 'selected' : ''}} >Active</option>
                                            <option value="0" {{$payment_account->status == 0 ? 'selected' : ''}} >Inactive</option>
                                        </select>
                                        @error('status')
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
                                <button type="submit" id="submit" class="btn mt-3">Submit</button>
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