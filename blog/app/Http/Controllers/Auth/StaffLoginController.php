<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class StaffLoginController extends Controller
{
    //

	public function __construct()
	{
		$this->middleware('guest:staff');
	}

    public function showLoginForm()
    {
    	return view('auth.staff-login');
    }

    public function login(Request $request)
    {
    	//Validate the form data
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);

    	//Attempt to log the user in
    	if(Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){

    		//If successful, redirect to their intended location

    		return redirect()->intended(route('staff.dashboard'));

    	}

    	

    	//If unsuccessful, redirect back to the login witht the form data
    	return redirect()->back()->withInput($request->only('email','remember'));
    }

}
