@extends('layouts.admin.app')

@section('content')
<header class="content__title">
    <h1> {{__('Announcement')}}</h1>
</header>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">All Announcements</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('annoucements.create')}}" class="btn  btn-primary">Add announcement</a>
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
                                <th scope="col">Description</th>
                                <th scope="col"></th>
                            </tr></thead>
                            <tbody>
                                @foreach($Annoucements as $annoucement)
                                    <tr>
                                        <td></td>
                                        <td>{{$annoucement->title}}</td>
                                        <td>{!! $annoucement->description !!}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{route('annoucements.edit',$annoucement)}}">Edit </a>
                                                    <a class="dropdown-item delete_btn" href="#" data-route="{{route('annoucements.destroy',$annoucement)}}">Delete </a>
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
            