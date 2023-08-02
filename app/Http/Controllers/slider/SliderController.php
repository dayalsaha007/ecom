<?php

namespace App\Http\Controllers\slider;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    function view_slider(){
        $sliders =  Slider::latest()->get();
        return view('backend.admin.slider.view_slider', [
            'sliders'=>$sliders,
        ]);
    }

    function store_slider(Request $request){

        $image = $request->s_image;
        $ext = $image->getClientOriginalExtension();
        $file_name = hexdec(uniqId()).'.'.$ext;

        Image::make($image)->save(public_path('uploads/slider/'.$file_name));

        Slider::insert([
            's_title'=>$request->s_title,
            's_descrp'=>$request->s_descrp,
            's_image'=>$file_name,
        ]);

        return redirect()->route('view_slider')->with('ss', 'Slider Stored Successfully');
    }

    function edit_slider($id){
        $slider_info = Slider::findorFail($id);
        return view('backend.admin.slider.edit_slider', [
                'slider_info'=> $slider_info,
        ]);
    }

    function update_slider(Request $request){
        $s_id  = $request->s_id;

        if($request->s_image != null){

            $image = Slider::findorFail($s_id);
            $delete_from = public_path('uploads/slider/'.$image->s_image);
            unlink($delete_from);

        $img = $request->s_image;
        $ext = $img->getClientOriginalExtension();
        $file_name = hexdec(uniqId()).'.'.$ext;

        Image::make($img)->save(public_path('uploads/slider/'.$file_name));

        Slider::findorFail($s_id)->update([
            's_title'=>$request->s_title,
            's_descrp'=>$request->s_descrp,
            's_image'=>$file_name,
            'updated_at'=>Carbon::now(),
        ]);
        return redirect()->route('view_slider')->with('ss', 'Slider updated with Image');

        }
        else
        {
            Slider::findorFail($s_id)->update([
                's_title'=>$request->s_title,
                's_descrp'=>$request->s_descrp,
                'updated_at'=>Carbon::now(),
            ]);
            return redirect()->route('view_slider')->with('ss', 'Slider updated with out Image');
        }
    }

    function deactive_slider($id){

        Slider::findorFail($id)->update(['status'=>0]);
        return redirect()->route('view_slider')->with('ss', 'Slider Deactivated!');
    }

    function active_slider($id){

        Slider::findorFail($id)->update(['status'=>1]);
        return redirect()->route('view_slider')->with('ss', 'Slider activated!');
    }

    function delete_slider($id){
        $image = Slider::findorFail($id);
        $delete_from = public_path('uploads/slider/'.$image->s_image);
        unlink($delete_from);

        Slider::findorFail($id)->delete();
        return redirect()->route('view_slider')->with('ss', 'Slider deleted successfully!');
    }


}
