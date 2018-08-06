<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{

	public function __construct()
	{
		$this->middleware('guest:admin')->except('logout');
	}

    public function showLoginForm() 
    {
    	return view('auth.admin-login');
    }

    public function login(Request $request)
    {

    	// VALIDATE THE FORM DATA
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:5'
    	]);

    	// ATTEMPT TO LOG IN USER

    	$credentials = [
    		'email' => $request->email,
    		'password' => $request->password
    	];

    	if(Auth::guard('admin')->attempt($credentials, $request->remember))
    	{
    		return redirect()->intended(route('administration'));
    	}

    	return redirect()->back()->withInput($request->only('email'));
    }
}
