<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class WishlistController extends Controller
{
    function wishlist(){
        return view('frontend.wishlist.wishlist');
    }
}
