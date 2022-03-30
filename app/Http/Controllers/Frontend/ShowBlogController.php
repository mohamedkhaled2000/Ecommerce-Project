<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class ShowBlogController extends Controller
{
    public function index(){
        $posts = BlogPost::latest()->paginate(7);
        $categories = BlogCategory::latest()->get();
        return view('fontend.blog.show_blog',compact('posts','categories'));
    }

    public function postDetails($slug,$id){
        $post = BlogPost::findOrFail($id);
        $categories = BlogCategory::latest()->get();
        return view('fontend.blog.post_detail',compact('post','slug','categories'));
    }

    public function blogCategory($category_id){
        $categories = BlogCategory::latest()->get();
    	$posts = BlogPost::where('category_id',$category_id)->orderBy('id','DESC')->get();
        return view('fontend.blog.Category_list',compact('posts','categories'));
        // return $posts;
    }
}
