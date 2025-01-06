<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsPageController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/review', [HomeController::class, 'review'])->name('review');


Route::get('/catalog', [ProductsPageController::class, 'filterProducts'])->name('filter.products');


Route::get('/getImage', [ProductController::class, 'getProductInfo']);
Route::get('/product/{name}', [ProductController::class, 'show'])->name('product');


Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/success', function () {return view('order.success');})->name('order.success');


Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
Route::post('/cart/update', [CartController::class, 'updateItemQuantity'])->name('cart.update');
Route::post('/save-discount-code', [CartController::class, 'saveDiscountCode']);
Route::get('/clear-cart', [CartController::class, 'clearCart'])->name('clearCart');
Route::post('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::post('/apply-discount', [CartController::class, 'applyDiscount'])->name('apply.discount');

