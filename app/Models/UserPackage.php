<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPackage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =  [ 'user_id', 'package_id', 'amount', 'status', 'proof'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }
}
