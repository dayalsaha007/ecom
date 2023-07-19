<?php

namespace App\Http\Controllers\admin\blogcategory;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{

    function blog_category(){
        $blog_cats = BlogCategory::latest()->get();
        return view('backend/admin/blog/blogcategory',[
            'blog_cats'=>$blog_cats,
        ]);
    }



    function add_b_category(Request $request){

        $bc_slug_eng = Str::lower(str_replace('','-', $request->bc_name_eng));
        $bc_slug_hin = Str::lower(str_replace('','-', $request->bc_name_hin));

        BlogCategory::insert([
            'bc_name_eng'=>$request->bc_name_eng,
            'bc_name_hin'=>$request->bc_name_hin,
            'bc_slug_eng'=>$bc_slug_eng,
            'bc_slug_hin'=>$bc_slug_hin,
        ]);
        return redirect()->route('blog_category')->with('bc_add','Blog category added successfully');
    }


    function bc_edit($id){

        $blog_category = BlogCategory::findorFail($id);

        return view('backend/admin/blog/edit_blogcategory', [
            'blog_category'=>$blog_category,
        ]);

    }


    function bc_del($id){
        $blog_category = BlogCategory::findorFail($id);
        $blog_category->delete();
        return redirect()->route('blog_category')->with('bc_add','Blog category deleted successfully');
    }

    function update_b_category(Request $request){

        $bc_id = $request->bc_id;
        $bc_slug_eng = Str::lower(str_replace('','-', $request->bc_name_eng));
        $bc_slug_hin = Str::lower(str_replace('','-', $request->bc_name_hin));

        BlogCategory::findorFail($bc_id)->update([

            'bc_name_eng'=>$request->bc_name_eng,
            'bc_name_hin'=>$request->bc_name_hin,
            'bc_name_eng'=>$bc_slug_eng,
            'bc_name_hin'=>$bc_slug_hin,

        ]);
        return redirect()->route('blog_category')->with('bc_add','Blog category updated successfully');

    }

}
