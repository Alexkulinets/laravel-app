<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function pricing()
    {
        return view('front.pricing'); 
    }
    public function review()
    {
        return view('front.review'); 
    }
    public function cart()
    {
        return view('front.cart');  
    }
    public function home()
    {
        $products = DB::table('product')->get(); 
        $categories = Category::tree()->get()->toTree();
        
        return view('front.home', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
    
    
}
