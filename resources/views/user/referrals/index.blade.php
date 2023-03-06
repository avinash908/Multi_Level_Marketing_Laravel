@extends('layouts.user.app')

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
    <h1>Referrals</h1>
</header>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{__('All Referrals List')}}</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
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
                <div class="table-responsive if_not_table_responsive">
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
            <div class="card-footer py-4">
                <nav class="d-flex justify-content-end" aria-label="...">

                </nav>
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