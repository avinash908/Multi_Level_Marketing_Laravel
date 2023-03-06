@extends('layouts.admin.app')

@section('content')

<header class="content__title">
    <h1> {{__('Contact Messages')}}</h1>
</header>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-start">
                    <h5 class="card-title">All Messages</h5>
                </div>
                <div class="table-responsive if_not_table_responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th> Name</th>
                                <th> Phone</th>
                                <th> Subject</th>
                                <th> Email</th>
                                <th> Message</th>
                                <th> Created at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($messages as $message)
                            <tr>
                                <td></td>
                                <td>{{ucwords($message->name)}}</td>
                                <td>{{$message->phone}}</td>
                                <td>{{$message->subject}}</td>
                                <td>{{$message->email}}</td>
                                <td>
                                    <a href="javascript:void(0)" data-message="{{$message->message}}" class="btn btn-primary btn-sm preview_contact_message">Preview Message</a>
                                </td>
                                <td>{{$message->created_at->format('d-m-Y')}}</td>
                                <td>
                                    <a href="javascript:void(0)" data-route="{{route('contact_messages.destroy',$message->id)}}" class="btn btn-danger delete_btn bs_delete"><i class="bi bi-trash"></i> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal" tabindex="-1" id="message_modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="preview_contact_message">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

<script>
    $(document).on('click', '.preview_contact_message', function() {
        $("#preview_contact_message").html($(this).attr("data-message"));
        $("#message_modal").modal('show');
    });
</script>
@endsection