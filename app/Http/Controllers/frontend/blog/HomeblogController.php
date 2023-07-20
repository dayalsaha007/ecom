<?php

namespace App\Http\Controllers\frontend\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class HomeblogController extends Controller
{
    function home_blog(){
        $blogs = Blog::with('rel_to_blog')->latest()->get();
        $blog_category = BlogCategory::latest()->get();
        return view('frontend.blog.home_blog', [
            'blogs'=>$blogs,
            'blog_category'=>$blog_category,
        ]);
    }

    function blog_detail($id, $slug){
        $blog = Blog::findorFail($id);
        $blog_category = BlogCategory::latest()->get();
        return view('frontend.blog.blog_detail', [
            'blog'=>$blog,
            'blog_category'=>$blog_category,
        ]);
    }

    function cat_wise_post($id, $slug){
        $blog_category = BlogCategory::latest()->get();
        $blogs = Blog::where('bc_id', $id)->orderBy('id', 'DESC')->get();
        return view('frontend.blog.cat_wise_post', [
            'blogs'=>$blogs,
            'blog_category'=>$blog_category,
        ]);
    }
}
