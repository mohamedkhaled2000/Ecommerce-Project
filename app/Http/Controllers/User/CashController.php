<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CashController extends Controller
{
    public function cashOrder(Request $request){

        $userId = auth()->user()->id;

        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(\Cart::session($userId)->getTotal());
        }


        $order_id = Order::insertGetId([
            'user_id'       => Auth::id(),
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'post_code'     => $request->post_code,
            'division_id'   => $request->division_id,
            'district_id'   => $request->district_id,
            'state_id'      => $request->state_id,
            'notes'         => $request->notes,
            'payment_type'  => 'Cash On Delivery',
            'currency'      => 'usd',
            'amount'        => $total_amount,
            'invoice_no'    => 'EOS'.mt_rand(10000000,99999999),
            'order_date'    => Carbon::now()->format('d F Y'),
            'order_month'   => Carbon::now()->format('F'),
            'order_year'    => Carbon::now()->format('Y'),
            'status'        => 'Pending',
            'created_at'    => Carbon::now(),
        ]);

        $carts = \Cart::session($userId)->getContent();

        // Start Mail Content
        $invoice = Order::findOrFail($order_id);
        $data = [
            'invoice_no'    => $invoice->invoice_no,
            'amount'        => $total_amount,
            'name_user'     => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'payment_type'  => 'Cash On Delivery',
            'division'      => $invoice->division->shipping_name,
            'district'      => $invoice->district->district_name,
            'state'         => $invoice->state->state_name,
            'carts'         => $carts,
        ];

        Mail::to($request->email)->send(new OrderMail($data));
        // End Mail Content


        foreach($carts as $cart){
            OrderItem::insert([
                'order_id'      => $order_id,
                'product_id'    => $cart->id,
                'color'         => $cart->attributes->color,
                'size'          => $cart->attributes->size,
                'qty'           => $cart->quantity,
                'price'         => $cart->price,
                'created_at'    => Carbon::now(),
            ]);
        }

        if(Session::has('coupon')){
            Session::forget('coupon');
        }

        \Cart::clear();


        $notification = array(
            'message' => 'Your Order Place Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);

    }
}
