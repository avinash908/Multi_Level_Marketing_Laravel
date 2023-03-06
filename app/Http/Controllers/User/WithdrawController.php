<?php

namespace App\Http\Controllers\User;

use App\Models\Withdraw;
use App\Http\Requests\StoreWithdrawRequest;
use App\Http\Requests\UpdateWithdrawRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;



use App\Notifications\WithdrawNotification;

class WithdrawController extends Controller
{
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
                $withdraws = Withdraw::where('user_id','=', auth()->user()->id)->where('status','=','pending')->latest()->get();
            break;

            case 'rejected':  
                $withdraws = Withdraw::where('user_id','=', auth()->user()->id)->where('status','=','rejected')->latest()->get();
            break;

            case 'completed':  
                $withdraws = Withdraw::where('user_id','=', auth()->user()->id)->where('status','=','completed')->latest()->get();
            break;
            
            default:
            $withdraws = Withdraw::where('user_id','=', auth()->user()->id)->latest()->get();
            break;
        }

        // $withdraws = Withdraw::where('user_id','=', auth()->user()->id)->where('status','=','pending')->latest()->get();

        return view('user.withdraws.index',compact('withdraws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function level_withdraw(Request $request)
    {

        $request->validate(['amount'=>'required|int']);
        
        $level = $request->input('level');

        if($level == 1){

            if(auth()->user()->level_1_amount < $request->input('amount')){
                return redirect()->back()->with('danger','Insufficient Balance in Level 1');
            }
            
            $new_level_1_amount = auth()->user()->level_1_amount - $request->input('amount');

            $new_wallet_balance = auth()->user()->wallet + $request->input('amount');

            auth()->user()->update(['wallet'=>$new_wallet_balance, 'level_1_amount' => $new_level_1_amount]);

            auth()->user()->transactions()->create([
                'user_id'       => auth()->user()->id,
                'type'          => 'transfer_money_to_cash_wallet',
                'amount'        =>  $request->input('amount'),
                'description'   =>  ucwords(auth()->user()->name ), ' has transfered  Rs: '. $request->input('amount').' from level 1 income into to cash wallet'
            ]);

            return redirect()->back()->with('success','Withdraw done! amount has been transfered into cash wallet');
        }

        if($level == 2 && auth()->user()->current_level == 2){

            if(auth()->user()->level_2_amount < $request->input('amount')){
                return redirect()->back()->with('danger','Insufficient Balance in Level 2');
            }
            
            $new_level_2_amount = auth()->user()->level_2_amount - $request->input('amount');

            $new_wallet_balance = auth()->user()->wallet + $request->input('amount');

            auth()->user()->update(['wallet'=>$new_wallet_balance, 'level_2_amount' => $new_level_2_amount]);

            auth()->user()->transactions()->create([
                'user_id'       => auth()->user()->id,
                'type'          => 'transfer_money_to_cash_wallet',
                'amount'        =>  $request->input('amount'),
                'description'   =>  ucwords(auth()->user()->name ), ' has transfered  Rs: '. $request->input('amount').' from level 2 income into to cash wallet'
            ]);

            return redirect()->back()->with('success','Withdraw done! amount has been transfered into cash wallet');
        }

        $rising_stars = User::where('referral_by',auth()->user()->referral_link)->where('current_rank','=','rising_star')->get();

        if($level > 2 && (auth()->user()->current_level >= 3 && count($rising_stars) >= 5)){

            if($level == 3 && auth()->user()->current_level == 3){

                if(auth()->user()->level_3_amount < $request->input('amount')){
                    return redirect()->back()->with('danger','Insufficient Balance in Level 3');
                }
                
                $new_level_3_amount = auth()->user()->level_3_amount - $request->input('amount');
    
                $new_wallet_balance = auth()->user()->wallet + $request->input('amount');
    
                auth()->user()->update(['wallet'=>$new_wallet_balance, 'level_3_amount' => $new_level_3_amount]);
                
                auth()->user()->transactions()->create([
                    'user_id'       => auth()->user()->id,
                    'type'          => 'transfer_money_to_cash_wallet',
                    'amount'        =>  $request->input('amount'),
                    'description'   =>  ucwords(auth()->user()->name ), ' has transfered  Rs: '. $request->input('amount').' from level 3 income into to cash wallet'
                ]);

                return redirect()->back()->with('success','Withdraw done! amount has been transfered into cash wallet');
            }
            
            if($level == 4 && auth()->user()->current_level == 4){

                if(auth()->user()->level_4_amount < $request->input('amount')){
                    return redirect()->back()->with('danger','Insfufficient Balance in Level 4');
                }
                
                $new_level_4_amount = auth()->user()->level_4_amount - $request->input('amount');
    
                $new_wallet_balance = auth()->user()->wallet + $request->input('amount');
    
                auth()->user()->update(['wallet'=>$new_wallet_balance, 'level_4_amount' => $new_level_4_amount]);
                
                auth()->user()->transactions()->create([
                    'user_id'       => auth()->user()->id,
                    'type'          => 'transfer_money_to_cash_wallet',
                    'amount'        =>  $request->input('amount'),
                    'description'   =>  ucwords(auth()->user()->name ), ' has transfered  Rs: '. $request->input('amount').' from level 4 income into to cash wallet'
                ]);

                return redirect()->back()->with('success','Withdraw done! amount has been transfered into cash wallet');
            }

            if($level == 5 && auth()->user()->current_level == 5){

                if(auth()->user()->level_5_amount < $request->input('amount')){
                    return redirect()->back()->with('danger','Insufficient Balance in Level 5');
                }
                
                $new_level_5_amount = auth()->user()->level_5_amount - $request->input('amount');
    
                $new_wallet_balance = auth()->user()->wallet + $request->input('amount');
    
                auth()->user()->update(['wallet'=>$new_wallet_balance, 'level_5_amount' => $new_level_5_amount]);
                
                auth()->user()->transactions()->create([
                    'user_id'       => auth()->user()->id,
                    'type'          => 'transfer_money_to_cash_wallet',
                    'amount'        =>  $request->input('amount'),
                    'description'   =>  ucwords(auth()->user()->name ), ' has transfered  Rs: '. $request->input('amount').' from level 5 income into to cash wallet'
                ]);

                return redirect()->back()->with('success','Withdraw done! amount has been transfered into cash wallet');
            }
            if($level == 6 && auth()->user()->current_level == 6){

                if(auth()->user()->level_6_amount < $request->input('amount')){
                    return redirect()->back()->with('danger','Insufficient Balance in Level 6');
                }
                
                $new_level_6_amount = auth()->user()->level_6_amount - $request->input('amount');
    
                $new_wallet_balance = auth()->user()->wallet + $request->input('amount');
    
                auth()->user()->update(['wallet'=>$new_wallet_balance, 'level_6_amount' => $new_level_6_amount]);
                
                auth()->user()->transactions()->create([
                    'user_id'       => auth()->user()->id,
                    'type'          => 'transfer_money_to_cash_wallet',
                    'amount'        =>  $request->input('amount'),
                    'description'   =>  ucwords(auth()->user()->name ), ' has transfered  Rs: '. $request->input('amount').' from level 6 income into to cash wallet'
                ]);

                return redirect()->back()->with('success','Withdraw done! amount has been transfered into cash wallet');
            }
            
        }
        
        if($level == 10  && auth()->user()->is_manager == 1){

            if(auth()->user()->manager_amount < $request->input('amount')){
                return redirect()->back()->with('danger','Insufficient Balance in Manager Income');
            }

            if(auth()->user()->manager_amount < 2500){
                return redirect()->back()->with('danger','Manager cannot withdraw if amount is less than 5000 PKR');
            }
            
            $new_manager_amount = auth()->user()->manager_amount - $request->input('amount');

            $new_wallet_balance = auth()->user()->wallet + $request->input('amount');

            auth()->user()->update(['wallet'=>$new_wallet_balance, 'manager_amount' => $new_manager_amount]);

            auth()->user()->transactions()->create([
                'user_id'       => auth()->user()->id,
                'type'          => 'transfer_money_to_cash_wallet',
                'amount'        =>  $request->input('amount'),
                'description'   =>  ucwords(auth()->user()->name ), ' has transfered  Rs: '. $request->input('amount').' from manager income into to cash wallet'
            ]);

            return redirect()->back()->with('success','Withdraw done! amount has been transfered into cash wallet');
        }
    }

    public function create()
    {
        return view('user.withdraws.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWithdrawRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWithdrawRequest $request)
    {
        $price = $request->input('price');

        if($price < 100)
        {
            return back()->with('success', __('Minimum withdraw is 100'));
        }

        if($price > auth()->user()->wallet)
        {
            return back()->with('success',  __('Insufficient balance for withdraw'));
        }

        Withdraw::create([
            'user_id' => auth()->user()->id,
            'account_holder_name' => $request->input('account_holder_name'),
            'account_name' => $request->input('account_name'),
            'account_number' => $request->input('account_number'),
            'amount' => $price,
            'status' => 'pending',
        ]);

        
        $data = [
            'name'  => auth()->user()->name,
            'amount'  => $price,
        ];

        $user = User::whereHas('roles', function ($q) {
            $q->where('slug', '=', 'admin');
        })->first();

        $user->notify(new WithdrawNotification($data));

        return redirect('user_withdraws')->with('success', __('Withdraw has been Created'));
    }
}
