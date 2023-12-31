<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripeController extends Controller
{
    public function stripe_order (Request $request){

        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }
        else
        {
            $total_amount = Cart::total();
        }


        \Stripe\Stripe::setApiKey('sk_test_51NcN3wJzXgMfP3ITSyoFxUodYc5JDSZ8PdD0OQp7tGBBjPTEIH8FSZwf2UdIgm0iHPftt3vwHXGoEtaDmI5pjt7W001p7R3nyv');

        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
          'amount' => $total_amount*100,
          'currency' => 'usd',
          'description' => 'Easy Online Store',
          'source' => $token,
          'metadata' => ['order_id' => uniqid()],
        ]);

        // dd($charge);

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'payment_type' => 'Stripe',
            'payment_method' => 'Stripe',
            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,

            'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),

        ]);


        $invoice = Order::findorFail($order_id);
        $data = [
            'invoice_no' => $invoice->invoice_no,
            'name' => $invoice->name,
            'email' => $invoice->email,
            'amount' => $total_amount,
        ];


        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' =>$cart->price,
                'created_at' => Carbon::now(),

            ]);
        }
     if (Session::has('coupon')) {
        Session::forget('coupon');
         }

        Cart::destroy();

         return redirect()->route('index')->with('os', 'Order Placed Successfully');

    }


}
