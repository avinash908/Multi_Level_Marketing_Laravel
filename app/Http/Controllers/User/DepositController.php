<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function index()
    {
        $title = "Deposits";
        $deposits = Auth::user()->deposits()->latest()->get();
        return view('user.deposits.index',compact('deposits','title'));
    }
}
