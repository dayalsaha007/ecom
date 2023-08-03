<?php

namespace App\Http\Controllers\frontend\checkout;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    function checkout_store(Request $request){

            if(Auth::check()){
                if(Cart::total() > 0 ){

                    $carts = Cart::content();
                    $cartQty = Cart::count();
                    $cartTotal = Cart::total();

                    return view('frontend.checkout.checkout_view', [
                        'carts' =>  $carts,
                        'cartQty' =>  $cartQty,
                        'cartTotal' =>  $cartTotal,
                     ]);
                }
                else
                {
                    return redirect()->to('/login')->with('cs', 'Shop at list One Product');
                }
            }
            else
            {
                return redirect()->to('/login')->with('cs', 'Please Login First');
            }
        }



}
