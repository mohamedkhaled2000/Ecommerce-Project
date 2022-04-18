<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function submitReview(Request $request){

        $review_check = Review::where('user_id',Auth::id())->where('product_id',$request->product_id)->first();

        if($review_check){
            $review_check->update([
                'summary'       => $request->summary,
                'comment'       => $request->comment,
                'product_rating'=> $request->product_rating,
                'updated_at'    => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'You Review Update Successfuly',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }else{
            Review::insert([
                'product_id'    => $request->product_id,
                'user_id'       => Auth::id(),
                'summary'       => $request->summary,
                'comment'       => $request->comment,
                'product_rating'=> $request->product_rating,
                'created_at'    => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'You Review Send Successfuly',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }

    }

    public function pending(){
        $reviews = Review::where('status',0)->latest()->get();
        return view('backend.reviews.pending',compact('reviews'));
    }

    public function publish(){
        $reviews = Review::where('status',1)->latest()->get();
        return view('backend.reviews.publish',compact('reviews'));
    }

    public function approveRequest($id){
        Review::findOrFail($id)->update([
            'status'        => 1,
            'updated_at'    => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Review Updeted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function deleteRequest($id){
        Review::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Review Deleted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
