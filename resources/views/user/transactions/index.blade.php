@extends('layouts.user.app')

@section('content')
<header class="content__title">
    <h1> {{__('Transactions')}}</h1>
</header>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <h4 class="card-title">{{__('All Transactions History')}}</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive if_not_table_responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('User')}}</th>
                                <th scope="col">{{__('Type')}}</th>
                                <th scope="col">{{__('Description')}}</th>
                                <th scope="col">{{__('Creation Date')}}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td></td>
                                <td>{{$transaction->user->name}}</td>
                                <td>{{$transaction->type}}</td>
                                <td>{{$transaction->description}}</td>
                                <td>{{$transaction->created_at}}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{route('transactions.edit',$transaction)}}">Edit </a>
                                            <a class="dropdown-item delete_btn" href="#" data-route="{{route('transactions.destroy',$transaction)}}">{{__('Delete')}} </a>
                                        </div>
                                </td>
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