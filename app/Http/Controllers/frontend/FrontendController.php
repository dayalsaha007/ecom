<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Multiimage;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class FrontendController extends Controller
{

    function index()
    {
        return view('frontend.index');
    }

    function customer_logout()
    {
        Auth::logout();
        return redirect('login')->with('cus_logout', 'Customer log out successfully!');
    }

    function update_customer(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255'
        ]);


        $customer_id = Auth::user()->id;

        if ($request->image == '') {

            if ($request->password == '') {

                User::findorFail($customer_id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                    'created_at' => Carbon::now(),
                ]);

                return  redirect('/dashboard')->with('up_w_n', 'Profile Updated without Image!');
            } else {

                if (Hash::check($request->old_password, Auth::user()->password)) {

                    User::findorFail($customer_id)->update([

                        'name' => $request->name,
                        'email' => $request->email,
                        'mobile' => $request->mobile,
                        'password' => Hash::make($request->password),
                        'created_at' => Carbon::now(),
                    ]);

                    return  redirect('/dashboard')->with('up_w_p', 'Profile Updated with Password!');
                } else {

                    return  redirect('/dashboard')->with('up_wo_p', 'Password Does not Matched!');
                }
            }
        } else {

            if ($request->password == '') {

                $user_name = $request->name;
                $image  = $request->image;
                $ext  = $image->getClientOriginalExtension();
                $file_name =  hexdec(uniqId()) . '.' . $ext;

                Image::make($image)->save(public_path('uploads/profile_image/' . $file_name));

                User::findorFail($customer_id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                    'image' => $file_name,
                    'created_at' => Carbon::now(),
                ]);

                return  redirect('/dashboard')->with('up_w_im', 'Profile Updated with Image!');
            } else {

                if (Hash::check($request->old_password, Auth::user()->password)) {

                    $user_name = $request->name;
                    $image  = $request->image;
                    $ext  = $image->getClientOriginalExtension();
                    $file_name =  hexdec(uniqId()) . '.' . $ext;

                    Image::make($image)->save(public_path('uploads/profile_image/' . $file_name));

                    User::findorFail($customer_id)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'mobile' => $request->mobile,
                        'image' => $file_name,
                        'password' => Hash::make($request->password),
                        'created_at' => Carbon::now(),
                    ]);

                    return  redirect('/dashboard')->with('up_w_i_p', 'Profile Updated with Image & Password!');
                } else {
                    return  redirect('/dashboard')->with('up_wo_p', 'Password Does not Matched!');
                }
            }
        }
    }

    function product_detail($id, $slug)
    {

        $product_info =  Product::findorFail($id);

        $color_eng = explode(',', $product_info->p_color_eng);
        $color_hin = explode(',', $product_info->p_color_hin);
        $size_eng = explode(',', $product_info->p_size_eng);
        $size_hin = explode(',', $product_info->p_size_eng);

        $c_id = $product_info->c_id;
        $r_product = Product::where('status', 1)->where('c_id', $c_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();
        $multi_image = Multiimage::where('p_id', $id)->get();
        return view(
            'frontend.product.product_detail',
            [
                'product_info' => $product_info,
                'multi_image' => $multi_image,
                'r_product' => $r_product,
                'color_eng'=>$color_eng,
                'color_hin'=>$color_hin,
                'size_eng'=>$size_eng,
                'size_hin'=>$size_hin,
            ]
        );
    }

    function product_tag($tag){
        $products = Product::where('status', 1)->where('p_tags_eng', $tag)->where('p_tags_hin', $tag)->orderBy('id', 'DESC')->get();
        return view('frontend.tag_wise_product', [
            'products'=>$products,
        ]);
    }

    function subcategory_product($id, $slug){
        $products = Product::where('status', 1)->where('sc_id',$id)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::latest()->get();
        return view('frontend.subcat_view', [
            'products'=>$products,
            'categories'=>$categories,
        ]);
    }

    function subsubcategory_product($id, $slug){
        $products = Product::where('status', 1)->where('ssc_id',$id)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::latest()->get();
        return view('frontend.subsub_view', [
            'products'=>$products,
            'categories'=>$categories,
        ]);
    }

    public function productviewajax($id){
        $product = Product::with('rel_to_cat','rel_to_brand')->findorFail($id);

        $color = explode(',', $product->p_color_eng );
        $size = explode(',', $product->p_size_eng );

        return response()->json(array(
            'product'=>$product,
            'color'=>$color,
            'size'=>$size,
        ));

    }

    function product_search(Request $request){

        $request->validate([
            'search'=> 'required',
        ]);
        $search = $request->search;
        $products = Product::where('status', 1)->where('p_name_eng', "LIKE", "%$search%")->orderBy('id', 'DESC')->get();
        $categories = Category::latest()->get();
        return view('frontend.search.search', [
            'products'=>$products,
            'categories'=>$categories,
        ]);
    }


    // function advanced_product_search(Request $request){

    //     $search = $request->search;
    //     $products = Product::where('p_name_eng', "LIKE", "%$search%")->select('p_name_eng', 'p_image')->limit(5)->get();
    //     return view('frontend.search.advanced_search', compact('products'));
    // }


    function productlistajax(){

        $products = Product::select('p_name_eng')->where('status', 1)->get();
        $data = [];
        
        foreach($products as $product){
            $data[] = $product['p_name_eng'];
        }

        return $data;
    }


}
