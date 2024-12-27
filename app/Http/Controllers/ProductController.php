<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProductInfo(Request $request){
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

    public function show(Request $request) {
        $request->validate([
            'id' => 'required|integer|exists:product,id',
        ]);
        

        $id = $request->query('id');

        

        $products = DB::table('product')->get();
        foreach ($products as $product) {
            $product->image = explode(';', $product->image);
        }

    
        $product = DB::table('product')->where('id', $id)->first();
        $product->image = explode('; ', $product->image);

        if (!$product) {
            return redirect()->route('home')->with('error', 'Product not found,');
        }

        $breadcrumbs = [
            ['name' => 'Головна сторінка', 'url' => '/categories'],
            ['name' => $product->name, 'url' => null],
        ];
    

        return view('sections.product', compact('product', 'breadcrumbs', 'products'));
    }


}
