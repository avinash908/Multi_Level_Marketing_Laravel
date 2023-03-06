<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return view('user.notifications.index',['notifications' => Auth::user()->notifications()->latest()->paginate(12)]);
    }

    public function destroy()
    {
       
    }
}
