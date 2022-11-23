<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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

Route::group(['prefix'=>'products'], function(){
    Route::get('getAllProducts', [ProductsController::class, 'getAllProducts']);
    Route::get('searchProducts', [ProductsController::class, 'searchProducts']);
    Route::get('getAllTypes', [ProductsController::class, 'getAllTypes']);
    Route::get('filterProducts', [ProductsController::class, 'filterProducts']);
});

Route::view('/', 'index');