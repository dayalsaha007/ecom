<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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
        return response()->json(['success'=>'Cart item removed  Successfully!']);
    }

    function mycartincrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        return response()->json('increment');
    }

    function mycartdecrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        return response()->json('decrement');
    }


}
