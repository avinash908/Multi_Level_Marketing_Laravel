<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\AccountRegisterNotification;
use App\Notifications\UserReferralNotification;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use UserReferralCode;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required'],
            'captcha' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $referral_by = '';

        if(session()->has('referral_by')){
            $referral_by = session()->get('referral_by');
        }
        // else{
        //     return redirect()->back()->with('danger','Please join with any referral link');
        // }

        $numcode = isset($data['phone_phoneCode']) == true ? $data['phone_phoneCode'] : '92';
        
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'wallet' => 0,
            'current_level' => 1,
            'current_rank' => 'normal_user',
            'phone' =>  $numcode + $data['phone'],
            'referral_bonus' => 0,
            'referral_link' => Hash::make($data['email']),
            'referral_by' => $referral_by,
            'password' => Hash::make($data['password']),
        ]);

        if(!empty($user->referral_by)){

            $referral_by_user = User::where('referral_link',$user->referral_by)->first();

            // Referral::create(['user_id'=> $user->id, 'from_user'=> $referral_by_user->id, 'status' => 1, 'amount' => 0]);
            
        }

        $data = [
            'name'  => $user->name,
            'message'=> ucwords($user->name) .' has registered new account'
        ];
    
        $admin = User::whereHas('roles', function ($q) {
            $q->where('slug', '=', 'admin');
        })->first();

        $admin->notify(new AccountRegisterNotification($data));


        $role = config('roles.models.role')::where('slug', '=', 'user')->first();
        $user->attachRole($role);

        return $user;
    }
}