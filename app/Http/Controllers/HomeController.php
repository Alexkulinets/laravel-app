<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('front.home'); 
    }
    
    public function pricing()
    {
        return view('front.pricing'); 
    }
    public function product()
    {
        return view('front.product'); 
    }
    public function review()
    {
        return view('front.review'); 
    }
}
