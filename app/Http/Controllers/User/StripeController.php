<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PDF;



class StripeController extends Controller
{

    public function stripeOrder(Request $request){

        $userId = auth()->user()->id;

        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(\Cart::session($userId)->getTotal());
        }

        \Stripe\Stripe::setApiKey('sk_test_51KgBVeCEJq02g9FexsOI6qsvmiyHd0ScYLHX4jklEiFGpcDDie4pGyjmsbwygOI6sIJlAGlsVDnfjhQLDFS2sgh4008O3hbEGk');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' => $total_amount*100,
        'currency' => 'usd',
        'description' => 'Easy Shop Online',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);



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
            'payment_type'  => 'Stripe',
            'payment_method'=> $charge->payment_method,
            'transaction_id'=> $charge->balance_transaction,
            'currency'      => $charge->currency,
            'amount'        => $total_amount,
            'order_number'  => $charge->metadata->order_id,
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
            'payment_type'  => 'Stripe',
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


    public function myOrders(){
        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->paginate(7);
        return view('fontend.users.order.order_view',compact('orders'));
    }

    public function orderDetails($id){
        $order = Order::where('id',$id)->where('user_id',Auth::id())->first();
        $order_item = OrderItem::where('order_id',$id)->orderBy('id','DESC')->get();
        return view('fontend.users.order.order_details',compact('order','order_item'));
    }

    public function orderInvoice($id){
        $order = Order::where('id',$id)->where('user_id',Auth::id())->first();
        $order_item = OrderItem::where('order_id',$id)->orderBy('id','DESC')->get();
         return view('fontend.users.order.order_invoice',compact('order','order_item'));
//        $pdf = PDF::loadView('fontend.users.order.order_invoice', compact('order','order_item'));
//        return $pdf->download('invoice.pdf');


    }

}
