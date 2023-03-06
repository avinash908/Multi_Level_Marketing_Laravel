<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentAccount;
use Illuminate\Http\Request;


class PaymentAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage.paymentaccounts');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Payment Accounts";
        $payment_accounts = PaymentAccount::latest()->get();
        return view('admin.payment_accounts.index',compact('payment_accounts','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Payment Accounts Create";
        return view('admin.payment_accounts.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PaymentAccount::create([
            'account_name' => $request->input('account_name'),
            'account_holder_name' => $request->input('account_holder_name'),
            'account_number' => $request->input('account_number'),
            'status' => $request->input('status') ? 1 : 0,
        ]);

        return redirect()->route('payment_accounts.index')->with('success', 'Payment Account has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentAccount  $PaymentAccount
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = "Payment Accounts";
        $PaymentAccount = PaymentAccount::findOrFail($id);
        return view('admin.payment_accounts.show',compact('PaymentAccount','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentAccount  $PaymentAccount
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Payment Accounts Edit";
        $payment_account = PaymentAccount::findOrFail($id);
        return view('admin.payment_accounts.edit',compact('payment_account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentAccountRequest  $request
     * @param  \App\Models\PaymentAccount  $PaymentAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $PaymentAccount = PaymentAccount::findOrFail($id);

        $PaymentAccount->update([
            'account_name' => $request->input('account_name'),
            'account_holder_name' => $request->input('account_holder_name'),
            'account_number' => $request->input('account_number'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('payment_accounts.index')->with('success', 'Payment Account has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentAccount  $PaymentAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PaymentAccount = PaymentAccount::findOrFail($id);
        $PaymentAccount->delete();
        return redirect()->route('payment_accounts.index')->with('success', 'Payment Account has been Deleted');
    }
}
