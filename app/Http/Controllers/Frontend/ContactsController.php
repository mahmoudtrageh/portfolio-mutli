<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    
 
    public function Contact(){
        $contacts = DB::table('contacts')->first();
        return view('home',compact('contacts'));
    }


    public function ContactForm(Request $request){
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
    
        return Redirect()->route('home')->with('success','تم إرسال رسالتك بنجاح');

    }


}
