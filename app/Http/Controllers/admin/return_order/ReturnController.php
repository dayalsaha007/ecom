<?php

namespace App\Http\Controllers\admin\return_order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReturnController extends Controller
{


    function return_order(){
        $orders = Order::where('return_order', '1')->orderBy('id','DESC')->get();
        return view('backend.admin.return_order.return_order', [
            'orders'=>$orders,
        ]);
    }

    function return_order_list(){
        $orders = Order::where('return_order', '2')->orderBy('id','DESC')->get();
        return view('backend.admin.return_order.return_order_list', [
            'orders'=>$orders,
        ]);
    }

    function approve_return_order($order_id){

        Order::where('id', $order_id)->update([
            'return_order'=>2,
    ]);

    return back()->with('rosc', 'Return Order Approved Successfully');

    }



}
