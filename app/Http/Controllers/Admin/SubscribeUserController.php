<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubscribeUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\AccountRegisterNotification;
use Illuminate\Http\Request;

class SubscribeUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage.subscribe.requests');
    }

    public function index()
    {
        $title = "User Registration Request";
        $user_registrations = SubscribeUser::latest()->get();
        return view('admin.user_registration.index',compact('user_registrations','title'));
    }

    public function approve($id)
    {
        $model = SubscribeUser::find($id);
        $model->update(['status'=>1]);
        $user = User::where('id',$model->user_id)->update(['status'=>1]);

        $data = [
            'message'  => 'Your request for account registration has been approved '
        ];

        $n_user = User::find($model->user_id);

        $n_user->notify(new AccountRegisterNotification($data));

        return redirect()->route('user_registration.index')->with('success', 'User Registration Request has been approved');
    }

    public function disapprove($id)
    {
        $model = SubscribeUser::find($id);
        $model->update(['status'=>0]);
        User::where('id',$model->user_id)->update(['status'=>0]);
        
        return redirect()->route('user_registration.index')->with('success', 'User Registration Request has been canceled');
    }
}
