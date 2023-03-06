<?php

namespace App\Http\Controllers\User;

use App\Models\Referral;
use App\Http\Requests\StoreReferralRequest;
use App\Http\Requests\UpdateReferralRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Referral Tree View';

        $referrals = Referral::where('id','=',auth()->user()->id)->latest()->get();

        $user = Auth::user();
        
        $level_1_users = User::where('referral_by','=',$user->referral_link)->latest()->get();

        $users = [];
        // $users = $level_1_users->toArray();

        foreach($level_1_users as $level_1_user){

            $level_1_user['level'] = 1;
            array_push($users,$level_1_user);
            
            $level_2_users = User::where('referral_by','=',$level_1_user->referral_link)->latest()->get();
            
            // $users = array_merge($users,$level_2_users->toArray());

            foreach($level_2_users as $level_2_user){

                $level_3_users = User::where('referral_by','=',$level_2_user->referral_link)->latest()->get();

                $level_2_user['level'] = 2;
                array_push($users,$level_2_user);

                // $level_2_user['level'] = 2;
                
                // $users->push($level_3_users);
                
                // $users = array_merge($users,$level_3_users->toArray());

                foreach($level_3_users as $level_3_user){

                    // $level_3_user['level'] = 3;

                    $level_4_users = User::where('referral_by','=',$level_3_user->referral_link)->latest()->get();

                    $level_3_user['level'] = 3;
                    array_push($users,$level_3_user);

                    // $users->push($level_4_users);
                    
                    foreach($level_4_users as $level_4_user){

                        // $level_4_user['level'] = 4;

                        $level_5_users = User::where('referral_by','=',$level_4_user->referral_link)->latest()->get();
                                
                        $level_4_user['level'] = 4;
                        array_push($users,$level_4_user);

                        // $users->push($level_5_users);

                        foreach($level_5_users as $level_5_user){

                            // $level_5_user['level'] = 5;

                            $level_6_users = User::where('referral_by','=',$level_5_user->referral_link)->latest()->get();
                            
                            $level_5_user['level'] = 5;
                            array_push($users,$level_5_user);

                            // $users->push($level_6_users);

                            foreach($level_6_users as $level_6_user){

                                // $level_5_user['level'] = 5;
    
                                $level_6_user['level'] = 6;
                                array_push($users,$level_6_user);
    
                                // $users->push($level_6_users);
    
                            }
                        }
                    }
                }
            }

        }

        // $filtered = $users->filter()->all();

        // $users = collect($filtered)->filter();

        return view ('user.referrals.index',compact('users','title'));
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
     * @param  \App\Http\Requests\StoreReferralRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReferralRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function show(Referral $referral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function edit(Referral $referral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReferralRequest  $request
     * @param  \App\Models\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReferralRequest $request, Referral $referral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referral $referral)
    {
        //
    }
}
