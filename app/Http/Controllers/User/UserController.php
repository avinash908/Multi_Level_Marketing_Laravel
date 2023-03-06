<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Annoucement;
use App\Models\Referral;
use App\Models\User;
use App\Models\UserSurvey;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $annoucements = Annoucement::latest()->limit(5)->get();
        $referrals = Referral::where('from_user','=',auth()->user()->id)->limit(5)->get();
        $completed_withdraws = Withdraw::where('user_id','=',auth()->user()->id)->where('status','=','completed')->get();
        $pending_withdraws = Withdraw::where('user_id','=',auth()->user()->id)->where('status','=','pending')->get();

        $rising_stars = User::where('referral_by','=',auth()->user()->referral_link)->where('current_rank','=','rising_star')->get();
        $players = User::where('referral_by','=',auth()->user()->referral_link)->where('current_rank','=','player')->get();
        $professionals = User::where('referral_by','=',auth()->user()->referral_link)->where('current_rank','=','professional')->get();
        $executives = User::where('referral_by','=',auth()->user()->referral_link)->where('current_rank','=','executive')->get();
        $ambassadors = User::where('referral_by','=',auth()->user()->referral_link)->where('current_rank','=','ambassador')->get();

        $user = auth()->user();
        if($user->current_rank == 'normal_user' && $user->level_1_users_count >= 10){
            $current_rank = 'rising_star';
            $user->current_rank = $current_rank;
        }
        elseif($user->current_rank == 'rising_star' && count($rising_stars) >= 10){
            $current_rank = 'player';
            $user->current_rank = $current_rank;
        }
        elseif($user->current_rank == 'player' && count($players) >= 10){
            $current_rank = 'professional';
            $user->current_rank = $current_rank;
        }
        elseif($user->current_rank == 'professional' && count($professionals) >= 10){
            $current_rank = 'executive';
            $user->current_rank = $current_rank;
        }
        elseif($user->current_rank == 'executive' && count($executives) >= 10){
            $current_rank = 'ambassador';
            $user->current_rank = $current_rank;
        }
        elseif($user->current_rank == 'ambassador' && count($ambassadors) >= 10){
            $current_rank = 'crown_ambassador';
            $user->current_rank = $current_rank;
         }


        $user->save();

        return view('user.dashboard',compact('title','annoucements','referrals','completed_withdraws','pending_withdraws','rising_stars','players','professionals','executives','ambassadors'));
    }
}
