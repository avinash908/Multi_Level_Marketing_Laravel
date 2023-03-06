<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentAccount extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['account_name','account_number','account_holder_name','description','status'];
}
