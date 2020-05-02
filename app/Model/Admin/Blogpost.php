<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{
    protected $fillable = [
        'category_id','post_title_eng','post_title_bng','post_image','post_details_eng','post_details_bng'
    ];
}
