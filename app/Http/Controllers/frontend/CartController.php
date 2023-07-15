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
                'qty'=>$request->quantity,
                'options'=>[
                    'image'=>$product->p_image,
                    'color'=>$request->color,
                    'size'=>$request->size,
                ],
            ]);

            return response()->json(['success', 'Successfully Product added on Cart']);
        }
        else{
            Cart::add([
                'id'=>$p_id,
                'name'=>$request->p_name,
                'price'=>$product->discount_price,
                'weight'=>1,
                'qty'=>$request->quantity,
                'options'=>[
                    'image'=>$product->p_image,
                    'color'=>$request->color,
                    'size'=>$request->size,
                ],
            ]);

            return response()->json(['success', 'Successfully Product added on Cart']);

        }
    }


    function addminiCart(){
        $carts = Cart::content();
        $cartqty = Cart::count();
        $cartTotal = Cart::total();


        return  response()->json(array(
            'carts'=> $carts,
            'cartqty'=> $cartqty,
            'cartTotal'=> $cartTotal,
        ));
    }

    function miniCartremove($rowId){
        Cart::remove($rowId);
        return response()->json(['success', 'Product Removed from Cart']);
    }



}
