<?php

namespace App\Http\Controllers\Admin;

use App\Events\NumberMessageEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeRequest;
use App\Mail\SubscriptionEmail;
use App\Models\Subscribe;
use App\Notifications\SmsNotification;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Twilio\Rest\Client;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage.subscriptions');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subscription.index', ['subscriptions' => Subscribe::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subscription.create');
    }

    public function save_new_subscriner(SubscribeRequest $request)
    {
        $data = $request->all();

        Subscribe::create($data);

        if(request()->ajax()){
            return response()->json(['status'=>200, 'message'=> 'New subscriber has been added into subscribers list']);
        }

        return redirect()->route('subscription.index')->with('success', 'New subscriber has been added into subscribers list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscribeRequest $request)
    {
        $data = $request->all();

        Subscribe::create($data);

        if(request()->ajax()){
            return response()->json(['status'=>200, 'message'=> 'New subscriber has been added into subscribers list']);
        }

        return redirect()->route('subscription.index')->with('success', 'New subscriber has been added into subscribers list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subscribe $subscriber)
    {
        return view('admin.subscription.show', compact('subscriber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.subscription.edit', ['subscriber'=> Subscribe::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subscriber = Subscribe::findOrFail($id);
        
        $subscriber->update($request->only('fname','lname','email','phone'));

        if(request()->ajax()){
            return response()->json(['status'=>200, 'message'=> 'Subscriber has been updated ']);
        }

        return redirect()->route('subscription.index')->with('success', 'Subscriber has been updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = base64_decode($id);
        $subscriber = Subscribe::find($id);
        $subscriber->delete();
        return redirect()->route('subscription.index')->with('success', 'subscriber has been removed');
    }
}
