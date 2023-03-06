@extends('layouts.user.app')

@section('content')
<header class="content__title">
    <h1>Purchase Membership</h1>
</header>
<div class="row price-table price-table--highlight">
    @if(count($packages) > 0)
    @foreach($packages as $package)
    <div class="col-md-4">
        <div class="price-table__item">
            <header class="price-table__header">
                <div class="price-table__title">{{ucfirst($package->title)}}</div>
            </header>

            <div class="price-table__price">
                Rs: {{$package->price}} |
                <small>Lfetime</small>
            </div>

            <a href="javascript:void(0)" data-route="{{route('user_packages.store')}}" data-package_id="{{$package->id}}" data-packge_name="{{$package->title}}" data-package_description="{!! $package->description !!}" data-package_price="{{$package->price}}" class="price-table__action purchase_plan_btn">Select Plan</a>
        </div>
    </div>
    @endforeach
    @endif
</div>
{{--
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card ">
            <div class="card-body">
                @if(count($packages) > 0)
                <div class="row">
                    @foreach($packages as $package)
                    <div class="col-lg-4">
                        <div class="card text-white bg-dark">
                            @if(!empty($package->image))
                            <img src="{{asset('img/packages/'.$package->image)}}" class="card-img" alt="">
@endif
<div class="card-body">
    <h4 class="card-title">{{ucfirst($package->title)}}</h4>
    <a href="javascript:void(0)" data-route="{{route('user_packages.store')}}" data-package_id="{{$package->id}}" data-packge_name="{{$package->title}}" data-package_description="{!! $package->description !!}" data-package_price="{{$package->price}}" class="btn btn-primary btn-block purchase_plan_btn">{{__('Purchase Now')}}</a>
</div>
</div>
</div>
@endforeach
</div>
@else
<p>No Plan Packages found</p>
@endif
</div>
</div>
</div>
</div>
--}}
@if(count($packages) > 0)
<div class="modal" tabindex="-1" role="dialog" id="package_purchase_modal" class="">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title"> {{__('Purchase Plan')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="package_purchase_form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <h3 id="package_name"></h3>

                    <div id="package_description"></div>

                    <div id="accordion">
                        @foreach($payment_accounts as $payment_account)
                        <div class="card" style="border: 1px solid #fff; margin-top:1em">
                            <div class="card-header" id="heading{{$payment_account->id}}">
                                <h5 class="m-0" style="display: flex;justify-content:space-between">
                                    {{$payment_account->account_name}}

                                    <button class="btn btn-sm btn-primary" data-toggle="collapse" data-target="#collapse{{$payment_account->id}}" aria-expanded="true" aria-controls="collapse{{$payment_account->id}}">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse{{$payment_account->id}}" class="collapse " aria-labelledby="heading{{$payment_account->id}}" data-parent="#accordion">
                                <div class="card-body">
                                    <h5>Account Holder Name: {{$payment_account->account_holder_name}} </h5>
                                    <h5>Account Number: {{$payment_account->account_number}}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <input type="hidden" readonly id="package_id" name="package_id" value="" class="form-control">

                    <div class="form-group">
                        <label for="invest_amount">Invest Amount</label>
                        <input type="text" readonly id="invest_amount" name="invest_amount" value="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="proof">Proof of deposit</label>
                        <input type="file" id="proof" name="proof" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@endsection

@section('js')
<script>
    $(document).ready(function() {
        $(document).on('click', '.purchase_plan_btn', function() {

            $("#package_purchase_form").attr('action', '');
            $("#package_name").html('');
            $("#package_description").html('');
            $("#invest_amount").val('');
            $("#package_id").val('');

            $("#package_purchase_form").attr('action', $(this).attr('data-route'));
            $("#package_name").html($(this).attr('data-packge_name'));
            $("#package_description").html($(this).attr('data-package_description'));
            $("#invest_amount").val('Rs: ' + $(this).attr('data-package_price'));
            $("#package_id").val($(this).attr('data-package_id'));

            $("#package_purchase_modal").modal("show");
        })
    });
</script>
@endsection