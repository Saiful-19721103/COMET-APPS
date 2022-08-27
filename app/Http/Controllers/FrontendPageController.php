<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendPageController extends Controller
{
    /**
     * Show Homepage
     */
    public function showHomePage()
    {
        return view('frontend.pages.home');
    }
}