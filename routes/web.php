<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Product_detailController;
use App\Http\Controllers\Product_listController;

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

        Route::get('/', [HomeController::class, 'index']);


        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth'])->name('dashboard');
        require __DIR__.'/auth.php';

        Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
            
            Route::get('/', [CartController::class, 'getCartInfor'])->name('cart-info');
            Route::post('/add-cart', [CartController::class, 'addCart'])->name('add-cart');
            Route::post('cart', [CartController::class, 'addCartAjax'])->name('add-cart-ajax');
            Route::get('/checkout',[CartController::class,'checkout'])->name('checkout');
            Route::post('/minus',[CartController::class,'minusCart'])->name('minus');
            Route::post('/plus',[CartController::class,'plusCart'])->name('plus');
            Route::delete('/delete/{id}', [CartController::class, 'destroy'])->name('destroy');

        });
            
        Route::group(['prefix'=>'shop','as'=>'shop.'],function(){
            Route::get('list', [Product_detailController::class,'list'])->name('list');
            Route::get('/search-product-by-category', [Product_detailController::class,'searchProductByCategory'])->name('search-product');
            Route::get('/show/{id}',[Product_detailController::class,'show'])->name('show');
        
        });
