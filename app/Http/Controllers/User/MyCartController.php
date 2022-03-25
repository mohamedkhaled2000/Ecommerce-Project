<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session as FacadesSession;

class MyCartController extends Controller
{

    public function index(){
        return view('fontend.wishlist.my_cart');
    }

    public function MyCart(){
        $userId = auth()->user()->id;

        $carts = \Cart::session($userId)->getContent();
        $cartTotle = \Cart::session($userId)->getTotal();

        return response()->json([
            'carts'     => $carts,
            'cartQty'   => $carts->count(),
            'cartTotle' => number_format($cartTotle)
        ]);
    }

    public function removeCart($id){

        $userId = auth()->user()->id;

        \Cart::session($userId)->remove($id);


        ///////////////
        if(\Cart::session($userId)->getContent()->count() == 0){
            if(FacadesSession::has('coupon')){
                FacadesSession::forget('coupon');
            }
        }else{
            if(FacadesSession::has('coupon')){

                $coupon_name = session()->get('coupon')['coupon_name'];
                $coupon = Coupon::where('coupon_name',$coupon_name)
                ->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
                FacadesSession::put('coupon',[
                    'coupon_name' => $coupon->coupon_name,
                    'coupon_discount' => $coupon->coupon_discount,
                    'discount_amount' => round(\Cart::session($userId)->getTotal() * ($coupon->coupon_discount / 100)),
                    'total_amount' => number_format(\Cart::session($userId)->getTotal() - (\Cart::session($userId)->getTotal() * $coupon->coupon_discount / 100))
                ]);
            }

        }


        return response()->json(['success'=>'Product Remove From Cart']);
    }

    public function increase($id){
        $userId = auth()->user()->id;
        $row = \Cart::session($userId)->get($id);
        \Cart::session($userId)->update($id,['quantity' => 1]);

        if(FacadesSession::has('coupon')){

            $coupon_name = session()->get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)
            ->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
            FacadesSession::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(\Cart::session($userId)->getTotal() * ($coupon->coupon_discount / 100)),
                'total_amount' => number_format(\Cart::session($userId)->getTotal() - (\Cart::session($userId)->getTotal() * $coupon->coupon_discount / 100))
            ]);
        }

        return response()->json('increasment');
    }

    public function decrease($id){
        $userId = auth()->user()->id;
        $row = \Cart::session($userId)->get($id);
        \Cart::session($userId)->update($id,['quantity' => -1]);

        /////////////
        if(FacadesSession::has('coupon')){

            $coupon_name = session()->get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)
            ->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
            FacadesSession::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(\Cart::session($userId)->getTotal() * ($coupon->coupon_discount / 100)),
                'total_amount' => number_format(\Cart::session($userId)->getTotal() - (\Cart::session($userId)->getTotal() * $coupon->coupon_discount / 100))
            ]);
        }

        return response()->json('decreasment');
    }

    public function applyCoupon(Request $request){

        $coupon = Coupon::where('coupon_name',$request->coupon_name)
        ->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        $userId = auth()->user()->id;

        if($coupon){
            FacadesSession::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(\Cart::session($userId)->getTotal() * ($coupon->coupon_discount / 100)),
                'total_amount' => round(\Cart::session($userId)->getTotal() - (\Cart::session($userId)->getTotal() * $coupon->coupon_discount / 100))
            ]);

            return response()->json(['success'=>'Coupon Applied Successfly']);
        }else{
            return response()->json(['error'=>'Invalid Coupon']);
        }
    }

    public function calculationCoupon(){
        $userId = auth()->user()->id;

        if(FacadesSession::has('coupon')){
            return response()->json([
                'subTotal'        => number_format(\Cart::session($userId)->getTotal()),
                'coupon_name'     => session()->get('coupon')['coupon_name'],
                'coupon_discount'     => session()->get('coupon')['coupon_discount'],
                'discount_amount'     => session()->get('coupon')['discount_amount'],
                'total_amount'     => session()->get('coupon')['total_amount'],
            ]);
        }else{
            return response()->json([
                'total'        => number_format(\Cart::session($userId)->getTotal()),
            ]);
        }
    }

    public function removeCoupon(){
        FacadesSession::forget('coupon');
        return response()->json(['success'=>'Coupon Removed Successfly']);
    }
}
