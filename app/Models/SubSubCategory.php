<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_subcategory_name_en',
        'sub_subcategory_name_ar',
        'sub_subcategory_slug_en',
        'sub_subcategory_slug_ar',
        'category_id',
        'subcategory_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }
}
