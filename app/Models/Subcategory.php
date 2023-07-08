<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Subcategory extends Model
{
    use HasFactory;
    Protected $guarded = ['id'];

    function rel_to_category(){
        return $this->belongsTo(Category::class, 'c_id', 'id');
    }

}
