<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    
    public function AdminMessage(){
        $messages = ContactForm::latest()->paginate(5);
        return view('admin.messages.messages',compact('messages'));
    }

}
