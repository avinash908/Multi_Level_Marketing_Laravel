@extends('layouts.admin.app')

@section('content')
<header class="content__title">
    <h1> {{__('Deposits')}}</h1>
</header>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">All Deposits</h4>
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
                                <th scope="col">User Email</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Creation Date</th>
                                </tr></thead>
                            <tbody>
                                @foreach($deposits as $deposit)
                                    <tr>
                                        <td></td>
                                        <td>{{$deposit->user->name}}</td>
                                        <td>{{$deposit->user->email}}</td>
                                        <td>${{$deposit->amount}}</td>
                                        <td>{{$deposit->created_at}}</td>
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
            