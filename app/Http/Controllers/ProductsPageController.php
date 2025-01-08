<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;

class ProductsPageController extends Controller
{
    public function filterProducts(Request $request){
        //Валідація
        $validator = Validator::make($request->all(), [
            'search' => 'nullable|string|max:255|regex:/^[\pL\pM\pN\s]+$/u',
            'categoryId' => 'nullable|integer|exists:categories,id',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0'
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        //Пошук
        $search = $request->input('search');

        //Категорії
        $selectedCategories = request()->input('categories', []);
        $categories = Category::tree()->get()->toTree();
        $categoryId = $request->input('category_id', 'all-products');

        //Мінімальна та миксимальна ціна
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', Products::max('price'));

        //Продудкти та певні продукти від мінімальної ціни до максимальної
        $query = Products::query();
        $query = Products::with('categories')->whereBetween('price', [$minPrice, $maxPrice]);


        //Операції з категоріями
        if ($categoryId != "all-products") {
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('category_id', $categoryId);
            });
        }

        //Операції з пошуком
        if ($search) {
            $searchWords = array_filter(explode(' ', mb_strtolower(trim($search))));
            $query->where(function ($q) use ($searchWords) {
                foreach ($searchWords as $word) {
                    $q->where('name', 'LIKE', '%' . $word . '%');
                }
            });
        }
        
        //Витяжка з 6 продуктів для пагінації 
        $products = $query->paginate(6)->appends($request->query());
        //Перетворення зображень
        foreach ($products as $product) {
            $product->image = explode('; ', $product->image);
        }
        //Ajax для пошукових підказок
        if ($request->ajax()) {      
            $search = $request->input('search');
            $query = Products::query();
        
            if ($search) {
                $searchWords = array_filter(explode(' ', mb_strtolower(trim($search))));
                $query->where(function ($q) use ($searchWords) {
                    foreach ($searchWords as $word) {
                        $q->where('name', 'LIKE', '%' . $word . '%');
                    }
                });
            }
        
            $allProducts = $query->get(['id', 'name']);
            $uniqueProducts = $allProducts->unique('name')->take(10);
        
            return response()->json([
                'uniqueProducts' => $uniqueProducts->values(),
                'html' => view('components.products-loader', compact('products'))->render()
            ]);
        }
        
        //Повернення до вюхи
        return view('sections.productsPage', [
            'products' => $products,
            'categories' => $categories,
            'search' => $search,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'categoryId' => $categoryId, 
        ]);
    }
}

