<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Referral;
use App\Models\SubscribeUser;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\UserDepositNotification;
use App\Notifications\UserSubscribeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use NowPayments;

class SubscribeUserController extends Controller
{
    public function index()
    {
        if(auth()->user()->status == 1){
            return redirect('my-account');
        }
        return view('user.subscriber_user.index');
    }

    public function store(Request $request)
    {
        $request->validate(['wallet_address'=>'required']);

        $admin = User::whereHas('roles', function ($q) {
            $q->where('slug', '=', 'admin');
        })->first();

        $amount = 50;
        
        $auth_user = Auth::User();
        
        SubscribeUser::updateOrCreate(
            ['user_id' =>$auth_user->id],
            ['status'  => 0]
        );

        // referral deduction will send to referral by user
        if(!empty(auth()->user()->referral_by) && $auth_user->referral_by != $auth_user->referral_link){

            $referral_by_user = User::where('referral_link',$auth_user->referral_by)->first();

            if($referral_by_user){

                $cut_percentage = 15; 

                // $percent_amount =  ($amount * $cut_percentage) / 100;

                $percent_amount = 15;
    
                $amount = $amount - $percent_amount;
    
                $referral_by_user->wallet = $referral_by_user->wallet + $percent_amount;
                $referral_by_user->referral_bonus = $referral_by_user->referral_bonus + $percent_amount;
    
                $referral_by_user->save();

                $referral = Referral::where('user_id','=',auth()->user()->id)->where('from_user','=',$referral_by_user->id)->first();

                if(!empty($referral)){
                    $bonus = $referral->amount + $percent_amount;
                    $referral->update(['amount' => $bonus]);
                }
            }
        }

        // adding into admin wallet
        $admin->wallet = $admin->wallet + $amount;

        $admin->save();

        // if (NowPayments::connected()){

        //     $payment = NowPayments::createPayment([
        //         'payment_id' => rand(1,9999),
        //         'payment_status' => 'waiting',
        //         // 'pay_address' => $request->input('wallet_address'),
        //         'price_amount' => $amount,
        //         'price_currency' => 'usd',
        //         // 'pay_amount' => 0.17070286,
        //         // 'pay_currency' => 'btc',
        //         // 'order_id' => 'RGDBP-21314',
        //         // 'order_description' => 'Apple Macbook Pro 2019 x 1',
        //         // 'ipn_callback_url' => 'https://nowpayments.io',
        //         // 'created_at' => '2020-12-22T15:00:22.742Z',
        //         // 'updated_at' => '2020-12-22T15:00:22.742Z',
        //         // 'purchase_id' => '5837122679',
        //       ]);

        //     dd("payment is creating");
        // }

        Deposit::create([
            'user_id' => $auth_user->id,
            'amount'  => $amount
        ]);

       $auth_user->transactions()->create([
            'user_id'       => $auth_user->id,
            'type'          => 'deposit',
            'amount'        =>  $amount,
            'description'   =>  ucwords( $auth_user->name ), ' has deposit '.$amount.' for registration'
        ]);


       
        $data = [
            'name'  => auth()->user()->name,
            'amount'  => $amount,
        ];

        $user = User::whereHas('roles', function ($q) {
            $q->where('slug', '=', 'admin');
        })->first();

        $user->notify(new UserSubscribeNotification($data));
        $user->notify(new UserDepositNotification($data));

        return redirect('subscriber_user')->with('success', 'Submited successfully');
    }
}
