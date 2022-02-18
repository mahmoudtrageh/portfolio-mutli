<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\carbon;
class SellerController extends Controller
{
    public function SellerIndex()
    {
        return view('seller.seller_login');
    } // end method

    public function SellerDashboard()
    {
        return view('seller.index');
    } // end method

    public function Login(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('seller')->attempt(['email' =>
        $check['email'], 'password' => $check['password']])) {
            return redirect()->route('seller.dashboard')->with('success', 'تم تسجيل الدخول بنجاح');
        } else {
            return back()->with('error', 'تأكيد من إدخال بياناتك بشكل صحيح');
        }
    } // end method

    public function SellerLogout()
    {
        Auth::guard('seller')->logout();
        return redirect()->route('seller_login_form')->with('success', 'تم تسجيل الخروج بنجاح');
    } // end method

    public function SellerRegister(Request $request)
    {
        return view('seller.seller_register');
    } // end method

    public function SellerRegisterCreate(Request $request)
    {
        $input = $request->all();
        Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:sellers'],
			'password' => 'required|confirmed',
		])->validate();

        Seller::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('seller_login_form')->with('success', 'تم تسجيل الحساب بنجاح');
    } // end method
}
