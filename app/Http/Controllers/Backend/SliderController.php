<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Traits\ImageTrait;


class SliderController extends Controller
{
    use ImageTrait;

    public function allSlider()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view',compact('sliders'));
    }

    public function storeSlider(Request $request){

        $request->validate([
            'slider_image' => 'required',
        ],[
            'slider_image.required' => 'هذا الحقل مطلوب'
        ]);

        $slider_img_url = $this->saveSlider($request->file('slider_image'),'upload/slider_images/');
        Slider::insert([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'slider_image' => $slider_img_url,
        ]);
        $notification = array(
            'message' => 'Slider Added Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inActiveSlider($id){
        Slider::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Slider InActive Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ActiveSlider($id){
        Slider::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Slider Active Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


}
