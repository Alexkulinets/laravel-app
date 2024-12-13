<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function categories(Request $request)
    {
        $search = $request->input('search');
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', 2000);

       $query = DB::table('product') ;

        // пошуковий запит
        if ($search) {
            $searchWords = array_filter(explode(' ', mb_strtolower(trim($search))));
            $query->where(function ($q) use ($searchWords) {
                foreach ($searchWords as $word) {
                    $q->where('name', 'LIKE', '%' . $word . '%');
                }
            });
        }

        // ціна
        $query->whereBetween('price', [$minPrice, $maxPrice]);


        $products = $query->paginate(6)->appends($request->query());

        // отримання категорій
        $categories = Category::tree()->get()->toTree();

        return view('sections.categories', [
            'products' => $products,
            'categories' => $categories,
            'search' => $search,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
        ]);
    }

}
