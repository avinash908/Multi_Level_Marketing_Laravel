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
                        <h4 class="card-title">User Create</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="">
                    <form method="POST" action="{{ route('users.store') }}" class="log-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Name</label>
                                <input type="text" id="name" class="form-control" placeholder="Name" required name="user_name">
                                @error('user_name')
                                <div>
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label>Manager</label>
                                <select name="is_manager" id="is_manager" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>

                                @error('is_manager')
                                <div>
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                </div>
                                @enderror
                            </div>
                            <input type="hidden" name="role" value="user">

                            <!-- <div class="col-lg-6">
                                <label>Assign role</label>
                                <select name="role" id="role" class="form-control">
                                    @foreach($roles as $role)
                                    <option value="{{$role->slug}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div>
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                </div>
                                @enderror
                            </div> -->
                        </div>

                        <input type="email" id="msg_subject" class="form-control mt-3" placeholder="Email" name="user_email">
                        @error('user_email')
                        <div>
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                        @enderror
                        <input type="password" id="msg_subject" class="form-control mt-3" placeholder="Password" name="user_password">
                        @error('user_password')
                        <div>
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                        @enderror
                        <button type="submit" id="submit" class="btn mt-3">Submit</button>
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