<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use DB;

class CategoryController extends Controller
{
    
    public function category()
    {
        
        $category=Category::all();
        //$category = DB::table('categories')->get();
       // return response()->json($category);
        return view('admin.category.category',compact('category')); 
    }

    public function Storecategory(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
            
        ]);
        //$data=array();
       // $data['category_name']=$request->category_name;
       // $category=DB::table('categories')->insert($data);

       $category=new Category();
       $category->category_name=$request->category_name;
       $category->save();
        if ($category) {
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

    public function Deletecategory($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        $notification = array(
            'message' => 'success! Data deleted !',
            'alert-type' => 'error'
        );
        return back()->with($notification);

      }
      public function Editcategory($id)
      {
        $category=DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit_category',compact('category'));

      }
      public function Updatecategory(Request $request,$id)
      {
        $validatedData = $request->validate([
          'category_name' => 'required|max:55',
          
      ]);
      $data=array();
      $data['category_name']=$request->category_name;
      $category=DB::table('categories')->where('id',$id)->update($data);
      if ($category) {
        echo "success";
        $notification = array(
          'message' => 'Category updated successfully!',
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

}
