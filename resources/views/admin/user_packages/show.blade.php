@extends('layouts.user.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h2 class="card-title">{{__('Survey')}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card text-white">
                <div class="row">
                    <div class="col-lg-3">

                        <img src="{{asset('img/surveys/'.$survey->image)}}" data-fancybox="gallery" class="w-100 p-4" alt="">

                        @if($survey->video) 
                            <div class="p-3">
                                {!! $survey->video !!}
                            </div>
                        @endif

                    </div>
                    <div class="col-lg-9">
                        <div class="card-body">
                            <h3> {{ucfirst($survey->title)}}</h3>
                            <h4>{{__('Survey Reward')}} ${{$survey->price}}</h4>

                            <div class="bg-dark p-2 my-2">
                                <a href="{{$survey->external_link}}" target="_blank">{{$survey->external_link}}</a>
                            </div>

                            <div class="survey_content">{!! $survey->description !!}</div>
                            
                        </div>

                        <form action="{{route('user_surveys.store')}}" method="post">
                            @csrf
                            <div class="card-footer text-right"> 
                                <input type="hidden" value="{{$survey->id}}" name="survey">
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
    $(document).ready(function(){
        $("iframe").attr('width','100%');
        $("iframe").attr('height','260px');
    });
</script>
@endsection
            