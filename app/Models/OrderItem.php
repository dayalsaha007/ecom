<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    Protected $guarded = ['id'];

    function order_item_to_product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
