<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MoneyTransfer;
use App\Models\User;
use App\Models\UserPackage;
use App\Models\Withdraw;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:view.dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = 'Dashboard';
        $users = User::whereHas('roles',function($q){
            $q->where('slug','!=','admin');
        })->latest()->get();

        $activated_users = User::whereHas('roles',function($q){
            $q->where('slug','!=','admin');
        })->where('status','=',1)->latest()->get();

        $withdraws = Withdraw::where('status','=','completed')->latest()->get();
        $recent_withdraws = Withdraw::where('status','=','pending')->latest()->get();

        $moneytransfer = MoneyTransfer::latest()->get();

        $purchased_plan_requests = UserPackage::where('status','=','processing')->latest()->get();

        $admin = User::whereHas('roles', function ($q) {
            $q->where('slug', '=', 'admin');
        })->first();

        return view('admin.dashboard',compact('title','users','withdraws','activated_users', 'purchased_plan_requests','admin','recent_withdraws','moneytransfer'));
    }

}
