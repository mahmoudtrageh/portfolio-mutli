<?php

namespace App\Http\Controllers\Portfolio;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    public function EditAbout(){
        $homeabout = HomeAbout::first();
        return view('admin.about.about',compact('homeabout'));
    }

    public function UpdateAbout(Request $request){
        $id = $request->id;
        $update = HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            
        ]);

        $notification = array(
			'message' => trans('admin/controllers.about-site-edited-successfully'),
			'alert-type' => 'success'
		);

        return Redirect()->route('edit.about')->with($notification);
    }

}
