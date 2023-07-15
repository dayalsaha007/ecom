<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\brand\BrandController;
use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\admin\product\ProductController;
use App\Http\Controllers\admin\subcategory\SubcategoryController;
use App\Http\Controllers\admin\subsubcategory\SubsubController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\LanguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\slider\SliderController;
use Illuminate\Support\Facades\Route;
use App\Models\Admin;
use App\Models\Subcategory;
use Gloudemans\Shoppingcart\Facades\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/dashboard', function () {
    return view('frontend.admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::controller(FrontendController::class)->group(function(){

    Route::get('/', 'index')->name('index')->middleware('cache.headers:private;max_age=3600');
    Route::get('/customer/logout', 'customer_logout')->name('customer_logout');
    Route::post('/update/customer', 'update_customer')->name('update_customer');
    Route::get('/product/detail/{id}/{slug}', 'product_detail');
    Route::get('/product/tag/{tag}', 'product_tag');
    Route::get('/subcategory/product/{id}/{slug}', 'subcategory_product');
    Route::get('/subsubcategory/product/{id}/{slug}', 'subsubcategory_product');
    Route::get('/product/view/modal/{id}', 'productviewajax');

});

Route::controller(CartController::class)->group(function(){
    Route::post('/cart/data/store/{p_id}', 'addToCart');
    Route::get('/product/mini/cart/', 'addminiCart');
    Route::get('/minicart/product_remove/{rowId}', 'miniCartremove');
});


Route::controller(AdminController::class)->group(function(){

   Route::get('/admin/dashboard', 'admin_dashboard')->name('admin_dashboard')->middleware('admin');
   Route::get('/admin/register', 'admin_register')->name('admin_register');
   Route::get('/admin/login', 'admin_login')->name('admin_login');
   Route::post('/admin/store/reg', 'store_add_reg')->name('store_add_reg')->middleware('admin');
   Route::post('/admin/log', 'admin_log')->name('admin_log');
   Route::get('/admin/logout', 'ad_logout')->name('ad_logout')->middleware('admin');

    Route::get('ad/profile', 'ad_profile')->name('ad_profile')->middleware('admin');
    Route::post('up/ad/profile', 'up_ad_profile')->name('up_ad_profile')->middleware('admin');
});

Route::middleware('admin')->group(function(){

Route::controller(BrandController::class)->group(function(){
    Route::get('/view/brand', 'view_brand')->name('view_brand')->middleware('admin');
    Route::post('/store/brand', 'store_brand')->name('store_brand');
    Route::get('/edit/brand/{id}', 'edit_brand')->name('edit_brand');
    Route::post('/update/brand/', 'update_brand')->name('update_brand');
    Route::get('/del/brand/{id}', 'del_brand')->name('del_brand');
});

Route::controller(CategoryController::class)->group(function(){
    Route::get('/add/category', 'add_category')->name('add_category');
    Route::post('/store/category', 'store_category')->name('store_category');
    Route::get('/edit/category/{id}', 'edit_category')->name('edit_category');
    Route::POST('/update/category/', 'update_category')->name('update_category');
    Route::get('/del/category/{id}', 'del_category')->name('del_category');
});

Route::controller(SubcategoryController::class)->group(function(){
    Route::get('/add/subcategory', 'add_sub_category')->name('add_sub_category');
    Route::post('/store/subcategory', 'store_sub_category')->name('store_sub_category');
    Route::get('/edit/subcategory/{id}', 'edit_sub_category')->name('edit_sub_category');
    Route::post('/update/subcategory', 'update_sub_category')->name('update_sub_category');
    Route::get('/del/subcategory/{id}', 'del_sub_category')->name('del_sub_category');

});

Route::controller(SubsubController::class)->group(function(){
    Route::get('/subcategory/ajax/{c_id}', 'subcategory');
    Route::get('/add/subsubcategory', 'add_subsub_category')->name('add_subsub_category');
    Route::post('/store/subsubcategory', 'store_subsub_category')->name('store_subsub_category');
    Route::get('/edit/subsubcategory/{id}', 'edit_subsub_cat')->name('edit_subsub_cat');
    Route::post('/update/subsubcategory/', 'update_subsub_category')->name('update_subsub_category');
    Route::get('/del/subsubcategory/{id}', 'del_subsub_cat')->name('del_subsub_cat');

});


Route::controller(ProductController::class)->group(function(){
    Route::get('/subsubcategory/ajax/{sc_id}', 'subsubcategory');
    Route::get('/add/product', 'add_product')->name('add_product');
    Route::post('/store/product', 'store_product')->name('store_product');
    Route::get('/view/product', 'view_product')->name('view_product');
    Route::get('/edit/product/{id}', 'edit_product')->name('edit_product');
    Route::post('/update/product', 'update_product')->name('update_product');
    Route::post('/update/multi/image', 'update_multi_image')->name('update_multi_image');
    Route::get('/deactive/product/{id}', 'deactice_p')->name('deactice_p');
    Route::get('/active/product/{id}', 'active_p')->name('active_p');
    Route::get('/multi/image/delete/{id}', 'mimg_del')->name('mimg_del');
    Route::get('/delete/p/{id}', 'delete_p')->name('delete_p');

});

Route::controller(SliderController::class)->group(function(){
    Route::get('/view/slider', 'view_slider')->name('view_slider');
    Route::post('/store/slider', 'store_slider')->name('store_slider');
    Route::get('/edit/slider/{id}', 'edit_slider')->name('edit_slider');
    Route::post('/update/slider', 'update_slider')->name('update_slider');
    Route::get('/deactive/slider/{id}', 'deactive_slider')->name('deactive_slider');
    Route::get('/active/slider/{id}', 'active_slider')->name('active_slider');
    Route::get('/delete/slider/{id}', 'delete_slider')->name('delete_slider');
});


});


Route::controller(LanguageController::class)->group(function(){
    Route::get('/language/hindi', 'hindi')->name('hindi_language');
    Route::get('/language/english', 'english')->name('english_language');
});
