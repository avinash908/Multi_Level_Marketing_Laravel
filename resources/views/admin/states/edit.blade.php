@extends('layouts.admin.app')

@section('content')
<header class="content__title">
    <h1> {{__('Stats')}}</h1>
</header>


    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Stats Edit</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="">
                    <form method="post" action="{{route('states_update',$state->id)}}" class="log-form" enctype="multipart/form-data">
                            @csrf
                            @include('alerts.success')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="title">All Members</label>
                                            <input type="text" id="title" class="form-control" value="{{$state->all_members}}" placeholder="All members" required name="all_members">
                                            @error('all_members')
                                            <div>
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="title">Total Deposit</label>
                                            <input type="text" id="title" class="form-control" value="{{$state->total_deposit}}" placeholder="Total deposit" required name="total_deposit">
                                            @error('total_deposit')
                                            <div>
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            </div>
                                            @enderror
                                        </div><div class="col-lg-12">
                                            <label for="total_paid_amount">Total Paid Amount</label>
                                            <input type="text" id="total_paid_amount" class="form-control" value="{{$state->world_country}}" placeholder="Total Paid Amount" required name="world_country">
                                            @error('world_country')
                                            <div>
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 text-right">
                                    <button type="submit" id="submit" class="btn mt-3">Update</button>
                                </div>
                            </div>
                        </form>
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
            