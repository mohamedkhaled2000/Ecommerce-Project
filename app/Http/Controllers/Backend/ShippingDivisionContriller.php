<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use App\Models\State;
use Illuminate\Http\Request;

class ShippingDivisionContriller extends Controller
{

    ///// ShippingDivision

    public function divisionView(){
        $shippings = ShippingDivision::orderBy('id','DESC')->get();
        return view('backend.shipping_divition.shipping_view',compact('shippings'));
    }

    public function storeDivision(Request $request){
        $request->validate([
            'shipping_name' => 'required',
        ]);

        ShippingDivision::insert([
            'shipping_name' => $request->shipping_name,
        ]);
        $notification = array(
            'message' => 'ShippingDivision Added Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function editDivision($id){
        $shipping = ShippingDivision::findOrFail($id);
        return view('backend.shipping_divition.shipping_edit',compact('shipping'));
    }

    public function updateDivision(Request $request,$id){
        $coupon = ShippingDivision::findOrFail($id);

        $coupon->shipping_name = $request->shipping_name;
        $coupon->save();

           $notification = array(
                'message' => 'ShippingDivision Updated Successfly',
                'alert-type' => 'success'
            );
            return redirect()->route('manage.division')->with($notification);

    }

    public function deleteDivision($id){
        ShippingDivision::findOrFail($id)->delete();
        $notification = array(
            'message' => 'ShippingDivision Deleted Successfly',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    ////// ShippingDistrict


    public function districtView(){
        $divitions = ShippingDivision::orderBy('id','DESC')->get();
        $districts = ShippingDistrict::orderBy('id','DESC')->get();
        return view('backend.shipping_divition.district_view',compact('divitions','districts'));
    }

    public function storeDistrict(Request $request){
        $request->validate([
            'divition_id' => 'required',
            'district_name' => 'required',
        ]);

        ShippingDistrict::insert([
            'divition_id' => $request->divition_id,
            'district_name' => $request->district_name,
        ]);
        $notification = array(
            'message' => 'ShippingDistrict Added Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editDistrict($id){
        $divitions = ShippingDivision::orderBy('id','DESC')->get();
        $districts = ShippingDistrict::findOrFail($id);
        return view('backend.shipping_divition.district_edit',compact('districts','divitions'));
    }

    public function updateDistrict(Request $request,$id){
        $district = ShippingDistrict::findOrFail($id);

        $district->divition_id = $request->divition_id;
        $district->district_name = $request->district_name;
        $district->save();

           $notification = array(
                'message' => 'ShippingDistrict Updated Successfly',
                'alert-type' => 'success'
            );
            return redirect()->route('manage.district')->with($notification);

    }

    public function deleteDistrict($id){
        ShippingDistrict::findOrFail($id)->delete();
        $notification = array(
            'message' => 'ShippingDistrict Deleted Successfly',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


    ////// ShippingState


    public function stateView(){
        $divitions = ShippingDivision::orderBy('id','DESC')->get();
        $districts = ShippingDistrict::orderBy('id','DESC')->get();
        $states = State::orderBy('id','DESC')->get();
        return view('backend.shipping_divition.state_view',compact('divitions','districts','states'));
    }

    public function storestate(Request $request){
        $request->validate([
            'divition_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required',
        ]);

        State::insert([
            'divition_id' => $request->divition_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
        ]);
        $notification = array(
            'message' => 'ShippingState Added Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editstate($id){
        $divitions = ShippingDivision::orderBy('id','DESC')->get();
        $districts = ShippingDistrict::orderBy('id','DESC')->get();
        $states = State::findOrFail($id);
        return view('backend.shipping_divition.state_edit',compact('districts','divitions','states'));
    }

    public function updatestate(Request $request,$id){
        $state = State::findOrFail($id);

        $state->divition_id = $request->divition_id;
        $state->district_id = $request->district_id;
        $state->state_name = $request->state_name;
        $state->save();

           $notification = array(
                'message' => 'States Updated Successfly',
                'alert-type' => 'success'
            );
            return redirect()->route('manage.state')->with($notification);

    }

    public function deletestate($id){
        State::findOrFail($id)->delete();
        $notification = array(
            'message' => 'States Deleted Successfly',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

}
