<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipstate extends Model
{
    use HasFactory;
    Protected $guarded = ['id'];


    function rel_to_division(){
        return $this->belongsTo(Shipdivision::class, 'division_id', 'id');
        }

        function rel_to_district(){
            return $this->belongsTo(Shipdistrict::class, 'district_id', 'id');
            }

}
