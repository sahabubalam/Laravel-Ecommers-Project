<?php

namespace App\Http\Controllers\Admin\BlogPost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use App\Model\Admin\Blogpost;
use DB;

class BlogpostController extends Controller
{
    public function Blogpost()
    {
        $category=Category::all();
        return view('admin.Blogpost.addpost',compact('category'));
    }
    public function AllBlogpost()
    {
       
     
        $allblog=DB::table('blogposts')
        ->join('categories','blogposts.category_id','categories.id')
        ->select('blogposts.*','categories.category_name')
        ->get();
        return view('admin.blogpost.allblogpost',compact('allblog')); 
    }
    public function BlogpostStore(Request $request)
    {
      
        $data=array();
        $data['category_id']=$request->category_id;
     
        $data['post_title_eng']=$request->post_title_eng;
      
       
        $data['post_title_bng']=$request->post_title_bng;
       
   
        $data['post_details_eng']=$request->post_details_eng;
        
        $data['post_details_bng']=$request->post_details_bng;
        $image=$request->file('post_image');
        if ($image) {
    		$image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/blogpost/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['post_image']=$image_url;
            DB::table('blogposts')->insert($data);
            echo "success";
            $notification = array(
              'message' => 'Blogposts inserted successfully!',
              'alert-type' => 'success'
          );
          return back()->with($notification);
          
        }else{
            DB::table('blogposts')->insert();
            echo "success";
            $notification = array(
              'message' => 'Blogposts inserted successfully!',
              'alert-type' => 'success'
          );
          return back()->with($notification);
        }
        
    }

    //delete blog post
    public function DeleteBlogpost($id)
    {
        $blogpost=DB::table('blogposts')->where('id',$id)->first();
        $image=$blogpost->post_image;
        $delete=DB::table('blogposts')->where('id',$id)->delete();
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

    // edit blog post

    public function EditBlogpost($id)
    {
       // $category=Category::all();
        $editblog=DB::table('blogposts')->where('id',$id)->first();
        return view('admin.blogpost.edit_blogpost',compact('editblog'));
    }

    //update blog post

    public function UpdateBlogpost(Request $request,$id)
    {
        $validatedData = $request->validate([
            'post_title_eng' => 'required|max:200', 
            'post_details_eng' => 'required|max:200', 
            'post_image' => ' mimes:jpeg,jpg,png,PNG | max:1000',
        ]);
        $data=array();
        $data['category_id']=$request->category_id;
     
        $data['post_title_eng']=$request->post_title_eng;
      
       
        $data['post_title_bng']=$request->post_title_bng;
       
   
        $data['post_details_eng']=$request->post_details_eng;
        
        $data['post_details_bng']=$request->post_details_bng;
        $image=$request->file('post_image');
        if ($image) {
    		$image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/media/blogpost/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['post_image']=$image_url;
            unlink($request->old_image);
            DB::table('blogposts')->where('id',$id)->update($data);
            echo "success";
            $notification = array(
              'message' => 'Blogposts updated successfully!',
              'alert-type' => 'success'
          );
          return back()->with($notification);
          
        }else{
            $data['post_image']=$request->old_image;
            DB::table('blogposts')->where('id',$id)->update($data);
            echo "success";
            $notification = array(
              'message' => 'Blogposts updated successfully!',
              'alert-type' => 'success'
          );
          return back()->with($notification);
        }
    }

}
