<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function index() 
    { 
        $locale = session()->get('locale', 'ar');
        $abouts = About::all(); // Assuming you have an About model
        return view('website.about', compact('abouts','locale'));
   
    }
}
