<?php

namespace App\Http\Controllers\admin\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use  Intervention\Image\Facades\Image;

class BlogController extends Controller
{

    function add_b_post(){
        $blog_category = BlogCategory::latest()->get();
        return view('backend/admin/blog/add_b_post',[
            'blog_category'=>$blog_category,
        ]);
    }

    function post_store(Request $request){

        $post_slug_eng = Str::lower(str_replace('','-',$request->post_title_eng));
        $post_slug_hin = Str::lower(str_replace('','-',$request->post_title_hin));

        $post_image =$request->post_image;
        $ext = $post_image->getClientOriginalExtension();
        $file = hexdec(uniqId()).'.'.$ext;

        Image::make($post_image)->save(public_path('uploads/blog/'.$file));


        Blog::insert([
            'bc_id'=>$request->bc_id,
            'post_title_eng'=>$request->post_title_eng,
            'post_title_hin'=>$request->post_title_hin,
            'post_slug_eng'=>$post_slug_eng,
            'post_slug_hin'=>$post_slug_hin,
            'post_image'=>$file,
            'post_details_eng'=>$request->post_details_eng,
            'post_details_hin'=>$request->post_details_hin,
            'created_at'=>Carbon::now(),
        ]);

        return redirect()->route('view_blog_post')->with('post_add','Post added successfully');

    }

    function view_blog_post(){
        $blogs = Blog::with('rel_to_blog')->latest()->get();
        $blog_category = BlogCategory::latest()->get();
        return view('backend.admin.blog.view_blog_post', [
            'blogs'=>$blogs,
            'blog_category'=>$blog_category,
        ]);
    }

    function edit_blog_post($id){
        $blogs = Blog::findorFail($id);
        $blog_category = BlogCategory::latest()->get();
        return view('backend.admin.blog.edit_b_post', [
            'blogs'=>$blogs,
            'blog_category'=>$blog_category,
        ]);
    }

    function update_post(Request $request){
        $blog_id = $request->bpost_id;
        $blog = Blog::findorFail($blog_id);

        $post_slug_eng = Str::lower(str_replace('','-',$request->post_title_eng));
        $post_slug_hin = Str::lower(str_replace('','-',$request->post_title_hin));

        if($request->post_image != null ){

            $blog = Blog::findorFail($blog_id);
            $del_path = public_path('uploads/blog/'.$blog->post_image);
            unlink($del_path);

            $post_image =$request->post_image;
            $ext = $post_image->getClientOriginalExtension();
            $file = hexdec(uniqId()).'.'.$ext;

            Image::make($post_image)->save(public_path('uploads/blog/'.$file));

            $blog->update([
                'bc_id'=>$request->bc_id,
                'post_title_eng'=>$request->post_title_eng,
                'post_title_hin'=>$request->post_title_hin,
                'post_slug_eng'=>$post_slug_eng,
                'post_slug_hin'=>$post_slug_hin,
                'post_image'=>$file,
                'post_details_eng'=>$request->post_details_eng,
                'post_details_hin'=>$request->post_details_hin,
                'updated_at'=>Carbon::now(),
            ]);
            return redirect()->route('view_blog_post')->with('post_add','Post updated with out Image');

        }
        else
        {

            $blog->update([
                'bc_id'=>$request->bc_id,
                'post_title_eng'=>$request->post_title_eng,
                'post_title_hin'=>$request->post_title_hin,
                'post_slug_eng'=>$post_slug_eng,
                'post_slug_hin'=>$post_slug_hin,
                'post_details_eng'=>$request->post_details_eng,
                'post_details_hin'=>$request->post_details_hin,
                'updated_at'=>Carbon::now(),
            ]);
            return redirect()->route('view_blog_post')->with('post_add','Post updated with Image');
        }

    }



}
