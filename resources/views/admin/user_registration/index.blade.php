@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h2 class="card-title">Registration Requests</h2>
                        </div>
                        
                    </div>
                </div>
                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">All Registration Requests</h4>
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
                                <th scope="col">Status</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($user_registrations as $reg)
                                    <tr>
                                        <td></td>
                                        <td>{{$reg->user->name}}</td>
                                        <td>
                                            @if($reg->status)
                                                <span class="badge badge-success">Approved</span>
                                            @else
                                                <span class="badge badge-danger">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{$reg->created_at}}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    @if($reg->status)
                                                        <a class="dropdown-item" href="{{route('user_registration.cancel',$reg->id)}}">Cancel</a>
                                                    @else
                                                        <a class="dropdown-item" href="{{route('user_registration.approve',$reg->id)}}">Approve</a>
                                                    @endif
                                                </div>
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
            