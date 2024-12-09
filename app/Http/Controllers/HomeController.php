<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function categories(Request $request)
    {
        // Отримуємо значення пошукового запиту
        $search = $request->input('search');
        
        // Фільтруємо продукти за умовою пошуку, якщо є запит
        $products = DB::table('product')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(6);
    
        // Отримуємо категорії
        $categories = Category::tree()->get()->toTree();
    
        return view('sections.categories', [
            'products' => $products,
            'categories' => $categories,
            'search' => $search,  // передаємо значення пошукового запиту у вигляд
        ]);
    }    
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
        $categories = Category::tree()->get()->toTree();
        
        return view('sections.home', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
    
    
}
