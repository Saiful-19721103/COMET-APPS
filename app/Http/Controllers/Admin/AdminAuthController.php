<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * Show admin Login Page
     */
    public function showLoginPage()
    {
        return view('admin.pages.login');
    }

    /**
     * admin Login system [by Post]
     */
    public function login(Request $request)
    {
        //return $request->all();

        //Validation
        $this->validate($request, [
            'auth'        => 'required',
            'password'    => 'required',
        ]);

        // Try  to Login
        if(Auth::guard('admin')->attempt(['email' => $request->auth , 'password' => $request->password]) ||
        Auth::guard('admin')->attempt(['cell' => $request->auth , 'password' => $request->password]) || 
        Auth::guard('admin')->attempt(['username' => $request->auth , 'password' => $request->password]) )
        {
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.login.page')->with ('warning', 'Email or password not match');
        }
    }
}
