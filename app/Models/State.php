<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function division(){
        return $this->belongsTo(ShippingDivision::class,'divition_id','id');
    }

    public function district(){
        return $this->belongsTo(ShippingDistrict::class,'district_id','id');
    }

}
