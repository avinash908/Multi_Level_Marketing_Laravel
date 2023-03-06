<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage.transactions');
    }

    public function index()
    {
        $title = "Transactions";
        $transactions = Transaction::latest()->get();

        return view('admin.transactions.index',compact('transactions','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Textimonials Create";
        return view('admin.transactions.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretransactionRequest $request)
    {
        return redirect()->route('transactions.index')->with('success','transaction has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Transactions Edit";
        $test = transaction::findOrFail($id);
        return view ('admin.transactions.edit',compact('test','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetransactionRequest  $request
     * @param  \App\Models\Admin\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetransactionRequest $request, Transaction $transaction)
    {
        return redirect()->route('transactions.index')->with('success','transaction has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success','Transaction has been deleted');
    }
}
