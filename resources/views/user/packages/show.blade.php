@extends('layouts.user.app')

@section('content')
<header class="content__title">
    <h1>Packages</h1>
</header>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card text-white">
            <div class="row">
                <div class="col-lg-3">

                    <img src="{{asset('img/Packages/'.$Package->image)}}" data-fancybox="gallery" class="w-100 p-4" alt="">

                    @if($Package->video)
                    <div class="p-3">
                        {!! $Package->video !!}
                    </div>
                    @endif

                </div>
                <div class="col-lg-9">
                    <div class="card-body">
                        <h3> {{ucfirst($Package->title)}}</h3>
                        <h4>{{__('Package Reward')}} ${{$Package->price}}</h4>

                        <div class="bg-dark p-2 my-2">
                            <a href="{{$Package->external_link}}" target="_blank" class="text-primary">{{$Package->external_link}}</a>
                        </div>

                        <div class="Package_content">{!! $Package->description !!}</div>

                    </div>

                    <form action="{{route('user_Packages.store')}}" method="post">
                        @csrf
                        <div class="card-footer text-right">
                            <input type="hidden" value="{{$Package->id}}" name="Package">
                            <button type="submit" class="btn btn-primary">{{__('Get Started')}}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $("iframe").attr('width', '100%');
        $("iframe").attr('height', '260px');
    });
</script>
@endsection