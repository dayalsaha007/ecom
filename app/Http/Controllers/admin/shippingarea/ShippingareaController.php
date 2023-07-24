<?php

namespace App\Http\Controllers\admin\shippingarea;

use App\Http\Controllers\Controller;
use App\Models\Shipdistrict;
use App\Models\ShipDivision;
use App\Models\Shipstate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShippingareaController extends Controller
{
    function view_division(){
        $divisions = ShipDivision::latest()->get();
        return view('backend.admin.shippingarea.view_division', [
            'divisions'=>$divisions,
        ]);
    }

    function store_division(Request $request){
        ShipDivision::insert([
            'division_name'=>$request->division_name,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('view_division')->with('sd', 'Division added successfully!');
    }


    function edit_division($id){
        $division = Shipdivision::findorFail($id);
        return view('backend.admin.shippingarea.edit_division', [
            'division'=>$division,
        ]);
    }

    function update_division(Request $request){
        $division_id =  $request->division_id;

        Shipdivision::findorFail($division_id)->update([
            'division_name'=>$request->division_name,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('view_division')->with('sd', 'Division Updated successfully!');
    }

    function del_division ($id){
        $division = ShipDivision::findorFail($id);
        $division->delete();
        return redirect()->route('view_division')->with('dd', 'Division Deleted successfully!');

    }


    function view_district(){
        $divisions = ShipDivision::latest()->get();
        $district = Shipdistrict::latest()->get();
        return view('backend.admin.shippingarea.view_district', [
            'divisions'=>$divisions,
            'district'=>$district,
        ]);
    }

    function store_district(Request $request){
        Shipdistrict::insert([
            'division_id'=>$request->division_id,
            'district_name'=>$request->district_name,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('view_district')->with('sd', 'District added successfully!');
    }


    function edit_district($id){
        $district = Shipdistrict::findorFail($id);
        $divisions = Shipdivision::latest()->get();
        return view('backend.admin.shippingarea.edit_district', [
            'district'=>$district,
            'divisions'=>$divisions,
        ]);

        }


        function update_district (Request $request){

            $district_id = $request->district_id;
            Shipdistrict::findorFail($district_id)->update([
                'division_id'=>$request->division_id,
            'district_name'=>$request->district_name,
            'created_at'=>Carbon::now(),
            ]);

            return redirect()->route('view_district')->with('sd', 'District updated successfully!');

        }

        function del_district($id){
            $district = Shipdistrict::findorFail($id);
            $district->delete();
            return redirect()->route('view_district')->with('dd', 'District deleted successfully!');

        }


    function view_state(){
        $divisions = ShipDivision::latest()->get();
        $districts = Shipdistrict::latest()->get();
        $states = Shipstate::latest()->get();
        return view('backend.admin.shippingarea.view_state', [
            'divisions'=>$divisions,
            'districts'=>$districts,
            'states'=>$states,
        ]);
    }

    function division_to_district($division_id){
        $district_id = Shipdistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($district_id);

    }

    function store_state(Request $request){

        Shipstate::insert([
            'division_id'=>$request->division_id,
            'district_id'=>$request->district_id,
            'state_name'=>$request->state_name,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('view_state')->with('sd', 'state added successfully!');
    }




}
