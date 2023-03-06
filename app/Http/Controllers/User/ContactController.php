<?php

namespace App\Http\Controllers\User;

use App\Events\ContactMessageEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactStoreRequest;
use App\Models\ContactMessage;
use App\Models\User;
use App\Notifications\ContactMessageNotification;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('user.support.index');
    }

    public function store(Request $request)
    {
        $d = $request->only('subject','message');

        $d['name'] = auth()->user()->name;
        $d['email'] = auth()->user()->email;
        $d['phone'] = auth()->user()->phone;
        
        $contact = ContactMessage::create($d);

        $data = [
            'name'  => $contact->name,
            'email'  => $contact->email,
            'subject'  => $contact->subject,
            'phone'  => $contact->phone,
            'message'  => $contact->message,
        ];

        $user = User::whereHas('roles', function ($q) {
            $q->where('slug', '=', 'admin');
        })->first();

        $user->notify(new ContactMessageNotification($data));

        return redirect('/user/support')->with(['success' => __('Your message has been submited, please wait for response')]);
    }
}
