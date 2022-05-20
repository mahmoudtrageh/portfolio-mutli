<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use App\Models\Detail;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class DetailsController extends Controller
{
    
	public function DetailView(){
		$details = Detail::latest()->get();
		return view('admin.detail.detail_view',compact('details'));
	}


     public function DetailStore(Request $request){

    	$request->validate([
    		 
    		'img' => 'required',
    	],[
    		'img.required' => trans('admin/controllers.select-image'),
    		 
    	]);

    	$image = $request->file('img');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
    	$save_url = 'upload/slider/'.$name_gen;

	Detail::insert([
		'material' => $request->material,
		'color' => $request->color,
		'img' => $save_url,

    	]);

	    $notification = array(
			'message' => trans('admin/controllers.slider-added-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 




    public function DetailEdit($id){
    $details = Detail::findOrFail($id);
		return view('admin.detail.detail_edit',compact('details'));
    }


public function DetailUpdate(Request $request){
    	
    	$detail_id = $request->id;
    	$old_img = $request->old_image;

    	if ($request->file('img')) {

    	unlink($old_img);
    	$image = $request->file('img');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
    	$save_url = 'upload/slider/'.$name_gen;

	Detail::findOrFail($slider_id)->update([
		'material' => $request->material,
		'color' => $request->color,
		'img' => $save_url,

    	]);

	    $notification = array(
			'message' => trans('admin/controllers.slider-updated-successfully'),
			'alert-type' => 'success'
		);

		return redirect()->route('manage-slider')->with($notification);

    	}else{

    	Detail::findOrFail($detail_id)->update([
		'color' => $request->color,
		'material' => $request->material,
		

    	]);

	    $notification = array(
			'message' => trans('admin/controllers.slider-updated-without-image'),
			'alert-type' => 'success'
		);

		return redirect()->route('manage-details')->with($notification);

    	} // end else 
    } // end method 


    public function DetailDelete($id){
    	$detail = Detail::findOrFail($id);
    	$img = $detail->img;
    	unlink($img);
    	Detail::findOrFail($id)->delete();

    	$notification = array(
			'message' => trans('admin/controllers.slider-deleted-successfully'),
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);

    } // end method


}
 