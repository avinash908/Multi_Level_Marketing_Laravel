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
                        <h4 class="card-title">All Payment Accounts</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{route('payment_accounts.create')}}" class="btn btn-primary">Add Payment Account</a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive if_not_table_responsive">
                    <table class="table tablesorter " id="">
                        <thead class="text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"> Account Name</th>
                                <th scope="col"> Account Holder Name</th>
                                <th scope="col"> Account Number</th>
                                <th scope="col"> Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payment_accounts as $payment_account)
                            <tr>
                                <td></td>
                                <td>{{$payment_account->account_name}}</td>
                                <td>{{$payment_account->account_number}}</td>
                                <td>{{$payment_account->account_holder_name}}</td>
                                <td>{{$payment_account->status == 1 ? 'Active' : 'Not Active'}}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{route('payment_accounts.edit',$payment_account)}}">Edit </a>
                                            <a class="dropdown-item delete_btn" href="#" data-route="{{route('payment_accounts.destroy',$payment_account)}}">Delete </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection