<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    function wishlist(){
        return view('frontend.wishlist.wishlist');
    }

    function get_wishlist_product(){

        $wishlist =Wishlist::with('rel_to_product')->where('user_id', Auth::id())->latest()->get();
            return response()->json($wishlist);
    }

    function wishlist_remove($id){

        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
            return response()->json(['success'=> 'successfully Product removed!']);

    }



}
