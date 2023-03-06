@extends('layouts.admin.app')

@section('content')

<header class="content__title">
    <h1> {{__('Faqs')}}</h1>
</header>
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Faq</h5>

                    <form action="{{route('faqs.update',$faq)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group my-2">
                                    <label>Title</label>
                                    <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                        name="title" value="{{$faq->title}}" id="title">
                                    @error('title')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-group my-2">
                                    <label>Description</label>
                                    <textarea class="form-control  @error('description') is-invalid @enderror"
                                        name="description" id="description">{{$faq->description}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group my-2 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection