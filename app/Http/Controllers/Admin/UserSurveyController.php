<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use App\Models\User;
use App\Models\UserSurvey;
use Illuminate\Http\Request;

class UserSurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = UserSurvey::latest()->get();
        return view('admin.user_surveys.index',compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $admin = User::whereHas('roles', function ($q) {
            $q->where('slug', '=', 'admin');
        })->first();

        $survey = UserSurvey::findOrFail($id);

        $user = User::findOrFail($survey->user_id);

        $amount = $survey->amount;
        
        // referral deduction will send to referral by user
        if(!empty($user->referral_by) && $user->referral_by != $user->referral_link){

            $referral_by_user = User::where('referral_link',$user->referral_by)->first();

            if($referral_by_user){

                $cut_percentage = 2; 

                $percent_amount =  ($amount * $cut_percentage) / 100;
    
                $amount = $amount - $percent_amount;
    
                $referral_by_user->wallet = $referral_by_user->wallet + $percent_amount;
                $referral_by_user->referral_bonus = $referral_by_user->referral_bonus + $percent_amount;
    
                $referral_by_user->save();

                $referral = Referral::where('user_id','=',$user->id)->where('from_user','=',$referral_by_user->id)->first();

                if(!empty($referral)){
                    $bonus = $referral->amount + $percent_amount;
                    $referral->update(['amount' => $bonus]);
                }
            }
        }

        $survey->update(['status'=> 'completed']);

        // subtract from admin wallet
        $admin->wallet = $admin->wallet - $amount;
        $admin->save();

        // adding into user wallet
        $user->wallet = $user->wallet + $amount;
        $user->save();

        return redirect()->route('user_completed_surveys.index')->with('success',__('Survey status has been changed to completed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
