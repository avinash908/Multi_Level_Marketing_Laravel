<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Referral extends Model
{
    protected $fillable = ['from_user','user_id','amount','status'];
    use HasFactory;
    use SoftDeletes;

    public function to_user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function from_user()
    {
        return $this->belongsTo('App\Models\User','from_user');
    }

    public function from()
    {
        return $this->belongsTo('App\Models\User','from_user');
    }
}
