<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            return response()->json(['success'=> 'Successfully Product added on Cart']);
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

            return response()->json(['success'=> 'Successfully Product added on Cart']);

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
        return response()->json(['success'=> 'Product Removed from Cart']);
    }


    function addToWishlist(Request  $request, $p_id){

        if(Auth::check()){
            $exists =  Wishlist::where('user_id',  Auth::id())->where('p_id',  $p_id)->first();
            if(!$exists){
                Wishlist::insert([
                    'user_id'=>Auth::id(),
                    'p_id'=>$request->p_id,
                    'created_at'=> Carbon::now(),
                ]);
                return response()->json(['success' => 'Cart Added Successfully!']);
            }
            else{
                return response()->json(['error'=> 'Product Already in your Wishlist!']);
            }
        }
        else{
            return response()->json(['error'=> 'Please login First!']);
        }
    }

}
