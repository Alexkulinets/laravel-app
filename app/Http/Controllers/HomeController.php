<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{ 
    public function review()
    {
        return view('sections.review'); 
    }
    public function cart()
    {
        return view('sections.cart');  
    }
    public function home()
    {
        $products = DB::table('product')->get();
        
        return view('sections.home', ['products' => $products]);
    }
}
