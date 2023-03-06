<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return view('admin.notifications.index',['notifications' => Auth::user()->notifications()->latest()->get()]);
    }


    public function destroy()
    {
        # code...
    }
}
