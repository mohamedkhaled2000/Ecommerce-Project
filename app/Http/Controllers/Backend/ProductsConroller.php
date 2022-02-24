<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubSubCategory;
use App\Http\Traits\ImageTrait;
use App\Models\MultiImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductsConroller extends Controller
{
    use ImageTrait;

    public function addProduct(){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.product.product_add',compact('brands','categories'));
    }

    public function sub_subCategoryAjax($subcategory_id){
        $sub_subcategories = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('sub_subcategory_name_en','ASC')->get();
        return json_encode($sub_subcategories);
    }

    public function storeProduct(Request $productRequest){


        $brand_img_url = $this->saveImageProduct($productRequest->file('product_thambnail'),'upload/product_images/thambnail/');

        $product_id = Product::insertGetId([
            'brand_id' => $productRequest->brand_id,
            'category_id'=> $productRequest->category_id,
            'subcategory_id'=> $productRequest->subcategory_id,
            'sub_subcategory_id'=> $productRequest->sub_subcategory_id,
            'product_name_en'=> $productRequest->product_name_en,
            'product_name_ar'=> $productRequest->product_name_ar,
            'product_slug_en'=> strtolower(str_replace(' ' , '-',$productRequest->product_name_en)),
            'product_slug_ar'=> strtolower(str_replace(' ' , '-',$productRequest->product_name_ar)),
            'product_code'=> $productRequest->product_code,
            'product_qty'=> $productRequest->product_qty,
            'product_tag_en'=> $productRequest->product_tag_en,
            'product_tag_ar'=> $productRequest->product_tag_ar,
            'product_size_en'=> $productRequest->product_size_en,
            'product_size_ar'=> $productRequest->product_size_ar,
            'product_color_en'=> $productRequest->product_color_en,
            'product_color_ar'=> $productRequest->product_color_ar,
            'selling_price'=> $productRequest->selling_price,
            'discount_price'=> $productRequest->discount_price,
            'short_desc_en'=> $productRequest->short_desc_en,
            'short_desc_ar'=> $productRequest->short_desc_ar,
            'long_desc_en'=> $productRequest->long_desc_en,
            'long_desc_ar'=> $productRequest->long_desc_ar,
            'product_thambnail'=> $brand_img_url,
            'hot_deals'=> $productRequest->hot_deals,
            'featured'=> $productRequest->featured,
            'special_offer'=> $productRequest->special_offer,
            'special_deals'=> $productRequest->special_deals,
            'status'=> 1,
            'created_at' => Carbon::now(),
        ]);

        // for Multi Images
        $images = $productRequest->file('mulite_img');
        foreach($images as $item){
            $proudact_img_url = $this->saveMuliImgProduct($item,'upload/product_images/mulite_img/');

            MultiImage::insert([
                'product_id' => $product_id,
                'photo_name' => $proudact_img_url,
                'created_at' => Carbon::now(),
            ]);
        }


        $notification = array(
            'message' => 'Product Added Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    }

    public function allProduct(){
        $products = Product::select('id','product_name_en','selling_price','product_qty','discount_price','status','product_thambnail')
        ->latest()->get();
        return view('backend.product.all_products',compact('products'));
    }

    public function inActiveProduct($id){
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product InActive Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function ActiveProduct($id){
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    public function viewProduct($id){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $multi_imag = MultiImage::where('product_id',$id)->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_view',compact('brands','categories','subcategories','subsubcategories','multi_imag','products'));
    }

    public function editProduct($id){
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $multi_imag = MultiImage::where('product_id',$id)->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('brands','categories','subcategories','subsubcategories','multi_imag','products'));
    }

    public function updateProduct(Request $productRequest,$id){


        $product_id = Product::findOrFail($id)->update([
            'brand_id' => $productRequest->brand_id,
            'category_id'=> $productRequest->category_id,
            'subcategory_id'=> $productRequest->subcategory_id,
            'sub_subcategory_id'=> $productRequest->sub_subcategory_id,
            'product_name_en'=> $productRequest->product_name_en,
            'product_name_ar'=> $productRequest->product_name_ar,
            'product_slug_en'=> strtolower(str_replace(' ' , '-',$productRequest->product_name_en)),
            'product_slug_ar'=> strtolower(str_replace(' ' , '-',$productRequest->product_name_ar)),
            'product_code'=> $productRequest->product_code,
            'product_qty'=> $productRequest->product_qty,
            'product_tag_en'=> $productRequest->product_tag_en,
            'product_tag_ar'=> $productRequest->product_tag_ar,
            'product_size_en'=> $productRequest->product_size_en,
            'product_size_ar'=> $productRequest->product_size_ar,
            'product_color_en'=> $productRequest->product_color_en,
            'product_color_ar'=> $productRequest->product_color_ar,
            'selling_price'=> $productRequest->selling_price,
            'discount_price'=> $productRequest->discount_price,
            'short_desc_en'=> $productRequest->short_desc_en,
            'short_desc_ar'=> $productRequest->short_desc_ar,
            'long_desc_en'=> $productRequest->long_desc_en,
            'long_desc_ar'=> $productRequest->long_desc_ar,
            'hot_deals'=> $productRequest->hot_deals,
            'featured'=> $productRequest->featured,
            'special_offer'=> $productRequest->special_offer,
            'special_deals'=> $productRequest->special_deals,
            'status'=> 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Updated Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    }

    public function updateImageProduct(Request $request){

        $multi_imag = $request->mulite_img;

        foreach($multi_imag as $id => $img){
            $imgDel = MultiImage::findOrFail($id);
            unlink($imgDel->photo_name);
            $product_img_url = $this->saveMuliImgProduct($img,'upload/product_images/mulite_img/');

            MultiImage::where('id',$id)->update([
                'photo_name' => $product_img_url,
                'updated_at' => Carbon::now()
            ]);

        }


        $notification = array(
            'message' => 'Product Image Updated Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function updateThambnailProduct(Request $request,$id){

        $thambnail_product = $request->product_thambnail;
        $imgDel = Product::findOrFail($id);
        unlink($imgDel->product_thambnail);
        $product_img_url = $this->saveImageProduct($thambnail_product,'upload/product_images/mulite_img/');

        Product::where('id',$id)->update([
            'product_thambnail' => $product_img_url,
            'updated_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Product Image Updated Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function deleteImageProduct($id){
        $imgDel = MultiImage::findOrFail($id);
        unlink($imgDel->photo_name);
        $imgDel->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfly',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }

    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();
        $multi_imag = MultiImage::where('product_id',$id)->get();
        foreach($multi_imag as $multi){
            unlink($multi->photo_name);
            MultiImage::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfly',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


}

