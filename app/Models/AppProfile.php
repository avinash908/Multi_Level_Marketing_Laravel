<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppProfile extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['logo', 'email','telephone','mobile','address','facebook','intro','instagram','whatsapp','all_members','total_deposit','world_country', 'internal_money_transfer'];
}
