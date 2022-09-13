<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendPageController extends Controller
{
    /**
     * Show Homepage
     */
    public function showHomePage()
    {
        $sliders = Slider::where('status', true)->latest()->get();
        return view('frontend.pages.home',[
            'sliders' => $sliders
        ]);
    }

    /**
     * Show Contact page
     */
    public function showContactPage()
    {
        return view('frontend.pages.contact');
    }
}