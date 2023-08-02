<?php

namespace App\Http\Controllers\admin\coupon;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CouponController extends Controller
{

    function view_coupons(){
        $coupons = Coupon::latest()->get();
        return view('backend.admin.coupon.view_coupons', [
            'coupons'=>$coupons,
        ]);
    }

    function coupon_store(Request $request){

        Coupon::insert([
            'coupon_name'=>Str::upper($request->coupon_name),
            'coupon_discount'=>$request->coupon_discount,
            'coupon_validity'=>$request->coupon_validity,
            'created_at'=>Carbon::now(),
        ]);

        return redirect()->route('manage_coupons')->with('sc', 'Coupon stored successfully!');
    }

    function edit_coupon($id){
        $coupons =Coupon::findorfail($id);
        return view('backend.admin.coupon.edit_coupon', [
            'coupons'=>$coupons,
        ]);
    }

    function update_coupon(Request $request){

        $coupon_id = $request->coupon_id;

        Coupon::findorFail($coupon_id)->update([
            'coupon_name'=>Str::upper($request->coupon_name),
            'coupon_discount'=>$request->coupon_discount,
            'coupon_validity'=>$request->coupon_validity,
            'updated_at'=>Carbon::now(),
        ]);
        return redirect()->route('manage_coupons')->with('sc', 'Coupon updated successfully!');
    }

    function del_coupon($id){
        $coupon = Coupon::findorFail($id);
        $coupon->delete();

        return redirect()->route('manage_coupons')->with('cd', 'Coupon deleted successfully!');

    }



}
