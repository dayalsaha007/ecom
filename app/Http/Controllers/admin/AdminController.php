<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Http\RedirectResponse;


class AdminController extends Controller
{


    function admin_dashboard(){
        return view('backend.admin.dashboard');
    }


    function admin_login(){
        return view('backend.admin.admin_login');
    }

    function admin_register(){
        return view('backend.admin.admin_register');
    }

    function store_add_reg(Request $request){

        $password_confirmation = $request->password_confirmation;
        $password = $request->password;

        if($password == $password_confirmation){

            Admin::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('admin_login')->with('ad_reg', 'admin register successfully!');

        }
        else
        {
            return redirect()->route('admin_register')->with('error', 'Password does not matched!');
        }

    }

    function admin_log(Request $request){

        $check = $request->all();

        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password'] ]))  {
            return redirect()->route('admin_dashboard')->with('ad_login', 'admin login successfully!');
        }
        else
        {
            return redirect()->route('admin_login')->with('add_log', 'Password or email does not matched!');
        }


    }


    function ad_logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('hudai', 'Admin logout successfully!');
    }

    function ad_profile(){
        $admins =   Admin::findorfail(Auth::guard('admin')->id());
        return view('backend.admin.ad_profile',[
            'admins'=>$admins,
        ]);
    }


    function up_ad_profile(Request $request){

        $admin_id = Auth::guard('admin')->id();
        if ($request->image == '') {
            if ($request->password == '') {
                Admin::findorFail($admin_id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'created_at' => Carbon::now(),
                ]);

                return  redirect()->route('ad_profile')->with('up_w_n', 'Profile Updated without Image!');
            }
            else
             {
                if (Hash::check($request->old_password, Auth::guard('admin')->user()->password)) {

                    Admin::findorFail($admin_id)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'created_at' => Carbon::now(),
                    ]);
                    return  redirect()->route('ad_profile')->with('up_w_p', 'Profile Updated with Password!');
                }
                else
                {

                    return  redirect()->route('ad_profile')->with('up_wo_p', 'Password Does not Matched!');
                }
            }
        }
        else
         {

            if ($request->password == '') {

                $user_name = $request->name;
                $image  = $request->image;
                $ext  = $image->getClientOriginalExtension();
                $file_name =  hexdec(uniqId()).'.'.$ext;

                Image::make($image)->save(public_path('uploads/admin_image/'. $file_name));

                Admin::findorFail($admin_id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'image' => $file_name,
                    'created_at' => Carbon::now(),
                ]);

                return  redirect()->route('ad_profile')->with('up_w_im', 'Profile Updated with Image!');
            }
            else
             {

                if (Hash::check($request->old_password, Auth::guard('admin')->user()->password)) {

                    $user_name = $request->name;
                    $image  = $request->image;
                    $ext  = $image->getClientOriginalExtension();
                    $file_name =  hexdec(uniqId()).'.'.$ext;

                    Image::make($image)->save(public_path('uploads/admin_image/'.$file_name));

                    Admin::findorFail($admin_id)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'image' => $file_name,
                        'password' => Hash::make($request->password),
                        'created_at' => Carbon::now(),
                    ]);

        return  redirect()->route('ad_profile')->with('up_w_i_p', 'Profile Updated with Image & Password!');
                }
	    else
	         {

                    return  redirect()->route('ad_profile')->with('up_wo_p', 'Password Does not Matched!');
                }
            }
        }


    }




}
