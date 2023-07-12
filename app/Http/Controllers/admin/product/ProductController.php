<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Multiimage;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class ProductController extends Controller
{

    function add_product()
    {
        $brands = Brand::latest()->get();
        $category = Category::latest()->get();
        $subcategory = Subcategory::latest()->get();
        $subsubcategory = Subsubcategory::latest()->get();
        return view('backend.admin.product.add_product', [
            'brands' => $brands,
            'category' => $category,
            'subcategory' => $subcategory,
            'subsubcategory' => $subsubcategory,
        ]);
    }

    function subsubcategory($sc_id)
    {
        $subsub_cat = Subsubcategory::where('sc_id', $sc_id)->orderBy('ssc_name_eng', 'ASC')->get();
        return json_encode($subsub_cat);
    }

    function  store_product(Request $request)
    {
        $p_slug_eng = Str::lower(str_replace(' ', '-', $request->p_name_eng));
        $p_slug_hin = Str::lower(str_replace(' ', '-', $request->p_name_hin));

        $p_image = $request->p_image;
        $ext = $p_image->getClientOriginalExtension();
        $file  = Str::lower(str_replace(' ', '-', $request->p_name_eng)).'-'. hexdec(uniqId()).'.'.$ext;

        Image::make($p_image)->save(public_path('uploads/p_image/'.$file));

        $product_id = Product::insertGetId([
            'b_id'            => $request->b_id,
            'c_id'            => $request->c_id,
            'sc_id'           => $request->sc_id,
            'ssc_id'          => $request->ssc_id,
            'p_name_eng'      => $request->p_name_eng,
            'p_name_hin'      => $request->p_name_hin,
            'p_slug_eng'      => $p_slug_eng,
            'p_slug_hin'      => $p_slug_hin,
            'p_code'          => $request->p_code,
            'p_qty'           => $request->p_qty,
            'p_tags_eng'      => $request->p_tags_eng,
            'p_tags_hin'      => $request->p_tags_hin,
            'p_size_eng'      => $request->p_size_eng,
            'p_size_hin'      => $request->p_size_hin,
            'p_color_eng'     => $request->p_color_eng,
            'p_color_hin'     => $request->p_color_hin,
            'selling_price'   => $request->selling_price,
            'discount_price'  => $request->discount_price,
            'short_descp_eng' => $request->short_descp_eng,
            'short_descp_hin' => $request->short_descp_eng,
            'long_descp_eng'  => $request->long_descp_eng,
            'long_descp_hin'  => $request->long_descp_hin,
            'p_image'         => $file,
            'hot_deals'       => $request->hot_deals,
            'featured'        => $request->featured,
            'special_offer'   => $request->special_offer,
            'special_deals'   => $request->special_deals,
            'created_at'      => Carbon::now(),
        ]);

        $images = $request->multi_image;
        if ($images !=  '') {

         foreach ($images as $image) {
            $ext = $image->getClientOriginalExtension();
            $file_name  = Str::lower(str_replace(' ', '-', $request->p_name_eng)).'-'.hexdec(uniqId()).'.'.$ext;

            Image::make($image)->save(public_path('uploads/multi_image/'.$file_name));

            Multiimage::insert([
                'p_id'=>$product_id,
                'multi_image'=>$file_name,
                'created_at'=>Carbon::now(),
            ]);

        }
    }
    return redirect()->route('add_product')->with('ap', 'Product  added successfully');

  }

  function view_product(){
    $brands = Brand::latest()->get();
    $category = Category::latest()->get();
    $subcategory = Subcategory::latest()->get();
    $subsubcategory = Subsubcategory::latest()->get();
    $products = Product::latest()->get();
    return view('backend.admin.product.view_product',[
        'brands'         => $brands,
        'category'       => $category,
        'subcategory'    => $subcategory,
        'subsubcategory' => $subsubcategory,
        'products'       => $products,
    ]);

  }

    function edit_product($id){
            $brands = Brand::latest()->get();
            $category = Category::latest()->get();
            $subcategory = Subcategory::latest()->get();
            $subsubcategory = Subsubcategory::latest()->get();
            $product_info  =  Product::findorFail($id);
            $multi_image  =   Multiimage::where('p_id', $product_info->id)->get();

        return view('backend.admin.product.edit_product', [
            'product_info'   => $product_info,
            'brands'         => $brands,
            'category'       => $category,
            'subcategory'    => $subcategory,
            'subsubcategory' => $subsubcategory,
            'multi_image'    => $multi_image,
        ]);
    }


    function update_product(Request  $request){
        $p_id = $request->p_id;
        $p_slug_eng = Str::lower(str_replace(' ', '-', $request->p_name_eng));
        $p_slug_hin = Str::lower(str_replace(' ', '-', $request->p_name_hin));

        if($request->p_image != null){

        $image = Product::findorFail($p_id);
        $delete_form = public_path('uploads/p_image/'.$image->p_image);
        unlink($delete_form);


        $p_image = $request->p_image;
        $ext = $p_image->getClientOriginalExtension();
        $file  = Str::lower(str_replace(' ', '-', $request->p_name_eng)).'-'. hexdec(uniqId()).'.'.$ext;

        Image::make($p_image)->save(public_path('uploads/p_image/'.$file));

         Product::findorFail($p_id)->update([
            'b_id'            => $request->b_id,
            'c_id'            => $request->c_id,
            'sc_id'           => $request->sc_id,
            'ssc_id'          => $request->ssc_id,
            'p_name_eng'      => $request->p_name_eng,
            'p_name_hin'      => $request->p_name_hin,
            'p_slug_eng'      => $p_slug_eng,
            'p_slug_hin'      => $p_slug_hin,
            'p_code'          => $request->p_code,
            'p_qty'           => $request->p_qty,
            'p_tags_eng'      => $request->p_tags_eng,
            'p_tags_hin'      => $request->p_tags_hin,
            'p_size_eng'      => $request->p_size_eng,
            'p_size_hin'      => $request->p_size_hin,
            'p_color_eng'     => $request->p_color_eng,
            'p_color_hin'     => $request->p_color_hin,
            'selling_price'   => $request->selling_price,
            'discount_price'  => $request->discount_price,
            'short_descp_eng' => $request->short_descp_eng,
            'short_descp_hin' => $request->short_descp_eng,
            'long_descp_eng'  => $request->long_descp_eng,
            'long_descp_hin'  => $request->long_descp_hin,
            'p_image'         => $file,
            'hot_deals'       => $request->hot_deals,
            'featured'        => $request->featured,
            'special_offer'   => $request->special_offer,
            'special_deals'   => $request->special_deals,
            'created_at'      => Carbon::now(),
        ]);
        return redirect()->route('view_product')->with('ap', 'Product updated successfully with Image');

        }
        else
        {

             Product::findorfail($p_id)->update([
                'b_id'            => $request->b_id,
                'c_id'            => $request->c_id,
                'sc_id'           => $request->sc_id,
                'ssc_id'          => $request->ssc_id,
                'p_name_eng'      => $request->p_name_eng,
                'p_name_hin'      => $request->p_name_hin,
                'p_slug_eng'      => $p_slug_eng,
                'p_slug_hin'      => $p_slug_hin,
                'p_code'          => $request->p_code,
                'p_qty'           => $request->p_qty,
                'p_tags_eng'      => $request->p_tags_eng,
                'p_tags_hin'      => $request->p_tags_hin,
                'p_size_eng'      => $request->p_size_eng,
                'p_size_hin'      => $request->p_size_hin,
                'p_color_eng'     => $request->p_color_eng,
                'p_color_hin'     => $request->p_color_hin,
                'selling_price'   => $request->selling_price,
                'discount_price'  => $request->discount_price,
                'short_descp_eng' => $request->short_descp_eng,
                'short_descp_hin' => $request->short_descp_eng,
                'long_descp_eng'  => $request->long_descp_eng,
                'long_descp_hin'  => $request->long_descp_hin,
                'hot_deals'       => $request->hot_deals,
                'featured'        => $request->featured,
                'special_offer'   => $request->special_offer,
                'special_deals'   => $request->special_deals,
                'created_at'      => Carbon::now(),
            ]);
           return redirect()->route('view_product')->with('ap', 'Product updated successfully without Image');
        }
    }


    function update_multi_image(Request $request){

            $imgs = $request->multi_image;

            foreach($imgs as $id=>$mi){
                $image = Multiimage::findorFail($id);
                $delete_form = public_path('uploads/multi_image/'.$image->multi_image);
                unlink($delete_form);

                $ext = $mi->getClientOriginalExtension();
                $file  = hexdec(uniqId()).'.'.$ext;
                Image::make($mi)->save(public_path('uploads/multi_image/'.$file));

                Multiimage::where('id', $id)->update([
                    'multi_image'=>$file,
                    'updated_at'=>Carbon::now(),
                ]);
            }
            return back()->with('miup', 'Multiimage updated successfully');

    }

    function mimg_del($id){

        $mimg = Multiimage::findorFail($id);
        $delete_form = public_path('uploads/multi_image/'.$mimg->multi_image);
        unlink($delete_form);

        Multiimage::findorFail($id)->delete();
        return back()->with('miup', 'Multiimage deleted successfully');
    }


    function delete_p($id){

        $product_info = Product::findorFail($id);
        $delete_from =  public_path('uploads/p_image/'.$product_info->p_image);
        unlink($delete_from);

        Product::findorFail($id)->delete();

        $mimg_info = Multiimage::where('p_id', $id)->get();
        foreach($mimg_info as $mimg){
            $delete_from =  public_path('uploads/multi_image/'.$mimg->multi_image);
             unlink($delete_from);

             Multiimage::where('p_id', $id)->delete();
        }

        return redirect()->route('view_product')->with('up','Product Deleted successfully!');

    }


        function deactice_p($id){
            Product::findorFail($id)->update([
                'status'=>0,
            ]);
            return redirect()->route('view_product')->with('up','Product Deactivated!');
        }

        function active_p($id){
            Product::findorFail($id)->update([
                'status'=>1,
            ]);
            return redirect()->route('view_product')->with('up','Product Activated!');
        }


 }
