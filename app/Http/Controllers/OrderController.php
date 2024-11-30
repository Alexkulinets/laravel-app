<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string|max:255',
            'product_name' => 'required|array',
            'quantity' => 'required|array',
            'price' => 'required|array',
        ]);
    
        foreach ($validated['product_name'] as $index => $productName) {
            Order::create([
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'product_name' => $productName,
                'quantity' => $validated['quantity'][$index],
                'price' => $validated['price'][$index],
                'total_amount' => $validated['quantity'][$index] * $validated['price'][$index],
            ]);
            
        }
        session()->forget('cart');
        session()->forget('discount_applied'); 
    
        return redirect()->route('order.success')->with('success', 'Ваше замовлення успішно оформлено!');
    }
}
