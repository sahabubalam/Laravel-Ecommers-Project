<?php

namespace App\Model\frontend;

use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    protected $fillable = [
        'name','email','phone','address'
    ];
}
