<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PurchaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        'products' => Product::all()->skip(5)->take(10),
        'categories' => Category::all(),
        'promotions' => Product::all()->take(5),
        'best_products' => Product::all()->reverse()->take(5),
    ]);
})->name('home');

Route::get('kategori', function () {
    return view('category',[
        'categories' => Category::all(),
    ]);
})->name('kategori');

Route::get('import', function () {
    return view('import');
})->name('importpage');

Auth::routes();

Route::resource('products', ProductController::class);
Route::resource('category', CategoryController::class);
Route::resource('purchases', PurchaseController::class);
Route::resource('address', AddressController::class);
Route::get('payment/{purchase}', [PurchaseController::class, 'checkout'])->name('payment');
Route::resource('cart', CartController::class);
Route::get('cart/{cart}', [CartController::class, 'delete'])->name('cart_delete');

// update quantity without reload route
Route::post('updatequantity', [CartController::class, 'updatequantity']);

Route::post('import/products', [ProductController::class, 'import'])->name('import_product');
Route::post('import/categories', [CategoryController::class, 'import'])->name('import_category');
