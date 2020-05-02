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
}
