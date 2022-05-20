<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Image;
use App\Models\Printing;

class ContactsController extends Controller
{
    
 
    public function Contact(){
        $contacts = DB::table('contacts')->first();
        return view('home',compact('contacts'));
    }


    public function ContactForm(Request $request){

        $request->validate([
			'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
		], [
			'name.required' => trans('admin/controllers.this-field-required'),
            'email.required' => trans('admin/controllers.this-field-required'),
            'subject.required' => trans('admin/controllers.this-field-required'),
            'message.required' => trans('admin/controllers.this-field-required'),
		]);

        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
    
        $notification = array(
            'message' => trans('site/controllers.message-send-success'),
            'alert-type' => 'success'
        );   

        return Redirect()->route('home')->with($notification);

    }

    public function PrintForm(Request $request){

        $request->validate([
			'color' => 'required',
            'email' => 'required',
            'material' => 'required',
            'phone' => 'required',
            'file' => 'required',
		], [
			'color.required' => trans('admin/controllers.this-field-required'),
            'email.required' => trans('admin/controllers.this-field-required'),
            'material.required' => trans('admin/controllers.this-field-required'),
            'phone.required' => trans('admin/controllers.this-field-required'),
		]);

        $image = $request->file('file');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
    	$save_url = 'upload/slider/'.$name_gen;

        Printing::insert([
            'color' => $request->color,
            'email' => $request->email,
            'material' => $request->material,
            'phone' => $request->phone,
            'file' => $save_url,
            'created_at' => Carbon::now()
        ]);
    
        $notification = array(
            'message' => 'We will reply to you as soon as possible',
            'alert-type' => 'success'
        );   

        return Redirect()->route('print.for.me')->with($notification);

    }


}
