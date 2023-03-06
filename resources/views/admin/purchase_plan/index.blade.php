@extends('layouts.admin.app')

@section('content')
<header class="content__title">
    <h1>Purchased Plan</h1>
</header>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Purchased Plan Requests</h4>
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
                                <th scope="col">PLan</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Proof</th>
                                <th scope="col">Request Date</th>    
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchase_plan as $req)
                            <tr>
                                <td></td>
                                <td>
                                    @if($req->user)
                                    <a href="{{url('/users')}}">{{$req->user->name }}</a>
                                    @else
                                    'User Not Found'
                                    @endif
                                </td>
                                <td>{{$req->package ? $req->package->title : 'Package Not Found' }}</td>
                                <td>Rs: {{$req->amount}}</td>
                                <td>
                                    <span class="badge badge-info">{{$req->status}}</span>
                                </td>
                                <td><a href="javascript:void(0)"  class="btn btn-sm btn-primary view_proof" data-img="{{asset('img/proofs/'.$req->proof)}}">Proof</a></td>
                                <td>{{$req->created_at}}</td>
                                
                                <td class="text-right">
                                    @if($req->status == 'processing')
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{route('user_registration.approve',$req->id)}}">Approve</a>
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
<div class="modal" tabindex="-1" role="dialog" id="proof_modal" class="">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title"> {{__('Deposit Proof')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="proof_data">
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
      <script>
          $(document).ready(function(){
              $(document).on('click','.view_proof',function () {

                $("#proof_data").html("");

                $("#proof_data").html("<img src='"+$(this).attr('data-img')+"'>");

                $("#proof_modal").modal("show");
              })
          });
      </script>
@endsection
            