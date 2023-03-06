@extends('layouts.user.app')

@section('content')
<header class="content__title">
    <h1>Announcements</h1>
</header>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title">{{__('Your Annoucements')}}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($Annoucements as $annoucement)
                    <div class="col-lg-3">
                        <div class="card text-white">
                            <div class="card-header">
                                <h3>{{$annoucement->title}}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection