<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;


class AddCartController extends Controller
{


    public function AddToCart(Request $request,$id){
        $product = Product::findOrFail($id);
        $rowID = hexdec(uniqid($id));
        $userId = auth()->user()->id;
        if($product->discount_price == null){

            \Cart::session($userId)->add([
                'id'=>$id,
                'name'=>$request->product_name,
                'quantity'=>$request->quantity,
                'price'=>$product->selling_price,
                'attributes'=> [
                         'image' => $product->product_thambnail,
                         'size' => $request->size,
                         'color' => $request->color,
                         'rowID' => $rowID
                    ],
                ]);

            return response()->json(['success' => 'Successfuly Added In Your Cart']);

        }else{

            $afterDescount = $product->selling_price - $product->discount_price;
            \Cart::session($userId)->add([
                'id'=>$id,
                'name'=>$request->product_name,
                'quantity'=>$request->quantity,
                'price'=>$afterDescount,
                'attributes'=>[
                    'image' => $product->product_thambnail,
                    'size' => $request->size,
                    'color' => $request->color,
                    'rowID' => $rowID

                ],
            ]);

            return response()->json(['success' => 'Successfuly Added In Your Cart']);

        }
    }

    public function miniCart(){
        $userId = auth()->user()->id;

        $carts = \Cart::session($userId)->getContent();
        $cartTotle = \Cart::session($userId)->getTotal();

        return response()->json([
            'carts'     => $carts,
            'cartQty'   => $carts->count(),
            'cartTotle' => number_format($cartTotle)
        ]);
    }

    public function removeMiniCart($rowid){
        $userId = auth()->user()->id;

        \Cart::session($userId)->remove($rowid);

        return response()->json(['success'=>'Product Remove From Cart']);
    }
}
