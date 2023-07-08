<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{

    function english(){
        session()->get('language');
        Session()->forget('language');
        Session::put('language','english');
        return redirect()->back();
    }
    function hindi(){
        session()->get('language');
        Session()->forget('language');
        Session::put('language','hindi');
        return redirect()->back();
    }


}
