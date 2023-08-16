<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;

class CashController extends Controller
{

    public function cash_order (Request $request){

        if(Session::has('coupon')){
            $total_amount = session()->get('coupon')['total_amount'];
        }
        else
        {
            $total_amount = Cart::total();
        }

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

            'payment_type' => 'cod',
            'payment_method' => 'cod',
            'currency'=>'usd',
            'amount' => $total_amount,

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
                'price' => $cart->price,
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












