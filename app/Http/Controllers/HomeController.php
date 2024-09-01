<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
    public function index()
    {
        return view('frontend.index');
    }

    /// About Page
    public function about()
    {
        return view('frontend.about');
    }

    /// Courses Page
    public function courses()
    {
        return view('frontend.courses');
    }

    /// Event Page
    public function events()
    {
        return view('frontend.events');
    }

    /// pricing Page
    public function contact()
    {
        return view('frontend.contact');
    }

    /// Pricing Page
    public function pricing()
    {
        return view('frontend.pricing');
    }

    /// Trainers Page
    public function trainers()
    {
        return view('frontend.trainers');
    }
}
