<?php

namespace App\Http\Controllers\admin\subcategory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class SubcategoryController extends Controller
{

    function add_sub_category(){
        $categories =  Category::latest()->get();
        $subcategories =  Subcategory::latest()->get();
        return view('backend.admin.subcategory.add_sub_category', [
            'categories'=> $categories,
            'subcategories'=> $subcategories,
        ]);
    }

    function store_sub_category(Request $request){

        $request->validate([
            'sc_name_eng' =>'required|max:255',
            'sc_name_hin' =>'required|max:255',
            'c_id' =>'required',
        ],
    [
        'sc_name_eng.request'  =>   'Name field eng is required',
        'sc_name_hin.request'  =>   'Name field hindi is required',
        'sc_id.request'  =>   'please select one category',
    ]);

        $sc_slug_eng = str::lower(str_replace(' ', '-', $request->sc_name_eng));
        $sc_slug_hin = Str::lower(str_replace(' ', '-', $request->sc_name_hin));


        Subcategory::insert([
            'sc_name_eng' => $request->sc_name_eng,
            'sc_name_hin' => $request->sc_name_hin,
            'sc_slug_eng' => $sc_slug_eng,
            'sc_slug_hin' => $sc_slug_hin,
            'c_id' => $request->c_id,
            'created_at' =>  Carbon::now(),
        ]);
        return redirect()->route('add_sub_category')->with('asc', 'Subcategory added Successfully!');
    }

    function edit_sub_category($id){
        $sub_categories = Subcategory::find($id);
        $categories =  Category::latest()->get();
            return view('backend.admin.subcategory.edit_sub_category', [
                'sub_categories'=>$sub_categories,
                'categories'=> $categories,
            ]);
    }


    function update_sub_category(Request $request){
            $sub_id = $request->subcat_id;

            Subcategory::findorFail($sub_id)->update([
              'sc_name_eng' => $request->sc_name_eng,
               'sc_name_hin' => $request->sc_name_hin,
                'c_id' => $request->c_id,
            ]);
        return redirect()->route('add_sub_category')->with('asc', 'Subcategory Updated Successfully!');
    }

    function del_sub_category($id){
        Subcategory::findorFail($id)->delete();
      return redirect()->route('add_sub_category')->with('asc', 'Subcategory deleted Successfully!');
    }



}
