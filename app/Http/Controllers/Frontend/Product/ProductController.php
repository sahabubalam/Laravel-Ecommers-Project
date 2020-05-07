<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use DB;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function UserProfile()
    {
        return view('frontend.profile.profile');
    }
    public function Product($id)
    {
        $newproduct=DB::table('products')
                ->join('categories','products.category_id','categories.id')
                ->join('subcategories','products.subcategory_id','subcategories.id')
                ->join('brands','products.brand_id','brands.id')
                ->select('products.*')
                ->where('products.category_id','=',$id)
                ->where('products.status','=','1')
                ->get();
        $product=DB::table('products')
                ->join('categories','products.category_id','categories.id')
                ->join('subcategories','products.subcategory_id','subcategories.id')
                ->join('brands','products.brand_id','brands.id')
                ->select('products.*')
                ->where('products.category_id','=',$id)
                ->get();
                return view('frontend.category.separate_category',compact('product','newproduct'));
    }
    //cart product
    public function CartProduct($id)
    {
        $cart=DB::table('products')->where('id',$id)->get();
        return view('frontend.cart.cart',compact('cart'));
    }
   
    
}
