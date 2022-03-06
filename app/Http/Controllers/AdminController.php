<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\carbon;
class AdminController extends Controller
{
    public function Index()
    {
        return view('admin.admin_login');
    } // end method

    public function Dashboard()
    {
        $orders = Order::where('status','pending')->orderBy('id','DESC')->paginate(2);
        return view('admin.index', compact('orders'));
    } // end method

    public function Login(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' =>
        $check['email'], 'password' => $check['password']])) {
            return redirect()->route('admin.dashboard')->with('success', 'تم تسجيل الدخول بنجاح');
        } else {
            return back()->with('error', 'تأكيد من إدخال بياناتك بشكل صحيح');
        }
    } // end method

    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('success', 'تم تسجيل الخروج بنجاح');
    } // end method

    public function AdminRegister(Request $request)
    {
        return view('admin.admin_register');
    } // end method

    public function AdminRegisterCreate(Request $request)
    {
        $input = $request->all();
        Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
			'password' => 'required|confirmed',
		])->validate();

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('login_form')->with('success', 'تم تسجيل الحساب بنجاح');
    } // end method
}
