<?php

namespace App\Http\Controllers\admin\report;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function all_reports(){
        return view('backend.admin.report.all_report');
    }

    function report_view(){
        return view('backend.admin.report.report_view');
    }

    function search_by_date(Request $request){

        $date = new DateTime($request->date);
        $formatedate = $date->format('d F Y');

        $orders = Order::where('order_date', $formatedate)->orderBy('id', 'DESC')->get();
        return view('backend.admin.report.report_view', [
            'orders' => $orders,
        ]);
    }

    function search_by_year(Request $request){

        $orders = Order::where('order_year', $request->year)->orderBy('id', 'DESC')->get();
        return view('backend.admin.report.report_view', [
            'orders' => $orders,
        ]);
    }

    function search_by_month(Request $request){

        $year = $request->year;
        $month = $request->month;

        $orders = Order::where('order_year', $year)->where('order_month', $month)->orderBy('id', 'DESC')->get();
        return view('backend.admin.report.report_view', [
            'orders' => $orders,
        ]);
    }



}
