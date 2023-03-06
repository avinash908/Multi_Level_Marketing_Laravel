@extends('layouts.admin.app')

@section('content')

<header class="content__title">
    <h1> {{__('Transfered Money')}}</h1>
</header>

<div class="row">

    <div class="col-md-12">

        <div class="card ">

            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Internal Money Transfer</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="javascript:void(0)" class="btn btn-primary manage_tranfer">Manage Transfer</a>
                    </div>
                </div>
            </div>

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

</div>
<div class="modal" tabindex="-1" role="dialog" id="tranfer_modal" class="">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title"> {{__('Manage Transfer')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <form action="{{url('tansfer_money/change_status')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="status">Internal Transfer</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{$transfer_money_status->internal_money_transfer == 1 ? 'selected' : '' }}>Enabled </option>
                            <option value="0" {{$transfer_money_status->internal_money_transfer == 0 ? 'selected' : '' }}>Disabled</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
      <script>
          $(document).ready(function(){
              $(document).on('click','.manage_tranfer',function () {

                $("#tranfer_modal").modal("show");
              })
          });
      </script>
@endsection
            