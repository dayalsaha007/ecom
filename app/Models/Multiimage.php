<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multiimage extends Model
{
    use HasFactory;
    Protected  $guarded= ['id'];

    function rel_to_product(){
        return  $this->belongsTo(Product::class, 'p_id', 'id');
    }
}
