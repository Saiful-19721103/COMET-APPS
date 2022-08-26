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
            //If User is Blocked Start//
            if(Auth::guard('admin')->user()->status){
                return redirect()->route('admin.dashboard');                
            }else{
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('danger', 'Your Account is blocked', 'Please contact with Admin');
            }          
            //If User is Blocked End//
            
        }else{
            return redirect()->route('admin.login.page')->with ('warning', 'Email or password not match');
        }

    }
        /**
         * Admin LogOut
         */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login.page');
    }

}