@extends('layouts.admin.app')

@section('content')
<header class="content__title">
    <h1> {{__('Testimonials')}}</h1>
</header>




    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">testimonial Create</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="">
                    <form method="POST" action="{{ route('testimonials.store') }}" class="log-form" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-3">
                                    <h5>Testimonial Thumbnail (optional)</h5>
                                    <p>Click image  below to upload</p>
                                    <label for="image" style="cursor: pointer;width:100%">
                                        <img src="{{asset('img/no-image.jpg')}}" id="output" class="img-thumbnail" style="width:100%;height:200px">
                                        <input type="file" name="testimonial_image" id="image" class="d-none" onchange="loadFile(event)">
                                    </label>

                                    @error('testimonial_image')
                                    <div>
                                        <span class="text-danger" role="alert">
                                             <strong>{{ $message }}</strong>
                                        </span>
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="title">Title</label>
                                            <input type="text" id="title" class="form-control" placeholder="Title" required name="testimonial_name">
                                            @error('testimonial_name')
                                            <div>
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="job">Job</label>
                                            <input type="text" id="job" class="form-control" placeholder="Job" required name="testimonial_job">
                                            @error('testimonial_job')
                                            <div>
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="rating">Rating</label>
                                            <input type="number" id="rating" class="form-control " placeholder="rating" name="testimonial_rating" max="5" min="1">
                                            
                                            @error('testimonial_rating')
                                            <div>
                                                <span class="text-danger" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                </span>
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12">
                                            <label for="comment">Comment</label>
                                            <textarea id="comment" class="form-control " placeholder="comment" name="testimonial_comment"></textarea>
                                            
                                            @error('testimonial_comment')
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
            