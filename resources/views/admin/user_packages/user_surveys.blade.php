@extends('layouts.user.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h2 class="card-title">{{__('Processing Surveys')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">{{__('IN Surveys')}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Survey</th>
                                <th scope="col">Status</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($surveys as $survey)
                                    <tr>
                                        <td></td>
                                        <td>{{$survey->survey->title}}</td>
                                        <td>{{ucwords($survey->status)}}</td>
                                        <td>{{$survey->created_at}}</td>
                                        <td>
                                            @if($survey->status == 'processing')
                                                <a href="javascript:void(0)" data-route="{{route('user.applied_surveys.done',$survey->id)}}" data-title="{{$survey->survey ? $survey->survey->title : ''}}" data-desc="{{$survey->survey ? $survey->survey->description : ''}}" data-image="{{$survey->survey ? asset('img/surveys/'.$survey->survey->image) : ''}}" class="btn btn-primary change_status">{{__('Done')}}</a>
                                            @endif
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

    <div class="modal" tabindex="-1" role="dialog" id="user_survey_modal" class="">
        <div class="modal-dialog" role="document">
          <div class="modal-content ">
            <div class="modal-header">
              <h5 class="modal-title"> {{__('Survey Completion')}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="#" id="survey_completion_form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                   
                    <h3 class="modal-title text-dark" id="survey_title"></h3>

                    <div class="py-2">
                        <img src="" alt="" id="survey_image" data-fancybox="gallery" style="width:150px;height300px">
                    </div>
                    <div class="py-2" id="survey_description">

                    </div>
                    <div class="form-group">
                        <label for="proof">{{__('Attach Proof')}}</label>
                        <input type="file" class="" name="proof" accept="image/*" id="proof" style="opacity:1" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                    <button type="submit" class="btn btn-danger">{{__('Done')}}</button>
                </div>
              </form> 
            </div>
        </div>
      </div>
@endsection

@section('js')
      <script>
          $(document).ready(function(){
              $(document).on('click','.change_status',function () {
                $("#survey_completion_form").attr('action',$(this).attr('data-route'));

                console.log($(this).attr('data-title'));

                $("#survey_title").html($(this).attr('data-title'));
                $("#survey_description").html($(this).attr('data-desc'));
                $("#survey_image").attr('src',$(this).attr('data-image'));
                $("#user_survey_modal").modal("show");
              })
          });
      </script>
@endsection
            