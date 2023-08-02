<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Brand;

class Product extends Model
{
    use HasFactory;
    Protected $guarded = ['id'];

    function  rel_to_cat(){
        return $this->belongsTo(Category::class, 'c_id', 'id');
    }
    function  rel_to_brand(){
        return $this->belongsTo(Brand::class, 'b_id', 'id');
    }
}
