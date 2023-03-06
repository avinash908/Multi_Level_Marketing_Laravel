<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MoneyTransfer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['from_user_id', 'to_user_id', 'amount', 'status'];

    public function from_user()
    {
        return $this->belongsTo('App\Models\User','from_user_id');
    }

    public function to_user()
    {
        return $this->belongsTo('App\Models\User','to_user_id');
    }
}
