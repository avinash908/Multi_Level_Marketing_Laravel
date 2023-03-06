@extends('layouts.admin.app')

@section('content')
<style>
    .levels_fitler{
    width: 15rem;
    padding: 0.6rem 1rem;
    font-size: 1rem;
    line-height: 1.25;
    color: rgba(255,255,255,.85);
    background-image: none;
    background-clip: padding-box;
    background: transparent;
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 0;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    }
</style>

@php

$referral_page = true;

@endphp

<header class="content__title">
    <h1> {{__('User Details')}}</h1>
</header>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <!-- <div class="card-body"> -->
                    <ul class="list-group">
                        <li class="list-group-item">Username: {{$user->name}}</li>
                        <li class="list-group-item">Email: {{$user->email}}</li>
                        <li class="list-group-item">Phone: {{$user->phone ?? '--'}}</li>
                        <li class="list-group-item">Cash Wallet: {{$user->wallet ?? '0'}}</li>
                        <li class="list-group-item">Referral Link: {{config('app.url')}}?ref={{$user->referral_link ?? '--'}}</li>
                        <li class="list-group-item">Referr  By: {{isset($by->name) ? $by->email : ''}}</li>
                        <li class="list-group-item">Rank: {{ucwords(str_replace('_',' ',$user->current_rank))}}</li>
                        <li class="list-group-item">Status: {{$user->status == 1 ? 'Active' : 'Not Active'}}</li>
                        <li class="list-group-item">Manager: {{$user->is_manager == 1 ? 'Manager' : 'Not Manager'}}</li>
                        <li class="list-group-item">Manager Balance: {{$user->manager_amount ?? '0'}}</li>
                        <li class="list-group-item">Referral Incentive: {{$user->level_1_amount ?? '0'}}</li>
                        <li class="list-group-item">Performance Incentive: {{$user->level_2_amount ?? '0'}}</li>

                        <li class="list-group-item">Generation Incentive: 
                            @php
                                $performance =$user->level_3_amount  + $user->level_4_amount + $user->level_5_amount + $user->level_6_amount;
                            @endphp
                            {{$performance}}
                        </li>
                        {{--
                        <li class="list-group-item">Level 4 Balance: {{$user->level_4_amount ?? '0'}}</li>
                        <li class="list-group-item">Level 5 Balance: {{$user->level_5_amount ?? '0'}}</li>
                        <li class="list-group-item">Level 6 Balance: {{$user->level_6_amount ?? '0'}}</li>

                        --}}
                        <li class="list-group-item">Account Creation Date: {{$user->created_at }}</li>
                    </ul>
                    
                <!-- </div> -->

                <p id="table-filter" style="display:none">
                    <select class="levels_fitler">
                        <option selected>All Levels</option>
                        <option value="1">Level 1</option>
                        <option value="2">Level 2</option>
                        <option value="3">Level 3</option>
                        <option value="4">Level 4</option>
                        <option value="5">Level 5</option>
                        <option value="6">Level 6</option>
                    </select>
                </p>
                <div class="card-body table-responsive if_not_table_responsive">
                    <table class="table tablesorter " id="referral_table">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('Member Name')}}</th>
                                <th scope="col">{{__('Member Email')}}</th>
                                <th scope="col">{{__('Level')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sno = 1;
                            @endphp
                            @foreach($users as $user)
                            <tr>
                                <td>{{$sno++}}</td>
                                <td>{{$user['name']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>{{$user['level']}}</td>
                                <td>
                                    @if($user['status'] == 1)
                                    <span class="badge badge-secondary">Active</span>
                                    @else
                                    Not Active
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
            


@endsection

@section('js')
@if(isset($referral_page))
<script>
    $(document).ready(function() {
        var table = $('#referral_table').DataTable({
            dom: 'lr<"table-filter-container">tip',
            initComplete: function(settings) {
                var api = new $.fn.dataTable.Api(settings);
                $('.table-filter-container', api.table().container()).append(
                    $('#table-filter').detach().show()
                );

                $('#table-filter select').on('change', function() {
                    table.search(this.value).draw();
                });
            }
        });

    });
</script>
@endif
@endsection