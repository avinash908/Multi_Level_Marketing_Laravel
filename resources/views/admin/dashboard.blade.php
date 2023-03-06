@extends('layouts.admin.app')

@section('content')
<header class="content__title">
    <h1>Dashboard</h1>
</header>

<div class="row quick-stats">
    <div class="col-sm-6 col-md-3">

        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Cash Wallet Balance</h3>
            </div>
            <div class="card-body">
                <h2>Rs: {{auth()->user()->wallet}}</h2>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">

        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Total Users</h3>
            </div>
            <div class="card-body">
                <h2>{{count($users)}}</h2>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">

        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Activated Users</h3>
            </div>
            <div class="card-body">
                <h2>{{count($activated_users)}}</h2>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="card text-center">
            <div class="card-header">
                <h3 class="card-title">Total Withdrawal</h3>
            </div>
            <div class="card-body">
                <h2>Rs: {{$withdraws->sum('amount')}}</h2>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Recent Joinings</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive if_not_table_responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Creation Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">

                </nav>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Recent Purchased Plan Requests</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive if_not_table_responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Plan</th>
                                <th scope="col">User Name</th>
                                <th scope="col">User Email</th>
                                <th scope="col">Request Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchased_plan_requests as $req)
                            <tr>
                                <td></td>
                                <td>{{$req->package ? $req->package->title : '' }}</td>
                                <td>{{$req->user ? $req->user->name : '' }}</td>
                                <td>{{$req->user ? $req->user->email : '' }}</td>
                                <td>{{$req->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">

                </nav>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Recent Withdraw Requests</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive if_not_table_responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">Creation Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recent_withdraws as $recent_withdraw)
                            <tr>
                                <td></td>
                                <td>{{$recent_withdraw->user ? $recent_withdraw->user->email : '' }}</td>
                                <td>{{$recent_withdraw->amount }}</td>
                                <td>{{$recent_withdraw->status }}</td>
                                <td>{{$recent_withdraw->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">

                </nav>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Recent Money Transfers </h4>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive if_not_table_responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sent From</th>
                                <th scope="col">Received By</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($moneytransfer as $mt)
                            <tr>
                                <td></td>
                                <td>{{$mt->from_user ? $mt->from_user->email : '' }}</td>
                                <td>{{$mt->to_user ? $mt->to_user->email : '' }}</td>
                                <td>{{$mt->amount }}</td>
                                <td>{{$mt->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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