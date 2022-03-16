<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class MyCartController extends Controller
{
    public function index(){
        return view('fontend.wishlist.my_cart');
    }

    public function MyCart(){
        $userId = auth()->user()->id;

        $carts = \Cart::session($userId)->getContent();
        $cartTotle = \Cart::session($userId)->getTotal();

        return response()->json([
            'carts'     => $carts,
            'cartQty'   => $carts->count(),
            'cartTotle' => number_format($cartTotle)
        ]);
    }

    public function removeCart($id){

        $userId = auth()->user()->id;

        \Cart::session($userId)->remove($id);

        return response()->json(['success'=>'Product Remove From Cart']);
    }

    public function increase($id){
        $userId = auth()->user()->id;
        $row = \Cart::session($userId)->get($id);
        \Cart::session($userId)->update($id,['quantity' => 1]);

        return response()->json('increasment');
    }
    public function decrease($id){
        $userId = auth()->user()->id;
        $row = \Cart::session($userId)->get($id);
        \Cart::session($userId)->update($id,['quantity' => -1]);

        return response()->json('decreasment');
    }
}
