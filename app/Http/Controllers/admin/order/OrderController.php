<?php

namespace App\Http\Controllers\admin\order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    function pending_to_confirm(){
        $pending_orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();
        return view('backend.admin.order.pending_orders', [
            'pending_orders'=>$pending_orders,
            ]);
    }

    function pending_order_status(Request $request){

        $order = Order::where('id', $request->pending_id)->update([
            'status'=>$request->order_status,
        ]);
        return response()->json([
            'status'=>'success',
        ]);
    }

    function confirm_to_processing(){
        $processing_orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('backend.admin.order.confirm_to_processing', [
            'processing_orders'=>$processing_orders,
            ]);
    }

    function processing_to_picked(){
        $picked_orders = Order::where('status', 'picked')->orderBy('id', 'DESC')->get();
        return view('backend.admin.order.processing_to_picked', [
            'picked_orders'=>$picked_orders,
            ]);
    }

    function picked_to_shipped(){
        $shipped_orders = Order::where('status', 'shipped')->orderBy('id', 'DESC')->get();
        return view('backend.admin.order.picked_to_shipped', [
            'shipped_orders'=>$shipped_orders,
            ]);
    }

    function shipped_to_delivered(){
        $delivered_orders = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('backend.admin.order.shipped_to_delivered', [
            'delivered_orders'=> $delivered_orders,
            ]);
    }

    function cancel_orders(){
        $cancel_orders = Order::where('status', 'canceled')->orderBy('id', 'DESC')->get();
        return view('backend.admin.order.processing_to_picked', [
            'cancel_orders'=> $cancel_orders,
            ]);
    }


}
