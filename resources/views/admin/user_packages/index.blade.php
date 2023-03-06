@extends('layouts.admin.app')

@section('content')
<header class="content__title">
    <h1> {{__('Transactions')}}</h1>
</header>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="card-title">{{__('User Surveys List')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive if_not_table_responsive">
                        <table class="table tablesorter " id="">
                            <thead class="text-primary">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
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
                                        <td>{{$survey->user ? $survey->user->name : ''}}</td>
                                        <td>{{$survey->survey ? $survey->survey->title : ''}}</td>
                                        <td>{{ucwords($survey->status)}}</td>
                                        <td>{{$survey->created_at}}</td>
                                        <td>
                                            @if($survey->status != 'completed')
                                                <a href="javascript:void(0)" data-route="{{route('user_completed_surveys.update',$survey->id)}}" data-username="{{$survey->user ? $survey->user->name : ''}}" data-email="{{$survey->user ? $survey->user->email : ''}}" data-status="{{$survey->status}}" data-reward="{{$survey->amount}}" data-title="{{$survey->survey ? $survey->survey->title : ''}}" data-desc="{{$survey->survey ? $survey->survey->description : ''}}" data-image="{{asset('img/survey_proof/'.$survey->proof)}}" class="btn btn-primary change_status">{{__('Complete')}}</a>
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

                    <div class="table-responsive">
                        <table class="table py-2">
                            <tr>
                                <td>Username</td>
                                <td id="survey_username"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td id="survey_email"></td>
                            </tr>
                            <tr>
                                <td>Survey Status</td>
                                <td id="survey_status"></td>
                            </tr>
                            <tr>
                                <td>Survey Reward</td>
                                <td id="survey_reward"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="py-2">
                        <h4 class="text-dark">Proof</h4>
                        <img src="" alt="" id="survey_proof_image" data-fancybox="gallery" style="width:150px;height300px">
                    </div>

                    <div class="py-2" id="survey_description"></div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="_method" value="put">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                    <button type="submit" class="btn btn-danger">{{__('Complete')}}</button>
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

                $("#survey_title").html($(this).attr('data-title'));
                $("#survey_username").html($(this).attr('data-username'));
                $("#survey_email").html($(this).attr('data-email'));
                $("#survey_status").html($(this).attr('data-status'));
                $("#survey_reward").html($(this).attr('data-reward'));
                $("#survey_description").html($(this).attr('data-desc'));
                $("#survey_proof_image").attr('src',$(this).attr('data-image'));

                $("#user_survey_modal").modal("show");
              })
          });
      </script>
@endsection
            