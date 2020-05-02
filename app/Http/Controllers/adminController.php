<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use app\Admin;

class adminController extends Controller
{
    
    public function index()
    {
        return view('admin.index');
    }
}
