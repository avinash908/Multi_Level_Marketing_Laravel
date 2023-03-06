<?php

namespace App\Http\Controllers\Front;

use App\Events\ContactMessageEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactStoreRequest;
use App\Models\ContactMessage;
use App\Models\User;
use App\Notifications\ContactMessageNotification;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(ContactStoreRequest $request)
    {
        $contact = ContactMessage::create($request->only('name', 'email', 'subject', 'phone', 'message'));
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

        return redirect('/contact')->with(['message' => __('Your message has been submited, please wait for response')]);
    }
}
