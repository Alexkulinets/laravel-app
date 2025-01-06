<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProductInfo(Request $request){
        $id = $request->input('id');
        $product = DB::table('products')->where('id', $id)->first();

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

    public function show($name){
        $validator = Validator::make(
            ['name' => $name],
            ['name' => 'required|string|regex:/^[a-zA-Z0-9\s-]+$/']
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $name = str_replace('-', ' ', $name);
        $products = DB::table('products')->get();
        foreach ($products as $productItem) {
            $productItem->image = explode(';', $productItem->image);
        }

        $product = DB::table('products')->where('name', $name)->first();
        if (!$product) {
            return redirect()->route('home')->with('error', 'Product not found');
        }

        $product->image = explode('; ', $product->image);

        $breadcrumbs = [
            ['name' => 'Головна сторінка', 'url' => '/catalog'],
            ['name' => $product->name, 'url' => null],
        ];

        return view('sections.product', compact('product', 'breadcrumbs', 'products'));
    }


}
