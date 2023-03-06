@extends('layouts.user.app')

@section('content')
<header class="content__title">
    <h1> {{__('Support')}}</h1>
</header>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">{{__('Submit Message')}}</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="">
                    <form method="POST" action="{{ route('user.contact_store') }}" class="log-form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">

                                    <div class="form-group">
                                        <label for="subject">Subject </label>
                                        <input type="text" name="subject" id="subject" class="form-control" required>
                                        @error('subject')
                                        <div>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="message">Message </label>
                                        <textarea  name="message" id="message" class="form-control" required></textarea>
                                        @error('message')
                                        <div>
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </div>
                                        @enderror
                                    </div>
                            </div>

                            <div class="col-lg-12 text-right">
                                <button type="submit" id="submit" class="btn mt-3">Send</button>
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