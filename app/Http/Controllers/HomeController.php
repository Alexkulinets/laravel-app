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
    public function home(Request $request)
    {
        $products = DB::table('product')->get();
        
        foreach ($products as $product) {
            $product->image = explode(';', $product->image);
        }

        return view('sections.home', compact('products'));
    }
}
