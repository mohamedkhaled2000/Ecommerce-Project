<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function viewSubCategory(){
        $subcategories = SubCategory::latest()->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('backend.category.subcategory_view',compact('subcategories','categories'));
    }


    public function storeSubCategory(Request $request){

        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_ar' => 'required',
            'category_id' => 'required',
        ],[
            'subcategory_name_ar.required' => 'هذا الحقل مطلوب'
        ]);

        SubCategory::insert([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ar' => $request->subcategory_name_ar,
            'subcategory_slug_en' => strtolower(str_replace(' ' , '-',$request->subcategory_name_ar)),
            'subcategory_slug_ar' => strtolower(str_replace(' ' , '-',$request->subcategory_name_ar)),
            'category_id' => $request->category_id
        ]);
        $notification = array(
            'message' => 'SubCategory Added Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function editSubCategory($id){
        $subcategories = SubCategory::findOrFail($id);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('backend.category.subcategory_edit',compact('subcategories','categories'));
    }

    public function updateSubCategory(Request $request,$id){
        $subcategory = SubCategory::findOrFail($id);

        $subcategory->subcategory_name_en = $request->subcategory_name_en;
        $subcategory->subcategory_name_ar = $request->subcategory_name_ar;
        $subcategory->subcategory_slug_en =  strtolower(str_replace(' ' , '-',$request->subcategory_name_en));
        $subcategory->subcategory_slug_ar =  strtolower(str_replace(' ' , '-',$request->subcategory_name_ar));
        $subcategory->category_id = $request->category_id;

        $subcategory->save();

        $notification = array(
            'message' => 'SubCategory Updated Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subcategory')->with($notification);

    }

    public function deleteSubCategory($id){
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'SubCategory Deleted Successfly',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
