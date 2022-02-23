<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    public function viewCategory(){
        $categories = Category::latest()->get();
        return view('backend.category.category_view',compact('categories'));
    }


    public function storeCategory(Request $request){

        $request->validate([
            'category_name_en' => 'required',
            'category_name_ar' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_ar.required' => 'هذا الحقل مطلوب'
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_en' => strtolower(str_replace(' ' , '-',$request->category_name_en)),
            'category_slug_ar' => strtolower(str_replace(' ' , '-',$request->category_name_ar)),
            'category_icon' => $request->category_icon
        ]);
        $notification = array(
            'message' => 'Category Added Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function editCategory($id){
        $categories = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('categories'));
    }

    public function updateCategory(Request $request,$id){
        $category = Category::findOrFail($id);

        $category->category_name_en = $request->category_name_en;
        $category->category_name_ar = $request->category_name_ar;
        $category->category_slug_en =  strtolower(str_replace(' ' , '-',$request->category_name_en));
        $category->category_slug_ar =  strtolower(str_replace(' ' , '-',$request->category_name_ar));
        $category->category_icon = $request->category_icon;

        $category->save();

        $notification = array(
            'message' => 'Category Updated Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);

    }

    public function deleteCategory($id){
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Deleted Successfly',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
