@extends('layouts.admin.app')

@section('content')
<header class="content__title">
    <h1> {{__('Faqs')}}</h1>
</header>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">All Faqs List</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('faqs.create')}}" class="btn btn-sm btn-primary">Add faq</a>
                        </div>
                        @if(session()->has('success'))

                        <div class="col-lg-12 col-sm-12">
                            <div class="alert alert-success">
                                {{session()->get('success')}}
                            </div>
                        </div>

                        @endif
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive if_not_table_responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Description</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col"></th>
                            </tr></thead>
                            <tbody>
                                @foreach($faqs as $faq)
                                    <tr>
                                        <td></td>
                                        <td>{{$faq->title}}</td>
                                        <td>{{$faq->description}}</td>
                                        <td>{{$faq->created_at}}</td>
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a class="dropdown-item" href="{{route('faqs.edit',$faq)}}">Edit </a>
                                                        <a class="dropdown-item delete_btn" href="#" data-route="{{route('faqs.destroy',$faq)}}">Delete </a>
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
            