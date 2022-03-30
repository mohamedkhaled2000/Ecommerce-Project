<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    
    public function reportView(){
        return view('backend.report.all_reports');
    }

    public function reportByDate(Request $request){
        $date = new DateTime($request->date);
        $format = $date->format('d F Y');
        $orders = Order::where('order_date',$format)->latest()->get();
        return view('backend.report.report_date',compact('orders'));
    }

    public function reportByMonth(Request $request){
        $orders = Order::where('order_month',$request->month)->where('order_year',$request->year_name)->latest()->get();
        return view('backend.report.report_date',compact('orders'));
    }

    public function reportByYear(Request $request){
        $orders = Order::where('order_year',$request->year)->latest()->get();
        return view('backend.report.report_date',compact('orders'));
    }
}
