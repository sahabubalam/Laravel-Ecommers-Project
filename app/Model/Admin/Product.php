<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id','subcategory_id','brand_id','product_name','product_image','product_code','product_quantity','status'
    ];
}
