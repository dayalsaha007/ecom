<?php

namespace App\Http\Controllers\frontend\checkout;

use App\Http\Controllers\Controller;
use App\Models\Shipdistrict;
use App\Models\Shipdivision;
use App\Models\Shipstate;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    function checkout(Request $request){

            if(Auth::check()){
                if(Cart::total() > 0 ){

                    $carts = Cart::content();
                    $cartQty = Cart::count();
                    $cartTotal = Cart::total();
                    $divisions = Shipdivision::latest()->get();

                    return view('frontend.checkout.checkout_view', [
                        'carts' =>  $carts,
                        'cartQty' =>  $cartQty,
                        'cartTotal' =>  $cartTotal,
                        'divisions' =>  $divisions,
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

        function division_to_district($division_id){

            $district = Shipdistrict::where('division_id', $division_id)->latest()->get();
            return json_encode($district);
        }

        function district_to_state($district_id){

            $state = Shipstate::where('district_id', $district_id)->latest()->get();
            return json_encode($state);
        }

        function checkout_store(Request $request){

            $data =  array();
            $data['shipping_name'] = $request->shipping_name;
            $data['shipping_email'] = $request->shipping_email;
            $data['shipping_mobile'] = $request->shipping_mobile;
            $data['post_code'] = $request->post_code;
            $data['notes'] = $request->notes;
            $data['division_id'] = $request->division_id;
            $data['district_id'] = $request->district_id;
            $data['state_id'] = $request->state_id;
            $cartTotal = Cart::total();


            if($request->payment_method == 'stripe'){
                return view( 'frontend.payment.stripe.stripe', ['data'=>$data, 'cartTotal'=>$cartTotal,]);
            }
            elseif($request->payment_method == 'card'){
                return "card";
            }
            else
            {
            return view( 'frontend.payment.cash.cash', ['data'=>$data, 'cartTotal'=>$cartTotal,]);
            }

        }



}
