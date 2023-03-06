@extends('layouts.user.app')

@section('content')


<div class="row">

    <div class="col-md-6">

        <header class="content__title">
            <h1> {{__('Transfered Money')}}</h1>
        </header>
        <div class="card ">

            <div class="card-body">
                <div class="col-12" style="display: flex;justify-content:end;">
                    <!-- <a href="{{route('user_tansfer_money.create')}}" class="btn btn-primary ">Transfer Money</a> -->
                </div>
                <div class="table-responsive if_not_table_responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('From')}}</th>
                                <th scope="col">{{__('To')}}</th>
                                <th scope="col">{{__('Amount')}}</th>
                                <th scope="col">{{__('Date')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transfered_money as $tm)
                            <tr>
                                <td></td>
                                <td>{{$tm->from_user->email}}</td>
                                <td>{{$tm->to_user->email}}</td>
                                <td>Rs: {{$tm->amount}}</td>
                                <td>{{$tm->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <header class="content__title">
            <h1> {{__('Received Money')}}</h1>
        </header>
        <div class="card ">

            <div class="card-body">

                <div class="table-responsive if_not_table_responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('From')}}</th>
                                <th scope="col">{{__('To')}}</th>
                                <th scope="col">{{__('Amount')}}</th>
                                <th scope="col">{{__('Date')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($received_money as $rm)
                            <tr>
                                <td></td>
                                <td>{{$rm->from_user->email}}</td>
                                <td>{{$rm->to_user->email}}</td>
                                <td>Rs: {{$rm->amount}}</td>
                                <td>{{$rm->created_at}}</td>
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