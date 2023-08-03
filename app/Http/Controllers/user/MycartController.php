<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MycartController extends Controller
{

    function mycart(){
        return view('frontend.mycart.mycart');
    }

    function show_mycart(){
        $carts = Cart::content();
        $cartqty = Cart::count();
        $cartTotal = Cart::total();

        return  response()->json(array(
            'carts'=> $carts,
            'cartqty'=> $cartqty,
            'cartTotal'=> $cartTotal,
        ));

    }

    function mycart_remove($rowId){
        Cart::remove($rowId);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json(['success'=>'Cart item removed  Successfully!']);
    }

    function mycartincrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        if(Session::has('coupon')){

            $coupon_name = Session::get('coupon')['coupon_name'];
        $coupon = Coupon::where('coupon_name', $coupon_name)->first();

        Session::put('coupon', [
            'coupon_name' => $coupon->coupon_name,
            'coupon_discount' => $coupon->coupon_discount,
            'discount_amount' => Cart::total() * $coupon->coupon_discount/100,
            'total_amount' =>   Cart::total() - Cart::total() * $coupon->coupon_discount/100,
        ]);

        }

        return response()->json('increment');
    }

    function mycartdecrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        if(Session::has('coupon')){

            $coupon_name = Session::get('coupon')['coupon_name'];
        $coupon = Coupon::where('coupon_name', $coupon_name)->first();

        Session::put('coupon', [
            'coupon_name' => $coupon->coupon_name,
            'coupon_discount' => $coupon->coupon_discount,
            'discount_amount' => Cart::total() * $coupon->coupon_discount/100,
            'total_amount' =>   Cart::total() - Cart::total() * $coupon->coupon_discount/100,
        ]);

        }

        return response()->json('decrement');
    }


}
