<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class AddCartController extends Controller
{
    public function AddToCart(Request $request,$id){
        $product = Product::findOrFail($id);

        if($product->discount_price == null){
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfuly Added In Your Cart']);

        }else{
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price - $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ],
            ]);

            return response()->json(['success' => 'Successfuly Added In Your Cart']);

        }
    }
}
