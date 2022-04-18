<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchCotroller extends Controller
{
    public function search(Request $request){
        $request->validate([
            'search' => 'required'
        ]);

        $item = $request->search;
        $products = Product::where('product_name_en','LIKE',"%$item%")
                            ->select('id','product_name_en','product_thambnail','product_slug_en')->limit(8)->get();

        return view('fontend.product.search.search',compact('products'));

    }

    public function searchProduct(Request $request){
        $request->validate([
            'search' => 'required'
        ]);
        $item = $request->search;

        $categories = Category::OrderBy('category_name_en','ASC')->get();
        $products = Product::where('product_name_en','LIKE',"%$item%")
                            ->select('id','product_name_en','product_thambnail','product_slug_en','selling_price','discount_price')->paginate(10);

        return view('fontend.product.search.all_result',compact('products','item','categories'));

    }
}
