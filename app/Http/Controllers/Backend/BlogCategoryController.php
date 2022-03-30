<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Traits\ImageTrait;


class BlogCategoryController extends Controller
{


    use ImageTrait;


    public function allBlog(){
        $categories = BlogCategory::latest()->get();
        return view('backend.blog.blog_category',compact('categories'));
    }

    public function storeBlog(Request $request){
        $request->validate([
            'blog_category_en' => 'required',
            'blog_category_ar' => 'required',
        ]);

        BlogCategory::insert([
            'blog_category_en'  => $request->blog_category_en,
            'blog_category_ar'  => $request->blog_category_ar,
            'blog_slug_en'      => strtolower(str_replace(' ' , '-',$request->blog_category_en)),
            'blog_slug_ar'      => strtolower(str_replace(' ' , '-',$request->blog_category_ar)),
            'created_at'        => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Blog Category Added Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editBlog($id){
        $category = BlogCategory::findOrFail($id);
        return view('backend.blog.edit_category_blog',compact('category'));
    }

    public function updateBlog(Request $request,$id){
        $request->validate([
            'blog_category_en' => 'required',
            'blog_category_ar' => 'required',
        ]);

        BlogCategory::findOrFail($id)->update([
            'blog_category_en'  => $request->blog_category_en,
            'blog_category_ar'  => $request->blog_category_ar,
            'blog_slug_en'      => strtolower(str_replace(' ' , '-',$request->blog_category_en)),
            'blog_slug_ar'      => strtolower(str_replace(' ' , '-',$request->blog_category_ar)),
            'updated_at'        => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function deleteBlog($id){
        BlogCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Blog Category Deleted Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }







    ////// Blog Posts
    public function allBlogPosts(){
        $posts = BlogPost::latest()->get();
        return view('backend.blog.blog_post',compact('posts'));
    }

    public function addPost(){
        $categories = BlogCategory::latest()->get();
        return view('backend.blog.add_post',compact('categories'));
    }

    public function storePost(Request $request){
        $request->validate([
            'category_id'       => 'required',
            'post_title_en'     => 'required',
            'post_title_ar'     => 'required',
            'post_image'        => 'required',
            'post_details_en'   => 'required',
            'post_details_ar'   => 'required',
        ]);

        $img_url = $this->saveSlider($request->file('post_image'),'upload/post_images/');

        BlogPost::insert([
            'category_id'       => $request->category_id,
            'post_title_en'     => $request->post_title_en,
            'post_title_ar'     => $request->post_title_ar,
            'post_slug_en'      => strtolower(str_replace(' ' , '-',$request->post_title_en)),
            'post_slug_ar'      => strtolower(str_replace(' ' , '-',$request->post_title_ar)),
            'post_image'        => $img_url,
            'post_details_en'   => $request->post_details_en,
            'post_details_ar'   => $request->post_details_ar,
            'created_at'        => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Blog Post Added Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.posts')->with($notification);
    }

    public function editPost($id){
        $post = BlogPost::findOrFail($id);
        $categories = BlogCategory::latest()->get();
        return view('backend.blog.edit_post',compact('post','categories'));
    }

    public function updatePost(Request $request,$id){

        $request->validate([
            'category_id'       => 'required',
            'post_title_en'     => 'required',
            'post_title_ar'     => 'required',
            'post_details_en'   => 'required',
            'post_details_ar'   => 'required',
        ]);

        BlogPost::findOrFail($id)->update([
            'category_id'       => $request->category_id,
            'post_title_en'     => $request->post_title_en,
            'post_title_ar'     => $request->post_title_ar,
            'post_slug_en'      => strtolower(str_replace(' ' , '-',$request->post_title_en)),
            'post_slug_ar'      => strtolower(str_replace(' ' , '-',$request->post_title_ar)),
            'post_details_en'   => $request->post_details_en,
            'post_details_ar'   => $request->post_details_ar,
            'updated_at'        => Carbon::now()
        ]);


        $notification = array(
            'message' => 'Blog Post Updated Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.posts')->with($notification);
    }

    public function deletePost($id){

       $post = BlogPost::findOrFail($id);
        unlink($post->post_image);

        $post->delete();

        $notification = array(
            'message' => 'Blog Post Deleted Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function updateImage(Request $request, $id){
        if($request->file('post_image')){
            unlink($request->old_image);
            $img_url = $this->saveSlider($request->file('post_image'),'upload/post_images/');
            BlogPost::findOrFail($id)->update([
                'post_image' => $img_url
            ]);

            $notification = array(
                'message' => 'Post Image Update Successfly',
                'alert-type' => 'success'
            );
            return redirect()->route('all.posts')->with($notification);
        }
    }



}
