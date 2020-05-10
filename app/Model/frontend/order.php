<?php

namespace App\Model\frontend;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'user_id','shipping_id','total_price','payment_type'
    ];
}
