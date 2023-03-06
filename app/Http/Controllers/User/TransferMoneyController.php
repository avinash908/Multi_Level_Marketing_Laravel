<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MoneyTransfer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AppProfile;
use App\Notifications\AdminMoneyTransferNotification;
use App\Notifications\UserMoneyTransferNotification;

class TransferMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfered_money = MoneyTransfer::where('from_user_id', '=', auth()->user()->id)->latest()->get();
        $received_money = MoneyTransfer::where('to_user_id', '=', auth()->user()->id)->latest()->get();
        return view('user.tranfer_money.index', compact('transfered_money','received_money'));
    }

    public function create()
    {
        $app = AppProfile::where('id',1)->first();

        if($app->internal_money_transfer != 1){

            return redirect()->back()->with('danger','Internal Tranfer is disabled from admin side');
        }

        $users = User::whereHas('roles', function ($q) {
            $q->where('slug', '!=', 'admin');
        })->where('email','!=',auth()->user()->email)->get();

        return view('user.tranfer_money.create',compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'amount'=> 'required|int',
        ]);

        if(auth()->user()->wallet < $request->input('amount')){
            return redirect()->back()->with('danger','Insufficient balance found in wallet');
        }

        $user = User::where('email','=',$request->input('email'))->firstOrFail();
        
        $user_new_wallet_amount = $user->wallet + $request->input('amount');
        
        $user->update(['wallet' => $user_new_wallet_amount]);

        $auth_new_wallet_amount = auth()->user()->wallet - $request->input('amount');

        auth()->user()->update(['wallet'=>$auth_new_wallet_amount]);

        MoneyTransfer::create([
            'from_user_id'=> auth()->user()->id,
            'to_user_id'=> $user->id,
            'amount'=> $request->input('amount'),
        ]);

        $data = [
            'amount' => $request->input('amount'),
            'from_user' => auth()->user()->name,
            'to_user' => $user->name,
        ];
        
        $user->notify(new UserMoneyTransferNotification($data));

        $admin = User::whereHas('roles', function ($q) {
            $q->where('slug', '=', 'admin');
        })->first();

        $admin->notify(new AdminMoneyTransferNotification($data));

        auth()->user()->transactions()->create([
            'user_id'       => auth()->user()->id,
            'type'          => 'transfer_money',
            'amount'        =>  $request->input('amount'),
            'description'   =>  ucwords(auth()->user()->name) .' has transfered Rs: '. $request->input('amount').' to ' .$user->email
        ]);

        return redirect('user_tansfer_money')->with('success', __('Money has been transfered to '. $user->email));
    }

}
