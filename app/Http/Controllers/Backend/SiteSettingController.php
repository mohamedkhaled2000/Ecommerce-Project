<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Traits\ImageTrait;
use App\Models\Seo;
use Illuminate\Support\Facades\File;

class SiteSettingController extends Controller
{
    use ImageTrait;


    public function siteSetting(){
        $setting = SiteSetting::findOrFail(1);
        return view('backend.settings.setting_update',compact('setting'));
    }

    public function updateSite(Request $request,$id){


        if($request->file('logo')){
            $site = SiteSetting::findOrFail($id);
            File::delete($site->logo);
            $logo_img_url = $this->updateLogo($request->file('logo'),'fontend/Logo/');
            $site->update([
                'logo'              => $logo_img_url,
                'phone_one'         => $request->phone_one,
                'phone_two'         => $request->phone_two,
                'email'             => $request->email,
                'company_name'      => $request->company_name,
                'company_address'   => $request->company_address,
                'facebook'          => $request->facebook,
                'twitter'           => $request->twitter,
                'linkedin'          => $request->linkedin,
                'youtube'           => $request->youtube,
            ]);

            $notification = array(
                'message' => 'Site Updated Successfly',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $site = SiteSetting::findOrFail($id);
            $site->update([
                'phone_one'         => $request->phone_one,
                'phone_two'         => $request->phone_two,
                'email'             => $request->email,
                'company_name'      => $request->company_name,
                'company_address'   => $request->company_address,
                'facebook'          => $request->facebook,
                'twitter'           => $request->twitter,
                'linkedin'          => $request->linkedin,
                'youtube'           => $request->youtube,
            ]);

            $notification = array(
                'message' => 'Site Updated Successfly',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

    }


    ///// SEO Setting

    public function seoSite(){
        $setting = Seo::first();
        return view('backend.settings.seo_setting',compact('setting'));
    }

    public function updateSeo(Request $request, $id){
        Seo::findOrFail($id)->update([
            'meta_title'        => $request->meta_title,
            'meta_author'       => $request->meta_author,
            'meta_keyword'      => $request->meta_keyword,
            'meta_description'  => $request->meta_description,
            'google_analytics'  => $request->google_analytics,
        ]);


        $notification = array(
            'message' => 'Seo Updated Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
