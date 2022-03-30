<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\User;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Intervention\Image\Gd\Decoder;
use LaravelLocalization;
use PhpParser\Parser\Multiple;

class IndexController extends Controller
{
    public function index(){
        $sliders = Slider::where('status',1)
        ->select('id','title_'.LaravelLocalization::getCurrentLocale().' as title','slider_image','description_'.LaravelLocalization::getCurrentLocale().' as description')
        ->get();

        $products = Product::where('status',1)
        ->select('id','product_name_'.LaravelLocalization::getCurrentLocale().' as ProName','product_slug_'.LaravelLocalization::getCurrentLocale().' as proSlug','discount_price','product_thambnail','selling_price','category_id')
        ->get();

        $featureies = Product::where('featured',1)
        ->select('id','product_name_'.LaravelLocalization::getCurrentLocale().' as ProName','product_slug_'.LaravelLocalization::getCurrentLocale().' as proSlug','discount_price','product_thambnail','selling_price','category_id')
        ->get();


        $special_offers = Product::where('special_offer',1)
        ->select('id','product_name_'.LaravelLocalization::getCurrentLocale().' as ProName','product_slug_'.LaravelLocalization::getCurrentLocale().' as proSlug','discount_price','product_thambnail','selling_price','category_id')
        ->limit(3)->get();

        $special_deals = Product::where('special_deals',1)
        ->select('id','product_name_'.LaravelLocalization::getCurrentLocale().' as ProName','product_slug_'.LaravelLocalization::getCurrentLocale().' as proSlug','discount_price','product_thambnail','selling_price','category_id')
        ->limit(3)->get();

        $category_skip_0 = Category::skip(0)->first();
        $product_skip_0  = Product::where('status',1)
        ->where('category_id',$category_skip_0->id)
        ->orderBy('id','DESC')->get();

        $category_skip_1 = Category::skip(1)->first();
        $product_skip_1  = Product::where('status',1)
        ->where('category_id',$category_skip_1->id)
        ->orderBy('id','DESC')->get();

        $brand_skip_1 = Brand::skip(1)->first();
        $brand_product_skip_1  = Product::where('status',1)
        ->where('brand_id',$brand_skip_1->id)
        ->orderBy('id','DESC')->get();


        $posts = BlogPost::latest()->get();

        return view('fontend.index',
        compact('sliders','products','featureies','special_offers' , 'posts'
        ,'special_deals','category_skip_0','product_skip_0','category_skip_1','product_skip_1','brand_skip_1','brand_product_skip_1'));
    }

    public function userLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function userProfile(){
        $user = User::find(Auth::user()->id);
        return view('fontend.profile.update_profile',compact('user'));
    }

    public function updateUserProfile(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'User Profile Updated Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function updateUserPassword(){
        $user = User::find(Auth::user()->id);
        return view('fontend.profile.change_user_password');
    }

    public function changeUserPassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $oldPass = User::find(Auth::user()->id)->password;
        if(Hash::check($request->current_password,$oldPass)){
            $pass = User::find(Auth::user()->id);
            $pass->password = Hash::make($request->password);
            $pass->save();
            Auth::logout();
        $notification = array(
            'message' => 'User Update Password Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('user.logout')->with($notification);
        }else{
            $notification = array(
                'message' => 'Current User Password Invaled',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }


    }

    public function productDetails($slug,$id){
        $details = Product::findOrFail($id);
        $product_color_en = explode(',',$details->product_color_en);
        $product_color_ar = explode(',',$details->product_color_ar);
        $product_size_en = explode(',',$details->product_size_en);
        $product_size_ar = explode(',',$details->product_size_ar);
        $relatedProducts = Product::where('category_id',$details->category_id)->orderBy('id','ASC')->paginate(6);
        return view('fontend.product.product_details',compact('details','product_color_en','product_color_ar','product_size_en','product_size_ar','relatedProducts'));
    }

    public function productTags($tag){
        $tags = Product::where('status',1)->where('product_tag_'.LaravelLocalization::getCurrentLocale(),$tag)
        ->orderBy('id','DESC')->paginate(5);
        $categories = Category::orderBy('id','DESC')->get();

        return view('fontend.product.pages_tag',compact('tags','categories'));
    }

    public function subCategoryView($slug,$id){
        $tags = Product::where('status',1)->where('subcategory_id',$id)->paginate(5);
        $categories = Category::orderBy('id','DESC')->get();
        return view('fontend.product.subCategoryView',compact('tags','categories','slug'));
    }

    public function sub_subCategoryView($slug,$id){
        $tags = Product::where('status',1)->where('sub_subcategory_id',$id)->paginate(5);
        $categories = Category::orderBy('id','DESC')->get();
        return view('fontend.product.subCategoryView',compact('tags','categories','slug'));
    }

    public function productViewModel($id){
        $product = Product::with('category','brand')->findOrFail($id);
        $product_color_en = explode(',',$product->product_color_en);
        $product_color_ar = explode(',',$product->product_color_ar);
        $product_size_en = explode(',',$product->product_size_en);
        $product_size_ar = explode(',',$product->product_size_ar);

        return response()->json([
            'product' => $product,
            'product_color_en' => $product_color_en,
            'product_color_ar' => $product_color_ar,
            'product_size_en' => $product_size_en,
            'product_size_ar' => $product_size_ar,
        ]);
    }

}
