<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\ReturnMail;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReturnCotroller extends Controller
{
    public function index(){
        $orders = Order::where('return_order',1)->orderBy('id','DESC')->paginate(7);
        return view('backend.orders.return order.view_return',compact('orders'));
    }

    public function allRequest(){
        $orders = Order::where('return_order',2)->orderBy('id','DESC')->paginate(7);
        return view('backend.orders.return order.all_request',compact('orders'));
    }

    public function approveRequest($id){
        $order = Order::findOrFail($id);

        $order->update([
            'return_order' => 2
        ]);


        $order_item = OrderItem::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();

        $data = [
            'invoice_no'    => $order->invoice_no,
            'amount'        => $order->amount,
            'name_user'     => $order->name,
            'email'         => $order->email,
            'phone'         => $order->phone,
            'payment_type'  => $order->payment_type,
            'division'      => $order->division->shipping_name,
            'district'      => $order->district->district_name,
            'state'         => $order->state->state_name,
            'order_item'    => $order_item
        ];

        Mail::to($order->email)->send(new ReturnMail($data));

        $notification = array(
            'message' => 'Return Request Approved Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
}
