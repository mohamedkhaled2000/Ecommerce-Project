<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use App\Models\State;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{


    public function index(){
        $userId = auth()->user()->id;

        if(\Cart::session($userId)->getContent()->count() > 0 ){

            $carts = \Cart::session($userId)->getContent();
            $cartTotle = \Cart::session($userId)->getTotal();
            $cartQty   = $carts->count();
            $divisions = ShippingDivision::orderBy('shipping_name','ASC')->get();
            return view('fontend.checkout.checkout_view',compact('carts','cartTotle','cartQty','divisions'));
        }else{
            $notification = array(
                'message' => 'You Must Add Product',
                'alert-type' => 'error'
            );

            return redirect()->to('/')->with($notification);

        }
    }

    public function districtAjax($divition_id){
        $ship = ShippingDistrict::where('divition_id',$divition_id)->orderBy('district_name','ASC')->get();
        return json_encode($ship);
    }
    public function stateAjax($district_id){
        $shipstate = State::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
        return json_encode($shipstate);
    }

    public function checkoutStore(Request $request){
        $data = [];
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['notes'] = $request->notes;
        $userId = auth()->user()->id;

        $cartTotle = \Cart::session($userId)->getTotal();


        if($request->payment_method == 'stripe'){
            return view('fontend.payment.stripe',compact('data','cartTotle'));
        }elseif($request->payment_method == 'card'){
            return 'card';
        }elseif($request->payment_method == 'cash'){
            return view('fontend.payment.cash',compact('data','cartTotle'));
        }
    }


}
