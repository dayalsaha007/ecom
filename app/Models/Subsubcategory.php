<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subsubcategory extends Model
{
    use HasFactory;
    Protected  $guarded = ['id'];

    function rel_to_category(){
        return $this->belongsTo(Category::class, 'c_id', 'id');
    }
    function rel_to_subcategory(){
        return $this->belongsTo(Subcategory::class, 'sc_id', 'id');
    }

}
