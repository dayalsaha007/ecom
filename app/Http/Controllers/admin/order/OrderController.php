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

    function confirmed_orders(){
        $confirmed_orders = Order::where('status', 'confirmed')->orderBy('id', 'DESC')->get();
        return view('backend.admin.order.confirmed_orders', [
            'confirmed_orders'=>$confirmed_orders,
            ]);
    }


    function processing_orders(){
        $processing_orders = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('backend.admin.order.processing_orders', [
            'processing_orders'=>$processing_orders,
            ]);
    }

    function picked_orders(){
        $picked_orders = Order::where('status', 'picked')->orderBy('id', 'DESC')->get();
        return view('backend.admin.order.picked_orders', [
            'picked_orders'=>$picked_orders,
            ]);
    }

    function shipped_orders(){
        $shipped_orders = Order::where('status', 'shipped')->orderBy('id', 'DESC')->get();
        return view('backend.admin.order.shipped_orders', [
            'shipped_orders'=>$shipped_orders,
            ]);
    }

    function delivered_orders(){
        $delivered_orders = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('backend.admin.order.delivered_orders', [
            'delivered_orders'=> $delivered_orders,
            ]);
    }

    function canceled_orders(){
        $cancel_orders = Order::where('status', 'canceled')->orderBy('id', 'DESC')->get();
        return view('backend.admin.order.processing_to_picked', [
            'cancel_orders'=> $cancel_orders,
            ]);
    }


}
