<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Withdraw extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id','status','amount','account_name','account_holder_name','account_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
