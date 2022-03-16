<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class wishlistsController extends Controller
{

    public function addWhishlist($product_id){

        if(Auth::check()){

            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if(!$exists){
                Wishlist::insert([
                    'user_id'    => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now()
                ]);

                return response()->json(['success' => 'Wishlist Added Successfly']);
            }else{
                return response()->json(['error' => 'This Product Aleardy In Your Wishlist']);
            }

        }else{
            return response()->json(['error' => 'You Must Login']);
        }
    }


    public function index(){

        $wishlists = Wishlist::where('user_id',Auth::id())->paginate(5);

        return view('fontend.wishlist.wishlists',compact('wishlists'));
    }

    public function removeWishlist($id){

        Wishlist::findOrFail($id)->delete();
        return response()->json(['success'=>'Whishlist Deleted Successfly']);
    }
}
