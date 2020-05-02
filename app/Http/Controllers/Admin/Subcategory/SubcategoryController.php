<?php

namespace App\Http\Controllers\Admin\Subcategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use DB;

class SubcategoryController extends Controller
{
    
    public function subcategory()
    {
       $category=Category::all();
       $subcategory=DB::table('subcategories')
                    ->join('categories','subcategories.category_id','categories.id')
                    ->select('subcategories.*','categories.category_name')
                    ->get();
        return view('admin.subcategory.subcategory',compact('subcategory','category'));
        //return response()->json($subcategory);
    }
    public function Storesubcategory(Request $request)
    {
        $validatedData = $request->validate([
            'subcategory_name' => 'required|unique:subcategories|max:55',
            
        ]);
        $subcategory=new Subcategory();
        $subcategory->category_id=$request->category_id;
        $subcategory->subcategory_name=$request->subcategory_name;
        $subcategory->save();
        if ($subcategory) {
            echo "success";
            $notification = array(
              'message' => 'Category inserted successfully!',
              'alert-type' => 'success'
          );

        }else {
            echo "error";
            $notification = array(
              'message' => 'Error! Data not inserted !',
              'alert-type' => 'error'
          );

        }

        return back()->with($notification);
    }
    public function EditSubcategory($id)
    {
        $subcategory=DB::table('subcategories')->where('id',$id)->first();
        return view('admin.subcategory.edit_subcategory',compact('subcategory'));
    }
    public function UpdateSubcategory(Request $request,$id)
    {
        $validatedData = $request->validate([
            'subcategory_name' => 'required|max:55',
            
        ]);
        $data=array();
        $data['subcategory_name']=$request->subcategory_name;
        $category=DB::table('subcategories')->where('id',$id)->update($data);
        if ($category) {
          echo "success";
          $notification = array(
            'message' => 'SubCategory updated successfully!',
            'alert-type' => 'success'
        );
  
      }else {
          echo "error";
          $notification = array(
            'message' => 'Error! Data not updated !',
            'alert-type' => 'error'
        );
  
      }
  
      return back()->with($notification);
  
    }
    public function DeleteSubcategrory($id)
    {
        DB::table('subcategories')->where('id',$id)->delete();
        $notification = array(
            'message' => 'success! Data deleted !',
            'alert-type' => 'error'
        );
        return back()->with($notification);
    }
}
