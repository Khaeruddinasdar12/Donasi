<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:admin');
	}
    public function showloginform()
    {
    	return view('auth.admin-login');
    }

    public function login(Request $request) 
    {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    		if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
    			return redirect()->intended(route('admin.dashboard'));
    		}	

    		return redirect()->back()->withInput($request->only('email','remember'));
    }

    // public function logout(Request $request)
    // {
    //     Auth::guard('admin')->logout();
    //     $request->session()->flush();
    //     $request->session()->regenerate();
    //     return redirect()->guest(route('admin.login'));
    // }
    public function logout(Request $request)
    {
        $this->guard('admin')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/admin/login');
    }

}
