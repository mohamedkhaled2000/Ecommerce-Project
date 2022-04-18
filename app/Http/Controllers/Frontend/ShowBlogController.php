<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Order;
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



    ////// Tracking Order

    public function trackingOrder(Request $request){
        $invoice = Order::whereInvoice_no($request->invoice_no)->first();

        if($invoice){
            return view('fontend.tracking.track_order',compact('invoice'));
        }else{
            $notification = array(
                'message' => 'Invoice Number InValid',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
