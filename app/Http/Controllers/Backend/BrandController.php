<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    public function viewBrand(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view',compact('brands'));
    }

    public function storeBrand(Request $request){

        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_ar' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_name_ar.required' => 'هذا الحقل مطلوب'
        ]);

        $brand_img = $request->file('brand_image');
        $image_name = hexdec(uniqid()).'.'.$brand_img->getClientOriginalExtension();
        Image::make($brand_img)->resize(300,300)->save('upload/brand_images/'.$image_name);
        $brand_img_url = 'upload/brand_images/'.$image_name;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_ar' => $request->brand_name_ar,
            'brand_slug_en' => strtolower(str_replace(' ' , '-',$request->brand_name_en)),
            'brand_slug_ar' => strtolower(str_replace(' ' , '-',$request->brand_name_ar)),
            'brand_image' => $brand_img_url
        ]);
        $notification = array(
            'message' => 'Brand Added Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editBrand($id){
        $brands = Brand::findOrFail($id);
        return view('backend.brand.brand_edit',compact('brands'));
    }

    public function updateBrand(Request $request,$id){
        $brand = Brand::findOrFail($id);

        $brand->brand_name_en = $request->brand_name_en;
        $brand->brand_name_ar = $request->brand_name_ar;
        $brand->brand_slug_en =  strtolower(str_replace(' ' , '-',$request->brand_name_en));
        $brand->brand_slug_ar =  strtolower(str_replace(' ' , '-',$request->brand_name_ar));

        if($request->file('brand_image')){
            $brand_img = $request->file('brand_image');
            @unlink(public_path($brand->brand_image));
            $image_name = hexdec(uniqid()).'.'.$brand_img->getClientOriginalExtension();
            Image::make($brand_img)->resize(300,300)->save('upload/brand_images/'.$image_name);
            $brand_img_url = 'upload/brand_images/'.$image_name;
            $brand['brand_image'] = $brand_img_url;
            $brand->save();
            $notification = array(
                'message' => 'Brand Updated Successfly',
                'alert-type' => 'success'
            );
            return redirect()->route('all.brand')->with($notification);

        }else{
            $brand->save();
            $notification = array(
                'message' => 'Brand Updated Successfly',
                'alert-type' => 'success'
            );
            return redirect()->route('all.brand')->with($notification);
        }
    }

    public function deleteBrand($id){
        $brand = Brand::findOrFail($id);
        unlink($brand->brand_image);
        Brand::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand Deleted Successfly',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
