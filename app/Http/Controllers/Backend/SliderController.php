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

    public function editSlider($id){
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.slider_edit',compact('sliders'));
    }

    public function updateSlider(Request $request,$id){


        $slider = Slider::findOrFail($id);
        $slider->title_en = $request->title_en;
        $slider->title_ar = $request->title_ar;
        $slider->description_en = $request->description_en;
        $slider->description_ar = $request->description_ar;
        $slider->status = $request->status;


        if($request->hasFile('slider_image')){
            $request->validate([
                'slider_image' => 'required',
            ],[
                'slider_image.required' => 'هذا الحقل مطلوب'
            ]);

            $slider = Slider::findOrFail($id);
            unlink($slider->slider_image);

            $slider_img_url = $this->saveSlider($request->file('slider_image'),'upload/slider_images/');
            $slider->slider_image = $slider_img_url;
            $slider->save();
            $notification = array(
                'message' => 'Slider Updated Successfly',
                'alert-type' => 'success'
            );
            return redirect()->route('all.sliders')->with($notification);
        }else{

            $slider->save();
            $notification = array(
                'message' => 'Slider Updated Successfly',
                'alert-type' => 'success'
            );
            return redirect()->route('all.sliders')->with($notification);
        }
    }

    public function deleteSlider($id){
        $slider = Slider::findOrFail($id);
        unlink($slider->slider_image);
        Slider::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Slider Deleted Successfly',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


}
