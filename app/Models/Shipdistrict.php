<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipdistrict extends Model
{
    use HasFactory;
    Protected $guarded = ['id'];

    function rel_to_division(){
        return $this->belongsTo(Shipdivision::class, 'division_id', 'id');
        }

}
