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
                            <h4 class="card-title">Announcement Create</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="">
                    <form method="Post" action="{{ route('annoucements.store') }}" class="log-form" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="title">Title</label>
                                            <input type="text" id="title" class="form-control" placeholder="Title" required name="annoucement_name">
                                            @error('annoucement_name')
                                            <div>
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="description">Description</label>
                                            <textarea id="description" rows="5" class="form-control " placeholder="Description" name="annoucement_description"></textarea>
                                            
                                            @error('annoucement_description')
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
                                    <button type="submit" id="submit" class="btn mt-3">Submit</button>
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
            