<?php

namespace App\Http\Controllers\User;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        $title = "Transactions";
        $transactions = Transaction::where('user_id','=',auth()->user()->id)->latest()->get();

        return view('user.transactions.index',compact('transactions','title'));
    }
}
