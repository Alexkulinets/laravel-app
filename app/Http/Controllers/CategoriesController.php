<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoriesController extends Controller
{
    public function categories(Request $request){
        $request->validate([
            'categoryId' => 'nullable|integer|exists:categories, id',
            'minPrice' => 'nullable|numeric|min: 0',
            'maxPrice' => 'nullable|numeric|min: 0'
        ]);

        $search = $request->input('search');

        $selectedCategories = request()->input('categories', []);
        $categories = Category::tree()->get()->toTree();
        $categoryId = $request->input('category_id', 'all-products');

        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', Product::max('price'));
        
        $query = Product::query();
        $query->whereBetween('price', [$minPrice, $maxPrice]);


        if ($categoryId != "all-products") {
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            });
        }
        
        if ($search) {
            $searchWords = array_filter(explode(' ', mb_strtolower(trim($search))));
            $query->where(function ($q) use ($searchWords) {
                foreach ($searchWords as $word) {
                    $q->where('name', 'LIKE', '%' . $word . '%');
                }
            });
        }


        $products = $query->paginate(6)->appends($request->query());
        
        foreach ($products as $product) {
            $product->image = explode('; ', $product->image);
        }


        return view('sections.categories', [
            'products' => $products,
            'categories' => $categories,
            'search' => $search,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'categoryId' => $categoryId, 
        ]);
    }
}

