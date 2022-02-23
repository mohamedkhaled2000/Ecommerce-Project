<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'brand_id' => 'required',
            'category_id'=> 'required',
            'subcategory_id'=> 'required',
            'sub_subcategory_id'=> 'required',
            'product_name_en'=> 'required',
            'product_name_ar'=> 'required',
            'product_slug_en'=> 'required',
            'product_slug_ar'=> 'required',
            'product_code'=> 'required',
            'product_qty'=> 'required',
            'product_tag_en'=> 'required',
            'product_tag_ar'=> 'required',
            'product_color_en'=> 'required',
            'product_color_ar'=> 'required',
            'selling_price'=> 'required',
            'short_desc_en'=> 'required',
            'short_desc_ar'=> 'required',
            'long_desc_en'=> 'required',
            'long_desc_ar'=> 'required',
            'product_thambnail'=> 'required',
        ];
    }
}


