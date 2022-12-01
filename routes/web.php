<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ManageProductController;

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
});

Route::group(['prefix'=>'manage'], function(){
    Route::post('addProduct', [ManageProductController::class, 'addProduct']);
    Route::put('updateProduct', [ManageProductController::class, 'updateProduct']);
    Route::delete('deleteProduct/{product}', [ManageProductController::class, 'deleteProduct']);
    Route::post('uploadProductPicture', [ManageProductController::class, 'uploadProductPicture']);
});

Route::view('/', 'index');
Route::view('/manageProducts', 'index');