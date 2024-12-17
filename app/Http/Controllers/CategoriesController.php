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
        $minPrice = $request->input('min_price', 0);
        $categoryId = $request->input('category_id', 1);

        // Отримання максимальної ціни
        $maxPrice = $request->input('max_price', Product::max('price'));
        
        $query = Product::query();

        // Якщо є категорія, то фільтруємо за категорією
        if ($categoryId && $categoryId != 1) {
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            });
        }

        // Пошук за назвою
        if ($search) {
            $searchWords = array_filter(explode(' ', mb_strtolower(trim($search))));
            $query->where(function ($q) use ($searchWords) {
                foreach ($searchWords as $word) {
                    $q->where('name', 'LIKE', '%' . $word . '%');
                }
            });
        }

        // Фільтрація за ціною
        $query->whereBetween('price', [$minPrice, $maxPrice]);

        // Пагінація
        $products = $query->paginate(6)->appends($request->query());

        // Отримуємо категорії для фільтру
        $categories = Category::tree()->get()->toTree();

        return view('sections.categories', [
            'products' => $products,
            'categories' => $categories,
            'search' => $search,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'categoryId' => $categoryId, // Відправляємо категорію назад на сторінку
        ]);
    }
}
