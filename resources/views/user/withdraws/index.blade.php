@extends('layouts.user.app')

@section('content')
<header class="content__title">
    <h1>Withdraws</h1>
</header>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{!empty(request()->withdraw_type) ? ucwords(request()->withdraw_type) : '' }} {{__(' Withdraws List')}}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('user_withdraws.create')}}" class="btn btn-primary">{{__('Make Withdraw')}}</a>
                        </div>
                       
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive if_not_table_responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('Amount')}}</th>
                                    <th scope="col">{{__('Account Name')}}</th>
                                    <th scope="col">{{__('Account Holder Name')}}</th>
                                    <th scope="col">{{__('Account Number')}}</th>
                                    <th scope="col">{{__('Status')}}</th>
                                    <th scope="col">{{__('Creation Date')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($withdraws as $withdraw)
                                    <tr>
                                        <td></td>
                                        <td>Rs: {{$withdraw->amount}}</td>
                                        <td>{{$withdraw->account_name}}</td>
                                        <td>{{$withdraw->account_holder_name}}</td>
                                        <td>{{$withdraw->account_number}}</td>
                                        <td>
                                            <span class="badge badge-primary">{{$withdraw->status}}</span>
                                        </td>
                                        <td>{{$withdraw->created_at}}</td>
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
            