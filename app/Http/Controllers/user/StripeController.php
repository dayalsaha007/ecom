<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe;

class StripeController extends Controller
{
    public function stripe_order (Request $request){

        \Stripe\Stripe::setApiKey('sk_test_51NcN3wJzXgMfP3ITSyoFxUodYc5JDSZ8PdD0OQp7tGBBjPTEIH8FSZwf2UdIgm0iHPftt3vwHXGoEtaDmI5pjt7W001p7R3nyv');

        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
          'amount' => 999*100,
          'currency' => 'usd',
          'description' => 'Easy Online Store',
          'source' => $token,
          'metadata' => ['order_id' => '6735'],
        ]);

        dd($charge);


    }


}
