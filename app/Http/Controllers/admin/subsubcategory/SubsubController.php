<?php

namespace App\Http\Controllers\admin\subsubcategory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;


class SubsubController extends Controller
{

        function add_subsub_category(){
            $categories = Category::latest()->get();
            $sub_categories = Subcategory::latest()->get();
            $subsub_categories = Subsubcategory::latest()->get();
            return view('backend.admin.subsub_category.add_subsub_category', [
                'categories'=>$categories,
                'sub_categories'=>$sub_categories,
                'subsub_categories'=>$subsub_categories,
            ]);
        }

        function subcategory($c_id){
            $sub_cat = Subcategory::where('c_id', $c_id)->orderBy('sc_name_eng', 'ASC')->get();
            return json_encode($sub_cat);
        }

        function store_subsub_category(Request $request){

            $request->validate([
                'ssc_name_eng' =>'required|max:255',
                'ssc_name_hin' =>'required|max:255',
                'c_id' =>'required',
                'sc_id' =>'required',
            ],
        [
            'ssc_name_eng.request'  =>   'Name field is required',
            'ssc_name_hin.request'  =>   'Name field hindi is required',
            'c_id'  =>   'Category field is required',
            'sc_id'  =>   'Subcategory field is required',
        ]);

            $ssc_slug_eng = str::lower(str_replace(' ', '-', $request->ssc_name_eng));
            $ssc_slug_hin = Str::lower(str_replace(' ', '-', $request->ssc_name_hin));


            Subsubcategory::insert([
                'c_id' => $request->c_id,
                'sc_id' => $request->sc_id,
                'ssc_name_eng' => $request->ssc_name_eng,
                'ssc_name_hin' => $request->ssc_name_hin,
                'ssc_slug_eng' => $ssc_slug_eng,
                'ssc_slug_hin' => $ssc_slug_hin,
                'created_at' =>  Carbon::now(),
            ]);
            return redirect()->route('add_subsub_category')->with('ssc_s', 'Subsubcategory added Successfully!');

        }

        function edit_subsub_cat($id){

            $cat = Category::latest()->get();
            $sub_cat = Subcategory::latest()->get();
            $sub_sub = Subsubcategory::findorFail($id);
            return view('backend.admin.subsub_category.edit_subsub_cat', [
                'cat'=>$cat,
                'sub_cat'=>$sub_cat,
                'sub_sub'=>$sub_sub,
            ]);
        }


        function update_subsub_category(Request $request){
                $subsub_id = $request->subsubcat_id;


                $ssc_slug_eng = str::lower(str_replace(' ', '-', $request->ssc_name_eng));
                $ssc_slug_hin = Str::lower(str_replace(' ', '-', $request->ssc_name_hin));


                Subsubcategory::findorFail($subsub_id)->update([
                    'c_id' => $request->c_id,
                    'sc_id' => $request->sc_id,
                    'ssc_name_eng' => $request->ssc_name_eng,
                    'ssc_name_hin' => $request->ssc_name_hin,
                    'ssc_slug_eng' => $ssc_slug_eng,
                    'ssc_slug_hin' => $ssc_slug_hin,
                    'created_at' =>  Carbon::now(),
                ]);
                return redirect()->route('add_subsub_category')->with('ssc_s', 'Subsubcategory updated Successfully!');
        }

        function del_subsub_cat($id){

            $subsub_cat = Subsubcategory::findorFail($id);
                $subsub_cat->delete();
        return redirect()->route('add_subsub_category')->with('ssc_d', 'Subsubcategory deleted Successfully!');

        }


}
