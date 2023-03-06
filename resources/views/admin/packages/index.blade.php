@extends('layouts.admin.app')

@section('content')
<header class="content__title">
    <h1>Plan Packages</h1>
</header>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Plan Packages List</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{route('packages.create')}}" class="btn btn-primary">Add Package</a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive if_not_table_responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                {{-- <th scope="col">Status</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Creation Date</th>
                                --}}
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($packages as $package)
                            <tr>
                                <td></td>
                                <td>{{$package->title}}</td>
                                <td>Rs: {{$package->price}}</td>
                                {{--<td>
                                    @if($package->status)
                                    <span class="badge badge-success">Active</span>
                                    @else
                                    <span class="badge badge-danger">Not Active</span>
                                    @endif
                                </td>
                                <td>{{$package->end_date}}</td>
                                <td>{{$package->created_at}}</td>
                                --}}
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{route('packages.edit',$package)}}">Edit </a>
                                            <a class="dropdown-item delete_btn" href="#" data-route="{{route('packages.destroy',$package)}}">Delete </a>
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