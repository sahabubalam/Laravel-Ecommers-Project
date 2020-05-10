<?php

namespace App\Model\frontend;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $fillable = [
        'order_id','product_id','product_name','product_image','product_price','product_quantity'
    ];
}

