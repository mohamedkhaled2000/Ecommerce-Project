<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function pendingOrder(){
        $orders = Order::where('status','Pending')->orderBy('id','DESC')->get();
        return view('backend.orders.pending',compact('orders'));
    }

    public function pendingDetails($id){
        $order = Order::where('id',$id)->first();
        $order_item = OrderItem::where('order_id',$id)->orderBy('id','DESC')->get();
        return view('backend.orders.pending_details',compact('order','order_item'));
    }

    public function confirmedOrder(){
        $orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('backend.orders.confirmed',compact('orders'));
    }

    public function processingOrder(){
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('backend.orders.processing',compact('orders'));
    }

    public function pickedOrder(){
        $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('backend.orders.picked',compact('orders'));
    }

    public function shippingOrder(){
        $orders = Order::where('status','shipping')->orderBy('id','DESC')->get();
        return view('backend.orders.shipping',compact('orders'));
    }

    public function deliveredOrder(){
        $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('backend.orders.delivered',compact('orders'));
    }

    public function cancelOrder(){
        $orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
        return view('backend.orders.cancel',compact('orders'));
    }

    public function pending_confirm($type,$id){

        if($type === 'delivered'){
            $product = OrderItem::where('order_id',$id)->get();
            foreach($product as $item){
                Product::where('id',$item->product_id)->update([
                    'product_qty' => DB::raw('product_qty-'.$item->qty)
                ]);
            }
        }
        Order::findOrFail($id)->update([
            'status'        => $type,
            $type.'_date'   => Carbon::now()->format('d F Y')
        ]);

        $notification = array(
            'message' => 'Order '.$type.' Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route($type.'.orders')->with($notification);
    }

    public function adminInvoice($id){
        $order = Order::where('id',$id)->first();
        $order_item = OrderItem::where('order_id',$id)->orderBy('id','DESC')->get();
        return view('fontend.users.order.order_invoice',compact('order','order_item'));
    }

    public function orderReturn(Request $request,$id){
        Order::findOrFail($id)->update([
            'return_date'   => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);

        $notification = array(
            'message' => 'Return Request Send Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('my.orders')->with($notification);
    }



}
