@extends('layouts.admin.app')

@section('content')
<header class="content__title">
    <h1> {{__('Withdraws')}}</h1>
</header>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title"> {{request()->has('withdraw_type') ? ucwords(request()->get('withdraw_type')) : 'All' }} Withdraws List</h4>
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
                                    <th scope="col" ></th>
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
                                        <td class="text-right">
                                        @if ($withdraw->status != 'completed')
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{route('withdraws.edit',$withdraw->id)}}?status=pending">pending </a>
                                                    <a class="dropdown-item" href="{{route('withdraws.edit',$withdraw->id)}}?status=rejected">rejected </a>
                                                    <a class="dropdown-item" href="{{route('withdraws.edit',$withdraw->id)}}?status=completed">completed </a>
                                                </div>
                                            </div>
                                        @endif
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
            