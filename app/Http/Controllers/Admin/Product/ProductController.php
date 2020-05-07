<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Model\Admin\Brand;
use App\Model\Admin\Blogpost;
use App\Model\Admin\Subcategory;
use App\Model\Admin\Product;
use DB;

class ProductController extends Controller
{
    //product form

    public function Product()
    {
        $category=Category::all();
        $brand=Brand::all();
        $subcategory=Subcategory::all();
        return view('admin.product.addproduct',compact('category','brand','subcategory'));
    }
    //store product

    public function StoreProduct(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required', 
            'subcategory_id' => 'required', 
            'brand_id' => 'required', 
            'product_name' => 'required|max:50', 
             
            'product_image' => ' mimes:jpeg,jpg,png,PNG | max:1000',
            'product_code' => 'required|max:50',
            'product_quantity' => 'required|max:50',
            'price' => 'required|max:100',
         
        ]);
        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id; 
        $data['brand_id']=$request->brand_id;
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['product_quantity']=$request->product_quantity;
        $data['price']=$request->price;
        $data['status']=$request->status;

        $image=$request->file('product_image');
        if ($image) {
    		$image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/products/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['product_image']=$image_url;
            DB::table('products')->insert($data);
            echo "success";
            $notification = array(
              'message' => 'Blogposts inserted successfully!',
              'alert-type' => 'success'
          );
          return back()->with($notification);
          
        }else{
            DB::table('products')->insert();
            echo "success";
            $notification = array(
              'message' => 'Blogposts inserted successfully!',
              'alert-type' => 'success'
          );
          return back()->with($notification);
        }
        
    }
    //Show all product

    public function AllProduct()
    {
        $product=DB::table('products')
                  ->join('categories','products.category_id','categories.id')
                  ->join('subcategories','products.subcategory_id','subcategories.id')
                  ->join('brands','products.brand_id','brands.id')
                  ->select('products.*','categories.category_name','subcategories.subcategory_name','brands.brand_name')
                  ->get();
        return view('admin.product.allproduct',compact('product'));
    }

    //edit product

    public function EditProduct($id)
    {
        $category=Category::all();
        $subcategory=Subcategory::all();
        $brand=Brand::all();
        $product=DB::table('products')->where('id',$id)->first();
        return view('admin.product.edit_product',compact('product','category','subcategory','brand'));
    }
    //update product
    public function UpdateProduct(Request $request,$id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required', 
            'subcategory_id' => 'required', 
            'brand_id' => 'required', 
            'product_name' => 'required|max:50', 
             
            'product_image' => ' mimes:jpeg,jpg,png,PNG | max:1000',
            'product_code' => 'required|max:50',
            'product_quantity' => 'required|max:50',
            'price' => 'required|max:50',
         
        ]);
        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id; 
        $data['brand_id']=$request->brand_id;
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['product_quantity']=$request->product_quantity;
        $data['price']=$request->price;
        $data['status']=$request->status;

        $image=$request->file('product_image');
        if ($image) {
    		$image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/products/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['product_image']=$image_url;
            unlink($request->old_image);
            DB::table('products')->where('id',$id)->update($data);
            echo "success";
            $notification = array(
              'message' => 'Products updated successfully!',
              'alert-type' => 'success'
          );
          return back()->with($notification);
          
        }else{
            $data['post_image']=$request->old_image;
            DB::table('products')->where('id',$id)->update($data);
            echo "success";
            $notification = array(
              'message' => 'Products updated successfully!',
              'alert-type' => 'success'
          );
          return back()->with($notification);
        }

    }
    //product delete

    public function DeleteProduct($id)
    {
        $product=DB::table('products')->where('id',$id)->first();
        $image=$product->product_image;
        $delete=DB::table('products')->where('id',$id)->delete();
        if ($delete) {
            echo "success";
            unlink($image);
            $notification = array(
              'message' => 'Product deleted successfully!',
              'alert-type' => 'success'
          );

        }else {
            echo "error";
            $notification = array(
              'message' => 'Error! Something went wrong !',
              'alert-type' => 'error'
          );

        }

        return back()->with($notification);
    }
}
