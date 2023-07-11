<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function addToCart(Request $request, $p_id){
        $product = Product::findorFail($p_id);

        if($product->discount_price == NULL){

            Cart::add([
                'id'=>$p_id,
                'name'=>$request->p_name,
                'price'=>$product->selling_price,
                'weight'=>1,
                'options'=>[
                    'qty'=>$request->p_qty,
                    'image'=>$product->p_image,
                    'color'=>$request->color,
                    'size'=>$request->size,
                ],
            ]);
         return response()->json(['success', 'Product added on Cart']);

        }
        else{
            Cart::add([
                'id'=>$p_id,
                'name'=>$request->p_name,
                'price'=>$product->discount_price,
                'weight'=>1,
                'options'=>[
                    'qty'=>$request->p_qty,
                    'image'=>$product->p_image,
                    'color'=>$request->color,
                    'size'=>$request->size,
                ],
            ]);

            return response()->json(['success', 'Product added on Cart']);

        }
    }
}
