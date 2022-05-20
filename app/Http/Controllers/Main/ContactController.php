<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Models\Printing;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    
    public function AdminMessage(){
        $messages = ContactForm::latest()->paginate(5);
        return view('admin.messages.messages',compact('messages'));
    }

    public function MessageDelete($id){

    	ContactForm::findOrFail($id)->delete();

    	 $notification = array(
			'message' => trans('admin/controllers.message-deleted-successfully'),
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);

    } // end method 

    public function AdminPrinting(){
        $printings = Printing::latest()->paginate(5);
        return view('admin.printings.printings',compact('printings'));
    }

    public function PrintingDelete($id){

    	Printing::findOrFail($id)->delete();

    	 $notification = array(
			'message' => trans('admin/controllers.message-deleted-successfully'),
			'alert-type' => 'error'
		);

		return redirect()->back()->with($notification);

    } // end method 

}
