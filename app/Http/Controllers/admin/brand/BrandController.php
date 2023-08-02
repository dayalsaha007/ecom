<?php

namespace App\Http\Controllers\admin\brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    function view_brand(){
            $brands =   Brand::latest()->get();
        return view('backend.admin.brand.view_brand',[
            'brands'=>$brands,
        ]);
    }

    function store_brand(Request $request){


        $request->validate([
            'b_name_eng' =>'required|max:255',
            'b_name_hin' =>'required|max:255',
            'b_image' =>'required',
        ],
    [
        'b_name_eng.request'  =>   'Name field is required',
        'b_name_hin.request'  =>   'Name field hindi is required',
        'b_image.request'  =>   'Image field is required',
    ]);

        $b_slug_eng = Str::lower(str_replace(' ', '-', $request->b_name_eng));
        $b_slug_hin = Str::lower(str_replace(' ', '-', $request->b_name_hin));
        $image = $request->b_image;
        $ext =  $image->getClientOriginalExtension();
        $file = Str::lower(str_replace(' ', '-', $request->b_name_eng)).hexdec(uniqId()).'.'.$ext;

        Image::make($image)->save(public_path('uploads/brand_image/'.$file));

        Brand::insert([
            'b_name_eng' => $request->b_name_eng,
            'b_name_hin' => $request->b_name_hin,
            'b_slug_eng' => $b_slug_eng,
            'b_slug_hin' => $b_slug_hin,
            'b_image' => $file,
            'created_at' =>  Carbon::now(),
        ]);
        return redirect()->route('view_brand')->with('vb', 'Brand added Successfully!');
    }

    function edit_brand($id){
        $brands = Brand::find($id);
        return view('backend.admin.brand.edit_brand',[
            'brands'=>$brands,
        ]);
    }

    function  update_brand(Request $request){

        $brand_id = $request->brand_id;
        $b_slug_eng = Str::lower(str_replace(' ', '-', $request->b_name_eng));
        $b_slug_hin = Str::lower(str_replace(' ', '-', $request->b_name_hin));

        if($request->b_image == ''){
            Brand::findorFail($brand_id)->update([
                'b_name_eng' => $request->b_name_eng,
                'b_name_hin' => $request->b_name_hin,
                'b_slug_eng' => $b_slug_eng,
                'b_slug_hin' => $b_slug_hin,
                'created_at' =>  Carbon::now(),
            ]);

        }
        else
        {

        $ex_image = Brand::findorFail($brand_id);
        $from = public_path('/uploads/brand_image/'.$ex_image->b_image);
        unlink($from);

        $image = $request->b_image;
        $ext =  $image->getClientOriginalExtension();
        $file = Str::lower(str_replace(' ', '-', $request->b_name_eng)).hexdec(uniqId()).'.'.$ext;

        Image::make($image)->save(public_path('uploads/brand_image/'.$file));

        Brand::findorFail($brand_id)->update([
            'b_name_eng' => $request->b_name_eng,
            'b_name_hin' => $request->b_name_hin,
            'b_slug_eng' => $b_slug_eng,
            'b_slug_hin' => $b_slug_hin,
            'b_image' => $file,
            'created_at' =>  Carbon::now(),
            ]);

        }
        return redirect()->route('view_brand')->with('vb', 'Brand updated Successfully!');
    }


    function del_brand($id){


        $brand = Brand::find($id);
        $ex_image = Brand::findorFail($id);
        $from = public_path('/uploads/brand_image/'.$ex_image->b_image);
        unlink($from);

        $brand->delete();

        return back()->with('vb', 'Brand Deleted Successfully!');

    }



}
