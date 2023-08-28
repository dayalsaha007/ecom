<?php

namespace App\Http\Controllers\frontend\frontend_dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class Frontend_DashboardController extends Controller
{

    function dashboard(){
        return view('frontend.admin.dashboard');
    }

    function my_order(){
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('frontend.admin.order.my_order', [
            'orders'=> $orders,
        ]);
    }

    function order_details($order_id){

        $orders = Order::where('id', $order_id)->where('user_id', Auth::id())->orderBy('id', 'DESC')->first();
        $order_items = OrderItem::where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return view('frontend.admin.order.order_details', [
            'orders'=>$orders,
            'order_items'=>$order_items,
        ]);

    }


    function invoice_download($order_id){

        $order = Order::where('id', $order_id)->where('user_id', Auth::id())->orderBy('id', 'DESC')->first();
        $order_items = OrderItem::where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('frontend.admin.invoice', compact('order','order_items'))->setPaper('a4')->setOptions([
            'tempDir'=> public_path(),
            'chroot'=> public_path(),
        ]);
         return $pdf->download('invoice.pdf');

    }

    function return_order(Request $request,$order_id){
            Order::findorFail($order_id)->update([
                'return_date'=>Carbon::now()->format('d F y'),
                'return_reason'=>$request->return_reason,
                'return_order'=>1,
            ]);

            return redirect()->route('my_order')->with('or', 'Order Return Request Received!');

    }

    function return_order_list(){
        $orders = Order::where('user_id', Auth::id())->where('return_order', '=', '1')->orderBy('id', 'DESC')->get();
        return view('frontend.admin.order.return_order', [
            'orders'=> $orders,
        ]);
    }

    function cancel_order_list(){
        $orders = Order::where('user_id', Auth::id())->where('status', '=', 'canceled')->orderBy('id', 'DESC')->get();
        return view('frontend.admin.order.cancel_order', [
            'orders'=> $orders,
        ]);
    }



}
