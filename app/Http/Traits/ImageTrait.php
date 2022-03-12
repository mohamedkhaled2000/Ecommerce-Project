<?php
namespace App\Http\Traits;

use Illuminate\Http\Request;
use Image;


trait ImageTrait {


    protected function saveImage($photo,$path){
        $brand_img = $photo;
        $image_name = hexdec(uniqid()).'.'.$brand_img->getClientOriginalExtension();
        Image::make($brand_img)->resize(300,300)->save($path.$image_name);
        $img_url = $path.$image_name;
        return $img_url;
    }


    protected function saveImageProduct($photo,$path){
        $brand_img = $photo;
        $image_name = hexdec(uniqid()).'.'.$brand_img->getClientOriginalExtension();
        Image::make($brand_img)->resize(917,1000)->save($path.$image_name);
        $img_url = $path.$image_name;
        return $img_url;
    }

    protected function saveMuliImgProduct($photo,$path){
        $brand_img = $photo;
        $image_name = hexdec(uniqid()).'.'.$brand_img->getClientOriginalExtension();
        Image::make($brand_img)->resize(917,1000)->save($path.$image_name);
        $img_url = $path.$image_name;
        return $img_url;
    }

    protected function saveSlider($photo,$path){
        $brand_img = $photo;
        $image_name = hexdec(uniqid()).'.'.$brand_img->getClientOriginalExtension();
        Image::make($brand_img)->resize(870,370)->save($path.$image_name);
        $slider_img_url = $path.$image_name;
        return $slider_img_url;
    }


}
