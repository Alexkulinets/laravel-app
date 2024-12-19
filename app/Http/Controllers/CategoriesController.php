<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoriesController extends Controller
{
    public function categories(Request $request)
    {
        $search = $request->input('search');

        $selectedCategories = request()->input('categories', []);
        $categoryId = $request->input('category_id', 1);

        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', Product::max('price'));
        
        $query = Product::query();

      
        if ($categoryId && $categoryId != 1) {
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

        $query->whereBetween('price', [$minPrice, $maxPrice]);


        $products = $query->paginate(6)->appends($request->query());

 
        $categories = Category::tree()->get()->toTree();


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
