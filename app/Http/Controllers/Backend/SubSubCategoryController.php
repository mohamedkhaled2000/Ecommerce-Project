<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubSubCategoryController extends Controller
{
    public function viewSubSubCategory(){
        $subsubcategories = SubSubCategory::latest()->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('backend.category.sub_subcategory_view',compact('subsubcategories','categories'));
    }

    public function subCategoryAjax($category_id){
        $subcategories = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcategories);
    }



    public function storeSubSubCategory(Request $request){

        $request->validate([
            'sub_subcategory_name_en' => 'required',
            'sub_subcategory_name_ar' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ],[
            'sub_subcategory_name_ar.required' => 'هذا الحقل مطلوب'
        ]);

        SubSubCategory::insert([
            'sub_subcategory_name_en' => $request->sub_subcategory_name_en,
            'sub_subcategory_name_ar' => $request->sub_subcategory_name_ar,
            'sub_subcategory_slug_en' => strtolower(str_replace(' ' , '-',$request->sub_subcategory_name_en)),
            'sub_subcategory_slug_ar' => strtolower(str_replace(' ' , '-',$request->sub_subcategory_name_ar)),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id
        ]);
        $notification = array(
            'message' => 'Sub-SubCategory Added Successfly',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    public function editSubSubCategory($id){
        $sub_subcategories = SubSubCategory::findOrFail($id);
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        return view('backend.category.sub_subcategory_edit',compact('sub_subcategories','categories','subcategories'));
    }

    public function updateSubSubCategory(Request $request,$id){
        $sub_subcategory = SubSubCategory::findOrFail($id);

        $sub_subcategory->sub_subcategory_name_en = $request->sub_subcategory_name_en;
        $sub_subcategory->sub_subcategory_name_ar = $request->sub_subcategory_name_ar;
        $sub_subcategory->sub_subcategory_slug_en =  strtolower(str_replace(' ' , '-',$request->sub_subcategory_name_en));
        $sub_subcategory->sub_subcategory_slug_ar =  strtolower(str_replace(' ' , '-',$request->sub_subcategory_name_ar));
        $sub_subcategory->category_id = $request->category_id;
        $sub_subcategory->subcategory_id = $request->subcategory_id;

        $sub_subcategory->save();

        $notification = array(
            'message' => 'Sub-SubCategory Updated Successfly',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subsubcategory')->with($notification);

    }



    public function deleteSubSubCategory($id){
        SubSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub-SubCategory Deleted Successfly',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

}
