<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipProvince;
use Carbon\Carbon;
use App\Models\ShipDistrict;
use App\Models\ShipState;

class ShippingAreaController extends Controller
{
    
	public function DivisionView(){
		$divisions = ShipProvince::orderBy('id','DESC')->get();
		return view('admin.ship.division.view_division',compact('divisions'));

	}


public function DivisionStore(Request $request){

    	$request->validate([
    		'name' => 'required',   	 
    	 
    	]);
    	 

	ShipProvince::insert([
	 
		'name' => $request->name,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => trans('admin.province-added-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 



    public function DivisionEdit($id){

  $divisions = ShipProvince::findOrFail($id);
	 return view('admin.ship.division.edit_division',compact('divisions'));
    }



    public function DivisionUpdate(Request $request,$id){

    	ShipProvince::findOrFail($id)->update([
	 
		'name' => $request->name,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => trans('admin.province-updated-successfully'),
			'alert-type' => 'info'
		);

		return redirect()->route('manage-division')->with($notification);


    } // end mehtod 


    public function DivisionDelete($id){

    	ShipProvince::findOrFail($id)->delete();

    	$notification = array(
			'message' => trans('admin.province-deleted-successfully'),
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    } // end method 


}
 