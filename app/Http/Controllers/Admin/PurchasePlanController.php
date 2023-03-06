<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPackage;
use App\Notifications\PlanApprovalNotification;

class PurchasePlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage.packages');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Purchased Plans";
        $purchase_plan = UserPackage::latest()->get();
        return view('admin.purchase_plan.index', compact('purchase_plan', 'title'));
    }

    public function approve($id)
    {
        $plan = UserPackage::findOrFail($id);

        $user = User::findOrFail($plan->user_id);

        $plan_amount = $plan->amount;

        $sent_manager_amount = false;

        if (!empty($user->referral_by)) {

            $referral_by_user1 = User::where('referral_link', $user->referral_by)->first();

            // if($referral_by_user1->current_level <= 1){

            $plan_amount = $plan_amount - 100;

            if ($referral_by_user1->is_manager == 1  && $sent_manager_amount == false) {

                $manager = $referral_by_user1;
                $manager_id = $referral_by_user1->id;

                $manager->manager_amount = $manager->manager_amount + 10;

                $plan_amount =  $plan_amount - 10;

                $manager->save();

                $sent_manager_amount = true;
            }

            $reffer_user_level_1_amount = $referral_by_user1->level_1_amount + 100;

            $referral_by_user1->level_1_amount = $reffer_user_level_1_amount;

            $referral_by_user1->level_1_users_count = $referral_by_user1->level_1_users_count + 1;


            if ($referral_by_user1->level_1_users_count >= 10) {

                $referral_by_user1->current_level = 2;
                $referral_by_user1->current_rank = 'rising_star';
            }

            $referral_by_user1->save();
            
            $referral_by_user1->transactions()->create([
                'type'=>'referral',
                'amount'=> 100,
                'description'=> 'referral Rs: 100 bonus from '.$user->email.' level 1 user'
            ]);

            if (!empty($referral_by_user1->referral_by)) {

                $referral_by_user2 = User::where('referral_link', $referral_by_user1->referral_by)->first();

                // if($referral_by_user2->current_level == 2){

                if ($referral_by_user2->is_manager == 1 && $sent_manager_amount == false) {
                    $manager = $referral_by_user2;
                    $manager_id = $referral_by_user2->id;

                    $manager->manager_amount = $manager->manager_amount + 10;

                    $plan_amount =  $plan_amount - 10;
    
                    $manager->save();
    
                    $sent_manager_amount = true;

                }

                $plan_amount = $plan_amount - 50;

                $reffer_user_level_2_amount = $referral_by_user2->level_2_amount + 50;

                $referral_by_user2->level_2_amount = $reffer_user_level_2_amount;

                $referral_by_user2->level_2_users_count = $referral_by_user2->level_2_users_count + 1;


                if ($referral_by_user2->level_2_users_count >= 100) {

                    $referral_by_user2->current_level = 3;
                    $referral_by_user2->current_rank = 'player';
                }

                $referral_by_user2->save();

                $referral_by_user2->transactions()->create([
                    'type'=>'referral',
                    'amount'=> 50,
                    'description'=> 'referral Rs: 50 bonus from '.$user->email.' level 2 user'
                ]);

                // }
                // check level 2
                if (!empty($referral_by_user2->referral_by)) {

                    $referral_by_user3 = User::where('referral_link', $referral_by_user2->referral_by)->first();

                    // if($referral_by_user3->current_level == 3){

                    if ($referral_by_user3->is_manager == 1 && $sent_manager_amount == false) {

                        $manager = $referral_by_user3;
                        $manager_id = $referral_by_user3->id;

                        $manager->manager_amount = $manager->manager_amount + 10;

                        $plan_amount =  $plan_amount - 10;
        
                        $manager->save();
        
                        $sent_manager_amount = true;

                    }

                    $plan_amount = $plan_amount - 25;

                    $reffer_user_level_3_amount = $referral_by_user3->level_3_amount + 25;

                    $referral_by_user3->level_3_amount = $reffer_user_level_3_amount;

                    $referral_by_user3->level_3_users_count = $referral_by_user3->level_3_users_count + 1;


                    if ($referral_by_user3->level_3_users_count >= 1000) {

                        $referral_by_user3->current_level = 3;
                        $referral_by_user3->current_rank = 'professional';
                    }

                    $referral_by_user3->save();

                    $referral_by_user3->transactions()->create([
                        'type'=>'referral',
                        'amount'=> 25,
                        'description'=> 'referral Rs: 25 bonus from '.$user->email.' level 3 user'
                    ]);

                    // }
                    // check level 3
                    if (!empty($referral_by_user3->referral_by)) {

                        $referral_by_user4 = User::where('referral_link', $referral_by_user3->referral_by)->first();

                        // if($referral_by_user4->current_level == 4){

                        if ($referral_by_user4->is_manager == 1 && $sent_manager_amount == false) {

                            $manager = $referral_by_user4;
                            $manager_id = $referral_by_user4->id;

                            $manager->manager_amount = $manager->manager_amount + 10;

                            $plan_amount =  $plan_amount - 10;
            
                            $manager->save();
            
                            $sent_manager_amount = true;
                        }

                        $plan_amount = $plan_amount - 25;

                        $reffer_user_level_4_amount = $referral_by_user4->level_4_amount + 25;

                        $referral_by_user4->level_4_amount = $reffer_user_level_4_amount;

                        $referral_by_user4->level_4_users_count = $referral_by_user4->level_4_users_count + 1;


                        if ($referral_by_user4->level_4_users_count >= 10000) {

                            $referral_by_user4->current_level = 4;
                            $referral_by_user4->current_rank = 'executive';
                        }

                        $referral_by_user4->save();

                        $referral_by_user4->transactions()->create([
                            'type'=>'referral',
                            'amount'=> 25,
                            'description'=> 'referral Rs: 25 bonus from '.$user->email.' level 4 user'
                        ]);

                        // }
                        // check level 4
                        if (!empty($referral_by_user4->referral_by)) {

                            $referral_by_user5 = User::where('referral_link', $referral_by_user4->referral_by)->first();

                            // if($referral_by_user5->current_level == 5){

                            if ($referral_by_user5->is_manager == 1 && $sent_manager_amount == false) {

                                $manager = $referral_by_user5;
                                $manager_id = $referral_by_user5->id;

                                $manager->manager_amount = $manager->manager_amount + 10;

                                $plan_amount =  $plan_amount - 10;
                
                                $manager->save();
                
                                $sent_manager_amount = true;

                            }

                            $plan_amount = $plan_amount - 20;

                            $reffer_user_level_5_amount = $referral_by_user5->level_5_amount + 20;

                            $referral_by_user5->level_5_amount = $reffer_user_level_5_amount;

                            $referral_by_user5->level_5_users_count = $referral_by_user5->level_5_users_count + 1;


                            if ($referral_by_user5->level_5_users_count >= 100000) {

                                $referral_by_user5->current_level = 5;
                                $referral_by_user5->current_rank = 'ambassador';
                            }

                            $referral_by_user5->save();
                            
                            $referral_by_user5->transactions()->create([
                                'type'=>'referral',
                                'amount'=> 20,
                                'description'=> 'referral Rs: 20 bonus from '.$user->email.' level 5 user'
                            ]);

                            // }
                            // check level 5
                            if (!empty($referral_by_user5->referral_by)) {

                                $referral_by_user6 = User::where('referral_link', $referral_by_user5->referral_by)->first();

                                // if($referral_by_user6->current_level == 6){

                                if ($referral_by_user6->is_manager == 1  && $sent_manager_amount == false) {

                                    $manager = $referral_by_user6;
                                    $manager_id = $referral_by_user6->id;

                                    $manager->manager_amount = $manager->manager_amount + 10;

                                    $plan_amount =  $plan_amount - 10;
                    
                                    $manager->save();
                    
                                    $sent_manager_amount = true;
                                }

                                $plan_amount = $plan_amount - 20;

                                $reffer_user_level_6_amount = $referral_by_user6->level_6_amount + 20;

                                $referral_by_user6->level_6_amount = $reffer_user_level_6_amount;

                                $referral_by_user6->level_6_users_count = $referral_by_user6->level_6_users_count + 1;


                                if ($referral_by_user6->level_5_users_count >= 100000) {

                                    $referral_by_user6->current_level = 6;
                                    $referral_by_user6->current_rank = 'crown_ambassador';
                                }

                                $referral_by_user6->save();

                                $referral_by_user6->transactions()->create([
                                    'type'=>'referral',
                                    'amount'=> 20,
                                    'description'=> 'referral Rs: 20 bonus from '.$user->email.' level 6 user'
                                ]);

                                // }
                                // check  level

                                if (!empty($referral_by_user6->referral_by)) {

                                    $referral_by_user7 = User::where('referral_link', $referral_by_user6->referral_by)->first();

                                    if ($referral_by_user7->is_manager == 1 && $sent_manager_amount == false) {

                                        $manager = $referral_by_user7;
                                        $manager_id = $referral_by_user7->id;

                                        $manager->manager_amount = $manager->manager_amount + 10;

                                        $plan_amount =  $plan_amount - 10;
                        
                                        $manager->save();
                        
                                        $sent_manager_amount = true;
                                    }

                                    if (!empty($referral_by_user7->referral_by)) {

                                        $referral_by_user8 = User::where('referral_link', $referral_by_user7->referral_by)->first();

                                        if ($referral_by_user8->is_manager == 1 && $sent_manager_amount == false) {

                                            $manager = $referral_by_user8;
                                            $manager_id = $referral_by_user8->id;

                                            $manager->manager_amount = $manager->manager_amount + 10;

                                            $plan_amount =  $plan_amount - 10;
                            
                                            $manager->save();
                            
                                            $sent_manager_amount = true;
                                        }

                                        if (!empty($referral_by_user8->referral_by)) {

                                            $referral_by_user9 = User::where('referral_link', $referral_by_user8->referral_by)->first();

                                            if ($referral_by_user9->is_manager == 1  && $sent_manager_amount == false) {

                                                $manager = $referral_by_user9;
                                                $manager_id = $referral_by_user9->id;

                                                $manager->manager_amount = $manager->manager_amount + 10;

                                                $plan_amount =  $plan_amount - 10;
                                
                                                $manager->save();
                                
                                                $sent_manager_amount = true;
                                            }

                                            if (!empty($referral_by_user9->referral_by)) {

                                                $referral_by_user10 = User::where('referral_link', $referral_by_user9->referral_by)->first();

                                                if ($referral_by_user10->is_manager == 1 && $sent_manager_amount == false) {

                                                    $manager = $referral_by_user10;
                                                    $manager_id = $referral_by_user10->id;

                                                    $manager->manager_amount = $manager->manager_amount + 10;

                                                    $plan_amount =  $plan_amount - 10;
                                    
                                                    $manager->save();
                                    
                                                    $sent_manager_amount = true;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            // }
            // check level
        }

        $plan->status = 'active';

        $plan->save();

        $admin = User::whereHas('roles', function ($q) {
            $q->where('slug', '=', 'admin');
        })->first();

        $admin->wallet = $admin->wallet + $plan->amount;

        $admin->save();

        $user->status = 1;

        $user->save();

        $data = ['plan_title'  => $plan->package->title];

        $user->notify(new PlanApprovalNotification($data));

        $user->transactions()->create([
            'user_id'       => $user->id,
            'type'          => 'plan_purchased',
            'amount'        =>  $plan->amount,
            'description'   =>  ucwords($user->name ). ' has deposit Rs: '.$plan->amount.' for activation'
        ]);

        return redirect('/purchase_plans')->with('success', 'Plan has been activated');
    }

    // public function approve_old($id)
    // {   
    //     $plan = UserPackage::findOrFail($id);

    //     $user = User::findOrFail($plan->user_id);

    //     $plan_amount = $plan->amount;

    //     if(!empty($user->referral_by)){

    //         $referral_by_user1 = User::where('referral_link',$user->referral_by)->first();

    //         if($referral_by_user1->current_level <= 1){

    //             $plan_amount = $plan_amount - 100;

    //             $reffer_user_level_1_amount = $referral_by_user1->level_1_amount + 100;

    //             $referral_by_user1->level_1_amount = $reffer_user_level_1_amount;

    //             $referral_by_user1->level_1_users_count = $referral_by_user1->level_1_users_count + 1;


    //             if($referral_by_user1->level_1_users_count >= 10){

    //                 $referral_by_user1->current_level = 2;
    //                 $referral_by_user1->current_rank = 'rising_star'; 

    //             }

    //             $referral_by_user1->save();

    //             if(!empty($referral_by_user1->referral_by)){

    //                 $referral_by_user2 = User::where('referral_link',$referral_by_user1->referral_by)->first();

    //                 if($referral_by_user2->current_level == 2){

    //                     $plan_amount = $plan_amount - 50;

    //                     $reffer_user_level_2_amount = $referral_by_user2->level_2_amount + 50;

    //                     $referral_by_user2->level_2_amount = $reffer_user_level_2_amount;

    //                     $referral_by_user2->level_2_users_count = $referral_by_user2->level_2_users_count + 1;


    //                     if($referral_by_user2->level_2_users_count >= 100){

    //                         $referral_by_user2->current_level = 3;
    //                         $referral_by_user2->current_rank = 'player'; 

    //                     }

    //                     $referral_by_user2->save();

    //                 }

    //                 if(!empty($referral_by_user2->referral_by)){

    //                     $referral_by_user3 = User::where('referral_link',$referral_by_user2->referral_by)->first();

    //                     if($referral_by_user3->current_level == 3){

    //                         $plan_amount = $plan_amount - 25;

    //                         $reffer_user_level_3_amount = $referral_by_user3->level_3_amount + 25;

    //                         $referral_by_user3->level_3_amount = $reffer_user_level_3_amount;

    //                         $referral_by_user3->level_3_users_count = $referral_by_user3->level_3_users_count + 1;


    //                         if($referral_by_user3->level_3_users_count >= 1000){

    //                             $referral_by_user3->current_level = 3;
    //                             $referral_by_user3->current_rank = 'professional'; 

    //                         }

    //                         $referral_by_user3->save();


    //                     }

    //                     if(!empty($referral_by_user3->referral_by)){

    //                         $referral_by_user4 = User::where('referral_link',$referral_by_user3->referral_by)->first();

    //                         if($referral_by_user4->current_level == 4){

    //                             $plan_amount = $plan_amount - 25;

    //                             $reffer_user_level_4_amount = $referral_by_user4->level_4_amount + 25;

    //                             $referral_by_user4->level_4_amount = $reffer_user_level_4_amount;

    //                             $referral_by_user4->level_4_users_count = $referral_by_user4->level_4_users_count + 1;


    //                             if($referral_by_user4->level_4_users_count >= 10000){

    //                                 $referral_by_user4->current_level = 4;
    //                                 $referral_by_user4->current_rank = 'executive'; 

    //                             }

    //                             $referral_by_user4->save();


    //                         }

    //                         if(!empty($referral_by_user4->referral_by)){

    //                             $referral_by_user5 = User::where('referral_link',$referral_by_user4->referral_by)->first();

    //                             if($referral_by_user5->current_level == 5){

    //                                 $plan_amount = $plan_amount - 20;

    //                                 $reffer_user_level_5_amount = $referral_by_user5->level_5_amount + 25;

    //                                 $referral_by_user5->level_5_amount = $reffer_user_level_5_amount;

    //                                 $referral_by_user5->level_5_users_count = $referral_by_user5->level_5_users_count + 1;


    //                                 if($referral_by_user5->level_5_users_count >= 100000){

    //                                     $referral_by_user5->current_level = 5;
    //                                     $referral_by_user5->current_rank = 'ambassador'; 

    //                                 }

    //                                 $referral_by_user5->save();


    //                             }

    //                             if(!empty($referral_by_user5->referral_by)){

    //                                 $referral_by_user6 = User::where('referral_link',$referral_by_user5->referral_by)->first();

    //                                 if($referral_by_user6->current_level == 5){

    //                                     $plan_amount = $plan_amount - 20;

    //                                     $reffer_user_level_6_amount = $referral_by_user6->level_6_amount + 25;

    //                                     $referral_by_user6->level_6_amount = $reffer_user_level_6_amount;

    //                                     $referral_by_user6->level_6_users_count = $referral_by_user6->level_6_users_count + 1;


    //                                     if($referral_by_user6->level_5_users_count >= 100000){

    //                                         $referral_by_user6->current_level = 6;
    //                                         $referral_by_user6->current_rank = 'crown_ambassador'; 

    //                                     }

    //                                     $referral_by_user6->save();


    //                                 }

    //                             }

    //                         }

    //                     }

    //                 }

    //             }

    //         }

    //     }

    //     $plan->status = 'active';

    //     $plan->save();

    //     $admin = User::whereHas('roles', function ($q) {
    //         $q->where('slug', '=', 'admin');
    //     })->first();

    //     $admin->wallet = $admin->wallet + $plan->amount;

    //     $admin->save();

    //     $user->status = 1;

    //     $user->save();

    //     return redirect('/purchase_plans')->with('success','Plan has been activated');
    // }



}
