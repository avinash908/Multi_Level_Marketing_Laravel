@extends('layouts.admin.app')

@section('content')
<header class="content__title">
    <h1> {{__('Referrals')}}</h1>
</header>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">All Referrals List</h4>
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
                                <th scope="col">From User</th>
                                <th scope="col">Bonus</th>
                                <th scope="col">Status</th>
                            </tr></thead>
                            <tbody>
                                @foreach($referrals as $referral)
                                    <tr>
                                        <td></td>
                                        <td>{{$referral->to_user->name}}</td>
                                        <td>{{$referral->from->name}}</td>
                                        <td>${{$referral->amount}}</td>
                                        <td>
                                            @if($referral->status == 1)
                                                <span class="badge badge-success">{{__('Active')}}</span>

                                            @else 
                                                <span class="badge badge-success">{{__('Inactive')}}</span>
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
            