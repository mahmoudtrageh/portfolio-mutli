<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Testmonial;
use Illuminate\Support\Carbon;
use Auth;
class TestmonialController extends Controller
{


    public function AllTestmonial(){

        $testmonials = Testmonial::latest()->paginate(5);
        return view('admin.testmonial.testmonial_view' , compact('testmonials'));
    }


    public function StoreTestmonial(Request $request){
        
        Testmonial::insert([
            'user' => $request->user,
            'job' => $request->job,
            'text' => $request->text,
            'created_at' => Carbon::now()
        ]);
         
        $notification = array(
            'message' => trans('admin/controllers.testmonial-added-successfully'),
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);

    }


    public function Edit($id){
        $testmonial = Testmonial::find($id);
        return view('admin.testmonial.testmonial_edit',compact('testmonial'));

    }
 

    public function Update(Request $request, $id){


        Testmonial::find($id)->update([
            'user' => $request->user,
            'job' => $request->job,
            'text' => $request->text,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => trans('admin/controllers.testmonial-updated-successfully'),
            'alert-type' => 'success'
        );         
        return Redirect()->back()->with($notification);

       
    }


     public function Delete($id){
       
        Testmonial::find($id)->delete();
        $notification = array(
            'message' => trans('admin/controllers.testmonial-deleted-successfully'),
            'alert-type' => 'error'
        );   
        return Redirect()->back()->with($notification);

     }
}
