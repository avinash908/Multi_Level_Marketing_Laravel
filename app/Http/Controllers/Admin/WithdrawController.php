<?php

namespace App\Http\Controllers\Admin;

use App\Models\Withdraw;
use App\Http\Requests\StoreWithdrawRequest;
use App\Http\Requests\UpdateWithdrawRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\AdminWithdrawNotification;

class WithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage.withdraws');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdraw_type = request()->withdraw_type;

        switch ($withdraw_type) {

            case 'pending':
                $withdraws = Withdraw::where('status', '=', 'pending')->get();
                break;

            case 'rejected':
                $withdraws = Withdraw::where('status', '=', 'rejected')->get();
                break;

            case 'completed':
                $withdraws = Withdraw::where('status', '=', 'completed')->get();
                break;

            default:
                $withdraws = Withdraw::latest()->get();
                break;
        }

        return view('admin.withdraws.index', compact('withdraws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.withdraws.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWithdrawRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWithdrawRequest $request)
    {
        // $price = $request->input('price');

        // if($price > auth()->user()->wallet)
        // {
        // return back()->with('success', 'insufficient balance for withdraw');
        // }
        // Withdraw::create([
        //     'user_id' => auth()->user()->id,
        //     // 'wallet_addresss' => $request->input('wallet_addresss'),
        //     'amount' => $price,
        //     'status' => 'pending',
        // ]);

        // return redirect('withdraws?withdraw_type=pending')->with('success', 'Withdraw has been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Withdraw  $Withdraw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $withdraw = Withdraw::findOrFail($id);
        // return view('admin.Withdraws.show',compact('withdraw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdraw  $Withdraw
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = request()->status;

        $withdraw = Withdraw::findOrFail($id);

        if (in_array($status, ['pending', 'rejected', 'completed'])) {

            $withdraw->update(['status' => $status]);

            if ($status == 'completed') {

                $new_wallet_balance = $withdraw->user->wallet - $withdraw->amount;

                $withdraw->user()->update(['wallet' => $new_wallet_balance]);

                $user = User::find($withdraw->user->id);

                $data = [
                    'name' => $user->name,
                    'message'  => 'Your withdraw request has been approved',
                ];

                $user->transactions()->create([
                    'user_id'       => $user->id,
                    'type'          => 'withdraw',
                    'amount'        =>  $withdraw->amount,
                    'description'   =>  ucwords($user->name) . ' has withdraw  Rs: '. $withdraw->amount
                ]);

                $user->notify(new AdminWithdrawNotification($data));
            }
        }

        return redirect('withdraws?withdraw_type=pending')->with('success', 'Withdraw Updated');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWithdrawRequest  $request
     * @param  \App\Models\Withdraw  $Withdraw
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWithdrawRequest $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdraw  $Withdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $withdraw = Withdraw::findOrFail($id);
        // $withdraw->delete();
        // return redirect()->route('withdraws.index')->with('success', 'Withdraw has been Created');
    }
}
