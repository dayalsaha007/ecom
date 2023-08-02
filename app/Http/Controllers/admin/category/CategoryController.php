<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use Carbon\Carbon;
use Session;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{

    function add_category(){
        $categories = Category::latest()->get();
        return view('backend.admin.category.add_category', [
            'categories'=>$categories,
        ]);
    }


    function store_category(Request $request){

        $request->validate([
            'c_name_eng' =>'required|max:255',
            'c_name_hin' =>'required|max:255',
            'c_icon' =>'required',
        ],
    [
        'c_name_eng.request'  =>   'Name field is required',
        'c_name_hin.request'  =>   'Name field hindi is required',
        'c_icon.request'  =>   'Icon field is required',
    ]);

        $c_slug_eng = str::lower(str_replace(' ', '-', $request->c_name_eng));
        $c_slug_hin = Str::lower(str_replace(' ', '-', $request->c_name_hin));


        Category::insert([
            'c_name_eng' => $request->c_name_eng,
            'c_name_hin' => $request->c_name_hin,
            'c_slug_eng' => $c_slug_eng,
            'c_slug_hin' => $c_slug_hin,
            'c_icon' => $request->c_icon,
            'created_at' =>  Carbon::now(),
        ]);
        return redirect()->route('add_category')->with('ac', 'Category added Successfully!');
    }

    function edit_category($id){
        Session::forget('ac');
        $cat_info = Category::findorFail($id);
        return view('backend.admin.category.edit_category', [
            'cat_info'=>$cat_info,
        ]);
    }


    function update_category(Request $request){
        $cat_id = $request->cat_id;
        Category::findorFail($cat_id)->update([
            'c_name_eng' => $request->c_name_eng,
            'c_name_hin' => $request->c_name_hin,
            'c_icon' => $request->c_icon,
            'created_at' =>  Carbon::now(),
        ]);
        return redirect()->route('add_category')->with('ac', 'Category updated Successfully!');
    }

    function  del_category($id){
            $category = Category::findorFail($id);
                $category->delete();
        return redirect()->route('add_category')->with('ac', 'Category deleted Successfully!');
    }




}
