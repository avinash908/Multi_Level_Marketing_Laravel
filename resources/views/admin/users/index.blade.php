@extends('layouts.admin.app')

@section('content')
<header class="content__title">
    <h1> {{__('Users')}}</h1>
</header>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">All Users</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('users.create')}}" class="btn btn-primary">Add user</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive if_not_table_responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Manager</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col"></th>
                            </tr></thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td></td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->is_manager == 1 ? 'Manager' : 'Not Manager'}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a class="dropdown-item" href="{{route('users.show',$user->id)}}">View </a>
                                                        <a class="dropdown-item" href="{{route('users.edit',$user)}}">Edit </a>
                                                        <a class="dropdown-item delete_btn" href="#" data-route="{{route('users.destroy',$user)}}">Delete </a>
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
            