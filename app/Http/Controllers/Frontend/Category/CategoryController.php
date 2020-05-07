<?php

namespace App\Http\Controllers\Frontend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use DB;

class CategoryController extends Controller
{
    //show category list

    public function Category()
    {
        $category=Category::all();
        return view('welcome',compact('category'));
    }
    //show category

    
}
