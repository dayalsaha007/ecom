<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    Protected $guarded = ['id'];
    function rel_to_blog(){
        return $this->belongsTo(BlogCategory::class, 'bc_id', 'id');
    }

}
