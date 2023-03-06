<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    use HasRoleAndPermission;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','wallet', 'status', 'referral_bonus', 'referral_link','referral_by', 'phone', 'current_rank', 'current_level', 'total_referrals',
        'level_1_amount',
        'level_2_amount',
        'level_3_amount',
        'level_4_amount',
        'level_5_amount',
        'level_6_amount',

        'level_1_users_count',
        'level_2_users_count',
        'level_3_users_count',
        'level_4_users_count',
        'level_5_users_count',
        'level_6_users_count',

        'is_manager',
        'manager_amount',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function packages()
    {
        return $this->hasMany('App\Models\UserPackage');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    public function withdraws()
    {
        return $this->hasMany('App\Models\Withdraw');
    }

    public function deposits()
    {
        return $this->hasMany('App\Models\Deposit');
    }
}
