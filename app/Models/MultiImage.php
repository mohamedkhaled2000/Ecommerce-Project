<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kayandra\Hashidable\Hashidable;


class MultiImage extends Model
{
    use HasFactory;
    use Hashidable;


    protected $guarded = [];

}
