<?php

namespace App\Http\Controllers\Admin\brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\brand;
use DB;

class BrandController extends Controller
{
    public function brand()
    {
        $brand = Brand::all();
        //$brand=DB::table('brands)->get();
       // return response()->json($brand);
       return view('admin.brand.brand',compact('brand'));
    }

    public function Storebrand(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|max:55',
            
        ]);
        $data=array();
        $data['brand_name']=$request->brand_name;
        $image=$request->file('brand_logo');
        if ($image) {
    		$image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/brand/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['brand_logo']=$image_url;
            DB::table('brands')->insert($data);
            echo "success";
            $notification = array(
              'message' => 'brands inserted successfully!',
              'alert-type' => 'success'
          );
          return back()->with($notification);

        }else{
            DB::table('brands')->insert();
            echo "success";
            $notification = array(
              'message' => 'brands inserted successfully!',
              'alert-type' => 'success'
          );
          return back()->with($notification);
        }
        
    }
    public function Deletebrand($id)
    {
        $brand=DB::table('brands')->where('id',$id)->first();
        $image=$brand->brand_logo;
      
        $delete=DB::table('brands')->where('id',$id)->delete();
        if ($delete) {
            echo "success";
            unlink($image);
            $notification = array(
              'message' => 'Brand deleted successfully!',
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

    public function Editbrand($id)
    {
        $brand=DB::table('brands')->where('id',$id)->first();
        return view('admin.brand.edit_brand',compact('brand'));
    }
    public function Updatebrand(Request $request,$id)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|max:200', 
            'brand_logo' => ' mimes:jpeg,jpg,png,PNG | max:1000',
        ]);
        $data=array();
    	$data['brand_name']=$request->brand_name;
 
    	$image=$request->file('brand_logo');
        if ($image) {
    		$image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/brand/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['brand_logo']=$image_url;
            unlink($request->old_logo);
            DB::table('brands')->where('id',$id)->update($data);
            echo "success";
            $notification = array(
              'message' => 'post updated successfully!',
              'alert-type' => 'success'
          );
          return back()->with($notification);

        }else{
            $data['brand_logo']=$request->old_logo;
            DB::table('brands')->where('id',$id)->update($data);
            echo "success";
            $notification = array(
              'message' => 'post updated successfully!',
              'alert-type' => 'success'
          );
          return back()->with($notification);
        }

    }
}
