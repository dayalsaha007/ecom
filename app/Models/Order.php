<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;
    Protected $guarded = ['id'];


    function order_to_division(){
        return $this->belongsTo(Shipdivision::class, 'division_id', 'id');
    }

    function order_to_district(){
        return $this->belongsTo(Shipdistrict::class, 'district_id', 'id');
    }

    function order_to_state(){
        return $this->belongsTo(Shipstate::class, 'state_id', 'id');
    }

    function order_to_user(){
        return $this->belongsTo(User::class, 'user_id', Auth::id());
    }



}
