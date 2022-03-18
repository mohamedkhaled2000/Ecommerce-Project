<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CouponsController extends Controller
{


    public function couponView(){
        $coupons = Coupon::orderBy('id','DESC')->get();
        return view('backend.coupon.coupon_view',compact('coupons'));
    }

    public function storeCoupon(Request $request){
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at'    => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Coupon Added Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function editCoupon($id){
        $coupons = Coupon::findOrFail($id);
        return view('backend.coupon.coupon_edit',compact('coupons'));
    }

    public function updateCoupon(Request $request,$id){
        $coupon = Coupon::findOrFail($id);

        $coupon->coupon_name = strtoupper($request->coupon_name);
        $coupon->coupon_discount = $request->coupon_discount;
        $coupon->coupon_validity = $request->coupon_validity;
        $coupon->updated_at = Carbon::now();

        $coupon->save();
           $notification = array(
                'message' => 'Coupon Updated Successfly',
                'alert-type' => 'success'
            );
            return redirect()->route('manage.coupons')->with($notification);

    }

    public function deleteCoupon($id){
        Coupon::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Coupon Deleted Successfly',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
