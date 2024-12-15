<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getImage(Request $request)
    {
        $id = $request->input('id');
        $product = DB::table('product')->where('id', $id)->first();

        if ($product) {
            return response()->json([
                'image_name' => $product->name,
                'image_price' => $product->price,
                'image_url' => $product->image,
                'image_description' => $product->description,
                'image_full_description' => $product->full_description
            ]);
        } 
        else {
            return response()->json(['error' => 'Дані не знайдено.']);
        }
    }

    public function show(Request $request)
    {
        // Отримуємо параметр 'id' з запиту
        $id = $request->query('id');
        $product = DB::table('product')->where('id', $id)->first();

        $products = DB::table('product')->get(); 

        // Перевіряємо, чи існує продукт з таким id
        if (!$product) {
            return redirect()->route('home')->with('error', 'Product not found.');
        }

        // Генерація breadcrumbs
        $breadcrumbs = [
            ['name' => 'Головна сторінка', 'url' => route('home') . '/categories'],
            ['name' => $product->name, 'url' => null], // Останній елемент без URL
        ];


        // Передача даних у вигляд
        return view('sections.product', compact('product', 'breadcrumbs', 'products'));
    }
}
